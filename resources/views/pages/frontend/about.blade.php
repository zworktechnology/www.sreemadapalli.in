@include('layouts.frontend.head')

<!-- dynamic content -->
<div id="sb-dynamic-content" class="sb-transition-fade">

    <!-- banner -->
    <section class="sb-banner sb-banner-sm sb-banner-color" hidden>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- main title -->
                    <div class="sb-main-title-frame">
                        <div class="sb-main-title text-center">
                            <span class="sb-suptitle sb-mb-30">About us</span>
                            <h1 class="sb-mb-30">Sree Madapalli was established <br> in the year 2016</h1>
                            <ul class="sb-breadcrumbs">
                                <li><a href="{{ route('index') }}">Home</a></li>
                                <li><a href="#.">About us</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- main title end -->
                </div>
            </div>
        </div>
    </section>
    <!-- banner end -->

    <!-- About text -->
    <section class="sb-p-90-0">
        <div class="sb-bg-2" style="margin-top: 90px">
            <div></div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="sb-illustration-2 sb-mb-90">
                        <div class="sb-interior-frame">
                            <img src="{{ asset('frontend_styles/image/about/img1.png') }}" alt="interior" class="sb-interior"
                                style="object-position: center">
                        </div>
                        <div class="sb-square"></div>
                        <div class="sb-cirkle-1"></div>
                        <div class="sb-cirkle-2"></div>
                        <div class="sb-cirkle-3"></div>
                        <div class="sb-cirkle-4"></div>
                        <div class="sb-experience">
                            <div class="sb-exp-content">
                                <p class="sb-h3">Since</p>
                                <br>
                                <p class="sb-h1 sb-mb-10">2016</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 align-self-center sb-mb-60">
                    <p class="sb-text sb-mb-30" style="font-size: 19px;">Sree Madapalli was established in the year 2016, with an objective of
                        serving No onion and No Garlic food to all devotees.</p>
                    <p class="sb-text sb-mb-30" style="font-size: 19px;">We design our entire menu on this traditional front.</p>
                    <p class="sb-text sb-mb-30" style="font-size: 19px;">1.    Sree Madapalli is located near to main entrance of the Srirangam temple with ample car parking for great dining.</p>
                    <p class="sb-text sb-mb-30" style="font-size: 19px;">2.    The Meal are served in traditional banana leaves with all divinity.</p>
                    <p class="sb-text sb-mb-30" style="font-size: 19px;">3.    Sree Madapalli also delivers food daily to almost 100+ senior citizens in and around srirangam with our own delivery system at their door steps.</p>
                    <p class="sb-text sb-mb-60" style="font-size: 19px;">4.    Sree Madapalli also serves customised menu for your special requirements.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- About text end -->

    <!-- features -->
    <section class="sb-p-0-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="sb-features-item sb-mb-60">
                        <div class="sb-number">01</div>
                        <div class="sb-feature-text">
                            <h3 class="sb-mb-15">We are located near to main entrance of the srirangam temple</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sb-features-item sb-mb-60">
                        <div class="sb-number">02</div>
                        <div class="sb-feature-text">
                            <h3 class="sb-mb-15">We also serves customised menu for the special requirements.</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sb-features-item sb-mb-60">
                        <div class="sb-number">03</div>
                        <div class="sb-feature-text">
                            <h3 class="sb-mb-15">We delivers food daily to almost 100+ senior citizens in and around srirangam</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- features end -->

    <!-- video -->
    <section class="sb-video">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="sb-mb-90">
                        <span class="sb-suptitle sb-mb-15">Promo video</span>
                        <h2 class="sb-mb-30">Restaurant is like a theater.<br> Our task is to amaze you!</h2>
                        <p class="sb-text sb-mb-30">Repellat, dolorem a. Qui ipsam quos, obcaecati mollitia consectetur
                            ad vero minus neque sit architecto totam distineserunt pariatur adipisci rem aspernatur
                            illum ex!</p>
                        <!-- button -->
                        <a data-fancybox="" data-no-swup href="https://www.youtube.com/watch?v=F3zw1Gvn4Mk"
                            class="sb-btn">
                            <span class="sb-icon">
                                <img src="{{ asset('frontend_styles/img/ui/icons/play.svg') }}" alt="icon">
                            </span>
                            <span>Promo video</span>
                        </a>
                        <!-- button end -->
                    </div>
                </div>
                <div class="col-lg-6 align-self-center">
                    <div class="sb-illustration-7 sb-mb-90">
                        <div class="sb-interior-frame">
                            <img src="{{ asset('frontend_styles/image/about/img2.png') }}" alt="interior" class="sb-interior">
                            <a data-fancybox="" data-no-swup href="https://www.youtube.com/watch?v=F3zw1Gvn4Mk"
                                class="sb-video-play"><i class="fas fa-play"></i></a>
                        </div>
                        <div class="sb-cirkle-1"></div>
                        <div class="sb-cirkle-2"></div>
                        <div class="sb-cirkle-3"></div>
                        <div class="sb-cirkle-4"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- video end -->

    <!-- revievs -->
    <section class="sb-reviews sb-p-0-90">
        <div class="container">
            <div class="sb-group-title sb-mb-30">
                <div class="sb-left sb-mb-30">
                    <h2>Reviews <span>about</span> us</h2>
                </div>
                <div class="sb-right sb-mb-30">
                    <!-- slider navigation -->
                    <div class="sb-slider-nav">
                        <div class="sb-prev-btn sb-reviews-prev"><i class="fas fa-arrow-left"></i></div>
                        <div class="sb-next-btn sb-reviews-next"><i class="fas fa-arrow-right"></i></div>
                    </div>
                    <!-- slider navigation end -->
                </div>
            </div>
            <div class="swiper-container sb-reviews-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="sb-review-card">
                            <div class="sb-review-header sb-mb-15">
                                <h3 class="sb-mb-15">Very tasty</h3>
                                <ul class="sb-stars">
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                </ul>
                            </div>
                            <p class="sb-text sb-mb-15">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis
                                fugiat totam nobis quas unde excepturi inventore possimus laudantium provident, rem
                                eligendi velit. Aut molestias, ipsa itaque laborum, natus
                                tempora, ut soluta animi ducimus dignissimos deserunt doloribus in reprehenderit rem
                                accusamus! Quibusdam labore, aliquam dolor harum!</p>
                            <div class="sb-author-frame">
                                <div class="sb-avatar-frame">
                                    <img src="{{ asset('frontend_styles/img/faces/1.jpg') }}" alt="Guest">
                                </div>
                                <h4>Emma Newman</h4>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="sb-review-card">
                            <div class="sb-review-header sb-mb-15">
                                <h3 class="sb-mb-15">I have lunch here every day</h3>
                                <ul class="sb-stars">
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                </ul>
                            </div>
                            <p class="sb-text sb-mb-15">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis
                                fugiat totam nobis quas unde excepturi inventore possimus laudantium provident, rem
                                eligendi velit. Aut molestias, ipsa itaque laborum, natus
                                tempora, ut soluta animi ducimus dignissimos deserunt doloribus in reprehenderit rem
                                accusamus! Quibusdam labore, aliquam dolor harum!</p>
                            <div class="sb-author-frame">
                                <div class="sb-avatar-frame">
                                    <img src="{{ asset('frontend_styles/img/faces/2.jpg') }}" alt="Guest">
                                </div>
                                <h4>Paul Trueman</h4>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="sb-review-card">
                            <div class="sb-review-header sb-mb-15">
                                <h3 class="sb-mb-15">Great service</h3>
                                <ul class="sb-stars">
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li class="sb-empty"><i class="fas fa-star"></i></li>
                                </ul>
                            </div>
                            <p class="sb-text sb-mb-15">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis
                                fugiat totam nobis quas unde excepturi inventore possimus laudantium provident, rem
                                eligendi velit. Aut molestias, ipsa itaque laborum, natus
                                tempora, ut soluta animi ducimus dignissimos deserunt doloribus in reprehenderit rem
                                accusamus! Quibusdam labore, aliquam dolor harum!</p>
                            <div class="sb-author-frame">
                                <div class="sb-avatar-frame">
                                    <img src="{{ asset('frontend_styles/img/faces/3.jpg') }}" alt="Guest">
                                </div>
                                <h4>Viktoria Freeman</h4>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="sb-review-card">
                            <div class="sb-review-header sb-mb-15">
                                <h3 class="sb-mb-15">Starbelly is amazing!</h3>
                                <ul class="sb-stars">
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                </ul>
                            </div>
                            <p class="sb-text sb-mb-15">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis
                                fugiat totam nobis quas unde excepturi inventore possimus laudantium provident, rem
                                eligendi velit. Aut molestias, ipsa itaque laborum, natus
                                tempora, ut soluta animi ducimus dignissimos deserunt doloribus in reprehenderit rem
                                accusamus! Quibusdam labore, aliquam dolor harum!</p>
                            <div class="sb-author-frame">
                                <div class="sb-avatar-frame">
                                    <img src="{{ asset('frontend_styles/img/faces/4.jpg') }}" alt="Guest">
                                </div>
                                <h4>Audrey Oldman</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- revievs end -->

    <!-- call to action -->
    <section class="sb-call-to-action">
        <div class="sb-bg-3"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="sb-cta-text">
                        <h2 class="sb-h1 sb-mb-30">Home delivery service.</h2>
                        <p class="sb-text sb-mb-30">Feast in the Comfort of Your Home: Divisional's Irresistible Food Delivery Service</p>
                        <!-- button -->
                        <a href="https://api.whatsapp.com/send/?phone=919025166000" class="sb-btn" target="_blank">
                            <span class="sb-icon">
                                <img src="{{ asset('frontend_styles/img/ui/icons/arrow-2.svg') }}" alt="icon">
                            </span>
                            <span>Chat Now</span>
                        </a>
                        <!-- button end -->
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="sb-illustration-3">
                        <img src="{{ asset('frontend_styles/img/illustrations/phones.png') }}" alt="phones" class="sb-phones">
                        <div class="sb-cirkle-1"></div>
                        <div class="sb-cirkle-2"></div>
                        <div class="sb-cirkle-3"></div>
                        <div class="sb-cirkle-4"></div>
                        <img src="{{ asset('frontend_styles/img/illustrations/1.svg') }}" alt="phones" class="sb-pik-1">
                        <img src="{{ asset('frontend_styles/img/illustrations/2.svg') }}" alt="phones" class="sb-pik-2">
                        <img src="{{ asset('frontend_styles/img/illustrations/3.svg') }}" alt="phones" class="sb-pik-3">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- call to action end -->

@include('layouts.frontend.footer')
