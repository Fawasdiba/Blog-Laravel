@extends('front.layout.template')

@section('title', 'CraftForge - Blog')

@section('content')
    <!-- Page content-->
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8" data-aos="zoom-in">
                <!-- Featured blog post-->
                <div class="card mb-4 shadow-sm" data-aos="fade-in">
                    <a href="{{ url('p/' . $latest_post->slug) }}">
                        <img class="card-img-top featured-img" src="{{ asset('storage/back/' . $latest_post->img) }}"
                            alt="..." />
                    </a>
                    <div class="card-body shadow-sm">
                        <div class="small">
                            <div class="fw-bold">
                                <a href="{{ url('category/' . $latest_post->Category->slug) }}"
                                    class="category-link">{{ $latest_post->Category->name }}</a>
                            </div>
                        </div>
                        <a href="{{ url('p/' . $latest_post->slug) }}" class="category-link">
                            <h2 class="card-title">{{ $latest_post->title }}</h2>
                            <p class="card-text">
                                {{ Str::limit(strip_tags($latest_post->desc), 150, '...') }}
                            </p>
                            <div class="d-flex align-items-center" style="font-size: 1rem;">
                                <div class="text-bold">
                                    {{ $latest_post->User->name }}
                                </div>
                                <div class="ms-3"style="opacity: 0.7;">
                                    {{ $latest_post->created_at->format('d-m-Y') }}
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- Nested row for non-featured blog posts-->
                <div class="row">
                    @foreach ($articles as $item)
                        <div class="col-lg-6" data-aos="fade-up">
                            <!-- Blog post-->
                            <div class="card mb-4 shadow-sm flex-column">
                                <a href="{{ url('p/' . $item->slug) }}"><img class="card-img-top post-img"
                                        src="{{ asset('storage/back/' . $item->img) }}" alt="..." /></a>
                                <div class="card-body card-height d-flex flex-column shadow-sm">
                                    <div class="small text-muted">
                                        <div class="fw-bold">
                                            <a href="{{ url('category/' . $latest_post->Category->slug) }}"
                                                class="category-link">{{ $latest_post->Category->name }}</a>
                                        </div>
                                    </div>
                                    <a href="{{ url('p/' . $latest_post->slug) }}" class="category-link mt-1">
                                        <h2 class="card-title">{{ $latest_post->title }}</h2>
                                        <p class="card-text">
                                            {{ Str::limit(strip_tags($latest_post->desc), 150, '...') }}
                                        </p>
                                        <div class="d-flex align-items-center" style="font-size: 1rem;">
                                            <div class="text-bold">
                                                {{ $latest_post->User->name }}
                                            </div>
                                            <div class="ms-3"style="opacity: 0.7;">
                                                {{ $latest_post->created_at->format('d-m-Y') }}
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="pagination justify-content-center my-4">
                    {{ $articles->links() }}
                </div>
            </div>

            <!-- Side widgets-->
            @include('front.layout.side-widget')
        </div>
    </div>
@endsection
