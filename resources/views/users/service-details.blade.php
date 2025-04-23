<x-userlayout>
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
    <section class="overlap-section text-center p-0 sm-pt-30px">
        <img class="rounded-circle box-shadow-extra-large w-130px h-130px border border-8 border-color-white" src="{{asset('images/logo/favicon.png')}}" alt=""> 
    </section>
    <!-- end section -->
    <!-- start section -->
    <section class="half-section pb-0">
        <div class="container">
            <div class="row justify-content-center" data-anime='{ "el": "childs", "translateY": [50, 0], "opacity": [0,1], "duration": 1200, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                <div class="mb-6 col-lg-6">
                    <img src="{{ asset('storage/services/'.$service->image) }}" alt="{{ $service->name }}" style="width: 400px;height: 600px;">
                </div>
                <div class="col-lg-6 last-paragraph-no-margin">
                    <h6 class="alt-font fw-500 text-dark-gray mb-15px">{{ $service->name }}</h6>
                    <p>{{ $service->description }}.</p>
                </div>
            </div>
        </div>
        
        <div class="col-lg-12" data-anime='{ "translateY": [0, 0], "opacity": [0,1], "duration": 1200, "delay": 100, "staggervalue": 150, "easing": "easeOutQuad" }'>
                        <div class="">
                            
                            <div class="col contact-form-style-03 bg-white p-70px lg-p-35px">
                                <h3 class="fw-600 alt-font text-dark-gray ls-minus-1px mb-25px">More enquiry, drop a message here..</h3>
                                <form action="{{ route('send.email') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                    <div class="position-relative form-group mb-10px">
                                        <span class="form-icon"><i class="bi bi-emoji-smile"></i></span>
                                        <input class="ps-0 border-radius-0px border-color-extra-medium-gray form-control required" type="text" name="name" placeholder="What's your good name?*" />
                                    </div>
                                    
                                    <div class="position-relative form-group mb-10px">
                                        <span class="form-icon"><i class="bi bi-telephone"></i></span>
                                        <input class="ps-0 border-radius-0px border-bottom border-color-extra-medium-gray form-control" type="tel" name="phone" placeholder="Enter your phone number" />
                                    </div>
                                    <div class="position-relative form-group form-textarea mt-15px mb-10px xs-mb-0"> 
                                        <textarea class="ps-0 border-radius-0px border-bottom border-color-extra-medium-gray form-control" name="comment" placeholder="Describe about your query" rows="3"></textarea>
                                        <span class="form-icon"><i class="bi bi-chat-square-dots"></i></span>
                                        <input type="hidden" name="email" value="{{ $service->name }}">
                                        <input type="hidden" name="source" value="service">
                                        <button class="btn btn-medium btn-dark-gray btn-box-shadow btn-round-edge mt-30px" type="submit" aria-label="submit">Send message</button>
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
                            </div>
                        </div>
                    </div>
    </section>
    <!-- end section -->
    <!-- start footer -->
</x-userlayout> 