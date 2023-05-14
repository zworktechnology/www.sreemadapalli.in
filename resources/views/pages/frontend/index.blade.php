@include('layouts.frontend.head')

<!-- dynamic content -->
<div id="sb-dynamic-content" class="sb-transition-fade">

    <!-- banner -->
    <section class="sb-banner">
        <div class="sb-bg-1">
            <div></div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <!-- main title -->
                    <div class="sb-main-title-frame">
                        <div class="sb-main-title">
                            <span class="sb-suptitle sb-mb-30">Welcome To Sree Madapalli!</span>
                            <h1 class="sb-mb-30">Traditional food to each and every corner</h1>
                            <p class="sb-text sb-text-lg sb-mb-30">Lord Ranganatha is the Head of this House, A Silent
                                Listener in Every Conversation and an Unseen Guest at Every Meal</p>
                            <!-- button -->
                            <a href="{{ route('menu') }}" class="sb-btn">
                                <span class="sb-icon">
                                    <img src="{{ asset('frontend_styles/img/ui/icons/menu.svg') }}" alt="icon">
                                </span>
                                <span>Our menu</span>
                            </a>
                            <!-- button end -->
                            <!-- button -->
                            <a href="{{ route('about') }}" class="sb-btn sb-btn-2 sb-btn-gray">
                                <span class="sb-icon">
                                    <img src="{{ asset('frontend_styles/img/ui/icons/arrow.svg') }}" alt="icon">
                                </span>
                                <span>About us</span>
                            </a>
                            <!-- button end -->
                        </div>
                    </div>
                    <!-- main title end -->
                </div>
                <div class="col-lg-6">
                    <div class="sb-ilustration-fix">
                        <div class="sb-illustration-1-2">
                            <img src="{{ asset('frontend_styles/img/illustrations/1.png') }}" alt="food"
                                class="sb-food-1">
                            <img src="{{ asset('frontend_styles/img/illustrations/2.png') }}" alt="food"
                                class="sb-food-2">
                            <img src="{{ asset('frontend_styles/img/illustrations/3.png') }}" alt="food"
                                class="sb-food-3">
                            <div class="sb-illu-dialog-1"><span>🧄</span> No Garlic...</div>
                            <div class="sb-illu-dialog-2"><span>🧅</span> No Onion...</div>
                            <div class="sb-cirkle-1"></div>
                            <div class="sb-cirkle-2"></div>
                            <div class="sb-cirkle-3"></div>
                            <div class="sb-cirkle-4"></div>
                            <div class="sb-cirkle-5"></div>
                            <img src="{{ asset('frontend_styles/img/illustrations/3.svg') }}" alt="phones"
                                class="sb-pik-1">
                            <img src="{{ asset('frontend_styles/img/illustrations/1.svg') }}" alt="phones"
                                class="sb-pik-2">
                            <img src="{{ asset('frontend_styles/img/illustrations/2.svg') }}" alt="phones"
                                class="sb-pik-3">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner end -->

    <!-- About text -->
    <section class="sb-about-text sb-p-90-0">
        <div class="sb-bg-1" style="margin-top: 90px">
            <div></div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="sb-illustration-2 sb-mb-90">
                        <div class="sb-interior-frame">
                            <img src="{{ asset('frontend_styles/image/home/img1.png') }}" alt="interior"
                                class="sb-interior" style="object-position: center">
                        </div>
                        <div class="sb-square"></div>
                        <div class="sb-cirkle-1"></div>
                        <div class="sb-cirkle-2"></div>
                        <div class="sb-cirkle-3"></div>
                        <div class="sb-cirkle-4"></div>
                        <div class="sb-experience">
                            <div class="sb-exp-content">
                                <p class="sb-h1 sb-mb-10">7</p>
                                <p class="sb-h3">Years Experiense</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 align-self-center sb-mb-60">
                    <h2 class="sb-mb-60">We are doing more than <br>you expect</h2>
                    <p class="sb-text sb-mb-30">Sree Madapalli was established in the year 2016, with an objective of
                        serving No onion and No Garlic food to the yatrikas visitor the srirangam temple.</p>
                    <p class="sb-text sb-mb-30">We design our entire menu on this traditional front.</p>
                    <p class="sb-text sb-mb-30">Sree madapalli is located near to main entrance of the srirangam temple with ample car parking for great dining.</p>
                    <p class="sb-text sb-mb-30">The Meal are served in traditional banana leaves with devotional.</p>
                    <p class="sb-text sb-mb-30">Sree madapalli also delivers food daily to almost 100+ senior citizens in and around srirangam with our own delivery system at throw door steps.</p>
                    <p class="sb-text sb-mb-60">Sree madapalli also serves customised menu for the special requirements.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- About text end -->

    <!-- features -->
    <section class="sb-features sb-p-0-30">
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

    <!-- short menu -->
    <section class="sb-short-menu sb-p-0-90">
        <div class="sb-bg-2">
            <div></div>
        </div>
        <div class="container">
            <div class="sb-group-title sb-mb-30">
                <div class="sb-left sb-mb-30">
                    <h2 class="sb-mb-30">Our <span>Services</h2>
                </div>
                <div class="sb-right sb-mb-30">
                    <!-- slider navigation -->
                    <div class="sb-slider-nav">
                        <div class="sb-prev-btn sb-short-menu-prev"><i class="fas fa-arrow-left"></i></div>
                        <div class="sb-next-btn sb-short-menu-next"><i class="fas fa-arrow-right"></i></div>
                    </div>
                    <!-- slider navigation end -->
                </div>
            </div>
            <div class="swiper-container sb-short-menu-slider-3i">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <a data-fancybox="menu" data-no-swup
                            href="{{ asset('frontend_styles/image/home/img2.png') }}" class="sb-menu-item">
                            <div class="sb-cover-frame">
                                <img src="{{ asset('frontend_styles/image/home/img2.png') }}" alt="product">
                            </div>
                            <div class="sb-card-tp">
                                <h3 class="sb-card-title">Dine In</h3>
                                <div class="sb-price">
                                    <span class="sb-icon">
                                        <img src="{{ asset('frontend_styles/img/ui/icons/arrow.svg') }}"
                                            alt="icon">
                                    </span>
                                </div>
                            </div>
                            <div class="sb-description">
                                <p class="sb-text sb-mb-15">Indulge in Exquisite Culinary Delights: Experience the Art of Fine Dining at Divisional</p>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a data-fancybox="menu" data-no-swup
                            href="{{ asset('frontend_styles/image/home/img3.png') }}" class="sb-menu-item">
                            <div class="sb-cover-frame">
                                <img src="{{ asset('frontend_styles/image/home/img3.png') }}" alt="product">
                            </div>
                            <div class="sb-card-tp">
                                <h3 class="sb-card-title">Outdoor Caterers</h3>
                                <div class="sb-price">
                                    <span class="sb-icon">
                                        <img src="{{ asset('frontend_styles/img/ui/icons/arrow.svg') }}"
                                            alt="icon">
                                    </span>
                                </div>
                            </div>
                            <div class="sb-description">
                                <p class="sb-text sb-mb-15">Elevate Your Celebrations: Experience Unforgettable Outdoor Catering with Divisional</p>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a data-fancybox="menu" data-no-swup
                            href="{{ asset('frontend_styles/image/home/img4.png') }}" class="sb-menu-item">
                            <div class="sb-cover-frame">
                                <img src="{{ asset('frontend_styles/image/home/img4.png') }}" alt="product">
                            </div>
                            <div class="sb-card-tp">
                                <h3 class="sb-card-title">Service Apartment</h3>
                                <div class="sb-price">
                                    <span class="sb-icon">
                                        <img src="{{ asset('frontend_styles/img/ui/icons/arrow.svg') }}"
                                            alt="icon">
                                    </span>
                                </div>
                            </div>
                            <div class="sb-description">
                                <p class="sb-text sb-mb-15">Elevate Your Stay: Experience Unmatched Comfort at Divisional's Service Apartments</p>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a data-fancybox="menu" data-no-swup
                            href="{{ asset('frontend_styles/image/home/img5.png') }}" class="sb-menu-item">
                            <div class="sb-cover-frame">
                                <img src="{{ asset('frontend_styles/image/home/img5.png') }}" alt="product">
                            </div>
                            <div class="sb-card-tp">
                                <h3 class="sb-card-title">Home Delivery</h3>
                                <div class="sb-price">
                                    <span class="sb-icon">
                                        <img src="{{ asset('frontend_styles/img/ui/icons/arrow.svg') }}"
                                            alt="icon">
                                    </span>
                                </div>
                            </div>
                            <div class="sb-description">
                                <p class="sb-text sb-mb-15">Convenience Meets Culinary Delights: Enjoy Divisional's Flawless Food Home Delivery Service</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- short menu end -->

    <!-- revievs -->
    <section class="sb-reviews sb-p-0-90">
        <div class="container">
            <div class="sb-group-title sb-mb-30">
                <div class="sb-left sb-mb-30">
                    <h2 class="sb-mb-30">Reviews <span>about</span> us</h2>
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
                                <h4 class="sb-mb-15">Very tasty</h4>
                                <ul class="sb-stars">
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                </ul>
                            </div>
                            <p class="sb-text sb-mb-15">Lorem ipsum dolor sit amet, consectetur adipisicing
                                elit. Quis fugiat totam nobis quas unde excepturi inventore possimus laudantium
                                provident, rem eligendi velit. Aut molestias, ipsa itaque laborum, natus
                                tempora, ut soluta animi ducimus dignissimos deserunt doloribus in reprehenderit
                                rem accusamus! Quibusdam labore, aliquam dolor harum!</p>
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
                                <h4 class="sb-mb-15">I have lunch here every day</h4>
                                <ul class="sb-stars">
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                </ul>
                            </div>
                            <p class="sb-text sb-mb-15">Lorem ipsum dolor sit amet, consectetur adipisicing
                                elit. Quis fugiat totam nobis quas unde excepturi inventore possimus laudantium
                                provident, rem eligendi velit. Aut molestias, ipsa itaque laborum, natus
                                tempora, ut soluta animi ducimus dignissimos deserunt doloribus in reprehenderit
                                rem accusamus! Quibusdam labore, aliquam dolor harum!</p>
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
                                <h4 class="sb-mb-15">Great service</h4>
                                <ul class="sb-stars">
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li class="sb-empty"><i class="fas fa-star"></i></li>
                                </ul>
                            </div>
                            <p class="sb-text sb-mb-15">Lorem ipsum dolor sit amet, consectetur adipisicing
                                elit. Quis fugiat totam nobis quas unde excepturi inventore possimus laudantium
                                provident, rem eligendi velit. Aut molestias, ipsa itaque laborum, natus
                                tempora, ut soluta animi ducimus dignissimos deserunt doloribus in reprehenderit
                                rem accusamus! Quibusdam labore, aliquam dolor harum!</p>
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
                                <h4 class="sb-mb-15">Starbelly is amazing!</h4>
                                <ul class="sb-stars">
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                </ul>
                            </div>
                            <p class="sb-text sb-mb-15">Lorem ipsum dolor sit amet, consectetur adipisicing
                                elit. Quis fugiat totam nobis quas unde excepturi inventore possimus laudantium
                                provident, rem eligendi velit. Aut molestias, ipsa itaque laborum, natus
                                tempora, ut soluta animi ducimus dignissimos deserunt doloribus in reprehenderit
                                rem accusamus! Quibusdam labore, aliquam dolor harum!</p>
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
                        <h2 class="sb-h1 sb-mb-15">Home delivery service.</h2>
                        <p class="sb-text sb-mb-30">Savor Culinary Delights at Your Doorstep: Divisional's Premier Food Home Delivery Service.</p>
                        <!-- button -->
                        <a href="tel:+919025166000" class="sb-btn">
                            <span class="sb-icon">
                                <img src="{{ asset('frontend_styles/img/ui/icons/arrow-2.svg') }}" alt="icon">
                            </span>
                            <span>Call Now</span>
                        </a>
                        <!-- button end -->
                        <!-- button -->
                        <a href="{{ route('menu') }}" class="sb-btn sb-btn-2 sb-btn-gray">
                            <span class="sb-icon">
                                <img src="{{ asset('frontend_styles/img/ui/icons/menu.svg') }}" alt="icon">
                            </span>
                            <span>Menu</span>
                        </a>
                        <!-- button end -->
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="sb-illustration-8">
                        <img src="{{ asset('frontend_styles/img/illustrations/delivery.png') }}" alt="reserved"
                            class="sb-reserved">
                        <div class="sb-cirkle-1"></div>
                        <div class="sb-cirkle-2"></div>
                        <div class="sb-cirkle-3"></div>
                        <div class="sb-cirkle-4"></div>
                        <div class="sb-cirkle-5"></div>
                        <img src="{{ asset('frontend_styles/img/illustrations/2.svg') }}" alt="icon"
                            class="sb-pik-2">
                        <img src="{{ asset('frontend_styles/img/illustrations/3.svg') }}" alt="icon"
                            class="sb-pik-3">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- call to action end -->

    @include('layouts.frontend.footer')
