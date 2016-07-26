@extends('layouts.master')

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
						<h1>従業員追加</h1>
			  				<div class="panel-body">
			  					<form method="POST" action="/shift/management/register">
									{{csrf_field()}}
									<fieldset>
										<div class="form-group">
												<label>名前</label>
												<input class="form-control" placeholder="氏名" type="text" name="username">
										</div>
										<div class="form-group">
											<label>Eメール</label>
											<input type="email" class="form-control" id="exampleInputEmail2" placeholder="email" name="email">
										</div>
										<div class="form-group">
											<label>電話番号</label>
											<input class="form-control" placeholder="電話番号" type="text" name="tell">
										</div>
										<div class="form-group">
											<label>ポジション</label>
											<select name="position_id">
												@foreach($positions as $position)
														<option value="{{$position->id}}">{{$position->position}}</option>
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
													<td class="{{$i}}">
														<select name="select_1[]">
															<option value="">  </option>
															@for($j = 6; $j <= 23; $j++)
																<option value="{{$j}}">{{$j}}</option>
															@endfor
														</select> 時
														<select name="select_2[]">
															<option value="">  </option>
															@for($j = 0; $j <= 45; $j = $j + 15)
																<option value="{{$j}}">{{$j}}</option>
															@endfor
														</select> 分から<br>
													</td>
												@endfor
											</tr>
											<tr>
												@for($i = 8; $i <= 14; $i++)
													<td class="{{$i}}">
														<select name="select_3[]">
															<option value="">  </option>
															@for($j = 6; $j <= 23; $j++)
																<option value="{{$j}}">{{$j}}</option>
															@endfor
														</select> 時
														<select name="select_4[]">
															<option value="">  </option>
															@for($j = 0; $j <= 45; $j = $j + 15)
																<option value="{{$j}}">{{$j}}</option>
															@endfor
														</select> 分まで
													</td>
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
											{{--<tr style="background-color:#CCFFFF">--}}
												{{--@for($i = 15; $i <= 21; $i++)--}}
													{{--<td class="{{$i}}">--}}
														{{--<select>--}}
															{{--<option value="">  </option>--}}
															{{--@for($j = 6; $j <= 23; $j++)--}}
																{{--<option value="{{$j}}">{{$j}}</option>--}}
															{{--@endfor--}}
														{{--</select>時--}}
														{{--<select>--}}
															{{--<option value="">  </option>--}}
															{{--@for($j = 0; $j <= 45; $j = $j + 15)--}}
																{{--<option value="{{$j}}">{{$j}}</option>--}}
															{{--@endfor--}}
														{{--</select>分から<br>--}}
													{{--</td>--}}
												{{--@endfor--}}
											{{--</tr>--}}
											{{--<tr>--}}
												{{--@for($i = 22; $i <= 28; $i++)--}}
													{{--<td class="{{$i}}">--}}
														{{--<select>--}}
															{{--<option value="">  </option>--}}
															{{--@for($j = 6; $j <= 23; $j++)--}}
																{{--<option value="{{$j}}">{{$j}}</option>--}}
															{{--@endfor--}}
														{{--</select>時--}}
														{{--<select>--}}
															{{--<option value="">  </option>--}}
															{{--@for($j = 0; $j <= 45; $j = $j + 15)--}}
																{{--<option value="{{$j}}">{{$j}}</option>--}}
															{{--@endfor--}}
														{{--</select>分まで--}}
													{{--</td>--}}
												{{--@endfor--}}
											{{--</tr>--}}
											</tbody>
										</table>
										<div>※水色の欄＝始業可能時間　白色の欄＝最終就業時間</div>
										<div>※ひとつの曜日につき２つ時間帯を入力できます</div>
											<button class="btn btn-success btn-lg">追加</button>
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
