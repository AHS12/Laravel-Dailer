<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="content-type" content="text/x-component">
    <!-- CSRF -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dialer</title>

    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="favicon.ico" />
    <link rel="icon" type="image/png" href="favicon.png" />


    <script src="{{asset('vendor/js/modernizr.min.js')}}"></script>

    <link href="{{asset('vendor/css/normalize.css')}}" media="screen,projection" type="text/css" rel="stylesheet" />
    <link href="{{asset('vendor/css/bootstrap.min.css')}}" media="screen,projection" type="text/css" rel="stylesheet" />
    <link href="{{asset('vendor/css/font-awesome.min.css')}}" media="screen,projection" type="text/css"
        rel="stylesheet" />
    <link href="{{asset('css/main.css')}}" media="screen,projection" type="text/css" rel="stylesheet" />

    <!--[if lte IE 8]>
        <link href="css/ie.css" media="screen, projection" type="text/css" rel="stylesheet" />
    <![endif]-->

    <link href="{{asset('css/print.css')}}" media="print" type="text/css" rel="stylesheet" />


</head>

<body>
    <!--[if lte IE 8]>
    <div class="browsehappy">You are using an <strong>outdated</strong> browser. Please
        <a href="http://browsehappy.com/" target="_blank">upgrade your browser</a> to improve your experience.</div>
