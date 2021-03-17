@extends('layout.app')

@section('content')
<div class="row">
    <div class="col-8">
        <form action="{{route('loc.store')}}" method="post">

            <div class="form-group">
                <div class="form-group pb-1">

                    <h4 class="card-title">Transfer to location</h4>
                    <p class="card-category">Add item/s to the stash then transfer the stashed items at the right</p>

                    <input type="text" id="loc_name" name="loc_name" class="form-control" autocomplete="off">
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-info btn-sm btn-fill pull-right">Add Item to stash</button>
            </div>

            @csrf
        </form>

        <div class="card-body table-full-width table-responsive">
            <table class="table table-hover">
                <thead>
                    <th></th>
                    <th>NAME</th>
                    <th>ACTION</th>
                </thead>
                <tbody>


                    <tr>
                        <td>1</td>
                        <td>names</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary btn-xs btn-fill dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    option
                                </button>
                                <ul class="dropdown-menu  dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                    <li><a class="dropdown-item" href="{{route('transfer.edit', 1)}}">Edit</a></li>
                                    <li><a class="dropdown-item" href="{{route('transfer.destroy', 1)}}">Delete</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>
            <div class="d-flex justify-content-center">

            </div>
        </div>
    </div>

    <div class="col-4">
        <form action="{{route('loc.store')}}" method="post">
            <h4 class="card-title">Transfer Info</h4>
            <div class="form-group">
                <div class="form-group pb-1">
                    <label>To this location:</label>
                    <select class="form-control" name="item_loc" id="item_loc">
                        @foreach($loc_data as $locList)
                        <option value="{{$locList->id}}">{{$locList->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group pb-1">
                    <label>With this status:</label>
                    <select class="form-control" name="item_loc" id="item_loc">
                        @foreach($loc_data as $locList)
                        <option value="{{$locList->id}}">{{$locList->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group pb-1">
                    <label>Handed to:</label>
                    <select class="form-control" name="item_loc" id="item_loc">
                        @foreach($loc_data as $locList)
                        <option value="{{$locList->id}}">{{$locList->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-secondary btn-sm btn-fill pull-right">Transfer item/s</button>
            </div>

            @csrf
        </form>
    </div>
</div>
@endsection