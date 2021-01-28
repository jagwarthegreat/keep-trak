@extends('layout.app')

@section('content')
@if(Session::has('success'))
	<div class='row' style="padding-bottom: 30px;margin: -30px;">
		<div class="col-12 mb-1" style="padding: 0px;">
			<div class="alert alert-primary">
				{{Session::get('success')}}
			</div>
		</div>
	</div>
@endif
<div class="col-12">
	<form action="{{route('loc.update', $loc_data->id)}}" method="post">
		<div class="row">
			<div class="form-group mr-1">
				<label>Location name edit:</label>
				<input type="text" id="loc-name-edit" name="loc-name-edit" class="form-control" value="{{$loc_data->name}}">
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