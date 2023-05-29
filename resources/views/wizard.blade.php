<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>jQuery formToWizard Plugin Example</title>
        <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css">
        <style>
            .wrap { max-width: 980px; margin: 10px auto 0; }
            #steps { margin: 80px 0 0 0 }
            .commands { overflow: hidden; margin-top: 30px; }
            .prev {float:left}
            .next, .submit {float:right}
            .error { color: #b33; }
            #progress { position: relative; height: 5px; background-color: #eee; margin-bottom: 20px; }
            #progress-complete { border: 0; position: absolute; height: 5px; min-width: 10px; background-color: #337ab7; transition: width .2s ease-in-out; }

        </style>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js"></script>
        <!--<script src="../jquery.formtowizard.js"></script>-->
        <script src="{{ URL::asset('lib/formtowizard/jquery.formtowizard.js') }}"></script>

        <script>
$(function () {
    var $signupForm = $('#SignupForm');

    $signupForm.validate({errorElement: 'em'});

    $signupForm.formToWizard({
        submitButton: 'SaveAccount',
        nextBtnClass: 'btn btn-primary next',
        prevBtnClass: 'btn btn-default prev',
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

    </head>

    <body>

        <h1 style="margin:150px auto 30px auto;" class="text-center">jQuery formToWizard Plugin Example</h1>
        <div class="row wrap"><div class="col-lg-12">

                <div id='progress'><div id='progress-complete'></div></div>

                <form id="SignupForm" action="">
                    <fieldset>
                        <legend>Account information</legend>
                        <div class="form-group">
                            <label for="Name">Name</label>
                            <input id="Name" type="text" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label for="Email">Email</label>
                            <input id="Email" type="email" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label for="Password">Password</label>
                            <input id="Password" type="password" class="form-control" />
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend>Company information</legend>
                        <div class="form-group">
                            <label for="CompanyName">Company Name</label>
                            <input id="CompanyName" type="text" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label for="Website">Website</label>
                            <input id="Website" type="text" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="CompanyEmail">CompanyEmail</label>
                            <input id="CompanyEmail" type="text" class="form-control" />
                        </div>
                    </fieldset>

                    <fieldset class="form-horizontal" role="form">
                        <legend>Billing information</legend>
                        <div class="form-group">
                            <label for="NameOnCard" class="col-sm-2 control-label">Name on Card</label>
                            <div class="col-sm-10"><input id="NameOnCard" type="text" class="form-control" /></div>
                        </div>
                        <div class="form-group">
                            <label for="CardNumber" class="col-sm-2 control-label">Card Number</label>
                            <div class="col-sm-10"><input id="CardNumber" type="text" class="form-control" /></div>
                        </div>
                        <div class="form-group">
                            <label for="CreditcardMonth" class="col-sm-2 control-label">Expiration</label>
                            <div class="col-sm-10"><div class="row">
                                    <div class="col-xs-3">
                                        <select id="CreditcardMonth" class="form-control col-sm-2">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-3">
                                        <select id="CreditcardYear" class="form-control" required>
                                            <option value="2009">2009</option>
                                            <option value="2010">2010</option>
                                        </select>        
                                    </div>
                                </div></div>
                        </div>
                        <div class="form-group">
                            <label for="Address1" class="col-sm-2 control-label">Address 1</label>
                            <div class="col-sm-10"><input id="Address1" type="text" class="form-control" /></div>
                        </div>
                        <div class="form-group">
                            <label for="Address2" class="col-sm-2 control-label">Address 2</label>
                            <div class="col-sm-10"><input id="Address2" type="text" class="form-control" /></div>
                        </div>
                        <div class="form-group">
                            <label for="Zip" class="col-sm-2 control-label">ZIP</label>
                            <div class="col-sm-4"><input id="Zip" type="text" class="form-control" /></div>
                            <label for="Country" class="col-sm-2 control-label">Country</label>
                            <div class="col-sm-4"><select id="Country" class="form-control">
                                    <option value="CA">Canada</option>
                                    <option value="US">United States of America</option>
                                    <option value="GB">United Kingdom (Great Britain)</option>
                                </select>
                            </div>
                    </fieldset>
                    <p>
                        <button id="SaveAccount" class="btn btn-primary submit">Submit form</button>
                    </p>
                </form>

            </div></div>
    </body>
</html>
