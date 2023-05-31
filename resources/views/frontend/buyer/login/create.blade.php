@extends('layouts.frontendmaster')

@section('content')
<div class="pageheader-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="pageheader-content text-center">
                    <h2>Login</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('/home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('login.field') }}">Login</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Header section ending here -->

<!-- Login Section Section Starts Here -->
<div class="login-section padding-tb section-bg">
    <div class="container">
        <div class="account-wrapper">
            <h3 class="title">Login</h3>
            <form class="account-form" action="{{ route('customer.login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" placeholder="User Name" name="name">
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Password" name="password">
                </div>
                <div class="form-group">
                    <div class="d-flex justify-content-between flex-wrap pt-sm-2">
                        <div class="checkgroup">
                            <input type="checkbox" name="remember" id="remember">
                            <label for="remember">Remember Me</label>
                        </div>
                        <a href="forgetpass.html">Forget Password?</a>
                    </div>
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="d-block lab-btn"><span>Submit Now</span></button>
                </div>
            </form>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        <strong>{{ $error }}</strong>
                    </div>
                @endforeach
            @endif
            {{-- <div class="account-bottom">
                <span class="d-block cate pt-10">Don’t Have any Account?  <a href="registration.html">Sign Up</a></span>
                <span class="or"><span>or</span></span>
                <h5 class="subtitle">Login With Social Media</h5>
                <ul class="lab-ul social-icons justify-content-center">
                    <li>
                        <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
                    </li>
                    <li>
                        <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
                    </li>
                    <li>
                        <a href="#" class="linkedin"><i class="icofont-linkedin"></i></a>
                    </li>
                    <li>
                        <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
                    </li>
                    <li>
                        <a href="#" class="pinterest"><i class="icofont-pinterest"></i></a>
                    </li>
                </ul>
            </div> --}}
        </div>
    </div>
</div>
<!-- Login Section Section Ends Here -->
@endsection
