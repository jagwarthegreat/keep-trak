@extends('layout.app')

@section('content')
@if(Session::has('item'))
<div class='row' style="padding-bottom: 30px;margin: -30px;">
	<div class="col-12 mb-1" style="padding: 0px;">
		<div class="alert alert-secondary" style="color: #505050;">
			{{Session::get('item')}}
		</div>
	</div>
</div>
@endif
<div class="row">
	<div class="col" style="height: calc(100%); overflow-y: auto;">
		<form action="{{route('item.store')}}" method="post">

			<div class="form-group">
				<div class="form-group pb-1">
					<label>Item name:</label>
					<input type="text" id="item_name" name="item_name" class="form-control" autocomplete="off">
				</div>
			</div>

			<div class="form-group">
				<div class="form-group pb-1">
					<label>Serial #:</label>
					<input type="text" id="item_serial" name="item_serial" class="form-control" autocomplete="off">
				</div>
			</div>

			<div class="form-group">
				<div class="form-group pb-1">
					<label>Category:</label>
					<select class="form-control" name="item_category" id="item_category">
						@foreach($cat_data as $catList)
						<option value="{{$catList->id}}">{{$catList->name}}</option>
						@endforeach
					</select>
				</div>
			</div>

			<div class="form-group">
				<div class="form-group pb-1">
					<label>Location:</label>
					<select class="form-control" name="item_loc" id="item_loc">
						@foreach($loc_data as $locList)
						<option value="{{$locList->id}}">{{$locList->name}}</option>
						@endforeach
					</select>
				</div>
			</div>

			<div class="form-group">
				<div class="form-group pb-1">
					<label>Description:</label>
					<textarea name="item_description" id="item_description" class="form-control" cols="30" rows="10" autocomplete="off" style="min-height: 100px;"></textarea>
				</div>
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-info btn-sm btn-fill pull-right">Save Changes</button>
			</div>

			@csrf
		</form>
	</div>

	<div class="col-md-9">
		<div class="card card-plain table-plain-bg">
			<div class="card-header ">
				<h4 class="card-title">Item List</h4>
				<p class="card-category">Here is a list of item in our system.</p>
			</div>
			<div class="card-body table-full-width table-responsive">
				<table class="table table-hover" id="item-table">
					<thead>
						<th>ID</th>
						<th>SERIAL</th>
						<th>NAME</th>
						<th>DESCRIPTION</th>
						<th>CATEGORY</th>
						<th>LOCATION</th>
						<th>ACTION</th>
					</thead>
					<tbody>

						@foreach($item_data as $itemList)
						<tr>
							<td>{{$itemList->id}}</td>
							<td>{{$itemList->serial}}</td>
							<td>{{$itemList->name}}</td>
							<td>{{$itemList->description}}</td>
							<td>{{$itemList->category->name}}</td>
							<td>{{$itemList->location->name}}</td>
							<td>
								<div class="dropdown">
									<button class="btn btn-secondary btn-xs btn-fill dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										option
									</button>
									<ul class="dropdown-menu  dropdown-menu-right" aria-labelledby="dropdownMenuButton">
										<li><a class="dropdown-item" href="{{route('item.destroy', $itemList->id)}}">Delete</a></li>
										<li><a class="dropdown-item" href="{{route('item.edit', $itemList->id)}}">Edit</a></li>
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