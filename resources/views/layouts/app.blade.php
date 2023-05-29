<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Modern Business - Start Bootstrap Template</title>

        <!--<link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}" />-->

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
        <link href="{{ URL::asset('lib/jquerysctipttop/jquerysctipttop.css') }}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{ URL::asset('css/modern-business.css') }}" />
        <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">


<!--<script src="/js/app.js"></script>-->

        <script src="{{ URL::asset('lib/jquery/jquery.min.js') }}"></script>
        <script src="{{ URL::asset('lib/jquery-validation/jquery.validate.min.js') }}"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script type="text/javascript" src="{{ URL::asset('js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ URL::asset('lib/formtowizard/jquery.formtowizard.js') }}"></script> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>

        <script type="text/javascript">
$(function () {
    $(".datepicker").datepicker({
        dateFormat: "yy-mm-dd"
    });

    $(function () {
        $('.timepicker').datetimepicker({
            format: 'LT'
        });
    });
});
        </script>
        <!-- Laravel Javascript Validation -->
        <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    </head>
    <body style="padding-top: 0px;">
        @yield('content')

        <!-- Bootstrap core JavaScript -->
    <!--<script src="vendor/jquery/jquery.min.js"></script>-->

    </body>
</html>
