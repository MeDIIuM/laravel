@extends('layouts.layout')
@section('content')
    @if(count($clients) > 0)
        <div class="card">
            <div class="card-body">
                <table class="table table-striped clients-table">
                    <thead>
                    <th>
                        <h1>Клиент</h1>
                    </th>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Имя</td>
                        <td>Пол</td>
                        <td>Номер телефона</td>
                        <td>Адрес проживания</td>
                        <td>Количество машин</td>
                    </tr>
                    @foreach($clients as $client)
                        <tr>
                            <td class="table-text">
                                <div>{{$client->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$client->gender}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$client->phone}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$client->address}}</div>
                            </td>
                            <td class="table-text">
                                <div><a href="{{$client->id}}/cars">cars({{$client->cars}})</a></div>
                            </td>
                            <td>
                                <form action="{{url('/'.$client->id)}}" method="POST">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button class="btn btn-danger">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    {{ $clients->links() }}
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection