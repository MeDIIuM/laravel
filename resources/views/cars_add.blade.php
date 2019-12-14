@extends('layouts.layout')
@section('content')
    <div class="card-body">
        <form method="POST" action="/clients/{{$clientId}}/cars" class="form-horizontal">
            {{csrf_field()}}
            <div class="row">
                <h1>Машина:</h1>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <p>Марка</p>
                </div>
                <div class="col-sm-2">
                    <p>Цвет</p>
                </div>
                <div class="col-sm-2">
                    <p>Модель</p>
                </div>
                <div class="col-sm-2">
                    <p>Гос. номер</p>
                </div>
                <div class="col-sm-2">
                    <p>Стоянка</p>
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
                <div class="checkbox">
                    <input type="checkbox" name="station" id="cars_station" class="form-control">
                </div>
                <div class="col-sm-2" id="button">
                    <button type="submit" class="btn btn-success">
                        Add
                    </button>
                </div>
            </div>
        </form>
    </div>

@endsection