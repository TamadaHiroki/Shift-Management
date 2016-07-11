@extends('layouts.master')



@section('content')
	<link rel="stylesheet" type="text/css" href="/css/login.css">
    	<div class="col-md-10">
		<div class="row">
			<div class="col-md-5 col-md-offset-4">
				<div class="login-wrapper">
			        	<div class="box" ">
			            		<div class="content-wrap">
			                		<h6>パスワード変更画面</h6>
			               			<input class="form-control" type="text" placeholder="現在のパスワード">
			                		<input class="form-control" type="password" placeholder="新しいパスワード">
							<input class="form-control" type="password" placeholder="新しいパスワード確認入力">
			                		<div class="action">
			                    			<a class="btn btn-primary signup" href="index.html" style="background-color:#2E8B57">パスワード変更</a>
								<a class="btn btn-primary signup" href="index.html" style="background-color:#CC0000">キャンセル</a>
			                		</div>                
			            		</div>
			        	</div>

			        
			    	</div>
			</div>

		</div>
	</div>

@endsection

@section('footer')
    @@parent
    @endsection
