@extends('ShiftMain.layouts.master')

@section('title')
    @@parent
@endsection

@section('header')
    @@parent
@endsection

@section('sidebar')
    @@parent
@endsection

@section('content')
    <div class="col-md-10">
        <div class="row">
            <div class="content-box-large">
                <h1>従業員情報変更</h1>
                <div class="panel-body">
                    <form method="POST" action="/shift/management/update/{{$user->id}}">
                        {{csrf_field()}}
                        <fieldset>
                                <div class="form-group">
                                    <label>名前</label>
                                    <input class="form-control" placeholder="氏名" type="text" name="username"
                                           value="{{$user->username}}">
                                </div>
                                <div class="form-group">
                                    <label>Eメール</label>
                                    <input type="email" class="form-control" id="exampleInputEmail2" placeholder="email" name="email"
                                           value="{{$user->email}}">
                                </div>
                                <div class="form-group">
                                    <label>電話番号</label>
                                    <input class="form-control" placeholder="電話番号" type="text" name="tell" value="{{$user->tell}}">
                                </div>
                                <div class="form-group">
                                    <label>ポジション</label>
                                    <!-- ポジションをデータベースから取得し表示-->
                                    <select name="position_id">
                                        @foreach($positions as $position)
                                            @if($user->position_id == $position->id)
                                                <option value="{{$position->id}}" selected>{{$position->position}}</option>
                                            @else
                                                <option value="{{$position->id}}">{{$position->position}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>月曜日</th>
                                        <th>火曜日</th>
                                        <th>水曜日</th>
                                        <th>木曜日</th>
                                        <th>金曜日</th>
                                        <th>土曜日</th>
                                        <th>日曜日</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr style="background-color:#CCFFFF">
                                        @for($i = 1; $i <= 7; $i++)
                                            @foreach($worktimes as $worktime)
                                                @if($i == 7)
                                                    @if($worktime->week_day == 0)
                                                        <td class="{{$i}}">
                                                            <select name="select_1[]">
                                                                <option value="">  </option>
                                                                @for($j = 6; $j <= 23; $j++)
                                                                    @if($j == $worktime->start_time)
                                                                        <option value="{{$j}}" selected>{{$j}}</option>
                                                                    @else
                                                                        <option value="{{$j}}">{{$j}}</option>
                                                                    @endif
                                                                @endfor
                                                            </select> 時
                                                            <select name="select_2[]">
                                                                <option value="">  </option>
                                                                @for($j = 0; $j <= 45; $j = $j + 15)
                                                                    @if($j == $worktime->start_minute)
                                                                        <option value="{{$j}}" selected>{{$j}}</option>
                                                                    @else
                                                                        <option value="{{$j}}">{{$j}}</option>
                                                                    @endif
                                                                @endfor
                                                            </select> 分から<br>
                                                        </td>
                                                    @endif
                                                @else
                                                    @if($worktime->week_day == $i)
                                                        <td class="{{$i}}">
                                                            <select name="select_1[]">
                                                                <option value="">  </option>
                                                                @for($j = 6; $j <= 23; $j++)
                                                                    @if($j == $worktime->start_time)
                                                                        <option value="{{$j}}" selected>{{$j}}</option>
                                                                    @else
                                                                        <option value="{{$j}}">{{$j}}</option>
                                                                    @endif
                                                                @endfor
                                                            </select> 時
                                                            <select name="select_2[]">
                                                                <option value="">  </option>
                                                                @for($j = 0; $j <= 45; $j = $j + 15)
                                                                    @if($j == $worktime->start_minute)
                                                                        <option value="{{$j}}" selected>{{$j}}</option>
                                                                    @else
                                                                        <option value="{{$j}}">{{$j}}</option>
                                                                    @endif
                                                                @endfor
                                                            </select> 分から<br>
                                                        </td>
                                                    @endif
                                                @endif

                                            @endforeach
                                        @endfor
                                    </tr>
                                    <tr>
                                        @for($i = 8; $i <= 14; $i++)
                                            @foreach($worktimes as $worktime)
                                                @if($i == 14)
                                                    @if($worktime->week_day == 0)
                                                        <td class="{{$i}}">
                                                            <select name="select_3[]">
                                                                <option value="">  </option>
                                                                @for($j = 6; $j <= 23; $j++)
                                                                    @if($j == $worktime->end_time)
                                                                        <option value="{{$j}}" selected>{{$j}}</option>
                                                                    @else
                                                                        <option value="{{$j}}">{{$j}}</option>
                                                                    @endif
                                                                @endfor
                                                            </select> 時
                                                            <select name="select_4[]">
                                                                <option value="">  </option>
                                                                @for($j = 0; $j <= 45; $j = $j + 15)
                                                                    @if($j == $worktime->end_minute)
                                                                        <option value="{{$j}}" selected>{{$j}}</option>
                                                                    @else
                                                                        <option value="{{$j}}">{{$j}}</option>
                                                                    @endif
                                                                @endfor
                                                            </select> 分まで
                                                        </td>
                                                    @endif
                                                @else
                                                    @if($worktime->week_day == $i - 7)
                                                        <td class="{{$i}}">
                                                            <select name="select_3[]">
                                                                <option value="">  </option>
                                                                @for($j = 6; $j <= 23; $j++)
                                                                    @if($j == $worktime->end_time)
                                                                        <option value="{{$j}}" selected>{{$j}}</option>
                                                                    @else
                                                                        <option value="{{$j}}">{{$j}}</option>
                                                                    @endif
                                                                @endfor
                                                            </select> 時
                                                            <select name="select_4[]">
                                                                <option value="">  </option>
                                                                @for($j = 0; $j <= 45; $j = $j + 15)
                                                                    @if($j == $worktime->end_minute)
                                                                        <option value="{{$j}}" selected>{{$j}}</option>
                                                                    @else
                                                                        <option value="{{$j}}">{{$j}}</option>
                                                                    @endif
                                                                @endfor
                                                            </select> 分まで
                                                        </td>
                                                    @endif
                                                @endif
                                            @endforeach
                                        @endfor
                                    </tr>
                                    {{--<tr style="background-color:#dcdcdc">--}}
                                        {{--<td></td>--}}
                                        {{--<td></td>--}}
                                        {{--<td></td>--}}
                                        {{--<td></td>--}}
                                        {{--<td></td>--}}
                                        {{--<td></td>--}}
                                        {{--<td></td>--}}
                                    {{--</tr>--}}
                                    </tbody>
                                </table>
                                <div>※水色の欄＝始業可能時間　白色の欄＝最終就業時間</div><br>
                                <button class="btn btn-warning btn-lg">変更</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @@parent
@endsection
