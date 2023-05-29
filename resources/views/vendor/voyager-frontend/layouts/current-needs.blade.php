@include('voyager-frontend::partials.meta')
@include('voyager-frontend::partials.header')
<style>
    select{
        background-size: 25px 6px;
    }
</style>
<main class="main-content">
    <!--@yield('content')-->
    <h3 class="text-center mt-3" style="margin-bottom: 10px;">Current Blood Requests</h3>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="panel panel-default">
                    <div class="panel-body text-center">
                        <h4>A Quick Search</h4>
                        <div class="form-group">
                            <span>Select Blood Group</span>
                            <select id="blood_type" class="form-control">
                                @foreach(config('constants.blood_groups') as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <span>Select Date</span>
                            <input id="required_date" type="text" class="form-control datepicker" value="" autocomplete="off"/>
                        </div>
                        <div class="form-group">
                            <span>Select Country</span>
                            <select name="country" class="form-control">
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
                            <span>Hospital</span>
                            <input id="hospital_name" type="text" class="form-control" value=""/>
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
                                    <th>Required date</th>
                                    <th>Hospital</th>
                                    <th>Blood Group</th>
                                    <th>Blood Units</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@push('custom-scripts')
<script type="text/javascript">
$(function () {

    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('currentNeeds') }}",
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            data: function (d) {
                d.blood_type = $('#blood_type').val();
                d.required_date = $('#required_date').val();
                d.district = $('#district').val();
                d.hospital_name = $('#hospital_name').val();
            }
        },
        columns: [
            {data: 'required_date', name: 'required_date'},
            {data: 'hospital_name', name: 'hospital_name'},
            {data: 'blood_type', name: 'blood_type'},
            {data: 'blood_units', name: 'blood_units'}
        ]
    });

    $('#filter_records').click(function () {
        table.draw();
    });
});
</script>
@endpush
@include('voyager-frontend::partials.footer')
