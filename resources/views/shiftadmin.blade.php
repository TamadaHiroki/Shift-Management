@extends('layouts.noside_master')



@section('content')
	<link rel="stylesheet" type="text/css" href="/css/login.css">
    	<div class="col-md-12">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="login-wrapper">
			        	<div class="box" style="background-color:#CCFFFF">
			            		<div class="content-wrap">
			                		<h6>シフト管理者ログイン画面</h6>
			               			<input class="form-control" type="text" placeholder="シフト管理者ID">
			                		<input class="form-control" type="password" placeholder="Password">
			                		<div class="action">
			                    			<a class="btn btn-primary signup" href="index.html">Login</a>
			                		</div>                
			            		</div>
			        	</div>

			        	<div class="already">
			            		<p>パスワードをお忘れですか？</p>
			            		<a href="signup.html">再発行</a>
			        	</div>
			    	</div>
			</div>

		</div>
	</div>

@endsection

@section('footer')
    @@parent
    @endsection
