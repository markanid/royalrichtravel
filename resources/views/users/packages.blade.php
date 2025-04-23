<x-userlayout>
    <!-- end header -->
    <!-- start page title -->
    <section class="page-title-button-style cover-background position-relative ipad-top-space-margin top-space-padding md-pt-20px" style="background-image: url('{{asset('images/banner/packages.jpg')}}')">
        <div class="opacity-light bg-bay-of-many-blue"></div>
        <div class="container">
            <div class="row align-items-center justify-content-center extra-small-screen">
                <div class="col-lg-6 col-md-8 position-relative text-center page-title-extra-large" data-anime='{ "el": "childs", "translateY": [30, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                    <h2 class="text-uppercase mb-10px alt-font text-white fw-500 bg-dark-gray border-radius-4px">The perfect trip</h2>
                    <h1 class="mb-0 text-white alt-font ls-minus-2px text-uppercase fw-600 text-shadow-double-large">Our Packages</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- end page title -->
    <!-- start section -->
    <section class="bg-very-light-gray position-relative">
        <div class="h-110px position-absolute w-100 h-100 left-0px right-0px top-minus-70px" style="background-image:url('{{asset('images/demo-travel-agency-home-bg-02.png')}}')"></div>
        <div class="container">
            <div class="row row-cols-1 row-cols-xl-5 row-cols-md-5 row-cols-sm-3 justify-content-center align-items-center" data-anime='{ "el": "childs", "translateX": [30, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                <div class="col text-center border-end border-color-transparent-dark-very-light sm-mb-40px xs-border-end-0">
                    <img src="{{asset('images/adventure.png')}}" class="mb-10px w-70px d-block mx-auto" alt="Travel Agency Adventure Activities" />
                    <span class="alt-font fs-19 fw-600 text-dark-gray text-uppercase ls-minus-05px">Adventure</span>
                </div>
                <div class="col text-center border-end border-color-transparent-dark-very-light sm-mb-40px xs-border-end-0">
                    <img src="{{asset('images/friendly.png')}}" class="mb-10px w-70px d-block mx-auto" alt="Explore Tours and Travel with Friends" />
                    <span class="alt-font fs-19 fw-600 text-dark-gray text-uppercase ls-minus-05px">Friendly</span>
                </div>
                <div class="col text-center border-end sm-border-end-0 border-color-transparent-dark-very-light sm-mb-40px">
                    <img src="{{asset('images/popular.png')}}" class="mb-10px w-70px d-block mx-auto" alt="Popular Travel Destinations Around the World" />
                    <span class="alt-font fs-19 fw-600 text-dark-gray text-uppercase ls-minus-05px">Popular</span>
                </div>
                <div class="col text-center border-end border-color-transparent-dark-very-light xs-mb-40px xs-border-end-0">
                    <img src="{{asset('images/beaches.png')}}" class="mb-10px w-70px d-block mx-auto" alt="Travel Agency Beach Holiday Packages" />
                    <span class="alt-font fs-19 fw-600 text-dark-gray text-uppercase ls-minus-05px">Beaches</span>
                </div>
                <div class="col text-center">
                    <img src="{{asset('images/honeymoon.png')}}" class="mb-10px w-70px d-block mx-auto" alt="Best Honeymoon Tours and Resorts" />
                    <span class="alt-font fs-19 fw-600 text-dark-gray text-uppercase ls-minus-05px">Honeymoon</span>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->
    <!-- start section -->
    <section class="pt-0 bg-very-light-gray overlap-height">
        <div class="container overlap-gap-section">
            <div class="row row-cols-1 row-cols-xl-3 row-cols-lg-2 row-cols-md-2 justify-content-center" data-anime='{ "el": "childs", "translateY": [50, 0], "opacity": [0,1], "duration": 1200, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                <!-- start content carousal item -->
                @if ($packages->isNotEmpty())  
                    @foreach ($packages as $package)
                        <div class="col mb-30px">
                            <div class="overflow-hidden border-radius-6px box-shadow-large">
                                <div class="image">
                                    <a href="demo-travel-agency-tour-details-page.html">
                                        <img class="w-100" src="{{ asset('storage/packages/'.$package['image']) }}" alt="">
                                    </a>
                                </div> 
                                <div class="bg-white p-40px md-p-30px position-relative">
                                    <div class="bg-base-color ps-15px pe-15px fs-14 text-uppercase fw-500 d-inline-block text-white position-absolute right-0px top-0px"><i class="feather icon-feather-map-pin me-5px"></i>{{ $package['location'] }}</div>
                                    <div class="fs-24 fw-700 text-dark-gray">{{ $package['name'] }}</div>
                                    @php
                                        $sentences = preg_split('/(?<=[.?!])\s+/',  $package['description']);
                                        $firstTwo = implode(' ', array_slice($sentences, 0, 1));
                                    @endphp
                                    <p class="m-0 lh-30">{{ $firstTwo }}</p>
                                    
                                    <div class="d-flex align-items-center pt-20px mt-25px border-top border-color-extra-medium-gray">
                                        <a href="{{ route('users.packagedetails',$package->slug) }}" class="fw-600 text-dark-gray me-auto">More Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                <!-- end content carousal item -->
            </div>
    </section>
    <!-- end section -->        
    <!-- start footer -->
</x-userlayout> 