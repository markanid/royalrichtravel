<x-userlayout :services="$services" :contact="$contact">
    <!-- end header -->
    <!-- start page title -->
    <section class="page-title-button-style cover-background position-relative ipad-top-space-margin top-space-padding md-pt-20px" style="background-image: url('{{asset('images/banner/contact.jpg')}}')">
        <div class="opacity-light bg-bay-of-many-blue"></div>
        <div class="container">
            <div class="row align-items-center justify-content-center extra-small-screen">
                <div class="col-lg-6 col-md-8 position-relative text-center page-title-extra-large" data-anime='{ "el": "childs", "translateY": [30, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                    <h2 class="text-uppercase mb-10px alt-font text-white fw-500 bg-dark-gray border-radius-4px">The perfect trip</h2>
                    <h1 class="mb-0 text-white alt-font ls-minus-2px text-uppercase fw-600 text-shadow-double-large">Contact us</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- end page title -->
    <!-- start section -->
    <section class="bg-very-light-gray position-relative" style="padding-bottom: 40px;">
        <div class="h-110px position-absolute w-100 h-100 left-0px right-0px top-minus-70px" style="background-image:url('{{asset('images/demo-travel-agency-home-bg-02.png')}}')"></div>
        <div class="container">
            <div class="row align-items-center mt-2">
                @php
                    $phones = is_array($contact->phones) ? $contact->phones : json_decode($contact->phones ?? '[]', true);
                    $addresses = is_array($contact->addresses) ? $contact->addresses : json_decode($contact->addresses ?? '[]', true);
                @endphp
                <div class="col-lg-3 d-md-flex d-lg-inline-block md-mb-50px" data-anime='{ "el": "childs", "translateY": [30, 0], "opacity": [0,1], "duration": 1200, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                    <div class="mb-60px w-100 md-w-30 sm-w-50 xs-w-100 md-mb-30px sm-mb-40px float-start text-center text-sm-start">
                        <span class="d-block alt-font fs-22 fw-500 text-dark-gray ls-minus-05px mb-5px">Call us directly</span>
                        <div class="w-100 d-block mb-10px">
                            @foreach ($phones as $index => $phone)
                            <a href="">{{ $phone }}</a>@if (!$loop->last) <br> @endif 
                            @endforeach
                        </div>
                       
                    </div>
                    
                    <div class="md-w-30 w-100 sm-w-100 sm-clear-both text-center text-sm-start float-start">
                        <span class="d-block alt-font fs-22 fw-500 text-dark-gray ls-minus-05px mb-5px">Need live support</span>
                        <div><a href="#">{{ $contact->email }}</a></div>
                        
                       
                    </div>
                </div>
                <div class="col-lg-9" data-anime='{ "translateY": [0, 0], "opacity": [0,1], "duration": 1200, "delay": 100, "staggervalue": 150, "easing": "easeOutQuad" }'>
                    <div class="row row-cols-1 row-cols-md-2 border-radius-6px overflow-hidden box-shadow-double-large m-0">
                        <div class="col cover-background sm-h-550px xs-h-450px" style="background-image: url('{{asset('images/royal-rich-contact.jpg')}}')"></div>
                        <div class="col contact-form-style-03 bg-white p-70px lg-p-35px">
                            <h3 class="fw-600 alt-font text-dark-gray ls-minus-1px mb-25px">Let's get in touch.</h3>
                            <form action="{{ route('send.email') }}" method="post">
                                <div class="position-relative form-group mb-10px">
                                    <span class="form-icon"><i class="bi bi-emoji-smile"></i></span>
                                    <input class="ps-0 border-radius-0px border-color-extra-medium-gray form-control required" type="text" name="name" placeholder="What's your good name?*" />
                                </div>
                                <div class="position-relative form-group mb-10px">
                                    <span class="form-icon"><i class="bi bi-envelope"></i></span>
                                    <input class="ps-0 border-radius-0px border-bottom border-color-extra-medium-gray form-control required" type="email" name="email" placeholder="Enter your email address*" />
                                </div>
                                <div class="position-relative form-group mb-10px">
                                    <span class="form-icon"><i class="bi bi-telephone"></i></span>
                                    <input class="ps-0 border-radius-0px border-bottom border-color-extra-medium-gray form-control" type="tel" name="phone" placeholder="Enter your phone number" />
                                </div>
                                <div class="position-relative form-group form-textarea mt-15px mb-10px xs-mb-0"> 
                                    <textarea class="ps-0 border-radius-0px border-bottom border-color-extra-medium-gray form-control" name="comment" placeholder="Describe about your tour" rows="3"></textarea>
                                    <span class="form-icon"><i class="bi bi-chat-square-dots"></i></span>
                                    <input type="hidden" name="redirect" value="">
                                    <button class="btn btn-medium btn-dark-gray btn-box-shadow btn-round-edge mt-30px submit" type="submit" aria-label="submit">Send message</button>
                                    <div class="form-results mt-20px d-none"></div>
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </section>
    
    <!-- end section -->
    <!-- start section -->
    <section class="bg-very-light-gray pt-0" style="
