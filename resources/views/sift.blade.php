@extends(Auth::guard('shiftAdmin')->check() ? 'ShiftMain.layouts.master' : 'layouts.noside_master');

@section('content')
    <?php use Carbon\Carbon; ?>
    @if(Auth::guard('shiftAdmin')->check())
        <div class="col-md-10">
    @else
        <div class="col-md-12">
    @endif
        <div class="page-content">
            <?php $Day = ["日", "月", "火", "水", "木", "金", "土"]; ?>

            <div class="content-box-large">
                <!-- styles -->
                <!-- fromを使って送信する処理を書く -->
                {{--<form method="post">--}}
                {{--<button class="btn btn-info btn-lg" id="prev"> 先週</button>--}}
                {{--<button class="btn btn-info btn-lg" id="next"> 次週</button>--}}
                {{--</form>--}}
                @if(Auth::guard('shiftAdmin')->check())
                    {{--<button class="btn btn-info btn-lg" id="main" onclick="location.href='/shift/main'"> 戻る</button>--}}
                    <button class="btn btn-info btn-lg" onclick="location.href='/month'"> 1ヶ月表示</button>
                @else
                    {{--<button class="btn btn-info btn-lg" id="main" onclick="location.href='/user/main'"> 戻る</button>--}}
                    <button class="btn btn-info btn-lg" onclick="location.href='/month'"> 1ヶ月表示</button>
                @endif

                <h3 class="month" align="center">{{$test4}}月</h3>
                @if(Auth::guard('user')->check())
                    <h4 align="right">{{Auth::guard('user')->user()->username}} さん</h4>
                @endif
                <div class="panel-body">
                    <table class="table" id="shift">
                        <thead>
                        <tr>
                            <th>ポジション</th>
                            <th>名前</th>
                            @foreach($test as $a)
                                <th>{{$a}}</th>
                            @endforeach
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            @foreach($test3 as $c)
                                <td>{{$Day[$c]}}</td>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($positions as $position)
                                @foreach($position->users as $user)
                                    <tr>
                                        <td>{{$position->position}}</td>
                                        <td>{{$user->username}}</td>
                                        @foreach($test2 as $a)
                                            <td><!--{{$shift = $user->getShift($a,$user->id)}}-->
                                                @if($shift != null)
                                                    {{$shift->getStartTime()}}～<br>
                                                    {{$shift->getEndTime()}}
                                                @endif
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('javascript')
    <script type="text/javascript">


        $(document).ready(function () {

//            if(Auth::guard('user')->user()->username)
//            document.getElementById('color').style.backgroundColor = '#ff0000';

//            var myDate = new Date();
//            var myDay = myDate.getDate();
//            var myD = myDate.getDay();
//            var myM = myDate.getMonth();
//            var Day = new Array("日", "月", "火", "水", "木", "金", "土");
//            var obj = document.getElementsByTagName("h3");
//            obj[0].innerHTML = (myM + 1) + "月"
//
//            for (var i = 3; i < 10; i++) {
//                //$('table#shift thead tr th:nth-child(' + i + ')').text(myDay);
//                $('table#shift thead tr td:nth-child(' + i + ')').text(Day[myD]);
//                myDate.setDate(myDate.getDate() + 1);
//                myD = myDate.getDay();
//                myDay = myDate.getDate();
//            }
//
//            var table = document.getElementById('shift');
//
//            $('#prev').on('click', function () {
//
//                myDate.setDate(myDate.getDate() - 14);
//                myD = myDate.getDay();
//                myDay = myDate.getDate();
//                myM = myDate.getMonth();
//
//                for (var i = 3; i < 10; i++) {
//                    $('table#shift thead tr th:nth-child(' + i + ')').text(myDay);
//                    $('table#shift thead tr td:nth-child(' + i + ')').text(Day[myD]);
//                    obj[0].innerHTML = "<center>" + (myM + 1) + "月</center>"
//                    myDate.setDate(myDate.getDate() + 1);
//                    myD = myDate.getDay();
//                    myDay = myDate.getDate();
//                }
//            });

            {{--$('#main').on('click', function(){--}}
                {{--href="{{url("/user/password/email")}}"--}}
            {{--})--}}

//            $('#next').on('click', function () {
//
//                for (var i = 3; i < 10; i++) {
//                    $('table#shift thead tr th:nth-child(' + i + ')').text(myDay);
//                    $('table#shift thead tr td:nth-child(' + i + ')').text(Day[myD]);
//                    myDate.setDate(myDate.getDate() + 1);
//                    myD = myDate.getDay();
//                    myDay = myDate.getDate();
//                    myM = myDate.getMonth();
//                    obj[0].innerHTML = "<center>" + (myM + 1) + "月</center>"
//                }
//            });
        });

    </script>

@endsection