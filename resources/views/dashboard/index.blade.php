@extends('layouts.app')
@section('content')
    <div class="container">
        <p>Salut. Bine ai venit pe dashboard.</p>

        Pentru moment, ai putea sa...
        <ol>
            <li>
                vizualizezi imaginile din slider adaugate in baza de date <a href="{{route('slider_images')}}">aici</a>
            </li>
            <li>
                adaugi cateva imagini in slider-ul de pe pagina principala <a href="{{route('slider_image.add.show')}}">aici</a>
            </li>
            <strong>sau sa...</strong>
            <li>
                vizualizezi imaginile promotionale din dreapta slider-ului adaugate in baza de date <a href="{{route('side_slider_images')}}">aici</a>
            </li>
            <li>
                adaugi cateva imagini promotionale, afisate in dreapta slider-ului <a href="{{route('side_slider_image.add.show')}}">aici</a>
            </li>
        </ol>
    </div>
@endsection