padding-bottom: 1px;
">
        
        <div class="container">
            
            <div class="row align-items-center justify-content-center mb-6 md-mb-13 sm-mb-0" data-anime='{ "el": "childs", "translateX": [-50, 0], "opacity": [0,1], "duration": 1200, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                <div class="col-12 col-md-auto text-center text-md-end sm-mb-20px">
                    <h4 class="text-dark-gray alt-font fw-500 mb-0 ls-minus-1px">Find Us Here</h4>
                </div>
                <div class="row row-cols-1 row-cols-lg-4 row-cols-sm-2 justify-content-center" data-anime='{ "el": "childs", "rotateZ": [5, 0], "translateY": [30, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }' style="padding-bottom: 35px;padding-top:15px;">
                <!-- start features box item -->
                    
                @foreach ($addresses as $index => $address)
                @php
                    // Split only the first comma occurrence
                    $parts = explode(',', $address, 2);
                    $title = trim($parts[0]);
                    $details = isset($parts[1]) ? trim($parts[1]) : '';
                @endphp
                    <div class="col icon-with-text-style-01 md-mb-30px">
                        <div class="feature-box feature-box-left-icon-middle last-paragraph-no-margin">
                            <div class="feature-box-icon">
                                <i class="line-icon-Medal-2 icon-large text-base-color"></i>
                            </div>
                            <div class="feature-box-content">
                                <span class="d-inline-block alt-font text-dark-gray fw-500 fs-22 lg-fs-20 ls-minus-05px">{{ $title }}</span>
                                <p class="lh-24">{{ $details }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach    
                <!-- end features box item -->
            </div>
                <iframe src="{{ $contact->locations }}" width="1263" height="400" style="border:0;padding-bottom:40px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" style="padding-bottom: 60px;"></iframe>
                <div class="col-12 col-md-auto text-center text-md-end sm-mb-20px">
                    <h4 class="text-dark-gray alt-font fw-500 mb-0 ls-minus-1px">Connect with social media </h4>
                </div>
                <div class="col-auto d-none d-lg-inline-block">
                    <span class="w-170px lg-w-130px h-1px bg-dark-gray opacity-2 d-flex mx-auto"></span>
                </div>
                <div class="col-12 col-md-auto elements-social social-icon-style-04 ps-0 md-ps-15px text-center text-md-start">
                    <ul class="large-icon dark">
                        <li class="m-0"><a class="facebook" href="{{ $contact->facebook }}" target="_blank"><i class="fa-brands fa-facebook-f"></i><span></span></a></li>      
                        <li class="m-0"><a class="dribbble" href="{{ $contact->youtube }}" target="_blank"><i class="fa-brands fa-youtube"></i><span></span></a></li>
                        <li class="m-0"><a class="twitter" href="{{ $contact->x }}" target="_blank"><i class="fa-brands fa-twitter"></i><span></span></a></li> 
                        <li class="m-0"><a class="instagram" href="{{ $contact->instagram }}" target="_blank"><i class="fa-brands fa-instagram"></i><span></span></a></li>
                    </ul>                  
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->
    <!-- start footer -->
</x-userlayout> 