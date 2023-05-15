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
                <div class="col-lg-8">
                    <!-- main title -->
                    <div class="sb-main-title-frame">
                        <div class="sb-main-title">
                            <span class="sb-suptitle sb-mb-30">Welcome To Sree Madapalli!</span>
                            <h2 class="sb-mb-30" style="font-size: 25px;">Lord Ranganatha is the Head of this House,</h2>
                            <h2 class="sb-mb-30" style="font-size: 25px;">A Silent Listener in Every Conversation and an Unseen Guest at Every Meal</h2>
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
                <div class="col-lg-4">
                    <div class="sb-ilustration-fix">
                        <div class="sb-illustration-1-2">
                            <img src="{{ asset('frontend_styles/image/home/img9.png') }}" alt="food"
                                class="sb-food-1">
                            <img src="{{ asset('frontend_styles/image/home/img7.png') }}" alt="food"
                                class="sb-food-2">
                            {{-- <img src="{{ asset('frontend_styles/image/home/img8.png') }}" alt="food"
                                class="sb-food-3"> --}}
                            {{-- <div class="sb-illu-dialog-1"><span>🧄</span> No Garlic...</div> --}}
                            {{-- <div class="sb-illu-dialog-2"><span>🧅</span> No Onion...</div> --}}
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
                        <div class="sb-interior-frame" style="margin-left: 100px;">
                            <img src="{{ asset('frontend_styles/image/home/img9.png') }}" alt="interior"
                                class="sb-interior" style="object-position: center">
                        </div>
                        <div class="sb-square"></div>
                        <div class="sb-cirkle-1"></div>
                        <div class="sb-cirkle-2"></div>
                        <div class="sb-cirkle-3"></div>
                        <div class="sb-cirkle-4"></div>
                    </div>
                </div>
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
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About text end -->

    <!-- features -->
    <section class="sb-features sb-p-0-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="sb-illustration-2 sb-mb-90">
                        <div class="sb-interior-frame">
                            <img src="{{ asset('frontend_styles/image/home/img11.png') }}" alt="interior"
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
                    <p class="sb-text sb-mb-30" style="font-size: 19px;">Srirangam is an island situated in between the two rivers Cauvery and Kollidam.</p>
                    <p class="sb-text sb-mb-30" style="font-size: 19px;">Srirangam is one of the oldest town in india and is mentioned with prominence in all vedic literature.</p>
                    <p class="sb-text sb-mb-30" style="font-size: 19px;">Two most important temple on vaishnava and shaiva cult are situated in srirangam.</p>
                    <p class="sb-text sb-mb-30" style="font-size: 19px;">1.   Sree Ranganatha Swamy temple is the first of the 108 divya desams. This is the largest living hindu temple in the world with an area of around 150 acres, This temple has utsavam all round the year.</p>
                    <p class="sb-text sb-mb-30" style="font-size: 19px;">2.   Sree Akilandeswari samedha Sree Jambukeswarar temple which relates to water in the pancha bootha sthalangal.</p>
                    <p class="sb-text sb-mb-30" style="font-size: 19px;">Pilgrims from all over the world visit these temples of prominence all through the year.</p>
                    <p class="sb-text sb-mb-30" style="font-size: 19px;">Srirangam is well connected by Air, Rail and Road routes.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- features end -->

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
                            <div class="sb-price" style="width: 120px !important; background-color: #1F0E72; color: white;">0 kms</div>
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
                            <div class="sb-price" style="width: 120px !important; background-color: #E712D3; color: white;">0.1 kms</div>
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
                            <div class="sb-price" style="width: 120px !important; background-color: #FF0000; color: white;" >1 kms</div>
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
                            <div class="sb-price" style="width: 120px !important; background-color: #40D71E; color: white;">2 kms</div>
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
                            <div class="sb-price" style="width: 120px !important; background-color: #1F0E72; color: white;">3 kms</div>
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
                            <div class="sb-price" style="width: 120px !important; background-color: #40D71E; color: white;">5 kms</div>
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
                            <div class="sb-price" style="width: 120px !important; background-color: #10DFF0; color: white;">5 kms</div>
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
                            <div class="sb-price" style="width: 120px !important; background-color: #FFC300; color: white;">7 kms</div>
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
                            <div class="sb-price" style="width: 120px !important; background-color: #1F0E72; color: white;">7 kms</div>
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
                            <div class="sb-price" style="width: 120px !important; background-color: #40D71E; color: white;">9 kms</div>
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
                            <div class="sb-price" style="width: 120px !important; background-color: #FFC300; color: white;">10 kms</div>
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
                            <div class="sb-price" style="width: 120px !important; background-color: #40D71E; color: white;">13 kms</div>
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
                            <div class="sb-price" style="width: 120px !important; background-color: #FF49AC; color: white;">15 kms</div>
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
                            <div class="sb-price" style="width: 120px !important; background-color: #1F0E72; color: white;">17 kms</div>
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
                            <div class="sb-price" style="width: 120px !important; background-color: #1F0E72; color: white;">17 kms</div>
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
                            <div class="sb-price" style="width: 120px !important; background-color: #1F0E72; color: white;">18 kms</div>
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
                            <div class="sb-price" style="width: 120px !important; background-color: #49FFD0; color: white;">18 kms</div>
                        </div>
                        <div class="sb-description">
                            <p class="sb-text sb-mb-15">Opening Time : 08:00 AM to 12:00 AM and 04:00 PM to 06:00 PM</p>
                        </div>
                    </div>
                </div>
                <div class="sb-grid-item sb-item-50 20">
                    <div class="sb-menu-item sb-mb-30">
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Neelavaneswarar Kovil, Thirupaineeli</h4>
                            <div class="sb-price" style="width: 120px !important; background-color: #40D71E; color: white;">18 kms</div>
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
                            <div class="sb-price" style="width: 120px !important; background-color: #1F0E72; color: white;">20 kms</div>
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
                            <div class="sb-price" style="width: 120px !important; background-color: #40D71E; color: white;">22 kms</div>
                        </div>
                        <div class="sb-description">
                            <p class="sb-text sb-mb-15">Opening Time : 06:30 AM to 12:00 PM and 04:30 PM to 08:00 PM</p>
                        </div>
                    </div>
                </div>
                <div class="sb-grid-item sb-item-50 more">
                    <div class="sb-menu-item sb-mb-30">
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Murugan Temple, Kumara vayalur</h4>
                            <div class="sb-price" style="width: 120px !important; background-color: #D649FF; color: white;">25 kms</div>
                        </div>
                        <div class="sb-description">
                            <p class="sb-text sb-mb-15">Opening Time : 06:00 AM to 01:30 PM and 03:30 PM to 09:00 PM</p>
                        </div>
                    </div>
                </div>
                <div class="sb-grid-item sb-item-50 more">
                    <div class="sb-menu-item sb-mb-30">
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Brahmapureeswarar Temple, Thirupattur</h4>
                            <div class="sb-price" style="width: 120px !important; background-color: #40D71E; color: white;">25 kms</div>
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
                            <div class="sb-price" style="width: 120px !important; background-color: #D649FF; color: white;">26 kms</div>
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
                            <div class="sb-price" style="width: 120px !important; background-color: #D649FF; color: white;">30 kms</div>
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
                            <div class="sb-price" style="width: 120px !important; background-color: #1F0E72; color: white;">30 kms</div>
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
                            <div class="sb-price" style="width: 120px !important; background-color: #D649FF; color: white;">35 kms</div>
                        </div>
                        <div class="sb-description">
                            <p class="sb-text sb-mb-15">Opening Time : 06:00 AM to 11:00 AM and 04:00 PM to 08:00 PM</p>
                        </div>
                    </div>
                </div>
                <div class="sb-grid-item sb-item-50 more">
                    <div class="sb-menu-item sb-mb-30">
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Aayiram Kanniraindha Perumal, Malayadipatti</h4>
                            <div class="sb-price" style="width: 120px !important; background-color: #1F0E72; color: white;">40 kms</div>
                        </div>
                        <div class="sb-description">
                            <p class="sb-text sb-mb-15">Opening Time : 08:00 AM to 12:00 AM and 04:00 PM to 06:00 PM</p>
                        </div>
                    </div>
                </div>
                <div class="sb-grid-item sb-item-50 more">
                    <div class="sb-menu-item sb-mb-30">
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Mathurakali Amman Temple, Siruvachur</h4>
                            <div class="sb-price" style="width: 120px !important; background-color: #FFC300; color: white;">45 kms</div>
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

    @include('layouts.frontend.footer')
