<!doctype html>
<html class="no-js" lang="en">
    <head>
        @php
            use Illuminate\Support\Str;
            
            $isServiceDetails = request()->routeIs('users.servicedetails');
            $isPackageDetails = request()->routeIs('users.packagedetails');
            $firstPart = Str::of($metadata->title)->before('|');

            $item = $isServiceDetails && isset($service) ? $service : ($isPackageDetails && isset($package) ? $package : null);

            if ($item) {
                $pageTitle = trim($firstPart . ' | ' . ($item->name ?? ''));
                $pageDescription = $item->description ?? '';
                $pageImage = asset('storage/' . ($isServiceDetails ? 'services' : 'packages') . '/' . ($item->image ?? ''));
            } else {
                $pageTitle = $metadata->title;
                $pageDescription = $metadata->desciption; 
                $pageImage = asset('storage/meta_datas/' . $metadata->og_image);
            }
        @endphp
        <title>{{ $pageTitle }}</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="author" content="Apex Soft Labs">
        <meta name="viewport" content="width=device-width,initial-scale=1.0" />
        <meta name="description" content="{{ $pageDescription }}">
        <meta name="keywords" content="{{ $metadata->keyword }}">
        <meta name="robots" content="index, follow">
        <link rel="canonical" href="{{ url()->current() }}" />
        
        <meta property="og:title" content="{{ $pageTitle }}" />
        <meta property="og:description" content="{{ $pageDescription }}" />
        <meta property="og:image" content="{{ $pageImage }}" />
        <meta property="og:url" content="{{ url()->current() }}" />
        <meta property="og:type" content="website" />
        <!-- favicon icon -->
        <link rel="shortcut icon" href="{{asset('images/logo/favicon.png')}}">
        <link rel="apple-touch-icon" href="{{asset('images/logo/favicon.png')}}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{asset('images/logo/favicon.png')}}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{asset('images/logo/favicon.png')}}">
        <!-- google fonts preconnect -->
        <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <!-- slider revolution CSS files -->
        <link rel="stylesheet" type="text/css" href="{{asset('revolution/css/settings.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('revolution/css/layers.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('revolution/css/navigation.css')}}">
        <!-- style sheets and font icons  -->
        <link rel="stylesheet" href="{{asset('css/vendors.min.css')}}"/>
        <link rel="stylesheet" href="{{asset('css/icon.min.css')}}"/>
        <link rel="stylesheet" href="{{asset('css/style.css')}}"/>
        <link rel="stylesheet" href="{{asset('css/responsive.css')}}"/>
        <link rel="stylesheet" href="{{asset('demos/travel-agency/travel-agency.css')}}" />
    </head>
    <body data-mobile-nav-style="classic">  
        <!-- start header -->
        <header class="header-with-topbar">
            <div class="header-top-bar top-bar-light bg-white md-border-bottom border-color-transparent-dark-very-light disable-fixed">
                <div class="container-fluid">
                    <div class="row h-45px align-items-center m-0">
                        <div class="col-xl-4 position-relative text-center elements-social social-text-style-08 ">
                            <ul class="small-icon dark">
                            <li><a class="facebook" href="{{ $contact->facebook }}" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                            <li><a class="dribbble" href="{{ $contact->youtube }}" target="_blank"><i class="fa-brands fa-youtube"></i></a></li>
                            <li><a class="instagram" href="{{ $contact->instagram }}" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
                            <li><a class="twitter" href="{{ $contact->x }}" target="_blank"><i class="fa-brands fa-x-twitter"></i></a></li> 
                        </ul> 
                        </div>
                        <div class="col-xl-8 text-end d-none d-lg-flex">
                            <a href="tel:02228899900" class="widget fs-15 text-dark-gray text-dark-gray-hover">
                                <a class="widget fs-15 text-dark-gray text-dark-gray-hover">
                                @php
                                    $phones = is_array($contact->phones) ? $contact->phones : json_decode($contact->phones ?? '[]', true);
                                @endphp
                                <i class="feather icon-feather-phone-call text-base-color"></i>
                                @foreach ($phones as $index => $phone)
                                {{ $phone }} @if (!$loop->last) || @endif
                                @endforeach</a>
                            <div class="widget fs-15 ms-30px text-dark-gray d-none d-xl-inline-block"><i class="feather icon-feather-mail text-base-color"></i> {{ $contact->email }}</div> 
                        </div>
                    </div>
                </div>
            </div>
            <!-- start navigation -->
            <nav class="navbar navbar-expand-lg header-transparent bg-transparent border-bottom border-color-transparent-white-light disable-fixed">
                <div class="container-fluid">
                    <div class="col-auto col-lg-4 me-auto">
                        <a class="navbar-brand" href="{{ route('users.home') }}">
                            <img src="{{asset('images/logo/logo.png')}}" data-at2x="{{asset('images/logo/logo.png')}}" alt="Royal Rich Air Travels" class="default-logo">
                            <img src="{{asset('images/logo/logo.png')}}" data-at2x="{{asset('images/logo/logo.png')}}" alt="Royal Rich Air Travels" class="alt-logo">
                            <img src="{{asset('images/logo/logo.png')}}" data-at2x="{{asset('images/logo/logo.png')}}" alt="Royal Rich Air Travels" class="mobile-logo"> 
                        </a>
                    </div>
                    <div class="col-auto col-lg-8 menu-order position-static">
                        <button class="navbar-toggler float-start" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-label="Toggle navigation">
                            <span class="navbar-toggler-line"></span>
                            <span class="navbar-toggler-line"></span>
                            <span class="navbar-toggler-line"></span>
                            <span class="navbar-toggler-line"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-center" id="navbarNav"> 
                            <ul class="navbar-nav alt-font text-uppercase"> 
                                <li class="nav-item"><a href="{{ route('users.home') }}" class="nav-link">Home</a></li>
                                <li class="nav-item"><a href="{{ route('users.aboutus') }}" class="nav-link">About us</a></li>
                                <li class="nav-item dropdown dropdown-with-icon">
                                    <a href="{{ route('users.services') }}" class="nav-link">Services</a>
                                    <i class="fa-solid fa-angle-down dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"></i>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        @if ($services->isNotEmpty())    
                                            @foreach ($services as $ser)
                                            <li>
                                                <a href="{{ route('users.servicedetails', $ser->slug) }}">
                                                    <div class="submenu-icon-content">{{ $ser['name'] }}</div>
                                                </a>
                                            </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </li>
                                <li class="nav-item"><a href="{{ route('users.packages') }}" class="nav-link">Packages</a></li>
                                <li class="nav-item"><a href="{{ route('users.contactus') }}" class="nav-link">Contact us</a></li>
                            </ul>
                        </div>
                    </div>
                    
        </header>

        {{$slot}}
        
        <footer class="bg-light-gray pb-40px" style="padding-top: 10px;">
            <div class="container">
                <!--<div class="row mb-2 md-mb-4 overlap-section" data-anime='{ "el": "childs", "translateY": [-15, 0], "scale": [0.5, 1], "opacity": [0,1], "duration": 800, "delay": 300, "staggervalue": 300, "easing": "easeOutQuad" }'>-->
                <!--    <div class="col-12 text-center">-->
                <!--        <img class="rounded-circle" src="images/logo/favicon.png" alt="" style="width: 200px; height: 200px; margin-top: 0px;"/>-->
                <!--    </div>-->
                <!--</div> -->
                <!-- start subscribe item -->
                <div class="row justify-content-center mb-6 md-mb-8 xs-mb-40px" >
                    <div class="col-xl-6 text-center lg-mt-10px sm-mt-0 sm-mb-15px order-1 order-xl-2 order-md-3"> 
                        <ul class="footer-navbar"> 
                        	<li class="nav-item"><a href="{{ route('users.home') }}" class="nav-link">Home</a></li>
                            <li class="nav-item"><a href="{{ route('users.aboutus') }}" class="nav-link">About us</a></li>
                            <li class="nav-item"><a href="{{ route('users.services') }}" class="nav-link">Services</a></li>
                            <li class="nav-item"><a href="{{ route('users.packages') }}" class="nav-link">Packages</a></li>
                            <li class="nav-item"><a href="{{ route('users.contactus') }}" class="nav-link">Contact us</a></li>
                        </ul>
                    </div>
                </div>
                <!-- end subscribe item -->
                
                <div class="row align-items-center" style="
    margin-top: -50px;
