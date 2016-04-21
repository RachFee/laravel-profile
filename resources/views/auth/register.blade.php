@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
						<!--text field accepting city--> 
						<div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">City</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="city"  value="{{ old('city') }}">

                                @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
						<!--text field accepting twitter-->
						<div class="form-group{{ $errors->has('twitter') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Twitter</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="twitter"  value="{{ old('twitter') }}">

                                @if ($errors->has('twitter'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('twitter') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
						<!--text field accepting github-->
						<div class="form-group{{ $errors->has('github') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Github</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="github"  value="{{ old('github') }}">

                                @if ($errors->has('github'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('github') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
						<!--radio field acceting career role-->
						<div class="form-group{{ $errors->has('career_role') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Career Role</label>

                            <div class="col-md-6">
                                <input type="radio" name="career_role" id="developer" value="Developer" {{ old('career_role')=='Developer' ? 'checked="checked"' : '' }}><label for="developer">Developer</label></br>
                                <input type="radio" name="career_role" id="administrator" value="Administrator" {{ old('career_role')=="Administrator" ? 'checked="checked"' : "" }}><label for="administrator">Administrator</label></br>
                                <input type="radio" name="career_role" id="sales" value="Sales" {{ old('career_role')=="Sales" ? 'checked="checked"' : "" }}><label for="sales">Sales</label></br>  
                                <input type="radio" name="career_role" id="other" value="Other" {{ old('career_role')=="Other" ? 'checked="checked"' : "" }}><label for="other">Other</label></br>								
							 
							    @if ($errors->has('career_role'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('career_role') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Register
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