<![endif]-->

    <style>

    </style>
    <div id="wrapper">
        <div class="dialpad compact">
            <div class="row" id="output-div">
                {{-- <div class="suggest text-center">
                    <h3>First Name</h3>
                    <p>+8801818947266</p>
                </div>
                <div class="suggest text-center">
                    <h3>First Name</h3>
                    <p>+8801818947266</p>
                </div>
                <div class="suggest text-center">
                    <h3>First Name</h3>
                    <p>+8801818947266</p>
                </div>
                <div class="suggest text-center">
                    <h3>First Name</h3>
                    <p>+8801818947266</p>
                </div> --}}
            </div>
            <div class="row">
                <div class="col-md-2 match" data-toggle="modal" data-target="#contactlist"><span id="match-text">
                        </span></div>
                <div class="col-md-10 number"></div>
            </div>


            <div class="dials">
                <ol>
                    <li class="digits">
                        <p><strong>1</strong></p>
                    </li>
                    <li class="digits">
                        <p><strong>2</strong><sup>abc</sup></p>
                    </li>
                    <li class="digits">
                        <p><strong>3</strong><sup>def</sup></p>
                    </li>
                    <li class="digits">
                        <p><strong>4</strong><sup>ghi</sup></p>
                    </li>
                    <li class="digits">
                        <p><strong>5</strong><sup>jkl</sup></p>
                    </li>
                    <li class="digits">
                        <p><strong>6</strong><sup>mno</sup></p>
                    </li>
                    <li class="digits">
                        <p><strong>7</strong><sup>pqrs</sup></p>
                    </li>
                    <li class="digits">
                        <p><strong>8</strong><sup>tuv</sup></p>
                    </li>
                    <li class="digits">
                        <p><strong>9</strong><sup>wxyz</sup></p>
                    </li>
                    <li class="digits">
                        <p><strong>*</strong></p>
                    </li>
                    <li class="digits">
                        <p><strong>0</strong><sup>+</sup></p>
                    </li>
                    <li class="digits">
                        <p><strong>#</strong></p>
                    </li>
                    <li class="digits">
                        <p><strong><i class="fa fa-refresh"></i></strong><sup>Clear</sup></p>
                    </li>
                    <li class="digits">
                        <p><strong><i class="fa fa-times"></i></strong><sup>Delete</sup></p>
                    </li>
                    <li class="digits pad-action">
                        <p><strong><i class="fa fa-phone"></i></strong> <sup>Cal
                                l</sup></p>
                    </li>
                </ol>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="contactlist" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">All Contact Suggestions</h4>
                </div>
                <div class="modal-body" id="all-suggestion-div">
                    {{-- <div class="suggest text-center">
                <h3>First Name</h3>
                <p>+8801818947266</p>
            </div>
            <div class="suggest text-center">
                <h3>First Name</h3>
                <p>+8801818947266</p>
            </div> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <!--[if lte IE 8]>
    <script src="vendor/js/respond.min.js" type="text/javascript"></script>
<![endif]-->

    <script src="{{asset('vendor/js/jquery-3.5.1.min.js')}}"></script>
    {{-- <script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script> --}}
    <script src="{{asset('vendor/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/ajaxSetup.js')}}"></script>

    <script>
        $(document).ready(function () {
            var dials = $(".dials ol li");
            var index;
            var number = $(".number");
            var total;

            dials.click(function () {

                index = dials.index(this);

                if (index == 9) {

                    number.append("*");

                } else if (index == 10) {

                    number.append("0");

                } else if (index == 11) {

                    number.append("#");

                } else if (index == 12) {

                    number.empty();

                } else if (index == 13) {

                    total = number.text();
                    total = total.slice(0, -1);
                    number.empty().append(total);

                } else if (index == 14) {

                    //add any call action here

                } else {
                    number.append(index + 1);
                }

                console.log(number.text());
                var data = {
                    "queryFilter": number.text(),
                }

                console.log(data);

                //search
                $.ajax({
                    url: "{{ url('contact/search') }}",
                    method: "POST",
                    data: data,
                    dataType: "json",
                    beforeSend: function () {

                    },
                    complete: function () {

                    },
                    success: function (result) {
                        console.log(result);
                        //output
                        $("#output-div").empty();
                        $("#all-suggestion-div").empty();
                        var markupOutput = '';
                        var markupSuggestion = '';

                        $("#match-text").text(result.length+" match");

                        $.each(result, function (index, value) {
                                markupSuggestion += '<div class="suggest text-center">';
                                markupSuggestion += '<h3>'+value.first_name+' '+value.last_name+'</h3>';
                                markupSuggestion += '<p>'+value.phone+'</p>';
                                markupSuggestion += '</div>';   
                            });

                            $("#all-suggestion-div").append(markupSuggestion);  

                        if (result.length > 3) {
                            var outputarray = result.slice(0, 3);
                            $.each(outputarray, function (index, value) {
                                markupOutput += '<div class="suggest text-center">';
                                markupOutput += '<h3>'+value.first_name+' '+value.last_name+'</h3>';
                                markupOutput += '<p>'+value.phone+'</p>';
                                markupOutput += '</div>';   
                            });
                            $("#output-div").append(markupOutput);

                        } else {
                            
                            $("#output-div").append(markupSuggestion);

                        }

                        //modal

                    },
                    error: function (jqXHR, exception) {
                        var msg = '';
                        if (jqXHR.status === 0) {
                            msg = 'Not connect.Verify Network.';

                        } else if (jqXHR.status == 404) {
                            msg = 'Requested page not found. [404]';

                        } else if (jqXHR.status == 413) {
                            msg = 'Request entity too large. [413]';

                        } else if (jqXHR.status == 419) {
                            msg = 'CSRF error or Unknown Status [419]';

                        } else if (jqXHR.status == 500) {
                            msg = 'Internal Server Error [500].';

                        } else if (exception === 'parsererror') {
                            msg = 'Requested JSON parse failed.';

                        } else if (exception === 'timeout') {
                            msg = 'Time out error.';

                        } else if (exception === 'abort') {
                            msg = 'Ajax request aborted.';

                        } else {
                            msg = 'Uncaught Error.\n' + jqXHR
                                .responseText;
                        }

                        console.log(msg);

                    }
                });
            });

            $(document).keydown(function (e) {

                switch (e.which) {

                    case 96:

                        number.append("0");
                        break;

                    case 97:

                        number.append("1");
                        break;

                    case 98:

                        number.append("2");
                        break;

                    case 99:

                        number.append("3");
                        break;

                    case 100:

                        number.append("4");
                        break;

                    case 101:

                        number.append("5");
                        break;

                    case 102:

                        number.append("6");
                        break;

                    case 103:

                        number.append("7");
                        break;

                    case 104:

                        number.append("8");
                        break;

                    case 105:

                        number.append("9");
                        break;

                    case 8:

                        total = number.text();
                        total = total.slice(0, -1);
                        number.empty().append(total);
                        break;

                    case 27:

                        number.empty();
                        break;

                    case 106:

                        number.append("*");
                        break;

                    case 35:

                        number.append("#");
                        break;

                    case 13:

                        $('.pad-action').click();
                        break;

                    default:
                        return;
                }

                e.preventDefault();

                //search
                $.ajax({
                    url: "{{ url('contact/search') }}",
                    method: "POST",
                    data: {
                        query: number.text()
                    },
                    enctype: 'multipart/form-data',
                    processData: false,
                    cache: false,
                    contentType: false,
                    timeout: 600000,
                    beforeSend: function () {

                    },
                    complete: function () {

                    },
                    success: function (result) {
                        console.log(result);

                    },
                    error: function (jqXHR, exception) {
                        var msg = '';
                        if (jqXHR.status === 0) {
                            msg = 'Not connect.Verify Network.';

                        } else if (jqXHR.status == 404) {
                            msg = 'Requested page not found. [404]';

                        } else if (jqXHR.status == 413) {
                            msg = 'Request entity too large. [413]';

                        } else if (jqXHR.status == 419) {
                            msg = 'CSRF error or Unknown Status [419]';

                        } else if (jqXHR.status == 500) {
                            msg = 'Internal Server Error [500].';

                        } else if (exception === 'parsererror') {
                            msg = 'Requested JSON parse failed.';

                        } else if (exception === 'timeout') {
                            msg = 'Time out error.';

                        } else if (exception === 'abort') {
                            msg = 'Ajax request aborted.';

                        } else {
                            msg = 'Uncaught Error.\n' + jqXHR
                                .responseText;
                        }

                        console.log(msg);

                    }
                });
            });





        });

    </script>
    {{-- <script src="{{asset('js/main.js')}}"></script> --}}
</body>

</html>
