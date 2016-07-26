@extends('admin.layouts.master')

@section('content')
    <div class="content-box-large">
        <div class="panel-heading">
            <div class="panel-title"><h2>店舗一覧</h2></div>
        </div>
        <div class="panel-body">
            <table id="StoreList" class="table table-striped table-bordered" border="0" cellpadding="0" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>店舗ID</th>
                    <th>店舗名</th>
                    <th>シフト担当者ID</th>
                    {{--<th>パスワード</th>--}}
                    <th></th>
                </tr>
                </thead>
                <tbody id="t">
                @foreach($stores as $store)
                    <tr id="col">
                        <td class="storeid">{{$store->id}}</td>
                        <td class="editable">{{$store->store}}</td>
                        <td >{{$store->shift_admin_id}}</td>
                        {{--<td class="editable">{{$store->password}}</td>--}}
                        <td ><button type="button" class="btn btn-danger btn-xs" value="{{$store->id}}"><i class="glyphicon glyphicon-remove-circle"></i> 削除 </button></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <center>
                <button type="button" class="btn btn-primary" id="add" ><i class="glyphicon glyphicon-ok-sign"></i> 店舗追加 </button>
                <button type="button" class="btn btn-info" id="edit"><i class="glyphicon glyphicon-pencil"></i><span id="edit_text"> 編集 </span></button>
                <button type="button" class="btn btn-success"><i class="glyphicon glyphicon-refresh"></i> 戻る </button>
            </center>
        </div>
    </div>
@endsection



@section('javascript')
    <script type="text/javascript">

        $(document).ready(function() {
            var addRow;
            var flag = true;
            var id = Number("<?php echo json_encode($store->id); ?>");
            var sid= Number("<?php echo json_encode($store->shift_admin_id); ?>");
            var passwd = randompasswd;

            addRow = function() {
                $('#StoreList tbody').append('<tr id="col">' +
                        '<td class="storeid">' + (id += 1) +'</td>' +
                        '<td class="editable">店舗名を入力</td>' +
                        '<td>' + (sid += 1) +'</td>' +
//                        '<td class="editable">' + (passwd(6)) + '</td>' +
                        '<td><button type="button" class="btn btn-danger btn-xs" value="' + id + '"><i class="glyphicon glyphicon-remove-circle"></i> 削除 </button></td>' +
                        '</tr>');
            };

            $('#add').on('click', function() {
                addRow();
                //新規に作成された店舗をデータベースに追加します
                $.post("/admin/main/add",
                        { "pass":passwd ,"sid":sid,"id":id},
                        function(){
                            //リクエストが成功した際に実行する関数
                            //alert("追加しました");
                        }
                );

            });


//            $(document).on('click', '#edit', function () {
//                if(flag){
//                    $("#StoreList > tbody").on('click','tr > td.editable',edit_toggle());
//                    $("#edit_text").text(" 確定 ");
//                    flag=false
//
//
//                }else{
//                    $("#StoreList > tbody").off('click','tr > td.editable');
//                    $("#edit_text").text(" 編集 ");
//                    flag=true
//                }
//            });
            $('#edit').on('click',function () {
                if(flag){
                    $("#StoreList > tbody").on('click','tr > td.editable',edit_toggle());
                    $("#edit_text").text(" 確定 ");
                    flag=false



                }else{
                    $("#StoreList > tbody").off('click','tr > td.editable');
                    $("#edit_text").text(" 編集 ");
                    flag=true

                    var tbl = document.getElementById('StoreList').items(0);
                    var rows = tbl.rows.length;
                    var cols = tbl.rows[0].cells.length;

                    {{--@foreach($cols as $col)--}}
                        {{--$.post("/admin/main/update",--}}
                            {{--{'id':tbl.rows[$col].cells[0].innerText},--}}
                            {{--{'store':tbl.rows[$col].cells[1].innerText},--}}
                            {{--{'sid':tbl.rows[$col].cells[2].innerText}--}}
                        {{--)--}}
                    {{--@endforeach--}}
                }
            });

            $(document).on({
                'mouseenter':function(){
                    var idx = $(this).index() + 1;
                    var tds = $(this).closest("table.table").find("td:nth-child(" + idx + ")");
                    tds.css("background-color","#FFFF99");
                    $(this).css("background-color","#f99");
                    $(this).siblings().css('background', '#FFFF99');
                },
                'mouseleave':function(){
                    var idx = $(this).index() + 1;
                    var tds = $(this).closest("table.table").find("td:nth-child(" + idx + ")");
                    tds.css("background-color","#fff");
                    $(this).css("background-color","#fff");
                    $(this).siblings().css('background', '#fff');
                }
            },'table.table td');


            $(document).on("click", ".btn.btn-danger.btn-xs", function () {
                var store_id = $(this).val();
                tr = $(this).parent().parent();
                // trのインデックスを取得して行を削除する
                tr.remove();



                $.post("/admin/main/delete",
                    { 'id' : store_id},
                    function() {
                        //リクエストが成功した際に実行する関数
                        //alert("ok");
                    }
                )
            })
        });

//        function row_delete(obj){
//            //行削除と同じタイミングでデータベースから行ごと削除します。
//            //var id = obj.parent().children('.storeid');
//            alert($(this).val());
////            //送信処理
////            $.post("/admin/main",
////                    { 'id' : },
////                    function(data){
////                                //リクエストが成功した際に実行する関数
////                                alert("Data Loaded: " + data);
//
//            tr = obj.parentNode.parentNode;
//            // trのインデックスを取得して行を削除する
//            tr.parentNode.deleteRow(tr.sectionRowIndex);
//
//
//
////            var table = document.getElementById("StoreList");
////            var rowcount = table.rows.length;
////            var rows = 0;
////            if(rowcount == 2){
////                alert("削除する行がありません。");
////                return;
////            }
////            for(var i=0;i<table.rows.length;i++){
////                rows = table.rows[i];
////            }
////            table.deleteRow(rows);
//        }

        function edit_toggle(){
            var edit_flag=false;
            return function() {
                if (edit_flag) return;
                var $input = $("<input>").attr("type", "text").val($(this).text());
                $(this).html($input);

                $("input", this).focus().blur(function () {
                    //save(this);
                    $(this).after($(this).val()).unbind().remove();
                    edit_flag = false;
                });
                edit_flag = true;
            }
        }

        function save(elm){
            //alert("「"+$(elm).val()+"」を保存しました"); //保存する処理をここに書く
        }

        /**
         * ランダム文字列生成 (英数字)
         * len: 生成する文字数
         */
        function randompasswd(len) {
            var l = 6; // 生成する文字列の長さ
            var c = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJLKMNOPQRSTUVWXYZ0123456789"; // 生成する文字列に含める文字セット
            var cl = c.length;
            var r = "";
            for (var i = 0; i < l; i++) {
                r += c[Math.floor(Math.random() * cl)];
            }
            return r;
        }
    </script>
@endsection

