{{-- LAYOUTS MAIN --}}
@extends('layouts.main')

@section('container')
{{-- Iklan Jumbo --}}
<div class="container">
    <img class="mx-auto d-block mb-4" src="../img/iklan_1.png" alt="iklan1" width="800">
</div>
  
<div class="container">
    <div class="row justify-content-center">
        {{-- LEFT SIDE --}}
        <div class="col-md-7">

            {{-- ARTIKEL --}}
            <article class="artikel mb-3">
                {{-- Title --}}
                {{-- Author-Date --}}
                <h2>{{ $sport->title }}</h2>
                <div class="icon-person">
                    @if ( $sport->author )
                        <img class="img-mini rounded-circle border" src="{{ asset('storage/' . $sport->author->image) }}" alt="" style="width: 50px; height:50px">
                    @else
                        <img class="rounded-circle border border-dark" src="../img/icon1.png" alt="" style="width:50px; height:50px;">
                    @endif
                    <div class="my-auto">
                        <p class="author">By <a class="author-link" href="/sports?author={{ $sport->author->username }}">{{ $sport->author->name }}</a>, BCT News</p> 
                        <p class="updated"><i class="bi bi-clock"></i>  Updated {{ $sport->created_at->diffForHumans() }}</p> 
                    </div>
                </div>
                {{-- Share to --}}
                <div class="share my-auto">
                    <p class="text-share my-auto">Share to  :</p>
                    <i class="bi bi-facebook"></i>
                    <i class="bi bi-whatsapp"></i>
                </div>
                {{-- Image Artikel --}}
                <div class="img img-fluid">
                    @if ($sport->image)
                        <img class="artikel-img" src="{{ asset('storage/' . $sport->image) }}" alt="{{ $sport->category->name }}">
                    @else                    
                        <img class="artikel-img" src="https://source.unsplash.com/500x200/?{{ $sport->category->name }}" alt="{{ $sport->category->name }}">
                    @endif
                </div>
                {{-- Body News --}}
                <div class="row">
                    <div class="body-news col-9">
                        <p>{!! $sport->body !!}</p>
                    </div>
                    <div class="col body-iklan">
                        <img class="img-iklan" src="../img/iklan_body.jpg" alt="iklan_body">
                    </div>
                </div>
            </article>
            {{-- END ARTIKEL --}}

            {{-- COMMENT --}}
            <div class="comment">
                <h6>KOMENTAR</h6>
                <form action="" method="post">
                    @csrf
                    <input type="hidden" name="sport_id" value="{{ $sport->id }}">
                    <textarea class="form-control" name="message" placeholder="Leave a comment here" id="" value="message" style="height: 80px"></textarea>                      
                    <input class="btn btn-sm btn-primary" style="margin-top: 5px;" type="submit" value="Comment">                             
                </form>
            </div>
            {{-- List Comment --}}
            @foreach ($sport->sportcomment as $comment)
            <div class="list-komentar">
                <img src="{{ asset('storage/' . $comment->user->image ) }}" alt="">
                <div class="isi-komentar">
                    <h6>{{ $comment->user->name }}</h6>
                    <p>{{ $comment->message }}</p>
                    <p>{{ $comment->created_at->diffForHumans() }}</p>
                </div>
            </div>
            @endforeach
            {{-- END COMMENT --}}
            <p><a class="back-sports my-10" href="/sports">Back to Sports</a>    
        </div>


        {{-- RIGHT SIDE --}}
        <div class="right-side col-md-3">
            {{-- Iklan 1 --}}
            <div class="adv-1">
                <img class="img-adv-1" src="../img/iklan2.jpg" alt="iklan2">
            </div>
            {{-- Newest --}}
            <div class="newest">
                <h5 class="title-newest">NEWEST</h5>
                @if($sports->count())
                <div class="newest-jumbo">             
                    @if ($sports[0]->image)
                    <img class="img-newest" src="{{ asset('storage/' . $sports[0]->image) }}" alt="{{ $sports[0]->category->name }}">
                    @else
                    <img class="img-newest" src="https://source.unsplash.com/350x200/?{{ $sports[0]->category->name }}" alt="">
                    @endif                           
                    <h6><a class="title-link" href="/sh6orts/{{ $sports[0]->slug }}">{{ $sports[0]->title }}</a></h6>
                    <p><a class="category-link" href="/sports?category={{ $sports[0]->category->slug }}">{{ $sports[0]->category->name }}</a> - {{ $sports[0]->created_at->diffForHumans() }}</p>
                </div>  
                <div class="newest-small">
                    @if ($sports[1]->image)
                    <img class="img-newest-small" src="{{ asset('storage/' . $sports[1]->image) }}" alt="{{ $sports[1]->category->name }}">   
                    @else
                    <img class="img-newest-small" src="https://source.unsplash.com/300x200/?{{ $sports[1]->category->name }}" alt="{{ $sports[1]->category->name }}">                       
                    @endif
                    <div class="text-newest-small">
                        <h6><a class="title-link" href="/sports/{{ $sports[1]->slug }}">{{ $sports[1]->title }}</a></h6>
                        <p><a class="category-link" href="/sports?category={{ $sports[1]->category->slug }}">{{ $sports[1]->category->name }}</a> - {{ $sports[1]->created_at->diffForHumans() }}</p>
                    </div>   
                </div>
                <div class="newest-small">
                    @if ($sports[2]->image)
                    <img class="img-newest-small" src="{{ asset('storage/' . $sports[2]->image) }}" alt="{{ $sports[2]->category->name }}">   
                    @else
                    <img class="img-newest-small" src="https://source.unsplash.com/300x200/?{{ $sports[2]->category->name }}" alt="{{ $sports[2]->category->name }}">                       
                    @endif
                    <div class="text-newest-small">
                        <h6><a class="title-link" href="/sports/{{ $sports[2]->slug }}">{{ $sports[2]->title }}</a></h6>
                        <p><a class="category-link" href="/sports?category={{ $sports[2]->category->slug }}">{{ $sports[2]->category->name }}</a> - {{ $sports[2]->created_at->diffForHumans() }}</p>
                    </div>   
                </div>
                <div class="newest-small">
                    @if ($sports[3]->image)
                    <img class="img-newest-small" src="{{ asset('storage/' . $sports[3]->image) }}" alt="{{ $sports[3]->category->name }}">   
                    @else
                    <img class="img-newest-small" src="https://source.unsplash.com/300x200/?{{ $sports[3]->category->name }}" alt="{{ $sports[3]->category->name }}">                       
                    @endif
                    <div class="text-newest-small">
                        <h6><a class="title-link" href="/sports/{{ $sports[3]->slug }}">{{ $sports[3]->title }}</a></h6>
                        <p><a class="category-link" href="/sports?category={{ $sports[3]->category->slug }}">{{ $sports[3]->category->name }}</a> - {{ $sports[3]->created_at->diffForHumans() }}</p>
                    </div>   
                </div>
                @endif
            </div>
            {{-- Category --}}
            <div class="category row">
                <h5 class="title-category">CATEGORY</h5>
                <div class="list-category">
                    @foreach($categories as $category)
                    <div class="item-category col-3">
                        @if ($category->image)
                            <img class="img-category" src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}">
                        @else                    
                            <img class="img-category" src="https://source.unsplash.com/500x200/?{{ $category->name }}" alt="{{ $category->name }}">
                        @endif
                        <p><a class="category-link" href="/sports?category={{ $category->slug }}">{{ $category->name }}</a></p>
                    </div>
                    @endforeach
                </div>

            </div>

        </div>
       
    </div>
</div>



@endsection


