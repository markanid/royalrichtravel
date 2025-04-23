<x-userlayout>
    <!-- end header -->
    <!-- start page title -->
    <section class="page-title-button-style cover-background position-relative ipad-top-space-margin top-space-padding md-pt-20px" style="background-image: url('{{asset('images/banner/packages.jpg')}}')">
        <div class="opacity-light bg-bay-of-many-blue"></div>
        <div class="container">
            <div class="row align-items-center justify-content-center extra-small-screen">
                <div class="col-lg-6 col-md-8 position-relative text-center page-title-extra-large" data-anime='{ "el": "childs", "translateY": [30, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                    <h2 class="text-uppercase mb-10px alt-font text-white fw-500 bg-dark-gray border-radius-4px">Amazing tour</h2>
                    <h1 class="mb-0 text-white alt-font ls-minus-2px text-uppercase fw-600 text-shadow-double-large">Our Packages</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- end page title -->
    <!-- start section -->
    <section class="position-relative">
        <div class="h-110px position-absolute w-100 h-100 left-0px right-0px top-minus-70px" style="background-image:url('images/demo-travel-agency-about-bg-02.png')"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 md-mb-50px sm-mb-35px">
                    <div class="row align-items-center mb-25px">
                        <div class="col-sm-9">
                            <h3 class="alt-font text-dark-gray fw-600 mb-10px ls-minus-1px">{{ $package->name }}</h3>
                            <ul class="p-0 m-0 list-style-02 d-block d-sm-flex">
                                <li class="text-dark-gray fw-500"><i class="bi bi-geo-alt icon-small me-5px"></i>{{ $package->location }}</li>
                               
                            </ul>
                        </div>
                        
                    </div>
                    <div class="row mb-50px xs-mb-40px">
                        <div class="col-12">
                            <ul class="p-0 list-style-02 d-flex flex-wrap border-top border-color-extra-medium-gray pt-20px pb-20px mb-25px">
                                
                            </ul>
                            <img src="{{ asset('storage/packages/'.$package->image) }}" alt="" />  
                            <p>{{ $package->description }}.</p>
                            
                        </div>
                    </div>
                    
                    
                   
                    
                   
                </div>
                <!-- start sidebar -->
                <aside class="col-xl-3 col-lg-4 offset-xl-1 lg-ps-50px md-ps-15px">
                    <div class="position-sticky top-70px">
                        <div class="bg-very-light-gray contact-form-style-03 position-relative overflow-hidden p-40px lg-p-30px mb-30px">
                            <h5 class="alt-font text-dark-gray fw-600 mb-10px text-center">Book this tour</h5>
                            <form action="{{ route('send.email') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="position-relative form-group mb-5px">
                                    <span class="form-icon"><i class="bi bi-emoji-smile icon-small"></i></span>
                                    <input class="ps-0 border-radius-0px border-color-transparent-dark-very-light bg-transparent form-control required" name="name" type="text" placeholder="Your name*" />
                                </div>
                                <div class="position-relative form-group mb-5px">
                                    <span class="form-icon"><i class="bi bi-envelope icon-small"></i></span>
                                    <input class="ps-0 border-radius-0px border-color-transparent-dark-very-light bg-transparent form-control required" type="email" name="email" placeholder="Your email*" />
                                </div>
                                <div class="position-relative form-group form-textarea mb-0"> 
                                    <textarea class="ps-0 border-radius-0px border-bottom border-color-transparent-dark-very-light bg-transparent form-control" name="comment" placeholder="Your message" rows="2"></textarea>
                                    <span class="form-icon"><i class="bi bi-chat-square-dots icon-small"></i></span>
                                    <input type="hidden" name="phone" value="{{ $package->location }}">
                                    <input type="hidden" name="source" value="package">
                                    <button class="btn btn-medium btn-dark-gray btn-round-edge btn-box-shadow mt-25px w-100" type="submit" aria-label="submit">Send message</button>
                                    <div class="form-results mt-20px d-none"></div>
                                </div>
                            </form>
                            @if(session('success_message'))
                                <div class="alert alert-success">
                                    {{ session('success_message') }}
                                </div>
                            @endif

                            @if(session('error_message'))
                                <div class="alert alert-danger">
                                    {{ session('error_message') }}
                                </div>
                            @endif
                            <img src="{{asset('images/royal-rich-tour-package.jpg')}}" class="position-absolute top-0px right-0px" alt="Top Tour Operator in india" />
                        </div>
                        
                    </div>
                </aside>
                <!-- end sidebar -->
            </div>
        </div>
    </section>
    <!-- end section -->
    <!-- start section -->
    
    <!-- start footer -->
</x-userlayout> 