@extends('front.layout.template')

@section('title', 'Category ' . $category . ' - CraftForge')

@section('content')
    <!-- Page content-->
    <div class="container">
        <div class="mb-3" data-aos="slide-up">
            <form action="{{ route('search') }}" method="POST">
                @csrf
                <div class="input-group">
                    <input class="form-control" type="text" name="keyword" placeholder="Search articles..." />
                    <button class="btn btn-primary" id="button-search" type="submit">Submit</button>
                </div>
            </form>
        </div>

        <p>Showing Articles With Category : <b>{{ $category }}</b> </p>

        <div class="row">
            @forelse ($articles as $item)
                <div class="col-4" data-aos="slide-up">
                    <!-- Blog post-->
                    <div class="card mb-4 shadow-sm d-flex flex-column">
                        <a href="{{ url('p/' . $item->slug) }}"><img class="card-img-top post-img"
                                src="{{ asset('storage/back/' . $item->img) }}" alt="..." /></a>
                        <div class="card-body d-flex flex-column card-height">
                            <!-- Category section -->
                            <div class="small text-muted">
                                <div class="fw-bold">
                                    <a href="{{ url('category/' . $item->Category->slug) }}"
                                        class="category-link">{{ $item->Category->name }}</a>
                                </div>
                            </div>

                            <!-- Title and description -->
                            <a href="{{ url('p/' . $item->slug) }}" class="category-link">
                                <h2 class="card-title h4 mt-2">{{ $item->title }}</h2>
                                <p class="card-text">
                                    {{ Str::limit(strip_tags($item->desc), 150, '...') }}
                                </p>
                            </a>

                            <!-- User and date section at the bottom -->
                            <div class="d-flex align-items-center mt-auto" style="font-size: 1rem;">
                                <div class="d-flex mt-2">
                                    <div class="fw-bold">
                                        {{ $item->User ? $item->User->name : 'Unknown Author' }}
                                    </div>
                                    <div class="text-muted ms-2" style="opacity: 0.7;">
                                        {{ $item->created_at->format('d-m-Y') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <h3>Not Fund</h3>
            @endforelse
        </div>

        {{ $articles->links() }}

    </div>
@endsection
