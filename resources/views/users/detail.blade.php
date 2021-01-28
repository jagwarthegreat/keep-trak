@extends('layout.app')

@section('content')
	@if(Session::has('success-edit'))
		<div class='row' style="padding-bottom: 30px;margin: -30px;">
			<div class="col-12 mb-1" style="padding: 0px;">
				<div class="alert alert-primary">
					{{Session::get('success-edit')}}
				</div>
			</div>
		</div>
	@endif
	<div class="col-12">
		<form action="{{route('user.update', $user_data->id)}}" method="post">
			<div class="row">
				<div class="form-group mr-1">
					<label>Fullname</label>
					<input type="text" id="fullname-edit" name="fullname-edit" class="form-control" value="{{$user_data->fname}}">
				</div>

				<div class="form-group">
					<label>age</label>
					<input type="text" id="age-edit" name="age-edit" class="form-control" value="{{$user_data->age}}">
				</div>
			</div>
			<div class="row">
				<div class="form-group">
					<button type="submit" class="btn btn-info btn-fill pull-right">Update Profile</button>
				</div>
			</div>
			@csrf
		</form>
	</div>
@endsection