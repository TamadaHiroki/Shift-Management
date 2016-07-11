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
						<h1>シフト割り当て</h1>

				<button class="btn btn-info btn-sm">自動割り当て</button>
					<br>
					<br>


										<table class="table table-bordered">
											<thead>
												<tr>
													<th width="90">氏名</th>
													<th>月曜日</th>
													<th>火曜日</th>
													<th>水曜日</th>
													<th>木曜日</th>
													<th>金曜日</th>
													<th>土曜日</th>
													<th>日曜日</th> 
												 </tr>
											</thead>
											<tbody><tr style="background-color:#CCFFFF">
													<th> 田中太郎　</th>
													<td ><select>
															<option value=" ">  </option>
															<option value="6">6</option>
															<option value="7">7</option>
															<option value="8">8</option>
															<option value="9">9</option>
															<option value="10">10</option>
															<option value="11">11</option>
															<option value="12">12</option>
															<option value="13">13</option>
															<option value="14">14</option>
															<option value="15">15</option>
															<option value="16">16</option>
															<option value="17">17</option>
															<option value="18">18</option>
															<option value="19">19</option>
															<option value="20">20</option>
															<option value="21">21</option>
															<option value="22">22</option>
															<option value="23">23</option>
														</select>
														時
														<select>
															<option value="">  </option>
															<option value="0">0</option>
															<option value="15">15</option>
															<option value="30">30</option>
															<option value="45">45</option>
														</select>
														分から<br>
														<select>
															<option value="">  </option>
															<option value="6">6</option>
															<option value="7">7</option>
															<option value="8">8</option>
															<option value="9">9</option>
															<option value="10">10</option>
															<option value="11">11</option>
															<option value="12">12</option>
															<option value="13">13</option>
															<option value="14">14</option>
															<option value="15">15</option>
															<option value="16">16</option>
															<option value="17">17</option>
															<option value="18">18</option>
															<option value="19">19</option>
															<option value="20">20</option>
															<option value="21">21</option>
															<option value="22">22</option>
															<option value="23">23</option>
														</select>
														時
														<select>
															<option value="">  </option>
															<option value="0">0</option>
															<option value="15">15</option>
															<option value="30">30</option>
															<option value="45">45</option>
														</select>
														分まで<button class="btn btn-xs btn-danger">休み</button>
														
													</td>

													<td ><select>
															<option value=" ">  </option>
															<option value="6">6</option>
															<option value="7">7</option>
															<option value="8">8</option>
															<option value="9">9</option>
															<option value="10">10</option>
															<option value="11">11</option>
															<option value="12">12</option>
															<option value="13">13</option>
															<option value="14">14</option>
															<option value="15">15</option>
															<option value="16">16</option>
															<option value="17">17</option>
															<option value="18">18</option>
															<option value="19">19</option>
															<option value="20">20</option>
															<option value="21">21</option>
															<option value="22">22</option>
															<option value="23">23</option>
														</select>
														時
														<select>
															<option value="">  </option>
															<option value="0">0</option>
															<option value="15">15</option>
															<option value="30">30</option>
															<option value="45">45</option>
														</select>
														分から<br>
														<select>
															<option value="">  </option>
															<option value="6">6</option>
															<option value="7">7</option>
															<option value="8">8</option>
															<option value="9">9</option>
															<option value="10">10</option>
															<option value="11">11</option>
															<option value="12">12</option>
															<option value="13">13</option>
															<option value="14">14</option>
															<option value="15">15</option>
															<option value="16">16</option>
															<option value="17">17</option>
															<option value="18">18</option>
															<option value="19">19</option>
															<option value="20">20</option>
															<option value="21">21</option>
															<option value="22">22</option>
															<option value="23">23</option>
														</select>
														時
														<select>
															<option value="">  </option>
															<option value="0">0</option>
															<option value="15">15</option>
															<option value="30">30</option>
															<option value="45">45</option>
														</select>
														分まで<button class="btn btn-xs btn-danger">休み</button>
														
													</td>
													<td ><select>
															<option value=" ">  </option>
															<option value="6">6</option>
															<option value="7">7</option>
															<option value="8">8</option>
															<option value="9">9</option>
															<option value="10">10</option>
															<option value="11">11</option>
															<option value="12">12</option>
															<option value="13">13</option>
															<option value="14">14</option>
															<option value="15">15</option>
															<option value="16">16</option>
															<option value="17">17</option>
															<option value="18">18</option>
															<option value="19">19</option>
															<option value="20">20</option>
															<option value="21">21</option>
															<option value="22">22</option>
															<option value="23">23</option>
														</select>
														時
														<select>
															<option value="">  </option>
															<option value="0">0</option>
															<option value="15">15</option>
															<option value="30">30</option>
															<option value="45">45</option>
														</select>
														分から<br>
														<select>
															<option value="">  </option>
															<option value="6">6</option>
															<option value="7">7</option>
															<option value="8">8</option>
															<option value="9">9</option>
															<option value="10">10</option>
															<option value="11">11</option>
															<option value="12">12</option>
															<option value="13">13</option>
															<option value="14">14</option>
															<option value="15">15</option>
															<option value="16">16</option>
															<option value="17">17</option>
															<option value="18">18</option>
															<option value="19">19</option>
															<option value="20">20</option>
															<option value="21">21</option>
															<option value="22">22</option>
															<option value="23">23</option>
														</select>
														時
														<select>
															<option value="">  </option>
															<option value="0">0</option>
															<option value="15">15</option>
															<option value="30">30</option>
															<option value="45">45</option>
														</select>
														分まで<button class="btn btn-xs btn-danger">休み</button>
														
													</td>													<td ><select>
															<option value=" ">  </option>
															<option value="6">6</option>
															<option value="7">7</option>
															<option value="8">8</option>
															<option value="9">9</option>
															<option value="10">10</option>
															<option value="11">11</option>
															<option value="12">12</option>
															<option value="13">13</option>
															<option value="14">14</option>
															<option value="15">15</option>
															<option value="16">16</option>
															<option value="17">17</option>
															<option value="18">18</option>
															<option value="19">19</option>
															<option value="20">20</option>
															<option value="21">21</option>
															<option value="22">22</option>
															<option value="23">23</option>
														</select>
														時
														<select>
															<option value="">  </option>
															<option value="0">0</option>
															<option value="15">15</option>
															<option value="30">30</option>
															<option value="45">45</option>
														</select>
														分から<br>
														<select>
															<option value="">  </option>
															<option value="6">6</option>
															<option value="7">7</option>
															<option value="8">8</option>
															<option value="9">9</option>
															<option value="10">10</option>
															<option value="11">11</option>
															<option value="12">12</option>
															<option value="13">13</option>
															<option value="14">14</option>
															<option value="15">15</option>
															<option value="16">16</option>
															<option value="17">17</option>
															<option value="18">18</option>
															<option value="19">19</option>
															<option value="20">20</option>
															<option value="21">21</option>
															<option value="22">22</option>
															<option value="23">23</option>
														</select>
														時
														<select>
															<option value="">  </option>
															<option value="0">0</option>
															<option value="15">15</option>
															<option value="30">30</option>
															<option value="45">45</option>
														</select>
														分まで<button class="btn btn-xs btn-danger">休み</button>
														
													</td>													<td ><select>
															<option value=" ">  </option>
															<option value="6">6</option>
															<option value="7">7</option>
															<option value="8">8</option>
															<option value="9">9</option>
															<option value="10">10</option>
															<option value="11">11</option>
															<option value="12">12</option>
															<option value="13">13</option>
															<option value="14">14</option>
															<option value="15">15</option>
															<option value="16">16</option>
															<option value="17">17</option>
															<option value="18">18</option>
															<option value="19">19</option>
															<option value="20">20</option>
															<option value="21">21</option>
															<option value="22">22</option>
															<option value="23">23</option>
														</select>
														時
														<select>
															<option value="">  </option>
															<option value="0">0</option>
															<option value="15">15</option>
															<option value="30">30</option>
															<option value="45">45</option>
														</select>
														分から<br>
														<select>
															<option value="">  </option>
															<option value="6">6</option>
															<option value="7">7</option>
															<option value="8">8</option>
															<option value="9">9</option>
															<option value="10">10</option>
															<option value="11">11</option>
															<option value="12">12</option>
															<option value="13">13</option>
															<option value="14">14</option>
															<option value="15">15</option>
															<option value="16">16</option>
															<option value="17">17</option>
															<option value="18">18</option>
															<option value="19">19</option>
															<option value="20">20</option>
															<option value="21">21</option>
															<option value="22">22</option>
															<option value="23">23</option>
														</select>
														時
														<select>
															<option value="">  </option>
															<option value="0">0</option>
															<option value="15">15</option>
															<option value="30">30</option>
															<option value="45">45</option>
														</select>
														分まで<button class="btn btn-xs btn-danger">休み</button>
														
													</td>
													<td ><select>
															<option value=" ">  </option>
															<option value="6">6</option>
															<option value="7">7</option>
															<option value="8">8</option>
															<option value="9">9</option>
															<option value="10">10</option>
															<option value="11">11</option>
															<option value="12">12</option>
															<option value="13">13</option>
															<option value="14">14</option>
															<option value="15">15</option>
															<option value="16">16</option>
															<option value="17">17</option>
															<option value="18">18</option>
															<option value="19">19</option>
															<option value="20">20</option>
															<option value="21">21</option>
															<option value="22">22</option>
															<option value="23">23</option>
														</select>
														時
														<select>
															<option value="">  </option>
															<option value="0">0</option>
															<option value="15">15</option>
															<option value="30">30</option>
															<option value="45">45</option>
														</select>
														分から<br>
														<select>
															<option value="">  </option>
															<option value="6">6</option>
															<option value="7">7</option>
															<option value="8">8</option>
															<option value="9">9</option>
															<option value="10">10</option>
															<option value="11">11</option>
															<option value="12">12</option>
															<option value="13">13</option>
															<option value="14">14</option>
															<option value="15">15</option>
															<option value="16">16</option>
															<option value="17">17</option>
															<option value="18">18</option>
															<option value="19">19</option>
															<option value="20">20</option>
															<option value="21">21</option>
															<option value="22">22</option>
															<option value="23">23</option>
														</select>
														時
														<select>
															<option value="">  </option>
															<option value="0">0</option>
															<option value="15">15</option>
															<option value="30">30</option>
															<option value="45">45</option>
														</select>
														分まで<button class="btn btn-xs btn-danger">休み</button>
														
													</td>
													<td ><select>
															<option value=" ">  </option>
															<option value="6">6</option>
															<option value="7">7</option>
															<option value="8">8</option>
															<option value="9">9</option>
															<option value="10">10</option>
															<option value="11">11</option>
															<option value="12">12</option>
															<option value="13">13</option>
															<option value="14">14</option>
															<option value="15">15</option>
															<option value="16">16</option>
															<option value="17">17</option>
															<option value="18">18</option>
															<option value="19">19</option>
															<option value="20">20</option>
															<option value="21">21</option>
															<option value="22">22</option>
															<option value="23">23</option>
														</select>
														時
														<select>
															<option value="">  </option>
															<option value="0">0</option>
															<option value="15">15</option>
															<option value="30">30</option>
															<option value="45">45</option>
														</select>
														分から<br>
														<select>
															<option value="">  </option>
															<option value="6">6</option>
															<option value="7">7</option>
															<option value="8">8</option>
															<option value="9">9</option>
															<option value="10">10</option>
															<option value="11">11</option>
															<option value="12">12</option>
															<option value="13">13</option>
															<option value="14">14</option>
															<option value="15">15</option>
															<option value="16">16</option>
															<option value="17">17</option>
															<option value="18">18</option>
															<option value="19">19</option>
															<option value="20">20</option>
															<option value="21">21</option>
															<option value="22">22</option>
															<option value="23">23</option>
														</select>
														時
														<select>
															<option value="">  </option>
															<option value="0">0</option>
															<option value="15">15</option>
															<option value="30">30</option>
															<option value="45">45</option>
														</select>
														分まで<button class="btn btn-xs btn-danger">休み</button>
														
													</td>

													
												</tr>
											</tbody>
										</table>

						<div align="right"><button class="btn btn-sm btn-danger">手動修正確定</button></div>
								

									</fieldset>
								</div>
							        </div>
							    </div>
@endsection

@section('footer')
    @@parent
    @endsection
