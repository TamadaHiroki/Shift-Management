@extends('admin.layouts.master')

@section('content')
    <div class="content-box-large">
        <div class="panel-heading">
            <div class="panel-title"><h2>店舗一覧</h2></div>
        </div>
        <div class="panel-body">
            <table id="example" class="table table-striped table-bordered" border="0" cellpadding="0" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>店舗ID</th>
                    <th>店舗名</th>
                    <th>シフト担当者ID</th>
                    <th>パスワード</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            <center>
                <button type="button" class="btn btn-primary" id="add"><i class="glyphicon glyphicon-ok-sign"></i> 登録 </button>
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
            var id = 0;
            var sid= 0;


//            addRow = function() {
//                $('#example tbody').append('<tr><td>' + (id += 1) +'</td><td>ポジション</td><td align="center">00:00</td><td align="center">00:00</td><td><button type="button" class="btn btn-danger btn-xs" onclick="row_delete(this)"><i class="glyphicon glyphicon-remove-circle"></i> 削除 </button></td></tr>');
//            };

            addRow = function() {
                $('#example tbody').append('<tr>' +
                        '<td>' + (id += 1) +'</td>' +
                        '<td>店舗名を入力</td>' +
                        '<td>' + (sid += 1) +'</td>' +
                        '<td></td>' +
                        '<td><button type="button" class="btn btn-danger btn-xs" onclick="row_delete(this)"><i class="glyphicon glyphicon-remove-circle"></i> 削除 </button></td>' +
                        '</tr>');
            };

            $('#add').on('click', function() {
                addRow();
            });

            $('#edit').on('click',function () {
                if(flag){
                    $("#example > tbody").on('click','tr > td',edit_toggle());
                    $("#edit_text").text(" 確定 ");
                    flag=false
                }else{
                    $("#example > tbody").off('click','tr > td');
                    $("#edit_text").text(" 編集 ");
                    flag=true
                }
            });

//            $("#delete").on('click',function(){
//                $("#example > tbody").on('click','td',row_delete());
//            });

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
        });

        function row_delete(obj){
            tr = obj.parentNode.parentNode;
            // trのインデックスを取得して行を削除する
            tr.parentNode.deleteRow(tr.sectionRowIndex);

//            var table = document.getElementById("example");
//            var rowcount = table.rows.length;
//            var rows = 0;
//            if(rowcount == 2){
//                alert("削除する行がありません。");
//                return;
//            }
//            for(var i=0;i<table.rows.length;i++){
//                rows = table.rows[i];
//            }
//            table.deleteRow(rows);
        }

        function edit_toggle(){
            console.log($(this));
            var edit_flag=false;
            return function() {
                if (edit_flag) return;

                //if($("#example").Rows.cells[4]) return;

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

    </script>
@endsection

