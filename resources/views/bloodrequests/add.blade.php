@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css">
{!! JsValidator::formRequest('App\Http\Requests\BloodRequestRequest', '#BloodRequestForm'); !!}

@include('layouts.nav') 
<h1 class="text-center">Blood Request</h1>
<div class="container">
    <div class="row">
        <div class="col-sm-12">

            <form id="BloodRequestForm" method="post" action="" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Requester name">
                            @if($errors->has('name'))
                            <div class="error">{{ $errors->first('name') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="nic">National ID Number</label>
                            <input type="text" name="nic" class="form-control" value="{{ old('nic') }}" placeholder="Requester National ID">
                            @if($errors->has('nic'))
                            <div class="error">{{ $errors->first('nic') }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="mobile_phone">Mobile Phone Number</label>
                            <input type="text" name="mobile_phone" value="{{ old('mobile_phone') }}" class="form-control" placeholder="Requester Phone Number">
                            @if($errors->has('mobile_phone'))
                            <div class="error">{{ $errors->first('mobile_phone') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="email">E-mail Address</label>
                            <input type="text" name="email" class="form-control" value="{{ old('email') }}" placeholder="Requester Email Address">
                            @if($errors->has('email'))
                            <div class="error">{{ $errors->first('email') }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Patient Information</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="patient_info_name">Name</label>
                            <input type="text" name="patient_info_name" value="{{ old('patient_info_name') }}" class="form-control" placeholder="Patient name">
                            @if($errors->has('patient_info_name'))
                            <div class="error">{{ $errors->first('patient_info_name') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="blood_type">Blood Group</label>
                            <select name="blood_type" class="form-control">
                                @foreach(config('constants.blood_groups') as $key => $value)
                                <option {{ old('blood_type') == $key ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('blood_type'))
                            <div class="error">{{ $errors->first('blood_type') }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="blood_units">Blood Units</label>
                            <select name="blood_units" class="form-control">
                                <option value="">Select no of Units</option>
                                @for($i = 1; $i<=10; $i++)
                                <option {{ old('blood_units') == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i. ( $i == 1 ? ' Unit' : ' Units' )  }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="required_date">Required Date</label>
                            <input name="required_date" autocomplete="off" type="text" value="{{ old('required_date') }}" class="form-control datepicker" value=""/>
                            @if($errors->has('required_date'))
                            <div class="error">{{ $errors->first('required_date') }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Hospital Information</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="country">Country</label>
                            <select name="country" class="form-control">
                                <option value="">Select a Country</option>
                                @foreach(config('constants.countries') as $key => $value)
                                <option {{ old('country') == $value ? 'selected' : '' }} value="{{ $value }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="district">District</label>
                            <select name="district" class="form-control">
                                @foreach(config('constants.districts') as $key => $value)
                                <option {{ old('district') == $key ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="hospital_name">Hospital Name</label>
                            <input name="hospital_name" type="text" value="{{ old('hospital_name') }}" placeholder="Hospital Name" class="form-control" value=""/>
                            @if($errors->has('hospital_name'))
                            <div class="error">{{ $errors->first('hospital_name') }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                <p>
                    <button id="SaveAccount" class="btn btn-primary submit">Request</button>
                </p>
            </form>

        </div>
    </div>
</div>
@include('layouts.footer') 
@endsection
