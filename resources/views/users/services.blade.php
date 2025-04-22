<x-userlayout :services="$services" :contact="$contact">
    <!-- end header -->
    <!-- start page title -->
    <section class="page-title-button-style cover-background position-relative ipad-top-space-margin top-space-padding md-pt-20px" style="background-image: url('{{ asset('images/banner/service.jpg') }}')">
        <div class="opacity-light bg-bay-of-many-blue"></div>
        <div class="container">
            <div class="row align-items-center justify-content-center extra-small-screen">
                <div class="col-lg-6 col-md-8 position-relative text-center page-title-extra-large" data-anime='{ "el": "childs", "translateY": [30, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                    <!--<h2 class="text-uppercase mb-10px alt-font text-white fw-500 bg-dark-gray border-radius-4px">Amazing stories</h2>-->
                    <h1 class="mb-0 text-white alt-font ls-minus-2px text-uppercase fw-600 text-shadow-double-large">Our Services</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- end page title -->
    
    <!-- start section -->
    <section class="bg-very-light-gray position-relative">
        <div class="h-110px position-absolute w-100 h-100 left-0px right-0px top-minus-70px" style="background-image:url('{{asset('images/demo-travel-agency-home-bg-02.png')}}')"></div>
        <div class="container">
            <div class="row">
                <div class="mb-2 md-mb-7 sm-mb-0">
                    <ul class="blog-modern blog-wrapper grid-loading grid grid-3col xl-grid-3col lg-grid-3col md-grid-2col sm-grid-2col xs-grid-1col gutter-extra-large" data-anime='{ "el": "childs", "translateY": [50, 0], "opacity": [0,1], "duration": 1200, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                        <li class="grid-sizer"></li>
                        <!-- start blog item -->
                        @foreach ($services as $service)
                        <li class="grid-item mb-40px sm-mb-20px">
                            <div class="box-hover text-center">
                                <figure class="mb-0 position-relative">
                                    <div class="blog-image position-relative overflow-hidden border-radius-6px">
                                            <img src="{{ asset('storage/services/'.$service->image) }}" alt="" style="height: 500px; width: 100%; object-fit: cover;"/>
                                        </a>
                                    </div>
                                    <figcaption class="post-content-wrapper overflow-hidden border-radius-6px">
                                        <div class="position-relative bg-dark-gray post-content p-30px z-index-2 lh-initial"> 
                                            <a class="card-title mb-0 fs-20 lh-28 text-white d-inline-block">{{ $service->name }}</a>
                                            <div class="box-overlay bg-dark-gray z-index-minus-1"></div>
                                        </div>
                                        @php
                                            $sentences = preg_split('/(?<=[.?!])\s+/', $service->description);
                                            $firstTwo = implode(' ', array_slice($sentences, 0, 2));
                                        @endphp
                                        <div class="fs-15 bg-white p-15px lg-ps-10px lg-pe-10px lh-initial"><span class="d-inline-block">{{ $firstTwo }}</div>
                                        <a href="{{ route('users.servicedetails', $service->slug) }}" class="mt-10px fs-18 text-dark-gray fw-500 lh-26 d-block">Read More</a>
                                    </figcaption>
                                </figure>
                            </div>
                        </li>
                        @endforeach
                        <!-- end blog item -->
                    </ul>
                    <div class="row">
                        <div class="col-12 mt-1 mb-3 d-flex justify-content-center">
                            <!-- start pagination -->
                            <ul class="pagination pagination-style-01 fs-13 mb-0" data-anime='{ "translate": [0, 0], "opacity": [0,1], "duration": 600, "delay": 100, "staggervalue": 150, "easing": "easeOutQuad" }'>
                                <li class="page-item"><a class="page-link" href="#"><i class="feather icon-feather-arrow-left fs-18 d-xs-none"></i></a></li>
                                <li class="page-item"><a class="page-link" href="#">01</a></li>
                                <li class="page-item active"><a class="page-link" href="#">02</a></li>
                                <li class="page-item"><a class="page-link" href="#">03</a></li>
                                <li class="page-item"><a class="page-link" href="#">04</a></li>
                                <li class="page-item"><a class="page-link" href="#"><i class="feather icon-feather-arrow-right fs-18 d-xs-none"></i></a></li>
                            </ul>
                            <!-- end pagination -->
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->
    <!-- start footer -->
</x-userlayout> 