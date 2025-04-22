<x-userlayout :services="$services" :contact="$contact">
    <!-- end header -->
        <!-- start section -->
        <section class="p-0 bg-dark-gray">
            <article class="content">
                <div id="travel-agency_wrapper" class="rev_slider_wrapper fullscreen-container">
                    <!-- the ID here will be used in the JavaScript below to initialize the slider -->
                    <div id="travel-agency-slider" class="rev_slider fullscreenbanner" data-version="5.4.5" >
                        <!-- BEGIN SLIDES LIST -->
                        <ul>
                            @foreach ($banners as $banner)
                            <!-- MINIMUM SLIDE STRUCTURE -->
                            
                            <li id="rs-travel-agency-01" data-index="rs-travel-agency-01" data-transition="slidehorizontal" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="default"  data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="0" data-fsslotamount="2" data-saveperformance="off"  data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10='{"revslider-weather-addon":{"type":"name","name":"Cologne","woeid":"667931","unit":"c"}}' data-description="" >
                                <!-- SLIDE'S MAIN BACKGROUND IMAGE -->
                                 @php
                                        $images = is_array($banner->banner) ? $banner->banner : json_decode($banner->banner ?? '[]', true);
                                    @endphp

                                    @foreach ($images as $image)
                                        
                                            <img src="{{ asset('storage/banners/' . $image) }}" alt="Leading Travel Agency in Palakkad" class="rev-slidebg">
                                        
                                    @endforeach
                                {{-- <img src="{{asset('images/banner/slider2.jpg')}}" alt="Leading Travel Agency in Palakkad" class="rev-slidebg"> --}}
                                
                            </li>
                            @endforeach
                                
                            </li>
                        </ul>
                    </div>
                </div>
            </article>
        </section>
        <!-- end section --> 
        <!-- start section -->
        <section class="position-relative pb-0 xs-pt-30px">
            <div class="w-100 h-70px position-absolute top-minus-70px md-top-minus-50px left-0px" style="background-image:url('{{asset('images/demo-travel-agency-slider-07.png')}}');"></div>
        </section>
        <!-- end section -->
        <!-- start section -->
        <section class="extra-big-section background-position-center-bottom background-size-contain background-no-repeat position-relative pt-0" style="background-image:url('{{asset('images/demo-travel-agency-home-bg-02.png')}}');">
            <div class="position-absolute left-0px bottom-minus-50px d-none d-lg-inline-block" data-bottom-top="transform: translateY(-50px)" data-top-bottom="transform: translateY(50px)">
                <img src="{{asset('images/rope.webp')}}" alt="Leading Travel Agency in Palakkad" />
            </div>
            <div class="container background-position-right background-no-repeat sm-mb-10 xs-mb-15" style="background-image:url('{{asset('images/banner/home-about-bg.png')}}');">
                <div class="row align-items-center position-relative mb-7">
                    <div class="position-absolute left-0px top-0px h-100 w-130px border-end border-color-extra-medium-gray d-none d-md-inline-block" data-anime='{ "translateX": [-30, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                        <div class="vertical-title-center align-items-center justify-content-center">
                            <div class="title fs-24 alt-font text-base-color fw-600 text-uppercase">Explore the world for yourself</div>
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-2 d-none d-md-inline-block"><div class="divider-dot d-flex align-items-center w-100 h-200px"></div></div>
                    <div class="col-lg-5 col-md-9 offset-md-1" data-anime='{ "el": "childs", "translateY": [30, 0], "opacity": [0,1], "duration": 800, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                        <h1 class="alt-font fw-600 text-dark-gray ls-minus-3px w-90 xl-w-100 mb-30px">{{ $about['welcome'] }}.</h1>
                        <p class="w-75 lg-w-100">
                            @php
                                $sentences = preg_split('/(?<=[.?!])\s+/', $about->glimbse);
                                $firstFour = implode(' ', array_slice($sentences, 0, 4));
                            @endphp
                            {{ $about->glimbse }}
                            </p> 
                        <div class="d-inline-block mt-5px"> 
                            <a href="{{ route('users.aboutus') }}" class="btn btn-large btn-round-edge btn-dark-gray btn-hover-animation btn-box-shadow me-25px">
                                <span> 
                                    <span class="btn-text">About company</span><span class="btn-icon"><i class="feather icon-feather-feather"></i></span> 
                                </span>
                            </a>
                        </div>
                    </div> 
                    <div class="col-lg-4 col-md-8 position-relative offset-lg-1 offset-md-4 ps-0 sm-ps-15px md-mt-50px" data-anime='{ "opacity": [0,1], "duration": 1200, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'> 
                        <img src="{{asset('images/royal-rich-home-about.jpg')}}" class="border-radius-6px md-w-100" alt="Top Travel Agency in Kerala">  
                        <img class="position-absolute left-minus-120px top-80px sm-top-0px sm-w-160px sm-left-0px" src="images/royal-rich-travel-since-2006.png" alt="Royal Rich Travels Since 2008" data-bottom-top="transform: translateY(50px)" data-top-bottom="transform: translateY(-50px)"> 
                    </div>
                </div>  
                <div class="row row-cols-1 row-cols-lg-4 row-cols-sm-2 justify-content-center" data-anime='{ "el": "childs", "rotateZ": [5, 0], "translateY": [30, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                    <!-- start features box item -->
                    @foreach ($features as $feature)
                        <div class="col icon-with-text-style-01 md-mb-30px">
                            <div class="feature-box feature-box-left-icon-middle last-paragraph-no-margin">
                                <div class="feature-box-icon">
                                    <i class="line-icon-Medal-2 icon-large text-base-color"></i>
                                </div>
                                <div class="feature-box-content">
                                    <span class="d-inline-block alt-font text-dark-gray fw-500 fs-22 lg-fs-20 ls-minus-05px">{{ $feature['name'] }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- end features box item -->
                </div>
            </div>
        </section>
        <!-- end section -->
        <section class="bg-very-light-gray background-position-center-bottom background-size-contain background-no-repeat pt-2 pb-6">
            <div class="container"> 
                <div class="row justify-content-center mb-3">
                    <div class="col-lg-6 text-center" data-anime='{ "el": "childs", "translateY": [30, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                        <!--<span class="fw-500 text-base-color text-uppercase d-inline-block">Most popular tours</span>-->
                        <h2 class="alt-font fw-600 text-dark-gray ls-minus-2px">Our Services</h2>
                    </div>
                </div>
                <div class="row row-cols-1 justify-content-center mb-10 md-mb-5 xs-mb-10">
                    <!-- start content carousal item -->
                    <div class="col position-relative" data-anime='{ "opacity": [0,1], "duration": 800, "delay": 50, "staggervalue": 300, "easing": "easeOutQuad" }'>
                        <div class="swiper slider-four-slide swiper-number-navigation-style" data-slider-options='{ "slidesPerView": 1, "spaceBetween": 30, "loop": true, "pagination": { "el": ".swiper-pagination", "clickable": true }, "autoplay": { "delay": 4000, "disableOnInteraction": false }, "navigation": { "nextEl": ".slider-four-slide-next", "prevEl": ".slider-four-slide-prev" }, "keyboard": { "enabled": true, "onlyInViewport": true }, "breakpoints": { "1400": { "slidesPerView": 4 }, "1200": { "slidesPerView": 3 }, "992": { "slidesPerView": 3 }, "576": { "slidesPerView": 2 } }, "effect": "slide" }' data-swiper-number-navigation="true" data-swiper-show-progress="true">
                            <div class="swiper-wrapper pb-5 md-pb-6">
                                <!-- start content carousal item -->
                                @foreach ($services as $service)
                                <div class="swiper-slide">
                                    <div class="overflow-hidden border-radius-6px box-shadow-large">
                                        <div class="image">
                                            <img class="w-100" src="{{ asset('storage/services/'.$service->image) }}" alt="{{ $service->name }}" style="height: 500px; width: 250px;">
                                        </div> 
                                        @php
                                            $sentences = preg_split('/(?<=[.?!])\s+/', $service->description);
                                            $firstTwo = implode(' ', array_slice($sentences, 0, 2));
                                        @endphp
                                        <div class="bg-white p-35px position-relative">
                                            <div class="alt-font fw-600 text-dark-gray" style="font-size:25px;">{{ $service->name }}</div>
                                            <div class="fs-24 fw-700 text-dark-gray"><span class="text-uppercase d-block fs-14 lh-18 fw-500 text-medium-gray">{{ $firstTwo }}</span></div>
                                            <a href="{{ route('users.servicedetails', $service->slug) }}" class="mt-10px fs-18 text-dark-gray fw-500 lh-26 d-block">Read More</a>
                                            
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <!-- end content carousal item -->
                            </div>
                            <!-- start slider pagination -->
                            <div class="swiper-navigation-wrapper d-flex align-items-center justify-content-center">
                                <div class="swiper-button-previous-nav swiper-button-prev slider-four-slide-prev"><i class="feather icon-feather-arrow-left icon-small text-dark-gray"></i><div class="number-prev fs-14 fw-500"></div></div>
                                <div class="swiper-pagination-progress w-200px xs-w-150px bg-medium-gray-transparent"><span class="swiper-progress"></span></div>
                                <div class="swiper-button-next-nav swiper-button-next slider-four-slide-next"><div class="number-next fs-14 fw-500"></div><i class="feather icon-feather-arrow-right icon-small text-dark-gray"></i></div>
                            </div>
                            <!-- end slider pagination -->
                        </div> 
                    </div>
                </div> 
            </div>
        </section>
        <!-- start section -->
        <!--<section class="pt-0">-->
        <!--    <div class="container">-->
                
                
        <!--    </div>-->
        <!--</section>-->
        <!-- end section -->
        <!-- start parallax style-1 -->
        <section class="position-relative overlap-height" data-parallax-background-ratio="0.5" style="background-image: url('{{asset('images/royal-rich-home-parallax.jpg')}}');margin-top: -44px;">
            <div class="opacity-extra-medium bg-gradient-gulf-blue-sepia-brown"></div>
            <div class="container overlap-gap-section">
                <div class="row justify-content-center align-items-center">
                    <div class="col-xl-8 col-lg-10 position-relative text-center parallax-scrolling-style-1" data-anime='{ "el": "childs", "translateY": [30, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                        <span class="fw-500 text-white text-uppercase mb-5px d-inline-block ls-1px">Finding the perfect trips</span>
                        <h1 class="text-white mx-auto alt-font fw-500 mb-40px ls-minus-2px">Get ready to explore and discover your world.</h1>
                        <a href="#explore" class="section-link d-flex justify-content-center align-items-center mx-auto icon-box w-70px h-70px rounded-circle bg-base-color"><i class="bi bi-arrow-down-short text-white icon-medium d-flex"></i></a>
                    </div>
                </div>
            </div>
        </section>
        <!-- end parallax style-1 -->
        <!-- start section -->
        <section id="explore" class="cover-background overflow-visible" style="background-image: url('{{asset('images/royal-rich-bg3.jpg')}}');">
            <div class="container overlap-section">
                <div class="row row-cols-1 row-cols-xl-5 row-cols-md-5 row-cols-sm-3 bg-white border-radius-6px mx-0 ps-8 pe-8 lg-ps-3 lg-pe-3 pt-4 pb-4 sm-pt-8 sm-pb-8 xs-pt-15 xs-pb-40px align-items-center mb-7 xs-mb-50px justify-content-center" data-anime='{ "el": "childs", "translateX": [30, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                    <div class="col text-center border-end border-color-extra-medium-gray sm-mb-40px xs-border-end-0">
                        <img src="{{asset('images/adventure.png')}}" class="mb-10px w-70px d-block mx-auto" alt="Travel Agency Adventure Activities" />
                        <span class="alt-font fs-19 fw-600 text-dark-gray text-uppercase ls-minus-05px">Adventure</span>
                    </div>
                    <div class="col text-center border-end border-color-extra-medium-gray sm-mb-40px xs-border-end-0">
                        <img src="{{asset('images/friendly.png')}}" class="mb-10px w-70px d-block mx-auto" alt="Explore Tours and Travel with Friends" />
                        <span class="alt-font fs-19 fw-600 text-dark-gray text-uppercase ls-minus-05px">Friendly</span>
                    </div>
                    <div class="col text-center border-end sm-border-end-0 border-color-extra-medium-gray sm-mb-40px">
                        <img src="{{asset('images/popular.png')}}" class="mb-10px w-70px d-block mx-auto" alt="Popular Travel Destinations Around the World" />
                        <span class="alt-font fs-19 fw-600 text-dark-gray text-uppercase ls-minus-05px">Popular</span>
                    </div>
                    <div class="col text-center border-end border-color-extra-medium-gray xs-border-end-0 xs-mb-40px">
                        <img src="{{asset('images/beaches.png')}}" class="mb-10px w-70px d-block mx-auto" alt="Travel Agency Beach Holiday Packages" />
                        <span class="alt-font fs-19 fw-600 text-dark-gray text-uppercase ls-minus-05px">Beaches</span>
                    </div>
                    <div class="col text-center">
                        <img src="{{asset('images/honeymoon.png')}}" class="mb-10px w-70px d-block mx-auto" alt="Best Honeymoon Tours and Resorts" />
                        <span class="alt-font fs-19 fw-600 text-dark-gray text-uppercase ls-minus-05px">Honeymoon</span>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row align-items-center justify-content-center" data-anime='{ "translateY": [0, 0], "opacity": [0,1], "duration": 1200, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                    <div class="col-lg-3 md-mb-20px text-center text-lg-start">
                        <!--<span class="fw-500 text-base-color text-uppercase">Most popular tours</span>-->
                        <h2 class="alt-font fw-600 text-dark-gray ls-minus-2px">Our Packages.</h2>
                        <div class="d-flex justify-content-center justify-content-lg-start">
                            <!-- start slider navigation -->
                            <div class="slider-one-slide-prev-1 bg-white box-shadow-double-large swiper-button-prev slider-navigation-style-04"><i class="bi bi-arrow-left-short icon-very-medium"></i></div>
                            <div class="slider-one-slide-next-1 bg-white box-shadow-double-large swiper-button-next slider-navigation-style-04"><i class="bi bi-arrow-right-short icon-very-medium"></i></div>
                            <!-- end slider navigation -->
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-9">
                        <div class="swiper position-relative" data-slider-options='{ "autoHeight": true, "loop": true, "allowTouchMove": true, "autoplay": { "delay": 3000, "disableOnInteraction": false }, "navigation": { "nextEl": ".swiper-button-next", "prevEl": ".swiper-button-prev" }, "effect": "slide" }'>
                            <div class="swiper-wrapper">
                                <!-- start text slider item -->
                                 @foreach ($packages as $package)
                                @php
                                    $packages = preg_split('/(?<=[.?!])\s+/', $package->description);
                                    $firstSentence = implode(' ', array_slice($packages, 0, 2));
                                @endphp
                                <div class="swiper-slide review-style-11">
                                    <div class="row align-items-center">
                                        <div class="col-md-5 text-center text-md-start sm-mb-15px">
                                            <img src="{{ asset('storage/packages/'.$package->image) }}" alt="{{ $package->name }}">
                                        </div> 
                                        <div class="col-md-7 position-relative ps-16 sm-ps-15px text-center text-md-start">
                                            
                                            <p class="fs-20 lh-28 text-dark-gray mb-20px">
                                                {{ $firstSentence }}</p>
                                            <a href="{{ route('users.packagedetails', ['id' => $package->id]) }}">More Details</a>
                                            
                                            <div class="position-absolute left-0px top-0px h-100 w-90px sm-w-100 border-end border-color-transparent-dark-very-light sm-position-relative sm-mt-10px sm-border-end-0">
                                                <div class="vertical-title-center align-items-center justify-content-center sm-vertical-title-inherit">
                                                    <div class="title fs-20 alt-font text-base-color fw-600 text-uppercase"> {{ $package->name }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                                @endforeach
                                <!-- end text slider item -->
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end section -->
        <!-- end section -->
        
        <!-- start section -->
        <!-- start footer -->
    </x-userlayout>