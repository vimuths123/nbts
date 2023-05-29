@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css">
<script type="text/javascript">
    $(function () {
        $(".datepicker").datepicker({
            dateFormat: "yy-mm-dd"
        });
        
        @if($user->felt_sick_after == '0')
            $('.last_medicine_wrapper').hide();
        @endif
        
        $('input[type=radio][name=felt_sick_after]').change(function () {
            if (this.value == '1') {
                $('.last_medicine_wrapper').show();
            } else if (this.value == '0') {
                $('.last_medicine_wrapper').hide();
            }
        });
        
        calculateNextDate();
        
        $('.updateNxtDate').change(function (){
            calculateNextDate()
        });
        
        @if($user->live_new_location == '0')
            $('.new_location_wrapper').hide();
        @endif
        
        $('input[type=radio][name=live_new_location]').change(function () {
            if (this.value == '1') {
                $('.new_location_wrapper').show();
            } else if (this.value == '0') {
                $('.new_location_wrapper').hide();
            }
        });
    });
    
    function calculateNextDate(){
        var date = '';
        $('.availability h3').hide();
        
        if($('input[type=radio][name=felt_sick_after]:checked').val() == 0){
            date = $('input[name=last_donated_date]').val();
        }else{
            date = $('input[name=last_took_medicine]').val();
        }
        
        var d = new Date(date);
        d.setMonth(d.getMonth() + 3);
        var newDate = moment(d).format('YYYY-MM-DD');

        if(newDate == 'Invalid date'){
            $('.nextDate').val('');
        }else{
            $('.nextDate').val(newDate);
            var today = new Date();
            if(d <= today){
                $('.available').show();
            }else{
                $('.not-available').show();
            }
        }
    }
</script>
<style>
    .wrap { max-width: 980px; margin: 10px auto 0; }
    #steps { margin: 80px 0 0 0 }
    .commands { overflow: hidden; margin-top: 30px; }
    .prev {float:left}
    .next, .submit {float:right}
    .error { color: #b33; }
    #progress { position: relative; height: 5px; background-color: #eee; margin-bottom: 20px; }
    #progress-complete { border: 0; position: absolute; height: 5px; min-width: 10px; background-color: #337ab7; transition: width .2s ease-in-out; }
    .ml-25{
        margin-left: 25px !important;
    }
    body{
        padding: 0px !important;
    }
    .readOnly{
        box-shadow: none !important; 
        border: 1px solid #ccc !important;
    }
</style>
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
<h1 class="text-center">Donate Blood</h1>
<div class="row wrap">
    <div class="col-lg-12">

        <form method="post" action="{{route('donateBloodUpdate', $user)}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="last_donated_date">Last Donated Date</label>
                        <input name="last_donated_date" autocomplete="off" type="text" class="form-control datepicker updateNxtDate" value="{{ $user->last_donated_date }}"/>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="felt_sick_after">Did you fell sick after that?</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <input {{ ($user->felt_sick_after == '1') ? 'checked ' : "" }} type="radio" class="form-check-input updateNxtDate" name="felt_sick_after" value="1">
                                <span class="ml-25">Yes</span>
                            </div>
                            <div class="col-sm-6">
                                <input {{ ($user->felt_sick_after == '0') ? 'checked ' : "" }} type="radio" class="form-check-input updateNxtDate" name="felt_sick_after" value="0">
                                <span class="ml-25">No
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 last_medicine_wrapper">
                    <div class="form-group">
                        <label for="last_took_medicine">If yes last date you take the medicine</label>
                        <input name="last_took_medicine" autocomplete="off" type="text" class="form-control datepicker updateNxtDate" value="{{ $user->last_took_medicine }}"/>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Next Donation Date</label>
                        <input autocomplete="off" type="text" class="form-control nextDate readOnly" readonly/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 text-center availability">
                    <h3 class="text-success font-weight-bold available">You are available to donate blood</h3>
                    <h3 class="text-danger font-weight-bold not-available">You are not available to donate blood</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Your Blood Group</label>
                        <input autocomplete="off" type="text" class="form-control readOnly" readonly value="{{ $user->blood_group }}"/>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Your City</label>
                        <input autocomplete="off" type="text" class="form-control readOnly" readonly value="{{ $user->current_city }}" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="live_new_location">Do you live in different location from above?</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <input {{ ($user->live_new_location == '1') ? 'checked ' : "" }} type="radio" class="form-check-input" name="live_new_location" value="1">
                                <span class="ml-25">Yes</span>
                            </div>
                            <div class="col-sm-6">
                                <input {{ ($user->live_new_location == '0') ? 'checked ' : "" }} type="radio" class="form-check-input" name="live_new_location" value="0">
                                <span class="ml-25">No
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group new_location_wrapper">
                        <label for="new_location">Your New Location</label>
                        <input name="new_location" autocomplete="off" type="text" class="form-control" value="{{ $user->new_location }}"/>
                    </div>
                </div>
            </div>
            <p>
                <button id="SaveAccount" class="btn btn-primary submit">Submit form</button>
            </p>
        </form>

    </div>
</div>
@endsection
