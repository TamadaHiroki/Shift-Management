@extends('ShiftMain.layouts.noside_master')



@section('content')
    <link rel="stylesheet" type="text/css" href="/css/login.css">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-wrapper">
                    <div class="box" style="background-color:#CCFFFF">
                        <div class="content-wrap">
                            <h6>シフト管理者ログイン画面</h6>
                            <form method="POST" action="/shift/login">
                                {!! csrf_field() !!}
                                <input class="form-control" type="text" placeholder="ID" name="id" value="{{ old('id') }}">
                                <input class="form-control" type="password" placeholder="Password" name="password" value="{{ old('password') }}">
                                @include('common.errors')   <!-- 子の呼び出し (Errorの場合)-->
                                <div class="action">
                                    <button class="btn btn-primary signup" type="submit">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="already">
                        {{--<p>パスワードをお忘れですか？</p>--}}
                        {{--<a href="{{url("/shift/password/email")}}">再発行</a>--}}
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

@section('footer')
    @@parent
@endsection
