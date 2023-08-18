@extends('layouts.main')

@section('container')

{{-- Navbar Category --}}
<ul class="nav">
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="/sports">SPORTS</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/category/football">Football</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/category/basketball">Basketball</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/category/moto-gp">Moto GP</a>
    </li>
</ul>


{{-- List Berita --}}
@foreach ($sports as $sport)
<article class="mb-3">
    <h2><a href="/sports/{{ $sport->slug }}">{{ $sport->title }}</a></h2>
    <p>By. <a href="/authors/{{ $sport->user->username }}">{{ $sport->user->name }}</a> in <a href="/category/{{ $sport->category->slug }}">{{ $sport->category->name }}</a></p>
    <p>{{ $sport->excerpt }}</p>
</article>
@endforeach


@endsection
