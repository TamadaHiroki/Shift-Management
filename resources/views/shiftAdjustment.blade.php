@extends('ShiftMain.layouts.master')

@section('title')
    @@parent
    @endsection

@section('header')
    @@parent
    @endsection

@section('sidebar')
    @@parent
    @endsection

@section('content')
			    <div class="col-md-10">
					<div class="row">
			 	<div class="content-box-large">
						<h1>シフト割り当て</h1>

				<button class="btn btn-info btn-sm">自動割り当て</button>
					<button class="btn btn-info btn-sm" id="back">先週</button>
					<button class="btn btn-info btn-sm" id="next">次週</button>
					<br>
					<br>

						<table class="table table-bordered" id="users_table">
							<thead>
							<tr>
								<th width="64">ﾎﾟｼﾞｼｮﾝ</th>
								<th width="100">氏名</th>
								{{--<input type="text" name="" value="00/00" size="5" maxlength="8" readonly="readonly" >--}}
								<th id="th_1"></th>
								<th id="th_2"></th>
								<th id="th_3"></th>
								<th id="th_4"></th>
								<th id="th_5"></th>
								<th id="th_6"></th>
								<th id="th_7"></th>
							</tr>
							</thead>
							<tbody>
							@foreach($users as $user)
								<tr style="background-color:#CCFFFF">
									<th>{{$user->position['position']}}</th>
									<th id="name_{{$user->id}}">{{$user->username}}</th>
									@for($i = 1; $i <= 7; $i++)
										<td class="{{$i}}" id="week_day">
										</td>
									@endfor
								</tr>
							@endforeach
							</tbody>
						</table>
						<div>※未入力項目または、休み状態の項目は保存されません</div>
						<div align="right"><button class="btn btn-sm btn-danger" id="modify-confirm">手動修正確定</button></div>

					</fieldset>
				</div>
					</div>
				</div>
@endsection

@section('footer')
    @@parent
