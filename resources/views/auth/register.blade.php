@extends('layout')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Register</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}" enctype="multipart/form-data">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group required">
		                     <label class="col-md-4 control-label" for="user_id" required>User ID</label>
							<div class="col-md-6">
		                     <input type="email" name="user_id" class="form-control" value="{{Input::old('user_id')}}" placeholder="name@email.com"/>
							</div>
		                </div>
		                <div class="form-group required">
		                     <label class="col-md-4 control-label" for="sponsor_id" required>Sponsor ID</label>
							<div class="col-md-6">
		                     <input type="email" name="sponsor_id" class="form-control" value="{{Input::old('sponsor_id')}}" placeholder="sponsor@email.com"/>
							</div>
		                </div>
		                <div class="form-group required">
		                     <label class="col-md-4 control-label" for="location" required>Location</label>
							<div class="col-md-6">
		                     <select name="location" class="form-control">
		                     	<option value="0">Left</option>
		                     	<option value="1"@if(Input::old('location')) selected @endif>Right</option>
		                     </select>
							</div>
		                </div>
		                    
		                    <div class="form-group">
		                     <label class="col-md-4 control-label" for="iexp4u_id" class="required">iexp4u.com ID</label>
							<div class="col-md-6">
		                     <input type="text" name="iexp4u_id" class="form-control" value="{{Input::old('iexp4u_id')}}"/>
							</div>
		                </div>
		                    <div class="form-group">
		                     <label class="col-md-4 control-label" for="first_name">First Name</label>
							<div class="col-md-6">
		                     <input type="text" name="first_name" class="form-control" value="{{Input::old('first_name')}}"/>
							</div>
		                </div>
		                    <div class="form-group">
		                     <label class="col-md-4 control-label" for="last_name">Last Name</label>
							<div class="col-md-6">
		                     <input type="text" name="last_name" class="form-control" value="{{Input::old('last_name')}}"/>
							</div>
		                </div>
		                    <div class="form-group">
		                     <label class="col-md-4 control-label" for="phone">Phone</label>
							<div class="col-md-6">
		                     <input type="tel" name="phone" class="form-control" value="{{Input::old('phone')}}"/>
							</div>
		                </div>
		                <div class="form-group">
		                     <label class="col-md-4 control-label" for="uploaded_id">Upload ID</label>
							<div class="col-md-6">
		                     <input type="file" name="uploaded_id" class="form-control" accept="image/*"/>
							</div>
		                </div>
		                    <div class="form-group">
		                     <label class="col-md-4 control-label" for="password">Password</label>
							<div class="col-md-6">
		                     <input type="password" name="password" class="form-control" value=""/>
							</div>
		                </div>
		                <div class="form-group">
							<label class="col-md-4 control-label">Confirm Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation">
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
