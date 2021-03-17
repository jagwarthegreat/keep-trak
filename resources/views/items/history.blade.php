@extends('layout.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="form-group">
            <a href="{{route('item')}}" class="btn btn-info btn-sm btn-fill"><i class="nc-icon nc-stre-left"></i> GO BACK</a>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card card-plain table-plain-bg">
            <div class="card-header ">
                <h4 class="card-title" style="font-weight: 400;">History of <b>{{ $item_history_data->name }}</b></h4>
                <p class="card-category">Here is the item history.</p>
            </div>
            <div class="card-body table-full-width table-responsive">
                <table class="table table-hover" id="item-history-table">
                    <thead>
                        <th></th>
                        <th>LOCATION</th>
                        <th>HANDED TO</th>
                        <th>STATUS</th>
                    </thead>
                    <tbody>


                        <tr>
                            <td>1</td>
                            <td>test name</td>
                            <td>test name</td>
                            <td>test name</td>
                        </tr>


                    </tbody>
                </table>

                <div class="d-flex justify-content-center">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection