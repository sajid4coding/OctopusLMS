
@extends('layouts.frontendmaster')
@section('content')
<style>
    .hidden{
        display: none;
    }
</style>
<!-- Page Header section start here -->
<div class="pageheader-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="pageheader-content text-center">
                    <h2>Register Now</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('/home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('customer.create') }}">Sign Up</a></li>
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
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <strong>{{ session('success') }}</strong>
                </div>
            @endif
            <h3 class="title">Register Now</h3>
            <form class="account-form" action="{{ route('customer.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" placeholder="Full Name" name="full_name">
                </div>
                @error('name')
                    <div class="alert alert-danger" role="alert">
                        <strong>{{ $error }}</strong>
                    </div>
                @enderror
                <div class="form-group">
                    <input type="text" placeholder="User Name" name="user_name">
                </div>
                @error('name')
                    <div class="alert alert-danger" role="alert">
                        <strong>{{ $error }}</strong>
                    </div>
                @enderror
                <div class="form-group">
                    <input type="text" placeholder="Email" name="email">
                </div>
                @error('email')
                    <div class="alert alert-danger" role="alert">
                        <strong>{{ $error }}</strong>
                    </div>
                @enderror
                <div class="hidden" id="hide">
                    <div class="form-group">
                        <input type="text" placeholder="Qualification" name="qualification">
                    </div>
                    @error('email')
                        <div class="alert alert-danger" role="alert">
                            <strong>{{ $error }}</strong>
                        </div>
                    @enderror
                    <div class="form-group">
                        <input type="text" placeholder="Your preferable teaching area" name="teaching_area">
                    </div>
                    @error('email')
                        <div class="alert alert-danger" role="alert">
                            <strong>{{ $error }}</strong>
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Password" name="password">
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Confirm Password" name="confirm_password">
                </div>
                <div class="d-flex mb-2">
                    <input style="width: 14px; margin-top: -2px" type="radio" id="radio1" name="user_type" value="student" checked> &nbsp;
                    <label for="radio1"> Student</label><br>
                </div>
                <div class="d-flex" style="">
                    <input style="width: 14px; margin-top: -2px" type="radio" id="radio2" name="user_type" value="instructor"> &nbsp;
                    <label for="radio2"> Instructor</label><br>
                </div>
                <div class="form-group">
                    <button type="submit" class="lab-btn"><span>Get Started Now</span></button>
                </div>

                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            <strong>{{ $error }}</strong>
                        </div>
                    @endforeach
                @endif
            </form>
            {{-- <div class="account-bottom">
                <span class="d-block cate pt-10">Are you a member? <a href="login.html">Login</a></span>
                <span class="or"><span>or</span></span>
                <h5 class="subtitle">Register With Social Media</h5>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    var student = document.getElementById("radio1");
    var instructor = document.getElementById("radio2");
    var hide = document.getElementById("hide");

    // student.addEventListener("click", function(){
    //     hide.classList.add('hidden');
    //     console.log(hide.class);
    // });
    // instructor.addEventListener("click", function(){
    //     hide.classList.remove('hidden');
    //     console.log(hide);
    // });

    $(document).ready(function(){
        $(instructor).click(function(){
            $(hide).slideDown(500);
            // $(hide).fadeIn(1000);
        });
        $(student).click(function(){
            $(hide).slideUp(500);
        });
    });
</script>
@endsection

