@include('voyager-frontend::partials.meta')
@include('voyager-frontend::partials.header')

<style>
    select{
        background-size: 25px 6px;
    }
    
    .form-control{
        margin-bottom: 0px;
    }
    .error-help-block{
        color: red;
        font-size: 0.875rem;
    }
    .form-group label{
        margin-bottom: 0px;
    }
    
    .input-group{
        margin-bottom: 0px;
    }
</style>

<h1 class="text-center">Blood Donation Camps</h1>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            @if (Session::has('message'))
                <div class="alert alert-success">{{ Session::get('message') }}</div>
            @endif
            <form id="DonationCampForm" method="post" action="" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="donation_date">Donation Date</label>
                            <input name="donation_date" autocomplete="off" placeholder="Y-M-D" type="text" value="{{ old('donation_date') }}" class="form-control datepicker" value=""/>
                            @if($errors->has('donation_date'))
                            <div class="error">{{ $errors->first('donation_date') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="from">From</label>
                            <div class='input-group date timepicker'>
                                <input name="from" type='text' autocomplete="off" class="form-control" placeholder="-- : -- "/>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="to">To</label>
                            <div class='input-group date timepicker'>
                                <input name="to" type='text' autocomplete="off" class="form-control" placeholder="-- : -- "/>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </span>
                            </div>
                        </div>
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
                            <label for="city">City</label>
                            <input name="city" type="text" value="{{ old('city') }}" placeholder="City" class="form-control" value=""/>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="venue">Venue</label>
                            <input name="venue" type="text" value="{{ old('venue') }}" placeholder="Venue" class="form-control" value=""/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="city">Image or Banner</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="organization">Organization Name</label>
                            <input name="organization" type="text" value="{{ old('organization') }}" 
                                   placeholder="Organization Name" class="form-control" value=""/>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="contact_person">Contact Person</label>
                            <input name="contact_person" type="Contact Person" value="{{ old('contact_person') }}" 
                                   placeholder="Contact Person" class="form-control" value=""/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="phone">Contact Number</label>
                            <input name="phone" type="text" value="{{ old('phone') }}" 
                                   placeholder="Contact Number" class="form-control" value=""/>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="email">Contact Email</label>
                            <input name="email" type="email" value="{{ old('email') }}" 
                                   placeholder="Contact Email" class="form-control" value=""/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="fax">Contact Fax</label>
                            <input name="fax" type="text" value="{{ old('fax') }}" 
                                   placeholder="Contact Fax" class="form-control" value=""/>
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
<!-- /.container -->
@push('custom-scripts')
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\DonationCampRequest', '#DonationCampForm'); !!}
@endpush
@include('voyager-frontend::partials.footer')