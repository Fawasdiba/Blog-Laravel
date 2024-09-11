@extends('front.layout.template')

@section('title', 'CraftForge - All Category')

@section('content')
            <!-- Page content-->
            <div class="container">

                    <p>Showing All Articles With Category : </p>

                <div class="row">
                    @foreach ($category as $item)
                        <div class="col-lg-4 mb-3">
                            <div class="card">
                                <div class="card-body shadow">
                                    <div class="text-center mt-2">
                                        <h5 class="card-title">
                                            <a href="{{ url('category/'.$item->slug) }}" class="category-link">
                                                {{ $item->name }}
                                            </a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- {{ $articles->links() }} --}} 

            </div>    
@endsection
