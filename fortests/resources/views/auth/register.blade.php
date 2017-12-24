@extends('layouts.app')

@section('content')
<div class="container" id="menu">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
  <div class="form-group{{ $errors->has('login') ? ' has-error' : '' }}">
                            <label for="login" class="col-md-4 control-label">Username</label>

                            <div class="col-md-6">
                                <input id="login" type="text" class="form-control" name="login" value="{{ old('login') }}" required autofocus>

                                @if ($errors->has('login'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('login') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-4">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <label for="last_name" class="col-md-4 control-label">Last name</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required autofocus>

                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                            <label for="gender" class="col-md-6 control-label">Gender</label>

                            <div class="col-md-4">
                                <select class="form-control" name="gender"  id="gender">
                                    <option value="" disable selected HIDDEN>Change your gender</option>
                              <option value="female">Female</option>
<option value="male">Male</option>
</select> 
                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

<div class="form-group{{ $errors->has('dirthdate_day') ? ' has-error' : '' }}">
                            <label for="dirthdate_day" class="col-md-4 control-label">Day</label>

                            <div class="col-md-6">
                                <select class="form-control" name="dirthdate_day" value="{{ old('dirthdate_day') }}" required autofocus>
                                     <option value="" disable selected HIDDEN>Change your day born</option>
                                    <option value="1">1</option>
                                     <option value="2">2</option>
                                      <option value="3">3</option>
                                       <option value="4">4</option>
                                        <option value="5">5</option>
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
                                                               <option value="24">24</option>
                                                                  <option value="25">25</option>
                                                                     <option value="26">26</option>
                                                                        <option value="27">27</option>
                                                                           <option value="28">28</option>
                                                                              <option value="28">28</option>
                                                                                 <option value="29">29</option>

                                                                                    <option value="30">30</option>
<option value="31">31</option>

                                </select>
                                @if ($errors->has('dirthdate_day'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dirthdate_day') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

<div class="form-group{{ $errors->has('dirthdate_month') ? ' has-error' : '' }}">
                            <label for="dirthdate_month" class="col-md-4 control-label">Month</label>

                            <div class="col-md-6">
                                <select class="form-control" name="dirthdate_month" value="{{ old('dirthdate_month') }}" required autofocus>
                                     <option value="" disable selected HIDDEN>Your Monthborn</option>
                                    <option value="Январь">Январь</option>
                                     <option value="Февраль">Февраль</option>
                                      <option value="Март">Март</option>
                                       <option value="Апрель">Апрель</option>
                                        <option value="Май">Май</option>
                                         <option value="Июнь">Июнь</option>
                                          <option value="Июль">Июль</option>
                                           <option value="Август">Август</option>
                                            <option value="Сентябрь">Сентябрь</option>
                                             <option value="Октябрь">Октябрь</option>
                                              <option value="Ноябрь">Ноябрь</option>
                                               <option value="Декабрь">Декабрь</option>

                                </select>
                                @if ($errors->has('dirthdate_month'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dirthdate_month') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

<div class="form-group{{ $errors->has('dirthdate_year') ? ' has-error' : '' }}">
                            <label for="dirthdate_year" class="col-md-4 control-label">Year</label>

                            <div class="col-md-6">
                                <select class="form-control" name="dirthdate_year" value="{{ old('dirthdate_year') }}" required autofocus>
                                     <option value="" disable selected HIDDEN>Your year</option>
                                    <option value="2018">2018</option>
                                     <option value="2017">2017</option>
                                      <option value="2016">2016</option>
                                       <option value="2015">2015</option>
                                        <option value="2014">2014</option>
                                         <option value="2013">2013</option>
                                          <option value="2012">2012</option>
                                           <option value="2011">2011</option>
                                            <option value="2010">2010</option>
                                             <option value="2009">2009</option>
                                              <option value="2008">2008</option>
                                               <option value="2007">2007</option>
                                               <option value="2006">2006</option>
                                               <option value="2005">2005</option>
                                               <option value="2004">2004</option>
                                               <option value="2003">2003</option>
                                               <option value="2002">2002</option>
                                               <option value="2001">2001</option>
                                               <option value="2000">2000</option>
                                               <option value="1999">1999</option>
                                               <option value="1998">1998</option>
                                               <option value="1997">1997</option>
                                               <option value="1996">1996</option>
                                               <option value="1995">1995</option>
                                               <option value="1994">1994</option>
                                               <option value="1993">1993</option>
                                               <option value="1992">1992</option>
                                               <option value="1991">1991</option>
                                               <option value="1990">1990</option>

                                </select>
                                @if ($errors->has('dirthdate_year'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dirthdate_year') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                           

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
