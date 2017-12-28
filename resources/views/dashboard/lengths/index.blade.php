@extends('layouts.app')
@section('content')
    <h2 class="text-center">Marimi adaugate in baza de date</h2>
    <div class="container">
        @if (session('deleted'))
            <div class="alert alert-success">
                Marimea a fost stearsa cu succes!
            </div>
        @endif
        <table class="table table-striped">
            <thead>
            <tr>
                <th>
                    Marime
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
            @foreach($lengths as $length)
                <tr>
                    <td>{{$length->length}}</td>
                    <td>{{$length->created_at}}</td>
                    <td>
                        <a class="btn btn-danger" href="{{route('length.delete.show', ['id' => $length->id])}}" onclick="
                           document.getElementById('delete-length').submit();">Sterge</a>
                    </td>
                    <form id="delete-length" action="{{route('length.delete.submit', ['id' => $length->id])}}" method="POST" style="display:none;">
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
            <a href="{{route('length.add.show')}}" class="btn btn-success">Adauga marime</a>
        </div>
    </div>
@endsection