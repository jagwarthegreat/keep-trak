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
	<div class="row">
		<div class="col">
			<form action="{{URL::to('/user/store')}}" method="post">
			
				<div class="form-group">
					<div class="form-group pb-1">
						<label>Fullname:</label>
						<input type="text" id="fullname" name="fullname" class="form-control" autocomplete="off">
					</div>
					<div class="form-group pb-1">
						<label>Age:</label>
						<input type="text" id="age" name="age" class="form-control" autocomplete="off">
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
					<h4 class="card-title">User List</h4>
					<p class="card-category">Here is a list of users in your system.</p>
				</div>
				<div class="card-body table-full-width table-responsive">
					<table class="table table-hover">
						<thead>
							<th>ID</th>
							<th>Fullname</th>
							<th>Age</th>
							<th>Action</th>
						</thead>
						<tbody>

							@foreach($items as $item)
								<tr>
									<td>{{$item->id}}</td>
									<td>{{$item->fname}}</td>
									<td>{{$item->age}}</td>
									<td>
										<!-- <a href="{{route('user.destroy', $item->id)}}" class="btn btn-xs btn-danger">remove</a>
										<a href="{{route('user.edit', $item->id)}}" class="btn btn-xs btn-success">Edit</a> -->

										<div class="dropdown">
											<button class="btn btn-secondary btn-sm btn-fill dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												option
											</button>
											<ul class="dropdown-menu  dropdown-menu-right" aria-labelledby="dropdownMenuButton">
												<li><a class="dropdown-item" href="{{route('user.destroy', $item->id)}}">Delete</a></li>
												<li><a class="dropdown-item" href="{{route('user.edit', $item->id)}}">Edit</a></li>
											</ul>
										</div>
									</td>
								</tr>
							@endforeach
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection