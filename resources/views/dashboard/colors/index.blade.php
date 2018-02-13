@extends('layouts.dashboard')
@section('content')
    <h2 class="text-center">Culori adaugate in baza de date</h2>
    <div class="container">
        @if (session('deleted'))
            <div class="alert alert-success">
                Culoarea a fost stearsa cu succes!
            </div>
        @endif
        <table class="table table-striped">
            <thead>
            <tr>
                <th>
                    Nume
                </th>
                <th>
                    Adaugata la data de
                </th>
                <th>
                    Actiuni
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($colors as $color)
                <tr>
                   <td>{{$color->color}}</td>
                    <td>{{$color->created_at}}</td>
                    <td>
                        <a class="btn btn-danger" href="{{route('color.delete.show', ['id' => $color->id])}}" onclick="
                           document.getElementById('delete-color').submit();">Sterge</a>
                    </td>
                    <form id="delete-color" action="{{route('color.delete.submit', ['id' => $color->id])}}" method="POST" style="display:none;">
                        {{ csrf_field() }}
                        <button type="submit" name="submitted" class="btn btn-primary" style="display: none;">
                            Submit
                        </button>
                    </form>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="colors">
            <a href="{{route('color.add.show')}}" class="btn btn-success">Adauga culoare</a>
        </div>
    </div>
@endsection