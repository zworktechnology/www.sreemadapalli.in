@include('pages.frontend.header')
        <!--Banner Inner-->
        <section>
            <div class="lgx-banner lgx-banner-inner">
                <div class="lgx-page-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="lgx-heading-area">
                                    <div class="lgx-heading lgx-heading-white">
                                        <h2 class="heading-title">Contact us</h2>
                                    </div>
                                    <ul class="breadcrumb">
                                        <li><a href="="{{ route('index') }}"><i class="fa fa-home" aria-hidden="true"></i>Home</a>
                                        </li>
                                        <li class="active">Contact</li>
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
            <div class="lgx-page-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-9">
                            <form method="POST" class="lgx-contactform" action="php/form-handler.php">
                                <div class="form-group">
                                    <input type="text" name="lgxname" class="form-control lgxname" id="lgxname"
                                        placeholder="Enter Your Name" required="">
                                </div>

                                <div class="form-group">
                                    <input type="email" name="lgxemail" class="form-control lgxemail" id="lgxemail"
                                        placeholder="Enter email" required="">
                                </div>

                                <div class="form-group">
                                    <input type="text" name="lgxsubject" class="form-control lgxsubject" id="lgxsubject"
                                        placeholder="Subject" required="">
                                </div>

                                <div class="form-group">
                                    <textarea class="form-control lgxmessage" name="lgxmessage" id="lgxmessage" rows="5"
                                        placeholder="We expect drop some line from you..." required=""></textarea>
                                </div>

                                <button type="submit" name="submit" value="contact-form"
                                    class="lgx-btn lgx-btn-big hvr-glow hvr-radial-out lgxsend lgx-send"><span>Send
                                        Massage</span></button>
                            </form>

                            <!-- MODAL SECTION -->
                            <div id="lgx-form-modal" class="modal fade lgx-form-modal" tabindex="-1" role="dialog"
                                aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content lgx-modal-content">
                                        <div class="modal-header lgx-modal-header">
                                            <button type="button" class="close brand-color-hover" data-dismiss="modal"
                                                aria-label="Close">
                                                <i class="fa fa-power-off"></i>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <div class="alert lgx-form-msg" role="alert"></div>
                                        </div>
                                        <!--//MODAL BODY-->

                                    </div>
                                </div>
                            </div> <!-- //MODAL -->

                        </div>
                        <!--//.COL-->
                        <div class="col-sm-12 col-md-3">
                            <div class="contact-info">
                                <div class="lgx-box">
                                    <!--<span class="lgx-icon"><i class="fa fa-map-marker"></i></span>-->
                                    <div class="address">
                                        <h3 class="title">Address</h3>
                                            <p>No. 145, South Chitra Street,
                                            Srirangam,
                                            Trichy - 620 006.</p>
                                    </div>
                                </div>
                                <div class="lgx-box">
                                    <!--<span class="lgx-icon"><i class="fa fa-headphones"></i></span>-->
                                    <div class="address">
                                        <h3 class="title">Contact Info</h3>
                                        <p>+91 90251 66000</p>
                                    </div>
                                </div>
                                <div class="lgx-box">
                                    <!--<span class="lgx-icon"><i class="fa fa-envelope"></i></span>-->
                                    <div class="address">
                                        <h3 class="title">Mail Info.</h3>
                                        <p>Email:<a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                                data-cfemail="5f35373031713b303a1f3a273e322f333a713c3032"> info@sreemadapalli.com</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- //.CONTAINER -->
            </div>
        </main>
        @include('pages.frontend.footer')
