@extends('layouts.layout')
@section('content')
    <div class="card-body">
        <form action="{{url('/clients')}}" method="POST" class="form-horizontal">
            {{csrf_field()}}
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
                    <input type="text" name="name" value="{{ old('name') }}" id="clients_name" class="form-control">
                </div>
                <div class="col-sm-2">
                    <input type="text" name="gender" id="clients_gender" value="{{ old('gender') }}"
                           class="form-control">
                </div>
                <div class="col-sm-2">
                    <input type="text" name="phone" value="{{ old('phone') }}" id="clients_phone" class="form-control">
                </div>
                <div class="col-sm-2">
                    <input type="text" name="address" value="{{ old('address') }}" id="clients_address"
                           class="form-control">
                </div>
                <div class="col-sm-2">
                    <button type="submit" class="btn btn-success">
                        Add
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection