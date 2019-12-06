
@extends('layouts.layout')
@section('content')

    <div class="card-body">
        @include('errors.503')
        <form method="POST" action="/{{$clientId}}/cars" class="form-horizontal">
            {{csrf_field()}}
            <div class="row">
                <div class="form-group">
                    <label for="Cars" class="col-sm-3 control-label">Car</label>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <input type="text" name="brand" id="cars_brand" class="form-control">
                </div>
                <div class="col-sm-2">
                    <input type="text" name="colour" id="cars_colour" class="form-control">
                </div>
                <div class="col-sm-2">
                    <input type="text" name="model" id="cars_model" class="form-control">
                </div>
                <div class="col-sm-2">
                    <input type="text" name="number" id="cars_number" class="form-control">
                </div>
                <div>
                    <input type="checkbox" name="station" id="cars_station" class="form-control">
                </div>
                <div class="col-sm-2">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-plus"></i>
                        Add
                    </button>
                </div>
            </div>

        </form>
    </div>

@endsection