{{-- <<<----- MAIN LAYOUTS ----->>> --}}
@extends('layouts.main')


@section('container')

{{-- <<<----- JUMBO ADVERTISMENT ----->>> --}}
<div class="container">
  <img class="mx-auto d-block mb-4" src="img/iklan_1.png" alt="iklan1" width="800">
</div>
{{-- <<<----- END JUMBO ADVERTISMENT ----->>> --}}

{{-- <<<----- NAVBAR CATEGORY ----->>> --}}
<div class="row">

  {{-- <<<--- Category --->>> --}}
  <div class="col-md-8">
    <ul class="navbar-category nav mb-3">
      <li class="nav-item"><a  class="category-link nav-link fs-4" href="/sports">SPORTS</a></li>
      @foreach($categories as $category)
      <li class="nav-item"><a class="category-link nav-link my-2" href="/sports?category={{ $category->slug }}">{{ $category->name }}</a></li>
      @endforeach
    </ul>
  </div>

  {{-- <<<--- Search --->>> --}}
  <div class="col-md mt-2">
    <form action="/sports">
      @if (request('category'))
      <input type="hidden" name="category" value="{{ request('category') }}">
      @endif
      @if (request('author'))
      <input type="hidden" name="author" value="{{ request('author') }}">
      @endif
      <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="serach..." name="search" value="{{ request('search') }}">
          <button class="btn btn-outline-dark" type="submit">Search</button>
      </div>
    </form>
  </div>
</div>
{{-- <<<--- END NAVBAR CATEGORY --->>> --}}

{{-- <<<--- HEAD NEWS --->>> --}}
<div class="container">
  <div class="row mb-4">
    @if($sports->count())
    <div class="col-md-8 border p-3">    
      {{-- <<<--- Head News 1st --->>> --}}
      <div class="head-news-1 row mb-3 d-flex">
        {{-- Title, Author, Category & Excerpt --}}
        <div class="head-news col-md-6">
          <h4><a class="head-title" href="/sports/{{ $sports[0]->slug }}">{{ $sports[0]->title }}</a></h4>
          <p class="head-author">By. <a class="author" href="/sports?author={{ $sports[0]->author->username }}">{{ $sports[0]->author->name }}</a> in <a class="category" href="/sports?category={{ $sports[0]->category->slug }}">{{ $sports[0]->category->name }}</a> {{ $sports[0]->created_at->diffForHumans() }}</p> 
          <p class="head-excerpt">{{ $sports[0]->excerpt }}.</p>
        </div>
          {{-- Image Jumbo --}}
          @if ($sports[0]->image)
          <img class="img-jumbo" src="{{ asset('storage/' . $sports[0]->image) }}" alt="{{ $sports[0]->category->name }}">
          @else
          <img class="img-jumbo" src="https://source.unsplash.com/300x200/?{{ $sports[0]->category->name }}" alt="">           
          @endif
      </div>
      <hr>
      {{-- <<<--- Head News 2nd & 3rd --->>> --}}
      <div class="head-news-2 row p-2 ">
        <div class="col-md-6 d-flex">
          {{-- Image Head News 2nd --}}
          @if ($sports[1]->image)
            <img class="float-right" style="max-height: 80px" src="{{ asset('storage/' . $sports[1]->image) }}" alt="{{ $sports[1]->category->name }}">   
          @else
            <img class="float-right" src="https://source.unsplash.com/300x200/?{{ $sports[1]->category->name }}" alt="{{ $sports[1]->category->name }}">                       
          @endif
          {{-- Title Head News 2nd --}}
          <h6><a class="head-news-2-title" href="/sports/{{ $sports[1]->slug }}">{{ $sports[1]->title }}</a></h6>
        </div>
        <div class="col-md-6 d-flex">
          {{-- Image Head News 3rd --}}
          @if ($sports[2]->image)
            <img class="float-right"  style="max-height: 80px" src="{{ asset('storage/' . $sports[2]->image) }}" alt="{{ $sports[2]->category->name }}">   
          @else
            <img class="float-right" src="https://source.unsplash.com/300x200/?{{ $sports[2]->category->name }}" alt="{{ $sports[2]->category->name }}">                       
          @endif
          {{-- Title Head News 3rd --}}
          <h6><a class="head-news-2-title" href="/sports/{{ $sports[2]->slug }}">{{ $sports[2]->title }}</a></h6>
        </div>
      </div>      
    </div>
{{-- <<<--- END HEAD NEWS --->>> --}}

    
{{-- <<<--- ADVERTISMENT --->>> --}}
    <div class="col p-3">
      <div class="mx-auto">
        <img class="mx-auto d-block" style="max-height: 350px" src="img/iklan2.jpg" alt="">
      </div>
    </div>
    @else
        <p class="text-center fs-4">Page No Found</p>
    @endif
  </div>
</div>
{{-- <<<--- END ADVERTISMENT --->>> --}}


