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
	<div class="col-12">
		<div class="form-group">
			<a href="{{route('item')}}" class="btn btn-info btn-sm btn-fill"><i class="nc-icon nc-stre-left"></i> GO BACK</a>
		</div>
	</div>
	<div class="col-12">
		<form action="{{route('item.update', $item_data->id)}}" method="post">

			<div class="form-group">
				<div class="form-group pb-1">
					<label>Item name:</label>
					<input type="text" id="edit_item_name" name="edit_item_name" class="form-control" autocomplete="off" value="{{$item_data->name}}">
				</div>
			</div>

			<div class="form-group">
				<div class="form-group pb-1">
					<label>Serial #:</label>
					<input type="text" id="edit_item_serial" name="edit_item_serial" class="form-control" autocomplete="off" value="{{$item_data->serial}}">
				</div>
			</div>

			<div class="form-group">
				<div class="form-group pb-1">
					<label>Category:</label>
					<select class="form-control" name="edit_item_category" id="edit_item_category">
						@foreach($cat_data as $catList)
						<option value="{{$catList->id}}" {{ $item_data->category_id == $catList->id ? 'selected' : '' }}>{{$catList->name}}</option>
						@endforeach
					</select>
				</div>
			</div>

			<div class="form-group">
				<div class="form-group pb-1">
					<label>Location:</label>
					<select class="form-control" name="edit_item_loc" id="edit_item_loc">
						@foreach($loc_data as $locList)
						<option value="{{$locList->id}}" {{ $item_data->location_id == $locList->id ? 'selected' : '' }}>{{$locList->name}}</option>
						@endforeach
					</select>
				</div>
			</div>

			<div class="form-group">
				<div class="form-group pb-1">
					<label>Description:</label>
					<textarea name="edit_item_description" id="edit_item_description" class="form-control" cols="30" rows="10" autocomplete="off" style="min-height: 100px;">{{$item_data->description}}</textarea>
				</div>
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-info btn-sm btn-fill pull-right">Update Changes</button>
			</div>

			@csrf
		</form>
	</div>
</div>
@endsection