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

  			<div class="content-box-large">
  				<div class="panel-heading">
					<h1>従業員一覧</h1>
					<br>
					<br>
					 <button class="btn btn-info btn-lg"><i class="glyphicon glyphicon-cloud-upload"></i> 一覧インポート</button>
					<button class="btn btn-info btn-lg"><i class="glyphicon glyphicon-cloud-download"></i> 一覧ダウンロード</button>

					<div class="panel-body">
		  					<table class="table table-bordered">
						<thead>
							<tr>
								<th>削除選択</th>
								<th>名前       </th>
								<th>電話          </th>
								<th>メール        </th>
								<th>ポジション  </th>
								<th>勤務可能時間</th>
								<th>変更</th>
							 </tr>
						</thead>
						<tbody>
							@foreach ($users as $user)
							<tr>
								<td><input type="checkbox" class="sakuzyo" name="select" value="{{$user->id}}" id="user_id"></td>
								<td class="user_name">{{$user->username}}</td>
								<td>{{$user->tell}}</td>
								<td>{{$user->email}}</td>
								<td>{{$user->position->position}}</td>
								<td><button class="btn btn-default btn-xs" id="modal-open" value="{{$user->id}}" name="test">週間表示</button></td>
								<td><a href="/shift/management/update/{{$user->id}}"><input type="submit" class="btn btn-default btn-xs" value="変更"></a></td>
							</tr>
							@endforeach
						</tbody>
					</table>
					</div>
					<div align="right">
						<form method="GET" action="/shift/management/register">
							<button class="btn btn-lg btn-danger"><i class="glyphicon glyphicon-pencil"></i> 従業員追加</button>
						</form>
						<button type="button" class="btn btn-lg btn-danger" onclick="clickDelete()"><i class="glyphicon glyphicon-remove"></i> 従業員削除</button>
					</div>
				</div>
  			</div>
	</div>
@endsection

@section('footer')
    @@parent
@endsection

@section('javascript')
	<script type="text/javascript">
		$(function(){
			$('.btn.btn-default.btn-xs').click(function () {
				$('#modal_save').hide();
				$('#modal_title').text($(this).parent().siblings('.user_name').text() + " さんの勤務可能時間");
				//alert($(this).val())
				$.get("/shift/management/worktime",
						{'user_id': $(this).val()},		//配列にキー名をつけて送信
						function(data){
							//リクエストが成功した際に実行する関数
							//モーダルウィンドウに結果を表示
							for(var i = 0; i < data.length; i++){
								$('#modal_main').text(data[i]['start_time']);
							}
							//$('#modal_main').text(data[0]);
							$('#sampleModal').modal();
						}
				);
			});
		});
		//従業員削除ボタンが押された時のイベント
		function clickDelete(){
			checkValue = [];	//ﾁｪｯｸされている項目値の配列
			//class .panel-body のチェックボックスの値をみて trueなら以下の処理実行
			$('.panel-body :checkbox:checked').map(function() {
				checkValue.push($(this).val());	//value値を配列の末尾に追加
			});
			check = window.confirm('選択された従業員を削除しますか？');	//確認のダイアログ

			if(check == true){
				//post送信でリクエストを送信
				$.post("/shift/management/delete",
						{'select': checkValue},		//配列にキー名をつけて送信
						function(){
							//リクエストが成功した際に実行する関数
							location.reload();		//ページを更新
						}
				);
			}
		}
	</script>
@endsection