">
                    <div class="col-xl-3 col-sm-6 text-center text-sm-start last-paragraph-no-margin fs-15 text-dark-gray order-3 order-md-1"> 
                        <p>&COPY; Copyright <script type="text/javascript">var year = new Date();document.write(year.getFullYear());</script> <a href="https://royalrichtravel.in" target="_blank" class="text-dark-gray text-dark-gray-hover text-decoration-line-bottom fw-600">Royal Rich</a></p>
                    </div>
                    
                    <div class="col-xl-6 col-sm-6 position-relative text-center elements-social social-text-style-08 order-2 order-xl-3 xs-mb-10px"> 
                        <ul class="small-icon dark">
                            <li><a class="facebook" href="{{ $contact->facebook }}" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                            <li><a class="dribbble" href="{{ $contact->youtube }}" target="_blank"><i class="fa-brands fa-youtube"></i></a></li>
                            <li><a class="instagram" href="{{ $contact->instagram }}" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
                            <li><a class="twitter" href="{{ $contact->x }}" target="_blank"><i class="fa-brands fa-x-twitter"></i></a></li> 
                        </ul>  
                    </div>
                    <div class="col-xl-3 col-sm-6 text-center text-sm-end last-paragraph-no-margin fs-15 text-dark-gray order-3 order-md-3	"> 
                        <p>Powered by <a href="https://apexsoftlabs.com" target="_blank" class="text-dark-gray text-dark-gray-hover text-decoration-line-bottom fw-600">Apex Soft Labs</a></p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end footer -->
        <!-- start scroll progress -->
        <div class="scroll-progress d-none d-xxl-block">
            <a href="#" class="scroll-top" aria-label="scroll">
                <span class="scroll-text">Scroll</span><span class="scroll-line"><span class="scroll-point"></span></span>
            </a>
        </div>
        <!-- end scroll progress -->
        <!-- javascript libraries -->
        <script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/vendors.min.js')}}"></script>
        <!-- slider revolution core javaScript files -->
        <script type="text/javascript" src="{{asset('revolution/js/jquery.themepunch.tools.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('revolution/js/jquery.themepunch.revolution.min.js')}}"></script>

        <!-- slider revolution extension scripts. ONLY NEEDED FOR LOCAL TESTING -->
        <script type="text/javascript" src="{{asset('revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('revolution/js/extensions/revolution.extension.carousel.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('revolution/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('revolution/js/extensions/revolution.extension.migration.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('revolution/js/extensions/revolution.extension.parallax.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('revolution/js/extensions/revolution.extension.video.min.js')}}"></script>
        <!-- Slider Revolution add on files -->
        <script type='text/javascript' src='{{asset('revolution/revolution-addons/particles/js/revolution.addon.particles.min.js?ver=1.0.3')}}'></script>
        <!-- Slider's main "init" script -->
        <script type="text/javascript">

            /* https://learn.jquery.com/using-jquery-core/document-ready/ */
            jQuery(document).ready(function () {

                /* initialize the slider based on the Slider's ID attribute from the wrapper above */
                jQuery('#travel-agency-slider').show().revolution({
                    sliderType: "standard",
                    /* options are 'auto', 'fullwidth' or 'fullscreen' */
                    sliderLayout: 'fullscreen',
                    /* sets the Slider's default timeline */
                    delay: 9000,
                    /* options that disable autoplay */
                    stopLoop: "off",
                    stopAfterLoops: 0,
                    stopAtSlide: 1,
                    navigation: {

                        keyboardNavigation: 'on',
                        keyboard_direction: 'horizontal',
                        mouseScrollNavigation: 'off',
                        mouseScrollReverse: 'reverse',
                        onHoverStop: 'off',
                        touch: {
                            touchenabled: 'on',
                            touchOnDesktop: "on",
                            swipe_threshold: 75,
                            swipe_min_touches: 1,
                            swipe_direction: 'horizontal',
                            drag_block_vertical: true
                        },
                        arrows: {

                            enable: true,
                            style: 'hesperiden',
                            tmp: '',
                            rtl: false,
                            hide_onleave: false,
                            hide_onmobile: true,
                            hide_under: 0,
                            hide_over: 9999,
                            hide_delay: 200,
                            hide_delay_mobile: 1200,

                            left: {
                                container: 'slider',
                                h_align: 'left',
                                v_align: 'center',
                                h_offset: 30,
                                v_offset: 0
                            },

                            right: {
                                container: 'slider',
                                h_align: 'right',
                                v_align: 'center',
                                h_offset: 30,
                                v_offset: 0
                            }

                        }
                    },
                    responsiveLevels: [1240, 1024, 778, 480],
                    /* [DESKTOP, LAPTOP, TABLET, SMARTPHONE] */
                    gridwidth: [1190, 1024, 778, 480],
                    /* [DESKTOP, LAPTOP, TABLET, SMARTPHONE] */
                    gridheight: [900, 920, 700, 650],
                    /* Lazy Load options are "all", "smart", "single" and "none" */
                    lazyType: "smart",
                    spinner: "spinner0",
                    parallax: {
                        type: "mouse",
                        origo: "slidercenter",
                        speed: 1000,
                        speedbg: 1500,
                        speedls: 1000,
                        levels: [3, 5, 8, 10, 12, 15, 35, 40, 45, 50, -50, -45, -40, -35, -30, -25],
                        ddd_shadow: "on",
                        ddd_bgfreeze: "off",
                        ddd_overflow: "hidden",
                        ddd_layer_overflow: "visible",
                        ddd_z_correction: 40,
                        disable_onmobile: 'on'
                    },
                    shadow: 0,
                    shuffle: "off",
                    autoHeight: "on",
                    fullScreenAutoWidth: "off",
                    fullScreenAlignForce: "off",
                    fullScreenOffsetContainer: "",
                    fullScreenOffset: "",
                    disableProgressBar: "on",
                    hideThumbsOnMobile: "on",
                    hideSliderAtLimit: 0,
                    hideCaptionAtLimit: 0,
                    hideAllCaptionAtLilmit: 0,
                    debugMode: false,
                    fallbacks: {
                        simplifyAll: "off",
                        nextSlideOnWindowFocus: "off",
                        disableFocusListener: false,
                    }
                });
            }); /*ready*/

        </script>

        <script type="text/javascript" src="{{asset('js/main.js')}}"></script>
    </body>
</html>