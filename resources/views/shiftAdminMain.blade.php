@extends('ShiftMain.layouts.master')

@section('title')
    @@parent
@endsection

@section('content')
    <div class="col-md-10">
        <div class="row">
            <div class="col-md-9 panel-warnin">
                <div class="content-box-large">
                    <div class="panel-heading">
                        <div class="panel-title">ようこそ {{$store}} 担当者さん</div>
			<br><br><button type="button" onclick="location.href='/shift/adjustment'" class="btn btn-lg btn-block btn-primary">シフト調整</button>
			<br><br><button type="button" onclick="location.href='b.html'" class="btn btn-lg btn-block btn-primary">シフト確認</button>
			<br><br><button type="button" onclick="location.href='/shift/management/view'" class="btn btn-lg btn-block btn-primary">従業員管理</button>
			{{--<br><br><button type="button" onclick="location.href='b.html'" class="btn btn-lg btn-block btn-primary">業務設定</button>--}}
                        {{--<br><br><button type="button" onclick="location.href='b.html'" class="btn btn-lg btn-block btn-primary">パスワード変更へはこちら</button><br><br>--}}
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
