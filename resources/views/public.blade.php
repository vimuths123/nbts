@extends('layouts.app')

@section('content')
<script type="text/javascript" src="{{ URL::asset('js/bootstrap.bundle.min.js') }}"></script>

@include('layouts.nav') 

<header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <!-- Slide One - Set the background image for this slide in the line below -->
            <div class="carousel-item active" style="background-image: url('http://placehold.it/1900x1080')">
                <div class="carousel-caption d-none d-md-block">
                    <h3>First Slide</h3>
                    <p>This is a description for the first slide.</p>
                </div>
            </div>
            <!-- Slide Two - Set the background image for this slide in the line below -->
            <div class="carousel-item" style="background-image: url('http://placehold.it/1900x1080')">
                <div class="carousel-caption d-none d-md-block">
                    <h3>Second Slide</h3>
                    <p>This is a description for the second slide.</p>
                </div>
            </div>
            <!-- Slide Three - Set the background image for this slide in the line below -->
            <div class="carousel-item" style="background-image: url('http://placehold.it/1900x1080')">
                <div class="carousel-caption d-none d-md-block">
                    <h3>Third Slide</h3>
                    <p>This is a description for the third slide.</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</header>

<!-- Page Content -->
<div class="container mt-3">

    <div class="row">
        <div class="col-lg-3 mb-3">
            <a class="btn btn-lg btn-secondary btn-block" href="#">Donate Blood</a>
        </div>
        <div class="col-lg-3 mb-3">
            <a class="btn btn-lg btn-secondary btn-block" href="/blood-request">Request Blood</a>
        </div>
        <div class="col-lg-3 mb-3">
            <a class="btn btn-lg btn-secondary btn-block" href="/donation-camp">Blood Donation camps</a>
        </div>
        @if (Auth::guard('web')->check())
            <div class="col-lg-3 mb-3">
                <a class="btn btn-lg btn-secondary btn-block" href="/account">View Profile</a>
            </div>
        @else
            <div class="col-lg-3 mb-3">
                <a class="btn btn-lg btn-secondary btn-block" href="/login">Member Log In</a>
            </div>
        @endif
        
    </div>


</div>
<!-- /.container -->

@include('layouts.footer') 
@endsection
