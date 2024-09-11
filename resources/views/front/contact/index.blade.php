@extends('front.layout.template')

@section('title', 'CraftForge - Contact')

@section('content')
            <!-- Page content-->
            <div class="container">
                <div class="row">
                    <!-- Blog entries-->
                    <div class="col-lg-8" data-aos="zoom-in">
                        <!-- Featured blog post-->
                            <div class="card mb-4 shadow-sm">
                                <div class="text-center">
                                    <iframe 
                                    src="https://www.google.com/maps/embed?pb=!4v1721658620220!6m8!1m7!1sr8_o0C-WPTQo6Qh-3FcOnQ!2m2!1d-6.179392003787029!2d106.5992127680954!3f96.430305!4f0!5f0.7820865974627469" 
                                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                                    </iframe>
                                </div>

                                <div class="card-body mb-3">
                                    <div class="small text-muted">{{ date('d/m/Y') }}</div>
                                    <h2 class="card-title">Contact Laravel Blog</h2>
                                    <p class="card-text">
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Incidunt velit adipisci mollitia totam enim, eveniet est architecto nemo facere, dolore commodi. Porro, obcaecati dignissimos. Nam quisquam modi nisi fugiat sapiente!
                                        </p>
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci ea quia eius sapiente iusto optio voluptas, minus dolor corporis suscipit repellendus necessitatibus quibusdam, magni nostrum itaque, fugit ullam doloribus accusantium.
                                        </p>
                                        <p>
                                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Obcaecati at accusamus enim doloribus. Quasi beatae, porro exercitationem modi placeat cupiditate repudiandae reprehenderit magnam pariatur, velit, deleniti corporis non expedita. Voluptatem?
                                        </p>
                                    </p>
                                    <ul>
                                        <li><a href="https://www.youtube.com">Youtube</a></li>
                                        <li><a href="https://www.instagram.com">Instagram</a></li>
                                        <li><a href="https://www.facebook.com">Facebook</a></li>
                                    </ul>
                                </div>
                            </div>
                        <!-- Nested row for non-featured blog posts-->
                        
                    </div>

                    <!-- Side widgets-->
                    @include('front.layout.side-widget')
                </div>
            </div>    
@endsection
