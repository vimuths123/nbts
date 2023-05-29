@extends('layouts.app')

@section('content')
<script type="text/javascript" src="{{ URL::asset('js/bootstrap.bundle.min.js') }}"></script>
<style>
    body{
        padding-top: 56px !important;
    }
</style>
@include('layouts.nav') 

<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">Contact Us
    </h1>

    <!-- Content Row -->
    <div class="row">
        <!-- Map Column -->
        <div class="col-lg-8 mb-4">
            <h3>Send us a Message</h3>
            <form name="sentMessage" id="contactForm" method="POST">
                @csrf
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Name:</label>
                        <input name="name" type="text" class="form-control" id="name">
                        <p class="help-block"></p>
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Email Address:</label>
                        <input name="email" type="email" class="form-control" id="email">
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Message:</label>
                        <textarea name="message" rows="10" cols="100" class="form-control" id="message" maxlength="999" style="resize:none"></textarea>
                    </div>
                </div>
                <div id="success"></div>
                <!-- For success/fail messages -->
                <button type="submit" class="btn btn-primary" id="sendMessageButton">Send Message</button>
            </form>
        </div>
        <!-- Contact Details Column -->
        <div class="col-lg-4 mb-4">
            <h3>Contact Details</h3>
            <p>
                Post : 3481 Melrose Place
                <br>Beverly Hills, CA 90210
                <br>
            </p>
            <p>
               Phone : (123) 456-7890
            </p>
            <p>
                Email :
                <a href="mailto:name@example.com">name@example.com
                </a>
            </p>
        </div>
    </div>
    <!-- /.row -->

    

</div>

@include('layouts.footer') 
@endsection
