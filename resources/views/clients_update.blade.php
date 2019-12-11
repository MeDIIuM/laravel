@extends('layouts.layout')
@section('content')
    <div class="card-body">
        <form action="{{url('/clients')}}" method="POST" class="form-horizontal">
            {{csrf_field()}}
            {{method_field('PUT')}}
            <div class="row">
                <div class="form-group">
                    <label for="Clients" class="col-sm-3 control-label"></label>
                    <h1>Клиент:</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <p>Имя</p>
                </div>
                <div class="col-sm-2">
                    <p>Пол</p>
                </div>
                <div class="col-sm-2">
                    <p>Номер телефона</p>
                </div>
                <div class="col-sm-2">
                    <p>Адрес проживания</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <input type="text" name="name"  value="{{$client->name}}" id="clients_name" class="form-control">
                </div>
                <div class="col-sm-2">
                    <input type="text" name="gender" id="clients_gender" value="{{$client->gender}}" class="form-control">
                </div>
                <div class="col-sm-2">
                    <input type="text" name="phone" value="{{$client->phone}}" id="clients_phone" class="form-control">
                </div>
                <div class="col-sm-2">
                    <input type="text" name="address" value="{{$client->address}}" id="clients_address" class="form-control">
                </div>
                <div class="col-sm-2">
                    <button type="submit" class="btn btn-success">
                        Update
                    </button>
                </div>
            </div>
        </form>
    </div>

@endsection