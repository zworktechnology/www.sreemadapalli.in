@include('pages.frontend.header')
        <!--Banner Inner-->
        <section>
            <div class="lgx-banner lgx-banner-inner">
                <div class="lgx-page-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="lgx-heading-area">
                                    <div class="lgx-heading
                                            lgx-heading-white">
                                        <h2 class="heading-title">About Us</h2>
                                    </div>
                                    <ul class="breadcrumb">
                                        <li><a href="{{ route('index') }}"><i class="fa fa-home" aria-hidden="true"></i>Home</a>
                                        </li>
                                        <li class="active">About</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--//.ROW-->
                    </div><!-- //.CONTAINER -->
                </div><!-- //.INNER -->
            </div>
        </section>
        <!--//.Banner Inner-->

        <main>
            <div class="lgx-page-wrapper lgx-page-wrapper-none">
                <!--ABOUT-->
                <section>
                    <div id="lgx-about" class="lgx-about lgx-about-bottom">
                        <!--lgx-about-bottom-->
                        <div class="lgx-inner">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-10
                                            col-sm-offset-1 col-md-8
                                            col-md-offset-2">
                                        <div class="lgx-about-area">
                                            <div class="lgx-heading">
                                                <h2 class="heading-title">Restaurant
                                                    History</h2>
                                            </div>
                                            <div class="lgx-about-content">
                                                <blockquote class="about">
                                                    Accumsan quis, vulputate
                                                    sit amet sapien.
                                                    Curabitur euismod
                                                    vulputate senectus netus
                                                    feugiat vitae, ultricies
                                                    eget, tempor sit
                                                    malesuada fames turpis
                                                    senectus netus amet.
                                                </blockquote>
                                                <p class="text">
                                                    Pellentesque habitant
                                                    morbi tristique senectus
                                                    netus et malesuada fames
                                                    turpis egestas.
                                                    Vestibulum tortor quam,
                                                    feugiat vitae, ultricies
                                                    eget, tempor sit amet,
                                                    ante. Donec eu libero
                                                    sit amet quam egestas
                                                    semper. Aenean ultricies
                                                    mi vitae est. Mauris
                                                    Eonec eu ribero sit amet
                                                    quam egestas semper.
                                                    Aenean are ultricies mi
                                                    vitae est tristique
                                                    senectus et netus et
                                                    malesuada placerat leo.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--//.ROW-->
                            </div>
                            <!-- //.CONTAINER -->
                        </div>
                        <!-- //.INNER -->
                    </div>
                </section>
                <!--ABOUT END-->

                <!--ABOUT TOP-->
                <section>
                    <div id="lgx-about-top" class="lgx-about-top">
                        <div class="lgx-inner">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="about-top-single">
                                            <a href="#"><img src="frontend_styles/img/about-icon.png" alt="about-icon"></a>
                                            <h3 class="title"><a href="#">Hotal</a></h3>
                                            <p>Beetroot water spinach okra
                                                water chestnut ricebean pea.</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="about-top-single">
                                            <a href="#"><img src="frontend_styles/img/about-icon2.png" alt="about-icon"></a>
                                            <h3 class="title"><a href="#">Outdoor
                                                    Caterers</a></h3>
                                            <p>Beetroot water spinach okra
                                                water chestnut ricebean pea.</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="about-top-single">
                                            <a href="#"><img src="frontend_styles/img/about-icon3.png" alt="about-icon"></a>
                                            <h3 class="title"><a href="#">Service
                                                    Apartments</a></h3>
                                            <p>Beetroot water spinach okra
                                                water chestnut ricebean pea.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--ABOUT TOP END-->
            </div>
        </main>
        @include('pages.frontend.footer')
