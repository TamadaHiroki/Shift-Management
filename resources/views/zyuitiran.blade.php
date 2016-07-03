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

  			<div class="content-box-large">
  				<div class="panel-heading">
					<h1>従業員一覧<h1>
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
								<th>変更<th> 
							 </tr>
						</thead>
						<tbody>
							@foreach ($users as $user)
							<tr>
							    <td><input type="checkbox" class="sakuzyo" value="" ></td>
								<td>{{$user->username}}</td>
								<td>{{$user->tell}}</td>
								<td>{{$user->email}}</td>
								<td>{{$user->position_id}}</td>
								<td><button class="btn btn-default btn-xs" id="modal-open">週間表示</button></td>
								<td><button class="btn btn-default btn-xs">変更</button></td> 
							</tr>
							@endforeach
						</tbody>
					</table>
					</div>
					<div align="right"><button class="btn btn-lg btn-danger"><i class="glyphicon glyphicon-pencil"></i> 従業員追加</button>
					                  <button class="btn btn-lg btn-danger"><i class="glyphicon glyphicon-remove"></i> 従業員削除</button>
					</div>
				</div>
  			</div>
	</div>
@endsection

@section('footer')
    @@parent
@endsection
