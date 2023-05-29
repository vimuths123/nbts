@extends('voyager-frontend::layouts.default')

@section('content')
<style>
    .wrap { max-width: 980px; margin: 10px auto 0; }
    #steps { margin: 80px 0 0 0 }
    .commands { overflow: hidden; margin-top: 30px; }
    .prev {float:left}
    .next, .submit {float:right}
    .error { color: #b33; }
    #progress { position: relative; height: 5px; background-color: #eee; margin-bottom: 20px; }
    #progress-complete { border: 0; position: absolute; height: 5px; min-width: 10px; background-color: #337ab7; transition: width .2s ease-in-out; }

    select{
        background-size: 25px 6px;
    }
</style>
</script>
<h3 class="text-center mt-3">Update Account</h3>
<div class="container">
    <div class="row wrap">
        <div class="col-lg-12">
            @if (Session::has('message'))
                <div class="alert alert-success">{{ Session::get('message') }}</div>
            @endif
            <div id='progress'><div id='progress-complete'></div></div>

            <form id="SignupForm" method="post" action="{{route('users.update', $user)}}" enctype="multipart/form-data">
                @csrf
                <fieldset>
                    <legend>Personal Info</legend>

                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <select name="title" class="form-control mb-0" required>
                                    @foreach (config('constants.titles') as $key => $value)
                                    <option {{ $user->title == $value ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <label for="Name">Preffered Name</label>
                                <input type="text" name="name" class="form-control mb-0" required value="{{ $user->name }}"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input name="first_name" type="text" class="form-control mb-0" required value="{{ $user->first_name }}"/>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" name="last_name" class="form-control mb-0" required value="{{ $user->last_name }}"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="Email">Email</label>
                                <input id="Email" type="email" class="form-control mb-0" required value="{{ $user->email }}"/>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="Password">Password (Leave empty to keep the same)</label>
                                <input autocomplete="new-password" name="password" id="Password" type="password" class="form-control mb-0" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="date_of_birth">Date of Birth</label>
                                <input name="date_of_birth" autocomplete="off" type="text" required class="form-control mb-0 datepicker" value="{{ $user->date_of_birth }}"/>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="gender">Gender</label><br>
                                <div class="row ml-2">
                                    <div class="col-sm-6">
                                        <input {{ ($user->gender == '1') ? 'checked ' : "" }} type="radio" class="form-check-input" name="gender" value="1">
                                        <span class="">Male</span>
                                    </div>
                                    <div class="col-sm-6">
                                        <input {{ ($user->gender == '2') ? 'checked ' : "" }} type="radio" class="form-check-input" name="gender" value="2">
                                        <span class="">Female
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="blood_group">Blood Group</label>
                                <select name="blood_group" class="form-control mb-0" required>
                                    @foreach(config('constants.blood_groups') as $key => $value)
                                    <option {{ $user->blood_group == $key ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="nic">National ID / Passport Number</label>
                                <input type="text" name="nic" class="form-control mb-0" required value="{{ $user->nic }}"/>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <fieldset>
                    <legend>Contact Info</legend>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="country">Country</label>
                                <select name="country" class="form-control mb-0" required>
                                    <option value="">Select a Country</option>
                                    @foreach(config('constants.countries') as $key => $value)
                                    <option {{ $user->country == $value ? 'selected' : '' }} value="{{ $value }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="current_province">Current Provinces</label>
                                <select name="current_province" class="form-control mb-0" required>
                                    <option value="">Select a Province</option>
                                    @foreach(config('constants.provinces') as $key => $value)
                                    <option {{ $user->current_province == $value ? 'selected' : '' }} value="{{ $value }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="current_district">Current District</label>
                                <select name="current_district" class="form-control mb-0" required>
                                    @foreach(config('constants.districts') as $key => $value)
                                    <option {{ $user->current_district == $key ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="current_city">Current City</label>
                                <input type="text" name="current_city" class="form-control mb-0" required value="{{ $user->current_city }}"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="current_address">Current Address</label>
                                <input type="text" name="current_address" class="form-control mb-0" required value="{{ $user->current_address }}"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="mobile_phone">Mobile Phone No</label>
                                <input type="text" name="mobile_phone" class="form-control mb-0" required value="{{ $user->mobile_phone }}"/>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="home_phone">Home Phone No</label>
                                <input type="text" name="home_phone" class="form-control mb-0" required value="{{ $user->mobile_phone }}"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="fax">Fax No</label>
                                <input type="text" name="fax" class="form-control mb-0" required value="{{ $user->fax }}"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="contact_me_via">Contact Me Via</label>
                            <div class="row ml-2">
                                <div class="col-sm-3">

                                    <input {{ ($user->contact_me_via) && (in_array("Post", $user->contact_me_via)) ? 'checked ' : "" }} type="checkbox" class="form-check-input" name="contact_me_via[]" value="Post">
                                    <span class="">Post</span>
                                </div>
                                <div class="col-sm-3">
                                    <input {{ ($user->contact_me_via) && (in_array("Call", $user->contact_me_via)) ? 'checked ' : "" }} type="checkbox" class="form-check-input" name="contact_me_via[]" value="Call">
                                    <span class="">Call
                                </div>
                                <div class="col-sm-3">
                                    <input {{ ($user->contact_me_via) && (in_array("SMS", $user->contact_me_via)) ? 'checked ' : "" }} type="checkbox" class="form-check-input" name="contact_me_via[]" value="SMS">
                                    <span class="">SMS</span>
                                </div>
                                <div class="col-sm-3">
                                    <input {{ ($user->contact_me_via) && (in_array("Fax", $user->contact_me_via)) ? 'checked ' : "" }} type="checkbox" class="form-check-input" name="contact_me_via[]" value="Fax">
                                    <span class="">Fax
                                </div>
                                <div class="col-sm-3">
                                    <input {{ ($user->contact_me_via) && (in_array("Email", $user->contact_me_via)) ? 'checked ' : "" }} type="checkbox" class="form-check-input" name="contact_me_via[]" value="Email">
                                    <span class="">Email
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <fieldset>
                    <legend>More Information</legend>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="fax">Description</label>
                                <textarea name="description" rows="4" class="form-control mb-0">
                            {{ $user->description }}
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image">Profile Image</label>
                                <input type="file" name="image" class="form-control mb-0">
                            </div>
                        </div>
                        <div class="col-md-6">

                        </div>
                    </div>
                </fieldset>

                <fieldset class="form-horizontal" role="form">
                    <legend>Complete</legend>

                </fieldset>
                <p>
                    <button id="SaveAccount" class="btn btn-primary submit">Submit form</button>
                </p>
            </form>

        </div>
    </div>
</div>

@endsection

@push('custom-scripts')
<script type="text/javascript">
    $(function () {

        var $signupForm = $('#SignupForm');

        $signupForm.validate({errorElement: 'em'});

        $signupForm.formToWizard({
            submitButton: 'SaveAccount',
            nextBtnClass: 'btn btn-primary next',
            prevBtnClass: 'btn btn-outline-secondary prev',
            buttonTag: 'button',
            validateBeforeNext: function (form, step) {
                var stepIsValid = true;
                var validator = form.validate();
                $(':input', step).each(function (index) {
                    var xy = validator.element(this);
                    stepIsValid = stepIsValid && (typeof xy == 'undefined' || xy);
                });
                return stepIsValid;
            },
            progress: function (i, count) {
                $('#progress-complete').width('' + (i / count * 100) + '%');
            }
        });
    });
</script>
@endpush