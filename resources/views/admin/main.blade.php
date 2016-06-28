@extends('admin.layouts.master')

@section('title')
    @@parent
@endsection

@section('content')
    <div class="col-md">
        <div class="row">
            <div class="col-md-offset-1 col-md-10 ">
                <div class="content-box-large">
                    <div class="row">
                        <!-- "店舗一覧" と編集ボタン -->
                        <div class="panel-heading col-md-12">
                            <div class="col-xs-3 col-sm-3 col-md-2 col-lg-2 panel-title"><b>店舗一覧</b></div>
                            <div class="col-xs-2 col-xs-offset-6
                                   col-sm-2 col-sm-offset-6
                                   col-md-2 col-md-offset-6
                                   col-lg-2 col-lg-offset-6 btn btn-primary"><i class="glyphicon glyphicon-pencil"></i> 編集</div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- 店舗一覧テーブル -->
                        <div class="panel-body col-md-10">
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">

                                <thead>
                                <tr>
                                    <th>店舗ID</th>
                                    <th>店舗名</th>
                                    <th>シフト担当者ID</th>
                                </tr>
                                </thead>

                                <tbody>
                                    <!-- 表示処理 -->
                                </tbody>

                            </table>
                        </div>

                        <br /><br /><br /><br />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
