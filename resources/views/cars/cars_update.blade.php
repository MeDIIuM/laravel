@extends('layouts.layout')
@section('content')
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="/clients/{{$clientId}}/cars/{{$car->id}}" class="form-horizontal">
            {{csrf_field()}}
            {{method_field('PUT')}}
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
                    <input type="text" name="brand" value="{{$car->brand}}" id="cars_brand" class="form-control">
                </div>
                <div class="col-sm-2">
                    <input type="text" name="colour" value="{{$car->colour}}" id="cars_colour" class="form-control">
                </div>
                <div class="col-sm-2">
                    <input type="text" name="model" value="{{$car->model}}" id="cars_model" class="form-control">
                </div>
                <div class="col-sm-2">
                    <input type="text" name="number" value="{{$car->number}}" id="cars_number" class="form-control">
                </div>
                <div class="checkbox">
                    <input type="checkbox" name="station" id="cars_station" class="form-control"
                           checked={{($car->station==true?"on":"off")}}>
                </div>
                <div class="col-sm-2" id="button">
                    <button type="submit" class="btn btn-success">
                        Update
                    </button>
                </div>
            </div>

        </form>
    </div>
@endsection