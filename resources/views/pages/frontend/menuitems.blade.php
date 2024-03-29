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
                            <h1 class="sb-h2">Menu</h1>
                            <ul class="sb-breadcrumbs">
                                <li><a href="{{ route('index') }}">Home</a></li>
                                <li><a href="#.">Menu</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- main title end -->
                </div>
            </div>
        </div>
    </section>
    <!-- banner end -->

    <!-- menu section 1 -->
    <section class="sb-menu-section sb-p-90-60">
        <div class="sb-bg-1">
            <div></div>
        </div>
        <div class="container">
            <!-- filter -->
            <div class="sb-filter mb-30">
                <a href="#." data-filter="*" class="sb-filter-link sb-active">All </a>
                <a href="#." data-filter=".menu" class="sb-filter-link">Menu</a>
                <a href="#." data-filter=".snacks" class="sb-filter-link">Snacks</a>
                <a href="#." data-filter=".drinks" class="sb-filter-link">Drinks</a>
                <a href="#." data-filter=".podi" class="sb-filter-link">Podi</a>
                <a href="#." data-filter=".pickles" class="sb-filter-link">Pickles</a>
            </div>
            <!-- filter end -->
            <div class="sb-masonry-grid">
                <div class="sb-grid-sizer"></div>
                <div class="sb-grid-item sb-item-25 menu">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img1.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img1.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Idli</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 menu">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img2.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img2.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Ghee Rost</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 menu">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img3.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img3.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Chapati</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 menu">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img4.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img4.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Poori</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 menu">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img5.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img5.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Podi Idli</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 menu">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img6.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img6.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Parota</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 menu">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img7.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img7.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Onion Uthappam</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 menu">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img8.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img8.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Rava Roast</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 menu">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img9.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img9.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Vada</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 menu">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img10.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img10.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Veg Soup</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 menu">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img11.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img11.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Tomato Soup</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 menu">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img12.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img12.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Idiyappam</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 menu">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img13.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img13.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Pongal</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 menu">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img14.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img14.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Masal Dosa</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 menu">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img15.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img15.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Panner Masal Dosa</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 menu">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img16.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img16.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Elai Parotta</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 menu">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img17.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img17.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Gobi Manchurian</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 menu">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img18.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img18.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Chilli Parotta</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 menu">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img19.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img19.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Kaima Parotta</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 menu">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img20.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img20.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Fried Rice</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 menu">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img21.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img21.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Noodles</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 menu">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img22.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img22.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Cholapuri</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 menu">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img23.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img23.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Idli Manchurian</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 menu">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img24.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img24.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Goabi 65</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 menu">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img25.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img25.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Paneer 65</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 menu">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img26.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img26.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Naan</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 menu">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img27.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img27.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Panner Butter Masala</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 menu">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img28.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img28.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Schezwan Fried Rice</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 menu">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img29.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img29.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Schezwan Noodles</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 menu">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img30.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img30.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Wheat Parotta</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 podi">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img31.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img31.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Sesame Idli Powder</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 podi">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img32.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img32.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Garlic Rasam Powder</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 podi">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img33.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img33.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Bisibelabath Powder</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 podi">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img34.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img34.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Idli Powder</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 podi">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img35.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img35.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Rasa Powder</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 podi">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img36.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img36.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Garlic Dhal Powder</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 podi">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img37.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img37.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Pepper Kuzhambu Powder</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 podi">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img38.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img38.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Pepper Rasa Powder</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 podi">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img39.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img39.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Angaya Podi</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 podi">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img40.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img40.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Curry Leaf Powder</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 podi">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img41.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img41.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Tamarina Rice Powder</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 podi">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img42.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img42.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Vatha Kuzhambu Powder</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 podi">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img43.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img43.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Garlic Idli Powder</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 podi">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img44.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img44.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Dhal Powder</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 podi">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img45.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img45.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Sambar Powder</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 drinks">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img46.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img46.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Filter Coffee</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 drinks">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img47.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img47.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Tea</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 drinks">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img48.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img48.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Ginger Tea</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 drinks">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img49.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img49.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Lemon Tea</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 drinks">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img50.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img50.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Masala Tea</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 drinks">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img51.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img51.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Masala Milk</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 drinks">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img52.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img52.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Horlicks</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 drinks">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img53.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img53.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Boost</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 drinks">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img54.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img54.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Ice cream</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 drinks">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img55.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img55.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Cool Drinks</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 snacks">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img56.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img56.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Kai Murukku</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 snacks">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img57.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img57.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Thenkuzhal</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 snacks">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img58.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img58.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Mullu Murukku</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 snacks">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img59.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img59.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Manogaram</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 snacks">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img60.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img60.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Ribbon Bakoda</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 snacks">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img61.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img61.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Oma Podi</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 snacks">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img62.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img62.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Mixture</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 snacks">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img63.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img63.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Pepper Karachev</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 snacks">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img64.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img64.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Nice Karachev</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 snacks">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img65.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img65.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Thattai</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 snacks">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img66.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img66.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Seedai Salt</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 snacks">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img67.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img67.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Seedai Sweet</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 snacks">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img68.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img68.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Naendram Chips</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 pickles">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img69.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img69.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Lemon</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 pickles">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img70.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img70.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Kadarangai</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 pickles">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img71.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img71.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Narthangai</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 pickles">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img72.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img72.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Mahali</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 pickles">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img73.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img73.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Mango</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 pickles">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img74.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img74.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Mango Giner</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 pickles">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img75.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img75.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Cut Mango</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 pickles">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img76.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img76.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Maavadu</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
                <div class="sb-grid-item sb-item-25 pickles">
                    <a data-fancybox="menu" data-no-swup href="{{ asset('frontend_styles/image/menu/img77.png') }}" class="sb-menu-item sb-mb-30">
                        <div class="sb-cover-frame">
                            <img src="{{ asset('frontend_styles/image/menu/img77.png') }}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Garlic</h4>
                            <div class="sb-price" style="background-color: #f2f3f5"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- menu end -->

    @include('layouts.frontend.footer')
