@extends('front.layout.template')

@section('title', $article->title . ' - CraftForge')

@section('content')
    <!-- Page content-->
    <div class="container">
        <div class="row">
            <div class="col-lg-8" data-aos="fade-up">
                <div class="card mb-4 shadow-sm">
                    <a href="{{ url('p/' . $article->slug) }}">
                        <img class="card-img-top card-height2 single-img" src="{{ asset('storage/back/' . $article->img) }}"
                            alt="{{ $article->title }}" />
                    </a>
                    <div class="card-body">
                        <div class="small text-muted">
                            <span class="ml-2">{{ $article->created_at->format('d-m-Y') }}</span>
                            <span class="ml-2">
                                <a
                                    href="{{ url('category/' . $article->Category->slug) }}">{{ $article->Category->name }}</a>
                            </span>
                            <span class="ml-2">{{ $article->views }}</span>x
                        </div>
                        <h1 class="card-title">{{ $article->title }}</h1>
                        <p class="card-text">
                            {!! $article->desc !!}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Side widgets-->
            @include('front.layout.side-widget')
        </div>
    </div>
@endsection
