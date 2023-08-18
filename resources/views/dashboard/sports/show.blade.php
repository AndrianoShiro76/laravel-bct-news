@extends('dashboard.layouts.main')

@section('container')
<div class="row">
    <div class="col-md-8">
        <article class="mb-3">
            <h2 class="mb-3">{{ $sport->title }}</h2>
            <a href="/dashboard/sports" class="btn btn-success"><span data-feather="arrow-left"></span>  Back to Sports</a>
            <a href="/dashboard/sports/{{ $sport->slug }}/edit" class="btn btn-warning"><span data-feather="edit"></span>  Edit</a>
            <form action="/dashboard/sports/{{ $sport->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger border-0" onclick="return confirm('Are you sure delete?')"><span data-feather="x-circle"></span> Delete</button>
            </form>
            @if ($sport->image)
                <div style="max-height: 400px; overflow:hidden;">
                    <img src="{{ asset('storage/' . $sport->image) }}" alt="{{ $sport->category->name }}" class="img-fluid my-3 rounded ">                   
                </div>
            @else
                <img src="https://source.unsplash.com/1200x600/?{{ $sport->category->name }}" alt="{{ $sport->category->name }}" class="img-fluid my-3 rounded ">
            @endif
            <div class="artical">
                {!! $sport->body !!}
            </div>
        </article>
    

    </div>
</div>


@endsection