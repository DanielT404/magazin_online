@extends('layouts.dashboard')
@section('content')
    <div class="container">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>
                    Nume
                </th>
                <th>
                    Descriere
                </th>
                <th>
                    Categorie
                </th>
                <th>
                    Moneda
                </th>
                <th>
                    Pret
                </th>
                <th>
                    Optiune culoare
                </th>
                <th>
                    Optiune marimi
                </th>
                <th>
                    Produs featured
                </th>
                <th>
                    Creat la data de
                </th>
                <th>
                    Actiuni
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->getCategory->name }}</td>
                    <td>{{ $product->currency }}</td>
                    <td>{{ $product->price }} {{$product->currency}}</td>
                    <td>{{ $product->color_option == 'Yes' ? 'Da': 'Nu' }}</td>
                    <td>{{ $product->length_option == 'Yes' ? 'Da': 'Nu' }}</td>
                    <td>{{ $product->featured ? 'Da' : 'Nu' }}</td>
                    <td>{{ $product->created_at }}</td>
                    <td>
                        <a class="btn btn-info" href="{{route('product.edit.show', ['id' => $product->id])}}">Editeaza</a>
                        <a class="btn btn-danger" href="#">Sterge</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection