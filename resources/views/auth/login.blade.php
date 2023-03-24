@extends('layouts.non-login')

@section('content')
    <div>
        <div class="container-fluid p-0">
            <div class="row g-0">

                <div class="col-xl-9">
                    <div class="auth-full-bg pt-lg-5 p-4">
                        <div class="w-100">
                            <div class="bg-overlay"></div>
                            <div class="d-flex h-100 flex-column">

                                <div class="p-4 mt-auto">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-7">
                                            <div class="text-center">
                                                <h4 class="mb-3"><i
                                                        class="bx bxs-quote-alt-left text-dark h1 align-middle me-3"></i><span
                                                        class="text-dark">Design & Developed</span> By</h4>
                                                <div dir="ltr">
                                                    <div class="owl-carousel owl-theme auth-review-carousel"
                                                        id="auth-review-carousel">
                                                        <div class="item">
                                                            <div class="py-3">
                                                                <p class="font-size-16 mb-4">Zwork Technology, Coimbatore & Tiruchirappalli | Custom Software</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-xl-3">
                    <div class="auth-full-page-content p-md-5 p-4">
                        <div class="w-100">

                            <div class="d-flex flex-column h-100">
                                <div class="my-auto">

                                    <div>
                                        <h5 class="text-dark">Welcome Back !</h5>
                                        <p class="text-muted">Sign in to continue.</p>
                                    </div>

                                    <div class="mt-4">
                                        <form method="POST" action="{{ route('login') }}" autocomplete="off">
                                            @csrf

                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email Address</label>
                                                <input id="email" type="email"
                                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                                    value="{{ old('email') }}" placeholder="Enter Email Address" required
                                                    autofocus>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <div class="float-end">
                                                    <a href="{{ route('password.request') }}" class="text-muted">Forgot
                                                        password?</a>
                                                </div>
                                                <label for="password" class="form-label">Password</label>
                                                <div class="input-group auth-pass-inputgroup">
                                                    <input type="password" id="password"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        placeholder="Enter password" name="password" aria-label="Password"
                                                        aria-describedby="password-addon" required
                                                        >


                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </div>
                                            </div>


                                            <div class="mt-3 d-grid">
                                                <button class="btn btn-success waves-effect waves-light" type="submit">Log
                                                    In</button>
                                            </div>



                                        </form>
                                        <div class="mt-5 text-center">
                                            <p>Don't have an account ? <a href="{{ route('register') }}" class="fw-medium text-dark">
                                                    Signup now</a> </p>
                                        </div>
                                    </div>
                                </div>


                            </div>


                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container-fluid -->
    </div>
@endsection
