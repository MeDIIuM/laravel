@extends('layouts.layout')
@section('content')
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
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection