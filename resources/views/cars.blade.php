@extends('layouts.layout')
@section('content')
    <div class="hello">
        <h1>Привет {{$client->name}}!</h1>
        <a href="cars/create">Добавить машинку</a>
    </div>
    @if(count($cars) > 0)
        <div class="card">
            <div class="card-body">
                <table class="table table-striped clients-table">
                    <thead>
                    <th>
                        <h1>Машина</h1>
                    </th>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Марка</td>
                        <td>Цвет</td>
                        <td>Модель</td>
                        <td>Гос. номер</td>
                        <td>Стоянка</td>
                        <td></td>
                        <td></td>
                    </tr>
                    @foreach($cars as $car)
                        <tr>
                            <td class="table-text">
                                <div>{{$car->brand}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$car->colour}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$car->model}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$car->number}}</div>
                            </td>
                            <td class="checkbox">
                                <div>{{$car->station}}</div>
                            </td>
                            <td>
                                <a class="btn btn-primary"
                                   href="{{url('/clients/'.$car->client_id.'/cars/'.$car->id.'/edit')}}">Edit</a>
                            </td>
                            <td>
                                <form action="{{url('/clients/'.$car->client_id.'/cars/'.$car->id)}}" method="POST">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button class="btn btn-danger">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection