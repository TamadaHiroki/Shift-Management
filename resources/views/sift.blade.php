@extends('layouts.noside_master')

@section('content')
    <div class="page-content">

        <!-- styles -->
        <button  class="btn btn-info btn-lg"> 先週 </button>
        <button class="btn btn-info btn-lg" id = "edit2"> 次週 </button>
        <button class="btn btn-info btn-lg" id = "edit"> 戻る </button>

        <div class="content-box-large">
            <div class="panel-body">
                <table class="table" id="sift">
                    <thead>
                    <tr>
                        <th>ポジション</th>
                        <th>名前</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>軍艦</td>
                        <td>1-2</td>
                        <td>1-3</td>
                        <td>1-4</td>
                        <td>1-5</td>
                        <td>1-6</td>
                        <td>1-7</td>
                        <td>1-8</td>
                        <td>1-9</td>
                    </tr>
                    <tr>
                        <td>2-1</td>
                        <td>2-2</td>
                        <td>2-3</td>
                        <td>2-4</td>
                        <td>2-5</td>
                        <td>2-6</td>
                        <td>2-7</td>
                        <td>2-8</td>
                        <td>2-9</td>
                    </tr>
                    <tr>
                        <td>3-1</td>
                        <td>3-2</td>
                        <td>3-3</td>
                        <td>3-4</td>
                        <td>3-5</td>
                        <td>3-6</td>
                        <td>3-7</td>
                        <td>3-8</td>
                        <td>3-9</td>
                    </tr>
                    <tr>
                        <td>4-1</td>
                        <td>4-2</td>
                        <td>4-3</td>
                        <td>4-4</td>
                        <td>4-5</td>
                        <td>4-6</td>
                        <td>4-7</td>
                        <td>4-8</td>
                        <td>4-9</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('javascript')
    <script type="text/javascript">


            $(document).ready(function () {
                var editRow;
                var editEE;
                editEE = function () {
                    var myDate = new Date();
                    var myDay = myDate.getDate();

                    for (var i = 3; i < 10; i++) {
                        $('table#sift thead tr th:nth-child(' + i + ')').text(myDay);
                        myDate.setDate(myDate.getDate() + 1);
                        myDay = myDate.getDate();
                    }
                };

                editRow = function () {
                    var myDate = new Date();
                    //var dayOfMonth = myDate.getDate();
                    //var myY = myDate.getFullYear();
                    //var myM=myDate.getMonth(); //月の値 取得
                    var myD = myDate.getDay(); //日の曜日の値 取得
                    var myDay = new Array("日", "月", "火", "水", "木", "金", "土"); //配列オブジェクトを生成
                    //myDate = new Date( myY,myM-1,myD); //指定した時刻を表す日付オブジェクトを作成
                    //var myWeek = myDate.getDay(); //曜日の
                    for (var i = 3; i < 10; i++) {
                        $('table#sift thead tr td:nth-child(' + i + ')').text(myDay[myD]);
                        myDate.setDate(myDate.getDate() + 1);
                        myD = myDate.getDay();
                    }
                };

                $('#edit').on('click', function () {
                    editRow();
                });

                $('#edit2').on('click', function () {
                    editEE();
                })
            });


    </script>

@endsection