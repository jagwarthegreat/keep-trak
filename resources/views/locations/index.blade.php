@extends('layout.app')

@section('content')
@if(Session::has('location'))
<div class='row' style="padding-bottom: 30px;margin: -30px;">
	<div class="col-12 mb-1" style="padding: 0px;">
		<div class="alert alert-secondary" style="color: #505050;">
			{{Session::get('location')}}
		</div>
	</div>
</div>
@endif

@if ($errors->any())
<div class='row' style="padding-bottom: 30px;margin: -30px;">
	<div class="col-12 mb-1" style="padding: 0px;">
		<div class="alert alert-danger" style="color: #fff;">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	</div>
</div>
@endif

<div class="row">
	<div class="col">
		<form action="{{route('loc.store')}}" method="post">

			<div class="form-group">
				<div class="form-group pb-1">
					<label>Location name:</label>
					<input type="text" id="loc_name" name="loc_name" class="form-control" autocomplete="off">
				</div>
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-info btn-sm btn-fill pull-right">Create Profile</button>
			</div>

			@csrf
		</form>
	</div>

	<div class="col-md-9">
		<div class="card card-plain table-plain-bg">
			<div class="card-header ">
				<h4 class="card-title">Location List</h4>
				<p class="card-category">Here is a list of locations in your system.</p>
			</div>
			<div class="card-body table-full-width table-responsive">
				<table class="table table-hover">
					<thead>
						<th></th>
						<th>NAME</th>
						<th>ACTION</th>
					</thead>
					<tbody>

						@foreach($loc_data as $locList)
						<tr>
							<td>{{$loop->iteration + $loc_data->firstItem() - 1}}</td>
							<td>{{$locList->name}}</td>
							<td>
								<div class="dropdown">
									<button class="btn btn-secondary btn-xs btn-fill dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										option
									</button>
									<ul class="dropdown-menu  dropdown-menu-right" aria-labelledby="dropdownMenuButton">
										<li><a class="dropdown-item" href="{{route('loc.edit', $locList->id)}}">Edit</a></li>
										<li><a class="dropdown-item" href="{{route('loc.destroy', $locList->id)}}">Delete</a></li>
									</ul>
								</div>
							</td>
						</tr>
						@endforeach

					</tbody>
				</table>
				<div class="d-flex justify-content-center">
					{{ $loc_data->links() }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection