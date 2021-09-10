<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/font/font.css') }}">
    <style rel="stylesheet">
       body{
            background: url("{{ asset('/template/vector-night-sky.jpg') }}") no-repeat center center fixed;
            height:100%;
            background-size: cover;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
        }
       .error-code .col-lg-4{
           font-family: BYekan,'sans-serif';
           font-size:7.1em;
           color: #FFFFFF;
       }
       .error-message .col-lg-4{
           font-family: BYekan,'sans-serif';
           font-size: 1.2em;
           color: #FFFFFF;
       }
    </style>
</head>
<body>
<div>
        <div class="container error-code mt-5">
            <div class="row">
                <div class="col-lg-4 text-center">
                 کد خطا  {{ $code }}
                </div>
            </div>
        </div>
        <div class="container error-message mt-5">
            <div class="row">
                <div class="col-lg-4 text-center">
                    {{ $message }}
                </div>
            </div>
        </div>
</div>


<script src="{{ asset('front/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
