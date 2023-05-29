@extends('layouts.app')

@section('content')
@include('layouts.nav')
<script type="text/javascript">
    $(function () {

        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('currentCamps') }}",
                data: function (d) {
                    d.from = $('#from').val();
                    d.to = $('#to').val();
                    d.country = $('#country').val();
                    d.district = $('#district').val();
                    d.city = $('#city').val();
                }
            },
            columns: [
                {data: 'donation_date', name: 'donation_date'},
                {data: 'city', name: 'city'},
                {data: 'venue', name: 'venue'},
                {data: 'contact_person', name: 'contact_person'}
            ]
        });

        $('#filter_records').click(function () {
            table.draw();
        });
    });
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css">

<h1 class="text-center">Upcoming Blood Donation Camps</h1>
<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <div class="panel panel-default">
                <div class="panel-body text-center">
                    <h4>A Quick Search</h4>
                    <div class="form-group">
                        <span>Date From</span>
                        <input id="from" type="text" class="form-control datepicker" value="" autocomplete="off"/>
                    </div>
                    <div class="form-group">
                        <span>Date To</span>
                        <input id="to" type="text" class="form-control datepicker" value="" autocomplete="off"/>
                    </div>
                    <div class="form-group">
                        <span>Select Country</span>
                        <select id="country" name="country" class="form-control">
                            <option value="">Select a Country</option>
                            @foreach(config('constants.countries') as $key => $value)
                            <option value="{{ $value }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <span>Select District</span>
                        <select id="district" class="form-control">
                            @foreach(config('constants.districts') as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <span>City</span>
                        <input id="city" type="text" class="form-control" value=""/>
                    </div>
                    <div class="form-group">
                        <button id="filter_records" class="btn btn-primary">Search</button>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-sm-9">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table class="table table-striped table-bordered data-table" style="width:100%">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>City</th>
                                <th>Venue</th>
                                <th>Organized By</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer') 
@endsection
