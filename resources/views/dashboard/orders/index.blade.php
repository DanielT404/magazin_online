@extends('layouts.app')
@section('content')
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>
                        Nume client
                    </th>
                    <th>
                        Email
                    </th>
                    <th>
                        Adresa de livrare
                    </th>
                    <th>
                        Numar telefon
                    </th>
                    <th>
                        Produs
                    </th>
                    <th>
                        Cantitate
                    </th>
                    <th>
                        Pret total
                    </th>
                    <th>
                        Trimisa la data de
                    </th>
                    <th>
                        Status
                    </th>
                    <th>
                        Accepta / Respinge
                    </th>

                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{ $order->getClient->first_name }} {{ $order->getClient->last_name }}</td>
                    <td>{{ $order->getClient->email }}</td>
                    <td>{{ $order->getClient->delivery_address }}</td>
                    <td>{{ $order->getClient->telephone_number }}</td>
                    <td>{{ $order->getProduct->name }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ $order->quantity * $order->getProduct->price }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>{{ $order->approved == false ? 'Respins': 'Acceptat' }}</td>
                    <td>
                        @if($order->approved == false)
                            <a class="btn btn-success" href="accept/{{$order->id}} disabled">Accepta</a>
                        @else
                            -
                        @endif
                    </td>
                </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
@endsection