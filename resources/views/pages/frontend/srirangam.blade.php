@include('layouts.frontend.head')

<!-- dynamic content -->
<div id="sb-dynamic-content" class="sb-transition-fade">

    <!-- banner -->
    <section class="sb-banner sb-banner-xs sb-banner-color">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- main title -->
                    <div class="sb-main-title-frame">
                        <div class="sb-main-title">
                            <h1 class="sb-h2">Sri Rangam</h1>
                            <ul class="sb-breadcrumbs">
                                <li><a href="{{ route('index') }}">Home</a></li>
                                <li><a href="#.">History</a></li>
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
    <section class="sb-about-text sb-p-90-0">
        <div class="sb-bg-2" style="margin-top: 90px">
            <div></div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="sb-illustration-2 sb-mb-90">
                        <div class="sb-interior-frame">
                            <img src="{{ asset('frontend_styles/image/srirangam/img1.png') }}" alt="interior"
                                class="sb-interior" style="object-position: center">
                        </div>
                        <div class="sb-square"></div>
                        <div class="sb-cirkle-1"></div>
                        <div class="sb-cirkle-2"></div>
                        <div class="sb-cirkle-3"></div>
                        <div class="sb-cirkle-4"></div>
                        <div class="sb-experience">
                            <div class="sb-exp-content">
                                <p class="sb-h3">06:00 AM  09:00 PM</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 align-self-center sb-mb-60">
                    <h2 class="sb-mb-60">Historical Background of <br> Sri Rangam</h2>
                    <p class="sb-text sb-mb-30">Srirangam is an island situated in between the two rivers cauvery and kollidam.</p>
                    <p class="sb-text sb-mb-30">Srirangam is one of the oldest town in india and is mentioned with prominence in all vedic literature.</p>
                    <p class="sb-text sb-mb-30">Two most important temple on vaishnava and shaiva cult are situated in srirangam.</p>
                    <p class="sb-text sb-mb-30">Sree ranganatha swamy temple is the first of the 108 divya desams.</p>
                    <p class="sb-text sb-mb-30">This is the largest operating hindu temple in the world with an area of around 150 areas, This temple has utsavam on all 365 days of the year.</p>
                    <p class="sb-text sb-mb-30">Sree akilandeswari and sree jambukeswarar temple which relates to water in the pancha bootha sthalangal.</p>
                    <p class="sb-text sb-mb-30">Pilgrims from all over the world visit these temples of prominence all throughout the year.</p>
                    <p class="sb-text sb-mb-60">Srirangam is well connected by Air, Rail and Road routes.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- About text end -->

    <!-- menu section 1 -->
    <section class="sb-menu-section sb-p-90-60">
        <div class="sb-bg-1">
            <div></div>
        </div>
        <div class="container">
            <!-- filter -->
            <div class="sb-filter mb-30">
                <a href="#." data-filter="*" class="sb-filter-link sb-active">All</a>
                <a href="#." data-filter=".10" class="sb-filter-link">With in 10 Kms</a>
                <a href="#." data-filter=".20" class="sb-filter-link">With in 20 kms</a>
                <a href="#." data-filter=".more" class="sb-filter-link">More than 20 kms</a>
            </div>
            <!-- filter end -->
            <div class="sb-masonry-grid">
                <div class="sb-grid-sizer"></div>
                <div class="sb-grid-item sb-item-50 10">
                    <div class="sb-menu-item sb-mb-30">
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Ranganatha Swamy Temple, Sri Rangam</h4>
                            <div class="sb-price" style="width: 120px !important">0 kms</div>
                        </div>
                        <div class="sb-description">
                            <p class="sb-text sb-mb-15">Opening Time : 06:00 AM to 09:00 PM</p>
                        </div>
                    </div>
                </div>
                <div class="sb-grid-item sb-item-50 10">
                    <div class="sb-menu-item sb-mb-30">
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Rajagopuram Muneeswaran, Sri Rangam</h4>
                            <div class="sb-price" style="width: 120px !important">0.1 kms</div>
                        </div>
                        <div class="sb-description">
                            <p class="sb-text sb-mb-15">Opening Time : 06:00 AM to 09:00 PM</p>
                        </div>
                    </div>
                </div>
                <div class="sb-grid-item sb-item-50 10">
                    <div class="sb-menu-item sb-mb-30">
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Kaatazhagiza Singaperumal, Sri Rangam</h4>
                            <div class="sb-price" style="width: 120px !important">1 kms</div>
                        </div>
                        <div class="sb-description">
                            <p class="sb-text sb-mb-15">Opening Time : 06:15 AM to 12:00 PM and 05:00 PM to 08:30 PM</p>
                        </div>
                    </div>
                </div>
                <div class="sb-grid-item sb-item-50 10">
                    <div class="sb-menu-item sb-mb-30">
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Jambukeshwarar - Akilandeswari, Thiruvanaikoil</h4>
                            <div class="sb-price" style="width: 120px !important">2 kms</div>
                        </div>
                        <div class="sb-description">
                            <p class="sb-text sb-mb-15">Opening Time : 06:00 AM to 08:00 PM</p>
                        </div>
                    </div>
                </div>
                <div class="sb-grid-item sb-item-50 10">
                    <div class="sb-menu-item sb-mb-30">
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Uthammar Kovil, No.1 Tollgate</h4>
                            <div class="sb-price" style="width: 120px !important">3 kms</div>
                        </div>
                        <div class="sb-description">
                            <p class="sb-text sb-mb-15">Opening Time : 07:00 AM to 12:00 PM and 04:30 PM to 08:00 PM</p>
                        </div>
                    </div>
                </div>
                <div class="sb-grid-item sb-item-50 10">
                    <div class="sb-menu-item sb-mb-30">
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Thayumanavar Swamy Temple, Malaikottai</h4>
                            <div class="sb-price" style="width: 120px !important">5 kms</div>
                        </div>
                        <div class="sb-description">
                            <p class="sb-text sb-mb-15">Opening Time : 05:00 AM to 08:00 PM</p>
                        </div>
                    </div>
                </div>
                <div class="sb-grid-item sb-item-50 10">
                    <div class="sb-menu-item sb-mb-30">
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Uchi Pillaiyar Temple, Malaikottai</h4>
                            <div class="sb-price" style="width: 120px !important">5 kms</div>
                        </div>
                        <div class="sb-description">
                            <p class="sb-text sb-mb-15">Opening Time : 06:00 AM to 08:00 PM</p>
                        </div>
                    </div>
                </div>
                <div class="sb-grid-item sb-item-50 10">
                    <div class="sb-menu-item sb-mb-30">
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Vekkali Amman Temple, Woraiyur</h4>
                            <div class="sb-price" style="width: 120px !important">7 kms</div>
                        </div>
                        <div class="sb-description">
                            <p class="sb-text sb-mb-15">Opening Time : 05:30 AM to 09:00 PM</p>
                        </div>
                    </div>
                </div>
                <div class="sb-grid-item sb-item-50 10">
                    <div class="sb-menu-item sb-mb-30">
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Naciyar Temple, Woraiyur</h4>
                            <div class="sb-price" style="width: 120px !important">7 kms</div>
                        </div>
                        <div class="sb-description">
                            <p class="sb-text sb-mb-15">Opening Time : 06:00 AM to 12:00 PM and 05:00 PM to 08:00 PM</p>
                        </div>
                    </div>
                </div>
                <div class="sb-grid-item sb-item-50 10">
                    <div class="sb-menu-item sb-mb-30">
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Sivan Temple, Thiruvasi</h4>
                            <div class="sb-price" style="width: 120px !important">9 kms</div>
                        </div>
                        <div class="sb-description">
                            <p class="sb-text sb-mb-15">Opening Time : 07:00 AM to 12:00 PM and 04:30 PM to 07:30 PM</p>
                        </div>
                    </div>
                </div>
                <div class="sb-grid-item sb-item-50 10">
                    <div class="sb-menu-item sb-mb-30">
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Mariyamman Temple, Samayapuram</h4>
                            <div class="sb-price" style="width: 120px !important">10 kms</div>
                        </div>
                        <div class="sb-description">
                            <p class="sb-text sb-mb-15">Opening Time : 05:30 AM to 09:00 PM</p>
                        </div>
                    </div>
                </div>
                <div class="sb-grid-item sb-item-50 20">
                    <div class="sb-menu-item sb-mb-30">
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Erumbeeswarar Temple, Thiruverumbur</h4>
                            <div class="sb-price" style="width: 120px !important">13 kms</div>
                        </div>
                        <div class="sb-description">
                            <p class="sb-text sb-mb-15">Opening Time : 07:00 AM to 12:00 PM and 05:30 PM to 09:00 PM</p>
                        </div>
                    </div>
                </div>
                <div class="sb-grid-item sb-item-50 20">
                    <div class="sb-menu-item sb-mb-30">
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Ayyappan Temple, Cantonment</h4>
                            <div class="sb-price" style="width: 120px !important">15 kms</div>
                        </div>
                        <div class="sb-description">
                            <p class="sb-text sb-mb-15">Opening Time : 05:00 AM to 11:00 AM and 05:00 PM to 09:00 PM</p>
                        </div>
                    </div>
                </div>
                <div class="sb-grid-item sb-item-50 20">
                    <div class="sb-menu-item sb-mb-30">
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Pundareekaksha Parumal Temple, Thiruvellarai</h4>
                            <div class="sb-price" style="width: 120px !important">17 kms</div>
                        </div>
                        <div class="sb-description">
                            <p class="sb-text sb-mb-15">Opening Time : 07:00 AM to 01:00 PM and 03:30 PM to 08:00 PM</p>
                        </div>
                    </div>
                </div>
                <div class="sb-grid-item sb-item-50 20">
                    <div class="sb-menu-item sb-mb-30">
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Aadhinayaga Perumai Kovil, Kopurapatti</h4>
                            <div class="sb-price" style="width: 120px !important">17 kms</div>
                        </div>
                        <div class="sb-description">
                            <p class="sb-text sb-mb-15">Opening Time : 05:00 AM to 09:00 AM and 05:00 PM to 08:00 PM</p>
                        </div>
                    </div>
                </div>
                <div class="sb-grid-item sb-item-50 20">
                    <div class="sb-menu-item sb-mb-30">
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Prasanna Venkatachalapathi Kovil, Gunaseelam</h4>
                            <div class="sb-price" style="width: 120px !important">18 kms</div>
                        </div>
                        <div class="sb-description">
                            <p class="sb-text sb-mb-15">Opening Time : 06:30 AM to 12:30 PM and 04:30 PM to 08:30 PM</p>
                        </div>
                    </div>
                </div>
                <div class="sb-grid-item sb-item-50 20">
                    <div class="sb-menu-item sb-mb-30">
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Manakkalnambi, Manakkal</h4>
                            <div class="sb-price" style="width: 120px !important">18 kms</div>
                        </div>
                        <div class="sb-description">
                            <p class="sb-text sb-mb-15">Opening Time : Details Not Available</p>
                        </div>
                    </div>
                </div>
                <div class="sb-grid-item sb-item-50 20">
                    <div class="sb-menu-item sb-mb-30">
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Neelavaneswarar Kovil, Thirupaineeli</h4>
                            <div class="sb-price" style="width: 120px !important">18 kms</div>
                        </div>
                        <div class="sb-description">
                            <p class="sb-text sb-mb-15">Opening Time : 06:30 AM to 01:00 PM and 04:00 PM to 08:00 PM</p>
                        </div>
                    </div>
                </div>
                <div class="sb-grid-item sb-item-50 20">
                    <div class="sb-menu-item sb-mb-30">
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Sundararaja Perumal Temple, Anbil</h4>
                            <div class="sb-price" style="width: 120px !important">20 kms</div>
                        </div>
                        <div class="sb-description">
                            <p class="sb-text sb-mb-15">Opening Time : 07:00 AM to 12:30 PM and 04:00 PM to 08:00 PM</p>
                        </div>
                    </div>
                </div>
                <div class="sb-grid-item sb-item-50 more">
                    <div class="sb-menu-item sb-mb-30">
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Thirunedungula Nathar Temple, Thirunedungalam</h4>
                            <div class="sb-price" style="width: 120px !important">22 kms</div>
                        </div>
                        <div class="sb-description">
                            <p class="sb-text sb-mb-15">Opening Time : 06:30 AM to 12:00 PM and 04:30 PM to 08:00 PM</p>
                        </div>
                    </div>
                </div>
                <div class="sb-grid-item sb-item-50 more">
                    <div class="sb-menu-item sb-mb-30">
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Brahmapureeswarar Temple, Thirupattur</h4>
                            <div class="sb-price" style="width: 120px !important">25 kms</div>
                        </div>
                        <div class="sb-description">
                            <p class="sb-text sb-mb-15">Opening Time : 07:00 AM to 12:00 PM and 04:00 PM to 08:00 PM</p>
                        </div>
                    </div>
                </div>
                <div class="sb-grid-item sb-item-50 more">
                    <div class="sb-menu-item sb-mb-30">
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Murugan Temple, Thinniam</h4>
                            <div class="sb-price" style="width: 120px !important">26 kms</div>
                        </div>
                        <div class="sb-description">
                            <p class="sb-text sb-mb-15">Opening Time : 06:00 AM to 11:00 AM and 04:00 PM to 07:30 PM</p>
                        </div>
                    </div>
                </div>
                <div class="sb-grid-item sb-item-50 more">
                    <div class="sb-menu-item sb-mb-30">
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Bala Dhandayuthabani Temple, Chettikulam</h4>
                            <div class="sb-price" style="width: 120px !important">30 kms</div>
                        </div>
                        <div class="sb-description">
                            <p class="sb-text sb-mb-15">Opening Time : 07:30 AM to 01:00 PM and 04:30 PM to 07:30 PM</p>
                        </div>
                    </div>
                </div>
                <div class="sb-grid-item sb-item-50 more">
                    <div class="sb-menu-item sb-mb-30">
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Appala Rangan Temple, koviladi</h4>
                            <div class="sb-price" style="width: 120px !important">30 kms</div>
                        </div>
                        <div class="sb-description">
                            <p class="sb-text sb-mb-15">Opening Time : 08:00 AM to 12:30 PM and 04:30 PM to 08:00 PM</p>
                        </div>
                    </div>
                </div>
                <div class="sb-grid-item sb-item-50 more">
                    <div class="sb-menu-item sb-mb-30">
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Murugan Temple, Viralimalai</h4>
                            <div class="sb-price" style="width: 120px !important">35 kms</div>
                        </div>
                        <div class="sb-description">
                            <p class="sb-text sb-mb-15">Opening Time : 06:00 AM to 11:00 AM and 04:00 PM to 08:00 PM</p>
                        </div>
                    </div>
                </div>
                <div class="sb-grid-item sb-item-50 more">
                    <div class="sb-menu-item sb-mb-30">
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Murugan Temple, Kumaravayalur</h4>
                            <div class="sb-price" style="width: 120px !important">35 kms</div>
                        </div>
                        <div class="sb-description">
                            <p class="sb-text sb-mb-15">Opening Time : 06:00 AM to 01:00 PM and 03:30 PM to 09:00 PM</p>
                        </div>
                    </div>
                </div>
                <div class="sb-grid-item sb-item-50 more">
                    <div class="sb-menu-item sb-mb-30">
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Aayiram Kanniraindha Perumal, Malayadipatti</h4>
                            <div class="sb-price" style="width: 120px !important">40 kms</div>
                        </div>
                        <div class="sb-description">
                            <p class="sb-text sb-mb-15">Opening Time : Details Not Available</p>
                        </div>
                    </div>
                </div>
                <div class="sb-grid-item sb-item-50 more">
                    <div class="sb-menu-item sb-mb-30">
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Mathurakali Amman Temple, Siruvachur</h4>
                            <div class="sb-price" style="width: 120px !important">45 kms</div>
                        </div>
                        <div class="sb-description">
                            <p class="sb-text sb-mb-15">Opening Time : 06:00 AM to 08:35 PM (Only Monday and Friday)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- menu end -->

    <!-- team -->
    <section class="sb-team sb-p-0-60">
        <div class="sb-bg-2">
            <div></div>
        </div>
        <div class="container">
            <div class="sb-group-title sb-mb-30">
                <div class="sb-left sb-mb-30">
                    <h2 class="sb-cate-title sb-mb-30">Near by<span> best</span> stay</h2>
                </div>
                <div class="sb-right sb-mb-30">
                    <!-- button -->
                    <a href="{{ route('contact') }}" class="sb-btn sb-m-0">
                        <span class="sb-icon">
                            <img src="{{ asset('frontend_styles/img/ui/icons/arrow-2.svg') }}" alt="icon">
                        </span>
                        <span>Contact now</span>
                    </a>
                    <!-- button end -->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="sb-team-member sb-mb-30">
                        <div class="sb-photo-frame sb-mb-15">
                            <img src="{{ asset('frontend_styles/image/srirangam/img2.png') }}" alt="Team member">
                        </div>
                        <div class="sb-member-description">
                            <h4 class="sb-mb-10">Yatri Nivas</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="sb-team-member sb-mb-30">
                        <div class="sb-photo-frame sb-mb-15">
                            <img src="{{ asset('frontend_styles/image/srirangam/img2.png') }}" alt="Team member">
                        </div>
                        <div class="sb-member-description">
                            <h3 class="sb-mb-10">Sri Maruti Inn</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="sb-team-member sb-mb-30">
                        <div class="sb-photo-frame sb-mb-15">
                            <img src="{{ asset('frontend_styles/image/srirangam/img2.png') }}" alt="Team member">
                        </div>
                        <div class="sb-member-description">
                            <h3 class="sb-mb-10">Sri Haygriva</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="sb-team-member sb-mb-30">
                        <div class="sb-photo-frame sb-mb-15">
                            <img src="{{ asset('frontend_styles/image/srirangam/img2.png') }}" alt="Team member">
                        </div>
                        <div class="sb-member-description">
                            <h3 class="sb-mb-10">Grand Arcadia</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- team end -->

    <!-- call to action -->
    <section class="sb-call-to-action">
        <div class="sb-bg-3"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="sb-cta-text">
                        <h2 class="sb-h1 sb-mb-15">Home delivery service.</h2>
                        <p class="sb-text sb-mb-30">A Taste of Excellence, Delivered: Divisional's Unparalleled Food Delivery Experience</p>
                        <!-- button -->
                        <a href="tel:+919025166000" class="sb-btn">
                            <span class="sb-icon">
                                <img src="{{ asset('frontend_styles/img/ui/icons/arrow-2.svg') }}" alt="icon">
                            </span>
                            <span>Call Now</span>
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
