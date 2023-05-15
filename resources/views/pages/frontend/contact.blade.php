@include('layouts.frontend.head')

<!-- dynamic content -->
<div id="sb-dynamic-content" class="sb-transition-fade">

    <!-- banner -->
    <section class="sb-banner sb-banner-color">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <!-- main title -->
                    <div class="sb-main-title-frame">
                        <div class="sb-main-title">
                            <span class="sb-suptitle sb-mb-30">Contact</span>
                            <h1 class="sb-mb-30">Get in <span>Touch with Starbelly</span></h1>
                            <p class="sb-text sb-text-lg sb-mb-30">Consectetur numquam poro nemo veniam<br>eligendi rem
                                adipisci quo modi.</p>
                            <ul class="sb-breadcrumbs">
                                <li><a href="{{ route('index') }}">Home</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- main title end -->
                </div>
                <div class="col-lg-5">
                    <div class="sb-contact-form-frame">
                        <div class="sb-illustration-9">
                            <img src="{{ asset('frontend_styles/img/illustrations/envelope-1.png') }}" alt="envelope" class="sb-envelope-1">
                            <img src="{{ asset('frontend_styles/img/illustrations/envelope-2.png') }}" alt="envelope" class="sb-envelope-2">
                            <div class="sb-cirkle-1"></div>
                            <div class="sb-cirkle-2"></div>
                            <div class="sb-cirkle-3"></div>
                        </div>
                        <div class="sb-form-content">
                            <div class="sb-main-content">
                                <h3 class="sb-mb-30">Send Message</h3>
                                <form id="form">
                                    <div class="sb-group-input">
                                        <input type="text" name="name" required>
                                        <span class="sb-bar"></span>
                                        <label>Name</label>
                                    </div>
                                    <div class="sb-group-input">
                                        <input type="email" name="email" required>
                                        <span class="sb-bar"></span>
                                        <label>Email</label>
                                    </div>
                                    <div class="sb-group-input">
                                        <textarea name="text" required></textarea>
                                        <span class="sb-bar"></span>
                                        <label>Message</label>
                                    </div>
                                    <p class="sb-text sb-text-xs sb-mb-30">*We promise not to disclose your <br>personal
                                        information to third parties.</p>
                                    <!-- button -->
                                    <button class="sb-btn sb-cf-submit sb-show-success">
                                        <span class="sb-icon">
                                            <img src="{{ asset('frontend_styles/img/ui/icons/arrow.svg') }}" alt="icon">
                                        </span>
                                        <span>Send</span>
                                    </button>
                                    <!-- button end -->
                                </form>
                            </div>
                            <div class="sb-success-result">
                                <img src="img/ui/success.jpg" alt="success" class="sb-mb-15">
                                <div class="sb-success-title sb-mb-15">Success!</div>
                                <p class="sb-text sb-mb-15">Your message has been sent <br>successfully</p>
                                <!-- button -->
                                <a href="home-1.html" class="sb-btn sb-btn-2">
                                    <span class="sb-icon">
                                        <img src="img/ui/icons/arrow-2.svg" alt="icon">
                                    </span>
                                    <span>Back to home</span>
                                </a>
                                <!-- button end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner end -->

    <!-- contact info -->
    <section class="sb-p-90-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="sb-features-item sb-mb-60">
                        <div class="sb-number">01</div>
                        <div class="sb-feature-text">
                            <h3 class="sb-mb-15">Welcome</h3>
                            <p class="sb-text">No. 145, S Chitra St, Sriramapuram, Srirangam, Tiruchirappalli.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sb-features-item sb-mb-60">
                        <div class="sb-number">02</div>
                        <div class="sb-feature-text">
                            <h3 class="sb-mb-15">Call</h3>
                            <p class="sb-text">+91 90251 66000</p>
                            <p class="sb-text">+91 7200 72 7200</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sb-features-item sb-mb-60">
                        <div class="sb-number">03</div>
                        <div class="sb-feature-text">
                            <h3 class="sb-mb-15">Write</h3>
                            <p class="sb-text">info@sreemadapalli.in</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact info end -->

    <!-- map -->
    <div class="sb-map-frame">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.364373814002!2d78.68837220998743!3d10.859866089249405!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3baaf6771c7a63c3%3A0xd9c7e2675128f463!2sSree%20Madapalli!5e0!3m2!1sen!2sin!4v1683905937073!5m2!1sen!2sin" style="border:0; height: 550px; width: 100%;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <!-- map end -->

@include('layouts.frontend.footer')
