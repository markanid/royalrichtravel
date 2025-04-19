<x-userlayout>
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
                            <li id="rs-travel-agency-01" data-index="rs-travel-agency-01" data-transition="slidehorizontal" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="default"  data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="0" data-fsslotamount="2" data-saveperformance="off"  data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10='{"revslider-weather-addon":{"type":"name","name":"Cologne","woeid":"667931","unit":"c"}}' data-description="">
                                <!-- SLIDE'S MAIN BACKGROUND IMAGE -->
                                    @php
                                        $images = is_array($banner->banner) ? $banner->banner : json_decode($banner->banner ?? '[]', true);
                                    @endphp

                                    @foreach ($images as $image)
                                        <div class="banner-image">
                                            <img src="{{ asset('storage/banners/' . $image) }}" alt="Banner Image" width="100%" height="100%">
                                        </div>
                                    @endforeach
                                {{-- <img src="{{asset('images/banner/slider2.jpg')}}" alt="travel agency" class="rev-slidebg"> --}}
                                
                            </li>
                            @endforeach
                            <!-- MINIMUM SLIDE STRUCTURE -->
                            {{-- <li id="rs-travel-agency-02" data-index="rs-travel-agency-02" data-transition="slidehorizontal" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="default"  data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="0" data-fsslotamount="2" data-saveperformance="off"  data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10='{"revslider-weather-addon":{"type":"name","name":"Cologne","woeid":"667931","unit":"c"}}' data-description="">
                                <!-- SLIDE'S MAIN BACKGROUND IMAGE -->
                                <img src="{{asset('images/banner/slider3.jpg')}}" alt="dummy" class="rev-slidebg">
                                <!-- start image layer -->
                                
                            </li>
                            <!-- MINIMUM SLIDE STRUCTURE -->
                            <li id="rs-travel-agency-03" data-index="rs-travel-agency-03" data-transition="slidehorizontal" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="default"  data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="0" data-fsslotamount="2" data-saveperformance="off"  data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10='{"revslider-weather-addon":{"type":"name","name":"Cologne","woeid":"667931","unit":"c"}}' data-description="">
                                <!-- SLIDE'S MAIN BACKGROUND IMAGE -->
                                <img src="{{asset('images/banner/slider1.jpg')}}" alt="dummy" class="rev-slidebg">
                                
                            </li> --}}
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
                        <h1 class="alt-font fw-600 text-dark-gray ls-minus-3px w-90 xl-w-100 mb-30px">Discover the world's leading travel agency.</h1>
                        <p class="w-75 lg-w-100">Lorem ipsum is simply dummy text of the printing and typesetting industry. Lorem ipsum has been the industry's standard dummy text ever since.</p> 
                        <div class="d-inline-block mt-5px"> 
                            <a href="demo-travel-agency-about.html" class="btn btn-large btn-round-edge btn-dark-gray btn-hover-animation btn-box-shadow me-25px">
                                <span> 
                                    <span class="btn-text">About company</span><span class="btn-icon"><i class="feather icon-feather-feather"></i></span> 
                                </span>
                            </a>
                            <a href="demo-travel-agency-tours.html" class="btn btn-link-gradient expand btn-extra-large text-dark-gray text-dark-gray-hover ls-0px">Discover tour<span class="bg-dark-gray"></span></a>
                        </div>
                    </div> 
                    <div class="col-lg-4 col-md-8 position-relative offset-lg-1 offset-md-4 ps-0 sm-ps-15px md-mt-50px" data-anime='{ "opacity": [0,1], "duration": 1200, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'> 
                        <img src="https://placehold.co/405x560" class="border-radius-6px md-w-100" alt="">  
                        <img class="position-absolute left-minus-120px top-80px sm-top-0px sm-w-160px sm-left-0px" src="images/demo-travel-agency-home-02.png" alt="" data-bottom-top="transform: translateY(50px)" data-top-bottom="transform: translateY(-50px)"> 
                    </div>
                </div>  
                <div class="row row-cols-1 row-cols-lg-4 row-cols-sm-2 justify-content-center" data-anime='{ "el": "childs", "rotateZ": [5, 0], "translateY": [30, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                    <!-- start features box item -->
                    <div class="col icon-with-text-style-01 md-mb-30px">
                        <div class="feature-box feature-box-left-icon-middle last-paragraph-no-margin">
                            <div class="feature-box-icon">
                                <i class="line-icon-Medal-2 icon-large text-base-color"></i>
                            </div>
                            <div class="feature-box-content">
                                <span class="d-inline-block alt-font text-dark-gray fw-500 fs-22 lg-fs-20 ls-minus-05px">Superior service</span>
                                <p class="lh-24">Lorem ipsum text</p>
                            </div>
                        </div>
                    </div>
                    <!-- end features box item -->
                    <!-- start features box item -->
                    <div class="col icon-with-text-style-01 md-mb-30px">
                        <div class="feature-box feature-box-left-icon-middle last-paragraph-no-margin">
                            <div class="feature-box-icon">
                                <i class="line-icon-Globe icon-large text-base-color"></i>
                            </div>
                            <div class="feature-box-content">
                                <span class="d-inline-block alt-font text-dark-gray fw-500 fs-22 lg-fs-20 ls-minus-05px">Cheapest package</span>
                                <p class="lh-24">Lorem ipsum text</p>
                            </div>
                        </div>
                    </div>
                    <!-- end features box item -->
                    <!-- start features box item -->
                    <div class="col icon-with-text-style-01 xs-mb-30px">
                        <div class="feature-box feature-box-left-icon-middle last-paragraph-no-margin">
                            <div class="feature-box-icon">
                                <i class="line-icon-Administrator icon-large text-base-color"></i>
                            </div>
                            <div class="feature-box-content">
                                <span class="d-inline-block alt-font text-dark-gray fw-500 fs-22 lg-fs-20 ls-minus-05px">Greatest guides</span>
                                <p class="lh-24">Lorem ipsum text</p>
                            </div>
                        </div>
                    </div>
                    <!-- end features box item -->
                    <!-- start features box item -->
                    <div class="col icon-with-text-style-01">
                        <div class="feature-box feature-box-left-icon-middle last-paragraph-no-margin">
                            <div class="feature-box-icon">
                                <i class="line-icon-Police icon-large text-base-color"></i>
                            </div>
                            <div class="feature-box-content">
                                <span class="d-inline-block alt-font text-dark-gray fw-500 fs-22 lg-fs-20 ls-minus-05px">Fully protected</span>
                                <p class="lh-24">Lorem ipsum text</p>
                            </div>
                        </div>
                    </div>
                    <!-- end features box item --> 
                </div>
            </div>
        </section>
        <!-- end section -->
        <section class="bg-very-light-gray background-position-center-bottom background-size-contain background-no-repeat pt-2 pb-6">
            <div class="container"> 
                <div class="row justify-content-center mb-3">
                    <div class="col-lg-6 text-center" data-anime='{ "el": "childs", "translateY": [30, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                        <span class="fw-500 text-base-color text-uppercase d-inline-block">Most popular tours</span>
                        <h2 class="alt-font fw-600 text-dark-gray ls-minus-2px">Popular packages</h2>
                    </div>
                </div>
                <div class="row row-cols-1 justify-content-center mb-10 md-mb-5 xs-mb-10">
                    <!-- start content carousal item -->
                    <div class="col position-relative" data-anime='{ "opacity": [0,1], "duration": 800, "delay": 50, "staggervalue": 300, "easing": "easeOutQuad" }'>
                        <div class="swiper slider-four-slide magic-cursor swiper-number-navigation-style" data-slider-options='{ "slidesPerView": 1, "spaceBetween": 30, "loop": true, "pagination": { "el": ".swiper-pagination", "clickable": true }, "autoplay": { "delay": 4000, "disableOnInteraction": false }, "navigation": { "nextEl": ".slider-four-slide-next", "prevEl": ".slider-four-slide-prev" }, "keyboard": { "enabled": true, "onlyInViewport": true }, "breakpoints": { "1400": { "slidesPerView": 4 }, "1200": { "slidesPerView": 3 }, "992": { "slidesPerView": 3 }, "576": { "slidesPerView": 2 } }, "effect": "slide" }' data-swiper-number-navigation="true" data-swiper-show-progress="true">
                            <div class="swiper-wrapper pb-5 md-pb-6">
                                <!-- start content carousal item -->
                                <div class="swiper-slide">
                                    <div class="overflow-hidden border-radius-6px box-shadow-large">
                                        <div class="image">
                                            <a href="demo-travel-agency-tour-details-page.html">
                                                <img class="w-100" src="https://placehold.co/800x655" alt="">
                                            </a>
                                        </div> 
                                        <div class="bg-white p-35px position-relative">
                                            <div class="bg-base-color ps-15px pe-15px fs-14 text-uppercase fw-500 d-inline-block text-white position-absolute right-0px top-0px">10 days</div>
                                            <div class="fs-24 fw-700 text-dark-gray"><span class="text-uppercase d-block fs-14 lh-18 fw-500 text-medium-gray">Just</span>$1299<span class="ms-5px position-relative text-red fs-19 fw-500">$1500<span class="w-100 h-1px position-absolute left-0px top-50 bg-red"></span></span></div>
                                            <a href="demo-travel-agency-tour-details-page.html" class="mt-10px fs-18 text-dark-gray fw-500 lh-26 d-block">Majestic india life and great wildlife.</a>
                                            <div class="d-flex align-items-center pt-15px mt-20px border-top border-color-extra-medium-gray">
                                                <span class="fw-500 fs-14 d-inline-block text-uppercase">18 Reviews</span>
                                                <div class="review-star-icon ms-auto">
                                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end content carousal item -->
                                <!-- start content carousal item -->
                                <div class="swiper-slide">
                                    <div class="overflow-hidden border-radius-6px box-shadow-large">
                                        <div class="image">
                                            <a href="demo-travel-agency-tour-details-page.html">
                                                <img class="w-100" src="https://placehold.co/800x655" alt="">
                                            </a>
                                        </div> 
                                        <div class="bg-white p-35px position-relative">
                                            <div class="bg-base-color ps-15px pe-15px fs-14 text-uppercase fw-500 d-inline-block text-white position-absolute right-0px top-0px">08 days</div>
                                            <div class="fs-24 fw-700 text-dark-gray"><span class="text-uppercase d-block fs-14 lh-18 fw-500 text-medium-gray">Just</span>$1099<span class="ms-5px position-relative text-red fs-19 fw-500">$1200<span class="w-100 h-1px position-absolute left-0px top-50 bg-red"></span></span></div>
                                            <a href="demo-travel-agency-tour-details-page.html" class="mt-10px fs-18 text-dark-gray fw-500 lh-26 d-block">Maldives resorts with return flights.</a>
                                            <div class="d-flex align-items-center pt-15px mt-20px border-top border-color-extra-medium-gray">
                                                <span class="fw-500 fs-14 d-inline-block text-uppercase">12 Reviews</span>
                                                <div class="review-star-icon ms-auto">
                                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end content carousal item -->
                                <!-- start content carousal item -->
                                <div class="swiper-slide">
                                    <div class="overflow-hidden border-radius-6px box-shadow-large">
                                        <div class="image">
                                            <a href="demo-travel-agency-tour-details-page.html">
                                                <img class="w-100" src="https://placehold.co/800x655" alt="">
                                            </a>
                                        </div> 
                                        <div class="bg-white p-35px position-relative">
                                            <div class="bg-base-color ps-15px pe-15px fs-14 text-uppercase fw-500 d-inline-block text-white position-absolute right-0px top-0px">05 days</div>
                                            <div class="fs-24 fw-700 text-dark-gray"><span class="text-uppercase d-block fs-14 lh-18 fw-500 text-medium-gray">Just</span>$1349<span class="ms-5px position-relative text-red fs-19 fw-500">$1700<span class="w-100 h-1px position-absolute left-0px top-50 bg-red"></span></span></div>
                                            <a href="demo-travel-agency-tour-details-page.html" class="mt-10px fs-18 text-dark-gray fw-500 lh-26 d-block">Dubai parks resorts special packages.</a>
                                            <div class="d-flex align-items-center pt-15px mt-20px border-top border-color-extra-medium-gray">
                                                <span class="fw-500 fs-14 d-inline-block text-uppercase">10 Reviews</span>
                                                <div class="review-star-icon ms-auto">
                                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end content carousal item -->
                                <!-- start content carousal item -->
                                <div class="swiper-slide">
                                    <div class="overflow-hidden border-radius-6px box-shadow-large">
                                        <div class="image">
                                            <a href="demo-travel-agency-tour-details-page.html">
                                                <img class="w-100" src="https://placehold.co/800x655" alt="">
                                            </a>
                                        </div> 
                                        <div class="bg-white p-35px position-relative">
                                            <div class="bg-base-color ps-15px pe-15px fs-14 text-uppercase fw-500 d-inline-block text-white position-absolute right-0px top-0px">10 days</div>
                                            <div class="fs-24 fw-700 text-dark-gray"><span class="text-uppercase d-block fs-14 lh-18 fw-500 text-medium-gray">Just</span>$1699<span class="ms-5px position-relative text-red fs-19 fw-500">$1800<span class="w-100 h-1px position-absolute left-0px top-50 bg-red"></span></span></div>
                                            <a href="demo-travel-agency-tour-details-page.html" class="mt-10px fs-18 text-dark-gray fw-500 lh-26 d-block">The everyday urban jungle of city.</a>
                                            <div class="d-flex align-items-center pt-15px mt-20px border-top border-color-extra-medium-gray">
                                                <span class="fw-500 fs-14 d-inline-block text-uppercase">16 Reviews</span>
                                                <div class="review-star-icon ms-auto">
                                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                                </div> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end content carousal item --> 
                                <!-- start content carousal item -->
                                <div class="swiper-slide">
                                    <div class="overflow-hidden border-radius-6px box-shadow-large">
                                        <div class="image">
                                            <a href="demo-travel-agency-tour-details-page.html">
                                                <img class="w-100" src="https://placehold.co/800x655" alt="">
                                            </a>
                                        </div> 
                                        <div class="bg-white p-35px position-relative">
                                            <div class="bg-base-color ps-15px pe-15px fs-14 text-uppercase fw-500 d-inline-block text-white position-absolute right-0px top-0px">10 days</div>
                                            <div class="fs-24 fw-700 text-dark-gray"><span class="text-uppercase d-block fs-14 lh-18 fw-500 text-medium-gray">Just</span>$1299<span class="ms-5px position-relative text-red fs-19 fw-500">$1500<span class="w-100 h-1px position-absolute left-0px top-50 bg-red"></span></span></div>
                                            <a href="demo-travel-agency-tour-details-page.html" class="mt-10px fs-18 text-dark-gray fw-500 lh-26 d-block">Majestic india life and great wildlife.</a>
                                            <div class="d-flex align-items-center pt-15px mt-20px border-top border-color-extra-medium-gray">
                                                <span class="fw-500 fs-14 d-inline-block text-uppercase">18 Reviews</span>
                                                <div class="review-star-icon ms-auto">
                                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end content carousal item -->
                                <!-- start content carousal item -->
                                <div class="swiper-slide">
                                    <div class="overflow-hidden border-radius-6px box-shadow-large">
                                        <div class="image">
                                            <a href="demo-travel-agency-tour-details-page.html">
                                                <img class="w-100" src="https://placehold.co/800x655" alt="">
                                            </a>
                                        </div> 
                                        <div class="bg-white p-35px position-relative">
                                            <div class="bg-base-color ps-15px pe-15px fs-14 text-uppercase fw-500 d-inline-block text-white position-absolute right-0px top-0px">08 days</div>
                                            <div class="fs-24 fw-700 text-dark-gray"><span class="text-uppercase d-block fs-14 lh-18 fw-500 text-medium-gray">Just</span>$1099<span class="ms-5px position-relative text-red fs-19 fw-500">$1200<span class="w-100 h-1px position-absolute left-0px top-50 bg-red"></span></span></div>
                                            <a href="demo-travel-agency-tour-details-page.html" class="mt-10px fs-18 text-dark-gray fw-500 lh-26 d-block">Maldives resorts with return flights.</a>
                                            <div class="d-flex align-items-center pt-15px mt-20px border-top border-color-extra-medium-gray">
                                                <span class="fw-500 fs-14 d-inline-block text-uppercase">12 Reviews</span>
                                                <div class="review-star-icon ms-auto">
                                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end content carousal item -->
                                <!-- start content carousal item -->
                                <div class="swiper-slide">
                                    <div class="overflow-hidden border-radius-6px box-shadow-large">
                                        <div class="image">
                                            <a href="demo-travel-agency-tour-details-page.html">
                                                <img class="w-100" src="https://placehold.co/800x655" alt="">
                                            </a>
                                        </div> 
                                        <div class="bg-white p-35px position-relative">
                                            <div class="bg-base-color ps-15px pe-15px fs-14 text-uppercase fw-500 d-inline-block text-white position-absolute right-0px top-0px">05 days</div>
                                            <div class="fs-24 fw-700 text-dark-gray"><span class="text-uppercase d-block fs-14 lh-18 fw-500 text-medium-gray">Just</span>$1349<span class="ms-5px position-relative text-red fs-19 fw-500">$1700<span class="w-100 h-1px position-absolute left-0px top-50 bg-red"></span></span></div>
                                            <a href="demo-travel-agency-tour-details-page.html" class="mt-10px fs-18 text-dark-gray fw-500 lh-26 d-block">Dubai parks resorts special packages.</a>
                                            <div class="d-flex align-items-center pt-15px mt-20px border-top border-color-extra-medium-gray">
                                                <span class="fw-500 fs-14 d-inline-block text-uppercase">10 Reviews</span>
                                                <div class="review-star-icon ms-auto">
                                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end content carousal item -->
                                <!-- start content carousal item -->
                                <div class="swiper-slide">
                                    <div class="overflow-hidden border-radius-6px box-shadow-large">
                                        <div class="image">
                                            <a href="demo-travel-agency-tour-details-page.html">
                                                <img class="w-100" src="https://placehold.co/800x655" alt="">
                                            </a>
                                        </div> 
                                        <div class="bg-white p-35px position-relative">
                                            <div class="bg-base-color ps-15px pe-15px fs-14 text-uppercase fw-500 d-inline-block text-white position-absolute right-0px top-0px">10 days</div>
                                            <div class="fs-24 fw-700 text-dark-gray"><span class="text-uppercase d-block fs-14 lh-18 fw-500 text-medium-gray">Just</span>$1699<span class="ms-5px position-relative text-red fs-19 fw-500">$1800<span class="w-100 h-1px position-absolute left-0px top-50 bg-red"></span></span></div>
                                            <a href="demo-travel-agency-tour-details-page.html" class="mt-10px fs-18 text-dark-gray fw-500 lh-26 d-block">The everyday urban jungle of city.</a>
                                            <div class="d-flex align-items-center pt-15px mt-20px border-top border-color-extra-medium-gray">
                                                <span class="fw-500 fs-14 d-inline-block text-uppercase">16 Reviews</span>
                                                <div class="review-star-icon ms-auto">
                                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                                </div> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                        <!--<span class="fw-500 text-base-color text-uppercase">Testimonials</span>-->
                        <h2 class="alt-font fw-600 text-dark-gray ls-minus-2px">Our Services.</h2>
                        <div class="d-flex justify-content-center justify-content-lg-start">
                            <!-- start slider navigation -->
                            <div class="slider-one-slide-prev-1 bg-white box-shadow-double-large swiper-button-prev slider-navigation-style-04"><i class="bi bi-arrow-left-short icon-very-medium"></i></div>
                            <div class="slider-one-slide-next-1 bg-white box-shadow-double-large swiper-button-next slider-navigation-style-04"><i class="bi bi-arrow-right-short icon-very-medium"></i></div>
                            <!-- end slider navigation -->
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-9">
                        <div class="swiper position-relative magic-cursor" data-slider-options='{ "autoHeight": true, "loop": true, "allowTouchMove": true, "autoplay": { "delay": 3000, "disableOnInteraction": false }, "navigation": { "nextEl": ".swiper-button-next", "prevEl": ".swiper-button-prev" }, "effect": "slide" }'>
                            <div class="swiper-wrapper">
                                <!-- start text slider item -->
                                <div class="swiper-slide review-style-11">
                                    <div class="row align-items-center">
                                        <div class="col-md-5 text-center text-md-start sm-mb-15px">
                                            <img src="https://placehold.co/350x335" alt="">
                                        </div> 
                                        <div class="col-md-7 position-relative ps-16 sm-ps-15px text-center text-md-start">
                                            <p class="fs-20 lh-28 text-dark-gray mb-20px">Our Africa travel specialist planned the most <span class="text-decoration-line-bottom fw-600">amazing trip</span> to kenya for us. We had an <span class="text-decoration-line-bottom fw-600">incredible time</span> and were able to capture so many awesome pictures.</p>
                                            <div class="text-center bg-base-color text-white fs-15 border-radius-22px d-inline-block ps-20px pe-20px lh-36 ls-minus-1px">
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                            </div> 
                                            <div class="position-absolute left-0px top-0px h-100 w-90px sm-w-100 border-end border-color-transparent-dark-very-light sm-position-relative sm-mt-10px sm-border-end-0">
                                                <div class="vertical-title-center align-items-center justify-content-center sm-vertical-title-inherit">
                                                    <div class="title fs-20 alt-font text-base-color fw-600 text-uppercase">Alexander moore</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                                <!-- end text slider item -->
                                <!-- start text slider item -->
                                <div class="swiper-slide review-style-11">
                                    <div class="row align-items-center">
                                        <div class="col-md-5 text-center text-md-start sm-mb-15px">
                                            <img src="https://placehold.co/350x335" alt="">
                                        </div> 
                                        <div class="col-md-7 position-relative ps-16 sm-ps-15px text-center text-md-start">
                                            <p class="fs-20 lh-28 text-dark-gray mb-20px">Excellent travel company. We have already <span class="text-decoration-line-bottom fw-600">recommended</span> it to our family and friends. We are looking forward to our <span class="text-decoration-line-bottom fw-600">next trip.</span> Everything was very well organized.</p>
                                            <div class="text-center bg-base-color text-white fs-15 border-radius-22px d-inline-block ps-20px pe-20px lh-36 ls-minus-1px">
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                            </div> 
                                            <div class="position-absolute left-0px top-0px h-100 w-90px sm-w-100 border-end border-color-transparent-dark-very-light sm-position-relative sm-mt-10px sm-border-end-0">
                                                <div class="vertical-title-center align-items-center justify-content-center sm-vertical-title-inherit">
                                                    <div class="title fs-20 alt-font text-base-color fw-600 text-uppercase">Matthew taylor</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end text slider item -->
                                <!-- start text slider item -->
                                <div class="swiper-slide review-style-11">
                                    <div class="row align-items-center">
                                        <div class="col-md-5 text-center text-md-start sm-mb-15px">
                                            <img src="https://placehold.co/350x335" alt="">
                                        </div> 
                                        <div class="col-md-7 position-relative ps-16 sm-ps-15px text-center text-md-start">
                                            <p class="fs-20 lh-28 text-dark-gray mb-20px">This itinerary was a perfect <span class="text-decoration-line-bottom fw-500">combination</span> of city sights, history and culture together with the peace of the <span class="text-decoration-line-bottom fw-500">amazon rainforest</span> and the adventure.</p>
                                            <div class="text-center bg-base-color text-white fs-15 border-radius-22px d-inline-block ps-20px pe-20px lh-36 ls-minus-1px">
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                            </div> 
                                            <div class="position-absolute left-0px top-0px h-100 w-90px sm-w-100 border-end border-color-transparent-dark-very-light sm-position-relative sm-mt-10px sm-border-end-0">
                                                <div class="vertical-title-center align-items-center justify-content-center sm-vertical-title-inherit">
                                                    <div class="title fs-20 alt-font text-base-color fw-600 text-uppercase">Herman miller</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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