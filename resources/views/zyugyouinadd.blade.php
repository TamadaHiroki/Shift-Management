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
			  					<form action="">
									<fieldset>
										<div class="form-group">
											<div class="form-group">
											<label>名前</label>
											<input class="form-control" placeholder="氏名" type="text">
										</div>
										<div class="form-group">
											<label>Eメール</label>
											<input type="email" class="form-control" id="exampleInputEmail2" placeholder="email">
										</div>
										<div class="form-group">
											<label>電話番号</label>
											<input class="form-control" placeholder="電話番号" type="text">
										</div>
										<div class="form-group">
											<label>ポジション</label>
											<select>
												<option value="a">レジ</option>
												<option value="a">惣菜</option>
												<option value="a">鮮魚</option>
												<option value="a">商品補充</option>
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
													<th>日曜日<th> 
												 </tr>
											</thead>
											<tbody>
												<tr style="background-color:#CCFFFF">
												        <td>
														<select>
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
															<option value="0">0</option>
															<option value="15">15</option>
															<option value="30">30</option>
															<option value="45">45</option>
														</select>
														分から
													</td>
													<td>
														<select>
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
															<option value="0">0</option>
															<option value="15">15</option>
															<option value="30">30</option>
															<option value="45">45</option>
														</select>
														分から
													</td>
													<td>
														<select>
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
															<option value="0">0</option>
															<option value="15">15</option>
															<option value="30">30</option>
															<option value="45">45</option>
														</select>
														分から
													</td>
													<td>
														<select>
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
															<option value="0">0</option>
															<option value="15">15</option>
															<option value="30">30</option>
															<option value="45">45</option>
														</select>
														分から
													</td>
													<td>
														<select>
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
															<option value="0">0</option>
															<option value="15">15</option>
															<option value="30">30</option>
															<option value="45">45</option>
														</select>
														分から
													</td>
													<td>
														<select>
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
															<option value="0">0</option>
															<option value="15">15</option>
															<option value="30">30</option>
															<option value="45">45</option>
														</select>
														分から
													</td>
													<td>
														<select>
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
															<option value="0">0</option>
															<option value="15">15</option>
															<option value="30">30</option>
															<option value="45">45</option>
														</select>
														分から
													</td>
													

												</tr>

												<tr>
												       <td>
														<select>
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
															<option value="0">0</option>
															<option value="15">15</option>
															<option value="30">30</option>
															<option value="45">45</option>
														</select>
														分まで
													</td>
													<td>
														<select>
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
															<option value="0">0</option>
															<option value="15">15</option>
															<option value="30">30</option>
															<option value="45">45</option>
														</select>
														分まで
													</td>
													<td>
														<select>
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
															<option value="0">0</option>
															<option value="15">15</option>
															<option value="30">30</option>
															<option value="45">45</option>
														</select>
														分まで
													</td>
													<td>
														<select>
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
															<option value="0">0</option>
															<option value="15">15</option>
															<option value="30">30</option>
															<option value="45">45</option>
														</select>
														分まで
													</td>
													<td>
														<select>
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
															<option value="0">0</option>
															<option value="15">15</option>
															<option value="30">30</option>
															<option value="45">45</option>
														</select>
														分まで
													</td>
													<td>
														<select>
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
															<option value="0">0</option>
															<option value="15">15</option>
															<option value="30">30</option>
															<option value="45">45</option>
														</select>
														分まで
													</td>
													<td>
														<select>
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
															<option value="0">0</option>
															<option value="15">15</option>
															<option value="30">30</option>
															<option value="45">45</option>
														</select>
														分まで
													</td>
												</tr>
												<tr style="background-color:#dcdcdc">
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
												</tr>

												<tr style="background-color:#CCFFFF">
												        <td>
														<select>
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
															<option value="0">0</option>
															<option value="15">15</option>
															<option value="30">30</option>
															<option value="45">45</option>
														</select>
														分から
													</td>
													<td>
														<select>
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
															<option value="0">0</option>
															<option value="15">15</option>
															<option value="30">30</option>
															<option value="45">45</option>
														</select>
														分から
													</td>
													<td>
														<select>
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
															<option value="0">0</option>
															<option value="15">15</option>
															<option value="30">30</option>
															<option value="45">45</option>
														</select>
														分から
													</td>
													<td>
														<select>
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
															<option value="0">0</option>
															<option value="15">15</option>
															<option value="30">30</option>
															<option value="45">45</option>
														</select>
														分から
													</td>
													<td>
														<select>
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
															<option value="0">0</option>
															<option value="15">15</option>
															<option value="30">30</option>
															<option value="45">45</option>
														</select>
														分から
													</td>
													<td>
														<select>
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
															<option value="0">0</option>
															<option value="15">15</option>
															<option value="30">30</option>
															<option value="45">45</option>
														</select>
														分から
													</td>
													<td>
														<select>
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
															<option value="0">0</option>
															<option value="15">15</option>
															<option value="30">30</option>
															<option value="45">45</option>
														</select>
														分から
													</td>
													

												</tr>

												<tr>
												       <td>
														<select>
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
															<option value="0">0</option>
															<option value="15">15</option>
															<option value="30">30</option>
															<option value="45">45</option>
														</select>
														分まで
													</td>
													<td>
														<select>
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
															<option value="0">0</option>
															<option value="15">15</option>
															<option value="30">30</option>
															<option value="45">45</option>
														</select>
														分まで
													</td>
													<td>
														<select>
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
															<option value="0">0</option>
															<option value="15">15</option>
															<option value="30">30</option>
															<option value="45">45</option>
														</select>
														分まで
													</td>
													<td>
														<select>
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
															<option value="0">0</option>
															<option value="15">15</option>
															<option value="30">30</option>
															<option value="45">45</option>
														</select>
														分まで
													</td>
													<td>
														<select>
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
															<option value="0">0</option>
															<option value="15">15</option>
															<option value="30">30</option>
															<option value="45">45</option>
														</select>
														分まで
													</td>
													<td>
														<select>
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
															<option value="0">0</option>
															<option value="15">15</option>
															<option value="30">30</option>
															<option value="45">45</option>
														</select>
														分まで
													</td>
													<td>
														<select>
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
															<option value="0">0</option>
															<option value="15">15</option>
															<option value="30">30</option>
															<option value="45">45</option>
														</select>
														分まで
													</td>
													
												</tr>
											</tbody>
										</table>
										<div>※水色の欄＝始業可能時間　白色の欄＝最終就業時間</div>
										<div>※ひとつの曜日につき２つ時間帯を入力できます</div>
										 <button class="btn btn-success btn-lg">追加</button>
									</fieldset>
								</div>
							        </div>
							    </div>
@endsection

@section('footer')
    @@parent
    @endsection
