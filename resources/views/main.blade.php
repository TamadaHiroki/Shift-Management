@extends('layouts.master')

@section('title')
    @@parent
    @endsection

@section('content')
    <div class="col-md-10">
        <div class="row">
            <div class="col-md-9 panel-warnin">
                <div class="content-box-large">
                    <div class="panel-heading">
                        <div class="panel-title">ようこそ  {{Auth::guard('user')->user()->username}} さん</div>
                        <br><br><button type="button" onclick="location.href='sift'" class="btn btn-lg btn-block btn-primary">[空]シフト表示へはこちら</button>
                        <br><br><button type="button" onclick="location.href='passchange'" class="btn btn-lg btn-block btn-primary">[空]パスワード変更へはこちら</button><br><br>
                    </div>
                </div>
                <div class="panel-body">

                    <br /><br />
                    <br /><br />
                </div>
            </div>
        </div>
    </div>
@endsection
