@extends('front.layout.template')

@section('title', 'CraftForge - Article Blog')

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

        @if ($keyword)
            <p>Showing Articles with keyword: <b>{{ $keyword }}</b></p>
            <a href="{{ url('articles') }}" class="btn btn-secondary btn-sm mb-4">Reset</a>
        @endif

        <div class="row">
            @forelse ($articles as $item)
                <div class="col-lg-4 col-md-3 col-sm-12 mb-4" data-aos="slide-up">
                    <!-- Blog post-->
                    <div class="card h-100 shadow-sm d-flex flex-column card-height">
                        <a href="{{ url('p/' . $item->slug) }}">
                            <img class="card-img-top post-img" src="{{ asset('storage/back/' . $item->img) }}"
                                alt="{{ $item->title }}" />
                        </a>
                        <div class="card-body d-flex flex-column">
                            <!-- Kategori -->
                            <div class="small text-muted">
                                <div class="fw-bold">
                                    @if ($item->Category)
                                        <a href="{{ url('category/' . $item->Category->slug) }}"
                                            class="category-link">{{ $item->Category->name }}</a>
                                    @else
                                        <span>Uncategorized</span>
                                    @endif
                                </div>
                            </div>

                            <!-- Judul dan Deskripsi -->
                            <a href="{{ url('p/' . $item->slug) }}" class="category-link">
                                <h2 class="card-title mt-2">{{ $item->title }}</h2>
                                <p class="card-text">
                                    {{ Str::limit(strip_tags($item->desc), 100, '...') }}
                                </p>
                            </a>

                            <!-- Nama User dan Tanggal di Bagian Bawah -->
                            <div class="d-flex align-items-center mt-auto" style="font-size: 14px;">
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
                <h3 class="text-center">Not Found</h3>
            @endforelse
        </div>

        {{ $articles->links() }}

    </div>
@endsection
