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
    <section class="overlap-section text-center p-0 sm-pt-30px">
        <img class="rounded-circle box-shadow-extra-large w-130px h-130px border border-8 border-color-white" src="{{asset('images/logo/favicon.png')}}" alt=""> 
    </section>
    <!-- end section -->
    <!-- start section -->
    <section class="half-section pb-0">
        <div class="container">
            <div class="row justify-content-center" data-anime='{ "el": "childs", "translateY": [50, 0], "opacity": [0,1], "duration": 1200, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                <div class="mb-6 col-lg-6">
                    <img src="{{ asset('storage/services/'.$service->image) }}" alt="">
                </div>
                <div class="col-lg-6 last-paragraph-no-margin">
                    <h6 class="alt-font fw-500 text-dark-gray mb-15px">{{ $service->name }}</h6>
                    <p>{{ $service->description }}.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->
    <!-- start footer -->
</x-userlayout> 