<div class="row">
  <div class="col-md-8">
{{-- <<<--- NEWEST--->>> --}}
    <div class="col-2 newest">
      <h3 class="newest-title">NEWEST</h3>
    </div>
    {{-- Newest List --}}
    @foreach ($sports->skip(3) as $sport)
    <div class="newest-list d-flex">
      {{-- Image Newest --}}
      <div class="img-newest col-md-2 d-flex">
        @if ($sport->image)
        <img class="img-mini" src="{{ asset('storage/' . $sport->image) }}" alt="{{ $sport->category->name }}">
        @else
        <img class="img-mini" src="https://source.unsplash.com/210x120/?{{ $sport->category->name }}" alt="{{ $sport->category->name }}">
        @endif
      </div>
      {{-- Text Newest --}}
      <div class="newest-text">
        <h5><a class="news-title" href="/sports/{{ $sport->slug }}">{{ $sport->title }}</a></h5>
        <p class="newest-author">By. <a class="author" href="/sports?author={{ $sport->author->username }}">{{ $sport->author->name }}</a> in <a class="category" href="/sports?category={{ $sport->category->slug }}">{{ $sport->category->name }}</a> {{ $sport->created_at->diffForHumans() }}</p> 
        <p class="newest-excerpt">{{ $sport->excerpt }}</p>
      </div>
    </div>
    @endforeach
    <div class="d-flex justify-content-end">
      {{ $sports->links() }}
    </div>

    {{-- EDUSPORTS --}}
    <div class="col">
      <div class="edusports">
        <div class="header">
          <h3 class="title">EDUSPORTS</h3>
          <h3 class="see-more"><a href="/sports/edusports">SEE MORE</a></h3>
        </div>
        <div class="row list">
          <div class="col-sm-4 card-news">
            <img src="../img/iklan2.jpg" alt="">
            <h5 class="m-0"><a class="title-news" href="/sports/{{ $sport->slug }}">{{ $sport->title }}</a></h5>
            <p><a class="category" href="/sports?category={{ $sport->category->slug }}">{{ $sport->category->name }}</a></p>
          </div>
          <div class="col-sm-4 card-news">
            <img src="../img/iklan2.jpg" alt="">
            <h5 class="m-0"><a class="title-news" href="/sports/{{ $sport->slug }}">{{ $sport->title }}</a></h5>
            <p><a class="category" href="/sports?category={{ $sport->category->slug }}">{{ $sport->category->name }}</a></p>
          </div>
          <div class="col-sm-4 card-news">
            <img src="../img/iklan2.jpg" alt="">
            <h5 class="m-0"><a class="title-news" href="/sports/{{ $sport->slug }}">{{ $sport->title }}</a></h5>
            <p><a class="category" href="/sports?category={{ $sport->category->slug }}">{{ $sport->category->name }}</a></p>
          </div>
        </div>
      </div>
    </div>
    {{-- END EDUSPORTS --}}
    {{-- EDUSPORTS --}}
    <div class="col">
      <div class="photo">
        <div class="header">
          <h3 class="title">SPORT GALERY</h3>
          <h3 class="see-more"><a href="/sports/photo">SEE MORE</a></h3>
        </div>
        <div class="row list">
          <div class="col-sm-4 card-photo">
            <img src="../img/iklan2.jpg" alt="">
            <h5 class="m-0"><a class="title-photo" href="/sports/{{ $sport->slug }}">{{ $sport->title }}</a></h5>
          </div>
          <div class="col-sm-4 card-photo">
            <img src="../img/iklan2.jpg" alt="">
            <h5 class="m-0"><a class="title-photo" href="/sports/{{ $sport->slug }}">{{ $sport->title }}</a></h5>
          </div>
          <div class="col-sm-4 card-photo">
            <img src="../img/iklan2.jpg" alt="">
            <h5 class="m-0"><a class="title-photo" href="/sports/{{ $sport->slug }}">{{ $sport->title }}</a></h5>
          </div>
        </div>
      </div>
    </div>
    {{-- END EDUSPORTS --}}


  </div>

  {{-- POPULER --}}
  <div class="col-md">
    <div class="col-md border">
      <h3 class="px-2 mt-1">POPULER</h3>
      <hr class="mt-0">
      @foreach ($sports as $sport)
      <div class="d-flex mb-2 mx-2">
        <div>
          <h3>01</h3>
        </div>
        <div class="px-3">
          <h6 class="m-0"><a class="text-dark text-decoration-none" href="/sports/{{ $sport->slug }}">{{ $sport->title }}</a></h6>
          <p class="m-0"><a class="text-decoration-none" href="/sports?category={{ $sport->category->slug }}">{{ $sport->category->name }}</a></p>
        </div>
      </div>
      @endforeach
      
    </div>
    <div class="col p-3">
      <div class="mx-auto">
        <img class="mx-auto d-block" style="max-height: 350px" src="img/iklan3.jpg" alt="">
      </div>
    </div>
  </div>

</div>


@endsection