@endsection
@section('javascript')
	<script type="text/javascript">
		$(function () {

			//phpから配列を受け取るためにJSON形式にしていたものをparseする
			var month = JSON.parse('<?php echo $month; ?>');
			var user_work = JSON.parse('<?php echo $user_work; ?>');
			var user_shift = JSON.parse('<?php echo $user_shift; ?>');
			var users_shift = new Array();		//ユーザーごとのシフト情報を格納しておく配列

			$(document).ready(function () {	// ページ読み込み時に処理
				var nextWeek;
				var backWeek;
				var i = 1;
				var amari = month.length % 7;
				var lastday_flg = false;
				var isWeekMove = false;		//1回でも次週が押されたかのフラグ
				var count = 1;

				for(i; i < 8; i++){
					$('#th_' + i).text(month[i-1]['month'] + "月" + month[i-1]['day'] + "日(" + month[i-1]['week'] + ")");
					for(var j = 0; j < user_work.length; j++){		//ユーザー数
						$('#name_' + user_work[j][0]['user_id']).siblings('.' + i).append(
							'<select class="select_1" style="width: 40px" disabled><option value="">  </option></select> 時',
								'<select class="select_2" style="width: 40px" disabled><option value="">  </option></select> 分から<br>',
								'<select class="select_3" style="width: 40px" disabled><option value="">  </option></select> 時',
								'<select class="select_4" style="width: 40px" disabled><option value="">  </option></select> 分まで <button class="btn btn-xs btn-danger">休み</button>'
						);
						createHour(j, month[i-1]['week_num'], month[i-1]['day']);
						createMinute(j, month[i-1]['week_num'], month[i-1]['day']);
					}
					count += 1;
				}
				count = 1;
				i--;

				nextWeek = function () {
					if(i == month.length){		//その月の日数を超えたら処理を返す
						return;
					}
					getShiftInfo(7);
					for(var j = 1; j < 8; j++){
						$('#th_' + j).text("");
					}
					newCreateSelecttion();
					for(var j = 1; j < 8; j++){
						if(i == month.length){		//その月の日数を超えたら処理を返す
							for(count; count <= 7; count++){
								for(var k = 0; k < user_work.length; k++) {		//ユーザー数
									$('#name_' + user_work[k][0]['user_id']).siblings('.' + count).children().remove();		//余った分を削除
									$('#name_' + user_work[k][0]['user_id']).siblings('.' + count).text("");
									$('#name_' + user_work[k][0]['user_id']).siblings('.' + count).hide();		//余った部分を隠す
									$('#th_' + count).hide();
									lastday_flg = true;
								}
							}
							i -= amari;
							count = 1;
							return;
						}
						$('#th_' + j).text(month[i]['month'] + "月" + month[i]['day'] + "日(" + month[i]['week'] + ")");
						for(var k = 0; k < user_work.length; k++) {
							createHour(k, month[i]['week_num'], month[i]['day']);
							createMinute(k, month[i]['week_num'], month[i]['day']);
						}
						count += 1;
						i++;
					}
					count = 1;
				};

				backWeek = function () {
					if(i == 7){
						return;
					}if(lastday_flg == true){
						getShiftInfo(getWeekNum());
					}else {
						getShiftInfo(7);
					}
					for(var j = 7; j >= 1; j--){	//テキスト一旦クリア
						$('#th_' + j).text("");
					}
					newCreateSelecttion();
					count = 7;
					if(lastday_flg == true){	//最後の日付を表示するページまでいって先週ボタンを押す場合
						for(var j = 1; j <= 7; j++){
							for(var k = 0; k < user_work.length; k++) {		//ユーザー数
								$('#name_' + user_work[k][0]['user_id']).siblings('.' + j).show();		//隠していた部分を表示
								$('#th_' + j).show();
								lastday_flg = false;
							}
						}
						for(var j = 7; j >= 1; j--){
							$('#th_' + j).text(month[i-1]['month'] + "月" + month[i-1]['day'] + "日(" + month[i-1]['week'] + ")");
							for(var k = 0; k < user_work.length; k++) {
								createHour(k, month[i-1]['week_num'], month[i-1]['day']);
								createMinute(k, month[i-1]['week_num'], month[i-1]['day']);
							}
							count -= 1;
							i--;
						}
						i += 7;
					}else{
						for(var j = 7; j >= 1; j--){
							$('#th_' + j).text(month[i-8]['month'] + "月" + month[i-8]['day'] + "日(" + month[i-8]['week'] + ")");
							for(var k = 0; k < user_work.length; k++) {
								createHour(k, month[i-8]['week_num'], month[i-8]['day']);
								createMinute(k, month[i-8]['week_num'], month[i-8]['day']);
							}
							count -= 1;
							i--;
						}
					}

					count = 1;
				};

				//次週ボタンクリックイベント
				$('#next').on('click', function () {
					nextWeek();
				});

				//先週ボタンクリックイベント
				$('#back').on('click', function () {
						backWeek();
				});

				//手動修正確定ボタンクリックイベント
				$('#modify-confirm').click(function(){

					if(lastday_flg == true){
						getShiftInfo(getWeekNum());		//曜日の項目数を取得してページの入力情報を取得
					}else {
						getShiftInfo(7);	//今のページの入力情報を取得
					}
					check = window.confirm('シフトの調整を保存しますか？');	//確認のダイアログ

					if(check == true){
						//post送信でリクエストを送信
						$.post("/shift/adjustment",
								{'shifts': users_shift},		//配列にキー名をつけて送信
									function(){
										//リクエストが成功した際に実行する関数
										location.reload();		//ページを更新
										alert("シフト調整が完了しました。");
									}
						);
					}
				});

				$(document).on('click', '.btn.btn-xs.btn-danger', function () {
					//var elements = document.getElementsByClassName("btn btn-xs btn-danger");
					if(this.innerHTML == "修正"){
						this.innerHTML = "休み";	//押されたところのテキストを変更
						$(this).parent().children('select').attr('disabled', 'disabled');


					}else{
						this.innerHTML = "修正";	//押されたところのテキストを変更
						$(this).parent().children('select').removeAttr('disabled');

					}
				});

				/*
					始まり時間と終わりの時間の<option>を生成する関数
					param: user_num ユーザーの数, week 今日の曜日, today 今日の日付
				 */
				function createHour(user_num, week, today){

					var isShiftData = [false, 0];	//Shiftデータに既にその日の日付のデータがあるかどうかのフラグ
					for(var index = 0; index < user_shift.length; index++) {	//ユーザーごとの保存されているShiftを確認
						if ((today == user_shift[index]['start_day']) && (user_work[user_num][0]['user_id'] == user_shift[index]['user_id'])) {		//書込み対象の日付と保存されている日付で同じのがあれば
							isShiftData[0] = true;
							isShiftData[1] = index;
						}
					}
					for(var index = 0; index < 7; index++) {		//ユーザーごとの曜日数
						if(week == user_work[user_num][index]['week_day']) {		//曜日が一致するとき
							if(user_work[user_num][index]['start_hour'] == 0 || user_work[user_num][index]['end_hour'] == 0){
								$('#name_' + user_work[user_num][0]['user_id']).siblings('.' + count).children('.btn.btn-xs.btn-danger').remove();
							}

							for(var j = 6; j <= 23; j++){
								//Start時間の生成
								if((isShiftData[0] == true) && (j == user_shift[isShiftData[1]]['start_hour'])){
									$('#name_' + user_work[user_num][0]['user_id']).siblings('.' + count).children('.select_1').append(
											'<option value="' + j + '" selected>' + j + '</option>'
									);
									//入力値があれば<select>のenabledをonにする
									$('#name_' + user_work[user_num][0]['user_id']).siblings('.' + count).children('select').removeAttr('disabled');
									$('#name_' + user_work[user_num][0]['user_id']).siblings('.' + count).children('.btn.btn-xs.btn-danger').text('修正');

								}else if(j >= user_work[user_num][index]['start_hour']) {
									if(user_work[user_num][index]['end_hour'] >= j){		//始まりの時間の終わりは、終わりの時間までの表示
										$('#name_' + user_work[user_num][0]['user_id']).siblings('.' + count).children('.select_1').append(
												'<option value="' + j + '">' + j + '</option>'
										);
									}
								}
								//End時間の生成
								if((isShiftData[0] == true) && (j == user_shift[isShiftData[1]]['end_hour'])){
									$('#name_' + user_work[user_num][0]['user_id']).siblings('.' + count).children('.select_3').append(
											'<option value="' + j + '" selected>' + j + '</option>'
									);
								}else if(j <= user_work[user_num][index]['end_hour'] || user_work[user_num][index]['end_hour'] == 0) {
									if(user_work[user_num][index]['start_hour'] <= j){	//終わりの時間は始まりの時間から表示
										$('#name_' + user_work[user_num][0]['user_id']).siblings('.' + count).children('.select_3').append(
												'<option value="' + j + '">' + j + '</option>'
										);
									}

								}
							}
						}
					}
				}
				/*
				 始まり分と終わりの分の<option>を生成する関数
				 param: user_num ユーザーの数, week 今日の曜日, today 今日の日付
				 */
				function createMinute(user_num, week, today){

					var isShiftData = [false, 0];	//Shiftデータに既にその日の日付のデータがあるかどうかのフラグ
					for(var index = 0; index < user_shift.length; index++) {	//ユーザーごとの保存されているShiftを確認
						if ((today == user_shift[index]['start_day']) && (user_work[user_num][0]['user_id'] == user_shift[index]['user_id'])) {		//書込み対象の日付と保存されている日付で同じのがあれば
							isShiftData[0] = true;
							isShiftData[1] = index;
						}
					}
					for(var index = 0; index < 7; index++) {		//ユーザーごとの曜日数
						if(week == user_work[user_num][index]['week_day']) {		//曜日が一致するとき
							for(var j = 0; j <= 45; j = j+15){
								//Start時間の分を生成
								if((isShiftData[0] == true) && (j == user_shift[isShiftData[1]]['start_minute'])) {
									$('#name_' + user_work[user_num][0]['user_id']).siblings('.' + count).children('.select_2').append(
											'<option value="' + j + '" selected>' + j + '</option>'
									);
								}else{
									$('#name_' + user_work[user_num][0]['user_id']).siblings('.' + count).children('.select_2').append(
											'<option value="' + j + '">' + j + '</option>'
									);
								}
//								}else if(j >= user_work[user_num][i]['start_minute']) {
//									$('#name_' + user_work[user_num][0]['user_id']).siblings('.' + count).children('.select_2').append(
//											'<option value="' + j + '">' + j + '</option>'
//									);
//								}
								//End時間の分を生成
								if((isShiftData[0] == true) && (j == user_shift[isShiftData[1]]['end_minute'])) {
									$('#name_' + user_work[user_num][0]['user_id']).siblings('.' + count).children('.select_4').append(
											'<option value="' + j + '" selected>' + j + '</option>'
									);
								}else{
									$('#name_' + user_work[user_num][0]['user_id']).siblings('.' + count).children('.select_4').append(
											'<option value="' + j + '">' + j + '</option>'
									);
								}
//								}else if(j <= user_work[user_num][i]['end_minute']) {
//									$('#name_' + user_work[user_num][0]['user_id']).siblings('.' + count).children('.select_4').append(
//											'<option value="' + j + '">' + j + '</option>'
//									);
//								}
							}
						}
					}
				}

				//ユーザーごとの<select>を作り直す 次週や先週ボタン用
				function newCreateSelecttion() {
					for(var j = 1; j < 8; j++){
						for(var k = 0; k < user_work.length; k++){		//ユーザー数
							$('#name_' + user_work[k][0]['user_id']).siblings('.' + j).children().remove();		//元々あった<select>などを削除
							$('#name_' + user_work[k][0]['user_id']).siblings('.' + j).text("");
							$('#name_' + user_work[k][0]['user_id']).siblings('.' + j).append(
									'<select class="select_1" style="width: 40px" disabled><option value="">  </option></select> 時',
									'<select class="select_2" style="width: 40px" disabled><option value="">  </option></select> 分から<br>',
									'<select class="select_3" style="width: 40px" disabled><option value="">  </option></select> 時',
									'<select class="select_4" style="width: 40px" disabled><option value="">  </option></select> 分まで <button class="btn btn-xs btn-danger">休み</button>'
							);
						}
					}
				}

				//そのページ入力されている状態のシフト情報を取得し保存しておく関数
				function getShiftInfo(max) {	//param: max 表示されている曜日数
					var match = 'name_';
					var thObj = document.getElementsByTagName('th');
					var matchObj= new RegExp(match);
					for(var index = 0; index < thObj.length; index++) {		//ユーザー数
						for (var j = 1; j <= max; j++) {	//従業員の曜日ごとの時間取得 	曜日は 月曜～日曜：1～７
						//休みボタンが押されていないとき == disabledでないとき処理する
							if (thObj[index].id.match(matchObj)) {
								if ($('#' + thObj[index].id).siblings('.' + j).children('select').is(':disabled') === false) {	//siblings兄弟セレクタ取得
									//ここからは修正ボタン状態のところを取得できる
									var day_num = Number(thObj[j].id.replace(/th_/g, ""));
									day_num = day_num + 1;
									var day = $('#th_' + day_num).text();
									day = day.replace(/^[0-9]月|[日月火水木金土]|\(|\)$/g, "");	//正規表現で 例：8月1日 から日付の1のみ取り出す

									var start_time = $('#' + thObj[index].id).siblings('.' + j).children('.select_1').val();
									var start_minute = $('#' + thObj[index].id).siblings('.' + j).children('.select_2').val();
									var end_time = $('#' + thObj[index].id).siblings('.' + j).children('.select_3').val();
									var end_minute = $('#' + thObj[index].id).siblings('.' + j).children('.select_4').val();
									var user = {
										'user_id': thObj[index].id.replace(/name_/g, ""),		//入力項目のあるユーザーID取得 name_数値なのでname_を除去(gはあると連続で見つけて削除)
										'year': month[0]['year'],
										'month': month[0]['month'],
										'day': day,
										'start_time': start_time,
										'start_minute': start_minute,
										'end_time': end_time,
										'end_minute': end_minute
									};
									if(user['day'] == '' || start_time == '' || start_minute == '' || end_time == '' || end_minute == ''){		//来週ボタンを連打したときに保存すると空白の配列ができてしまうので空白であれば保存せずスキップ
										continue;
									}

									if(isWeekMove == false){	//初回の配列に保存のため
										users_shift.push(user);		//配列の中に連想配列をブチ込む 取り出すときは　配列[要素数]['Key']
									}else{
										var write_flg = false;		//書き換えたかどうかのフラグ
										//配列に同じデータがあるか確認
										for(var k = 0; k < users_shift.length; k++){
											if(users_shift[k]['user_id'] == user['user_id'] && users_shift[k]['day'] == user['day']) {
												//既に前のページで保存されている場合 その要素に上書き
												users_shift.splice(k, 1, user);
												write_flg = true;
												break;		//配列に上書きしたらループを抜ける
											}
										}
										if(write_flg == false){	//既存のデータがなければ追加
											users_shift.push(user);		//配列の中に連想配列をブチ込む 取り出すときは　配列[要素数]['Key']
										}
									}
								}
							}
						}
					}
					isWeekMove = true;		//初回 次週ボタンクリックしたらフラグをtrue
				}

				//ラストページの項目数を取得する関数
				function getWeekNum() {
					var show_num = 0;	//表示されている#th_１～７を取得
					for(var index = 1; index <= 7; index++){
						if(!($('#th_' + index).css('display') == 'none')){
							show_num += 1;
						}
					}
					return show_num;
				}

			});
		});

	</script>
@endsection