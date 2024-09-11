@extends('front.layout.template')

@section('title', 'CraftForge - About')

@section('content')
            <!-- Page content-->
            <div class="container">
                <div class="row">
                    <!-- Blog entries-->
                    <div class="col-lg-8" data-aos="zoom-in">
                        <!-- Featured blog post-->
                            <div class="card mb-4 shadow-sm">
                                <a href="{{ asset('front/img/logo CraftForge.jpeg') }}">
                                    <img class="card-img-top featured-img" src="{{ asset('front/img/logo CraftForge.jpeg') }}" alt="About About CraftForge" />
                                </a>

                                <div class="card-body">
                                    <div class="small text-muted">{{ date('d/m/Y') }}</div>
                                    <h2 class="card-title">About CraftForge</h2>
                                    <div style="text-align: justify">
                                        <p class="card-text">
                                            CraftForge adalah platform inovatif yang dirancang untuk para kreator dan penulis yang ingin membangun dan membagikan karya mereka dengan dunia. Nama CraftForge mencerminkan dua konsep inti yang mendasari visi kami:
                                        </p>
                                        <ul>
                                            <li><p><b>Craft:</b> Kami percaya bahwa setiap karya adalah hasil dari keterampilan, keahlian, dan dedikasi. CraftForge mendukung proses kreatif, memungkinkan Anda untuk menyusun konten dengan detail yang sempurna dan orisinalitas yang memukau. Baik itu artikel, blog, atau bentuk konten lainnya, kami ada untuk membantu Anda mengasah keterampilan dan mengekspresikan kreativitas Anda.</p></li>
                                            <li><p><b>Forge:</b> Seperti pandai besi yang menempa logam menjadi bentuk yang indah, CraftForge menyediakan alat dan sumber daya untuk membentuk ide-ide Anda menjadi realitas. Ini adalah tempat di mana gagasan berkembang dan konten berkualitas diciptakan, dengan fokus pada inovasi dan pengembangan berkelanjutan.</p></li>
                                        </ul>
                                        <br>
                                        <p>Di CraftForge, kami menggabungkan kreativitas dengan teknologi untuk memberikan platform yang mudah digunakan, namun kuat. Kami mendukung proses pembuatan konten dari awal hingga akhir, dengan berbagai fitur yang dirancang untuk mempermudah penulisan, pengeditan, dan publikasi. Apakah Anda seorang blogger pemula atau penulis berpengalaman, CraftForge menyediakan ruang untuk berekspresi, belajar, dan tumbuh.</p>
                                        <p>Bergabunglah dengan CraftForge dan temukan tempat di mana karya Anda tidak hanya terlihat, tetapi juga dihargai. Kami berkomitmen untuk memberikan dukungan dan alat yang Anda butuhkan untuk membangun konten yang menginspirasi, produktif, dan inovatif.</p>
                                        <ul>
                                            <li><a href="https://www.youtube.com">Youtube</a></li>
                                            <li><a href="https://www.instagram.com">Instagram</a></li>
                                            <li><a href="https://www.facebook.com">Facebook</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <!-- Nested row for non-featured blog posts-->
                        
                    </div>

                    <!-- Side widgets-->
                    @include('front.layout.side-widget')
                </div>
            </div>    
@endsection
