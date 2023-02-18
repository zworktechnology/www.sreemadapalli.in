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
                                                        class="text-dark">Design & Develop</span> By</h4>
                                                <div dir="ltr">
                                                    <div class="owl-carousel owl-theme auth-review-carousel"
                                                        id="auth-review-carousel">
                                                        <div class="item">
                                                            <div class="py-3">
                                                                <p class="font-size-16 mb-4">Zwork Technologies, Coimbatore, Tamilnadu, India. | Custom Software</p>
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
                                        <h5 class="text-dark">Register account</h5>
                                        <p class="text-muted">Get your account Now.</p>
                                    </div>

                                    <div class="mt-4">
                                        <form method="POST" action="{{ route('register') }}" autocomplete="off">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Name</label>
                                                <input type="text" class="form-control" id="name"
                                                    placeholder="Enter name" name="name" required>
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong
                                                            class="text-red-500 text-xs font-light mt-1">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label id="email" for="useremail" class="form-label">Email</label>
                                                <input type="email" name="email"
                                                    class="form-control @error('email') is-invalid @enderror" id="email"
                                                    value="{{ old('email') }}" placeholder="Enter email"
                                                    autocomplete="email" required>
                                                <div class="invalid-feedback">
                                                    Please Enter Email
                                                </div>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Password</label>
                                                <input type="password" name="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    id="password" placeholder="Enter password" required
                                                    autocomplete="new-password">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="password-confirm" class="form-label">Confirm Password</label>
                                                <input type="password" name="password_confirmation" class="form-control"
                                                    id="password-confirm" placeholder="Enter password" required
                                                    autocomplete="new-password">
                                            </div>
                                            <div class="mt-4 d-grid">
                                                <button class="btn btn-success waves-effect waves-light"
                                                    type="submit">Register</button>
                                            </div>
                                        </form>
                                        <div class="mt-5 text-center">
                                            <p>Already have an account ? <a href="{{ route('login') }}" class="fw-medium text-dark">
                                                    Login</a> </p>
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
