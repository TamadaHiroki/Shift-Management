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
                        <div class="panel-title">ようこそ ""さん ←呼び出せませんか？</div>
                        <br><br><button type="button" onclick="location.href='a.html'" class="btn btn-lg btn-block btn-primary">[空]シフト表示へはこちら</button>
                        <br><br><button type="button" onclick="location.href='b.html'" class="btn btn-lg btn-block btn-primary">[空]パスワード変更へはこちら</button><br><br>
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
