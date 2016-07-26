@extends('layouts.noside_master')

@section('content')
    <?php use Carbon\Carbon; ?>
    <div class="page-content">

        @if(Auth::guard('shiftAdmin')->check())
            <button class="btn btn-info btn-lg" id="main" onclick="location.href='/shift/shiftview'"> 戻る</button>
        @else
            <button class="btn btn-info btn-lg" id="main" onclick="location.href='/user/shiftview'"> 戻る</button>
        @endif

        <?php $Day = ["日", "月", "火", "水", "木", "金", "土"]; ?>

        <div class="content-box-large">
            <h3 class="month" align="center">{{$nm}}月</h3>
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
                                                {{$shift->getStartTime()}}<br>
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

@endsection

@section('javascript')
    <script type="text/javascript">

        $(document).ready(function () {

        });

    </script>

@endsection