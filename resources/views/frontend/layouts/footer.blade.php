<div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn text-left" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-4 col-md-12">
                <h5 class="text-white mb-4">Quick Links</h5>
                <a class="btn btn-link text-white-50" href="/about-us">About Us</a>
                <a class="btn btn-link text-white-50" href="/contact-us">Contact Us</a>
                <a class="btn btn-link text-white-50" href="/our-services">Our Services</a>
                <a class="btn btn-link text-white-50" href="/privacy-policy">Privacy Policy</a>
                <a class="btn btn-link text-white-50" href="/terms-and-condition">Terms & Condition</a>
            </div>
            <div class="col-lg-4 col-md-12">
                <h5 class="text-white mb-4">Contact</h5>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>
                    {{ $generalSetting->location }}
                </p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>{{ $generalSetting->phone }}</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>{{ $generalSetting->email }}</p>
                <div class="d-flex pt-2">
                    <a class="btn btn-outline-light btn-social" href="{{ $generalSetting->twitter_link }}"><i
                            class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social" href="{{ $generalSetting->facebook_link }}"><i
                            class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social" href="{{ $generalSetting->youtube_link }}"><i
                            class="fab fa-youtube"></i></a>
                    <a class="btn btn-outline-light btn-social" href="{{ $generalSetting->linkedin_link }}"><i
                            class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <h5 class="text-white mb-4">Newsletter</h5>
                <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                <div class="position-relative mx-auto" style="max-width: 400px">
                    <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text"
                           placeholder="Your email"/>
                    <button type="button"
                            class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">
                        SignUp
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="copyright">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="/">eJobs</a>, All Right Reserved.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <div class="footer-menu">
                        <a href="/">Home</a>
                        <a href="/help">Help</a>
                        <a href="/fqas">FQAs</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
