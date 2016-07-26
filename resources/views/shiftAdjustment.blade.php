@extends('layouts.master')

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
					<br>
					<br>


										<table class="table table-bordered" id="users_table">
											<thead>
												<tr>
													<th width="64">ﾎﾟｼﾞｼｮﾝ</th>
													<th width="100">氏名</th>
													{{--<input type="text" name="" value="00/00" size="5" maxlength="8" readonly="readonly" >--}}
													<th>月曜日</th>
													<th>火曜日</th>
													<th>水曜日</th>
													<th>木曜日</th>
													<th>金曜日</th>
													<th>土曜日</th>
													<th>日曜日</th>
												 </tr>
											</thead>
											<tbody>
												@foreach($positions as $position)
														@foreach($users as $user)
															@if($position->id == $user->position_id)
																<tr style="background-color:#CCFFFF">
																	<th>{{$position->position}}</th>
																	<th id="name_{{$user->id}}">{{$user->username}}</th>
																	@for($i = 1; $i <= 7; $i++)
																		<td class="{{$i}}" id="week_day">
																			<select class="select_1" disabled>
																				<option value="">  </option>
																				@for($j = 6; $j <= 23; $j++)
																					<option value="{{$j}}">{{$j}}</option>
																				@endfor
																			</select> 時
																			<select class="select_2" disabled>
																				<option value="">  </option>
																				@for($j = 0; $j <= 45; $j = $j + 15)
																					<option value="{{$j}}">{{$j}}</option>
																				@endfor
																			</select> 分から<br>
																			<select class="select_3" disabled>
																				<option value="">  </option>
																				@for($j = 6; $j <= 23; $j++)
																					<option value="{{$j}}">{{$j}}</option>
																				@endfor
																			</select> 時
																			<select class="select_4" disabled>
																				<option value="">  </option>
																				@for($j = 0; $j <= 45; $j = $j + 15)
																					<option value="{{$j}}">{{$j}}</option>
																				@endfor
																			</select>
																			分まで <button class="btn btn-xs btn-danger">休み</button>
																		</td>
																	@endfor
																</tr>
															@endif
														@endforeach
												@endforeach
											</tbody>
										</table>

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
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			//testデータを連想配列で name1は人名 月～日は曜日 start～endは入力値
			var test = {
				"name1":{
					"月":{"start_time":"6", "start_minute":"0", "end_time":"18", "end_minute":"30"},
					"火":{"start_time":"6", "start_minute":"0", "end_time":"18", "end_minute":"30"},
					"水":{"start_time":"6", "start_minute":"0", "end_time":"18", "end_minute":"30"},
					"木":{"start_time":"6", "start_minute":"0", "end_time":"18", "end_minute":"30"},
					"金":{"start_time":"6", "start_minute":"0", "end_time":"18", "end_minute":"30"},
					"土":{"start_time":"6", "start_minute":"0", "end_time":"18", "end_minute":"30"},
					"日":{"start_time":"6", "start_minute":"0", "end_time":"18", "end_minute":"30"},
				},
				"name2":{
					"月":{"start_time":"9", "start_minute":"30", "end_time":"12", "end_minute":"0"},
					"火":{"start_time":"6", "start_minute":"0", "end_time":"18", "end_minute":"30"},
					"水":{"start_time":"6", "start_minute":"0", "end_time":"18", "end_minute":"30"},
					"木":{"start_time":"6", "start_minute":"0", "end_time":"18", "end_minute":"30"},
					"金":{"start_time":"6", "start_minute":"0", "end_time":"18", "end_minute":"30"},
					"土":{"start_time":"6", "start_minute":"0", "end_time":"18", "end_minute":"30"},
					"日":{"start_time":"6", "start_minute":"0", "end_time":"18", "end_minute":"30"},
				},
			};

			$('.btn.btn-xs.btn-danger').click(function () {
				//var elements = document.getElementsByClassName("btn btn-xs btn-danger");
				if(this.innerHTML == "修正"){
					this.innerHTML = "休み"	//押されたところのテキストを変更
					$(this).parent().children('select').attr('disabled', 'disabled');


				}else{
					this.innerHTML = "修正"	//押されたところのテキストを変更
					$(this).parent().children('select').removeAttr('disabled');

				}
			});

			//手動修正確定ボタンクリックイベント
			$('#modify-confirm').click(function(){
				var shift_users = new Array();		//ここに取得してきた値を入れていく
				var week_day = ["月", "火", "水", "木", "金", "土", "日"];
				var match = 'name_';
				var thObj = document.getElementsByTagName('th');
				var matchObj= new RegExp(match);
				for(var i = 0; i < thObj.length; i++) {
					for (var j = 1; j <= 7; j++) {	//従業員の曜日ごとの時間取得 	曜日は 月曜～日曜：1～７
						//休みボタンが押されていないとき == disabledでないとき処理する
						if (thObj[i].id.match(matchObj)) {
							if ($('#' + thObj[i].id).siblings('.' + j).children('select').is(':disabled') === false) {	//siblings兄弟セレクタ取得
								//ここからは割り当てる状態のところを取得できる
								//var test = $('#' + thObj[i].id).siblings('.' + j).children('.select_1 option:selected').val();
								//alert($('#' + thObj[i].id).siblings('.' + j).children('.select_1').val());
								//alert($('#' + thObj[i].id).siblings('.' + j).children('.select_2').val());
								//alert($("#select_1 option:selected").text());
								//var id = String(thObj[i].id);
								var user = {
									'user_id': thObj[i].id.replace(/name_/g, ""),		//入力項目のあるユーザーID取得 name_数値なのでname_を除去(gはあると連続で見つけて削除)
									'week_day': week_day[$('#' + thObj[i].id).siblings('.' + j).get(0).className - 1],		//.get(0)でHTML.Element？を取得しclass名を取得
									'start_time': $('#' + thObj[i].id).siblings('.' + j).children('.select_1').val(),
									'start_minute': $('#' + thObj[i].id).siblings('.' + j).children('.select_2').val(),
									'end_time': $('#' + thObj[i].id).siblings('.' + j).children('.select_3').val(),
									'end_minute': $('#' + thObj[i].id).siblings('.' + j).children('.select_4').val()
								};
								shift_users.push(user);		//配列の中に連想配列をブチ込む 取り出すときは　配列[要素数]['Key']
								//alert(shift_users[0]['start_time']);
							}
						}
					}
				}
				check = window.confirm('シフトの調整を保存しますか？');	//確認のダイアログ

				if(check == true){
					//post送信でリクエストを送信
					$.post("/shift/adjustment",
							{'shift_users': shift_users},		//配列にキー名をつけて送信
								function(){
									//リクエストが成功した際に実行する関数
									location.reload();		//ページを更新
									alert("シフト調整が完了しました。");
								}
					);
				}
			});
		});

	</script>
@endsection