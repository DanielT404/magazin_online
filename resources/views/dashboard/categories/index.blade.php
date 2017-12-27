@extends('layouts.app')
@section('content')
    <div class="container">
        @if (session('deleted'))
            <div class="alert alert-success">
                Categoria a fost stearsa cu succes!
            </div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        Nume
                    </th>
                    <th>
                        Subcategorii
                    </th>
                    <th>
                        Creata la data de
                    </th>
                    <th>
                        Actiuni
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        @if(count($category->subcategories) > 0)
                            @foreach($category->subcategories as $subcategory)
                                <td>{{$subcategory->name}}</td>
                            @endforeach
                        @else
                            <td>Nu</td>
                        @endif
                        <td>{{$category->created_at}}</td>
                        <td>
                            <a class="btn btn-warning" href="{{route('category.add.subcategory.show', ['id' => $category->id])}}">Adauga subcategorie</a>
                            <a class="btn btn-info" href="{{route('category.edit.show', ['id' => $category->id])}}">Editeaza</a>
                            <a class="btn btn-danger" href="{{route('category.delete.show', ['id' => $category->id])}}"
                               onclick="
                               document.getElementById('delete-category-form').submit();
                            ">Sterge</a></td>
                        <form id="delete-category-form" action="{{route('category.delete.submit', ['id' => $category->id])}}" method="POST" style="display:none;">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-primary" style="display: none;">
                                Submit
                            </button>
                        </form>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection