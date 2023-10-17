<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Default Title')</title>
    <script src="{{asset('@tabler/core/dist/js/tabler.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('@tabler/core/dist/css/tabler.min.css')}}">

    <link href="{{asset('@tabler/core/dist/css/tabler.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('@tabler/core/dist/css/tabler-flags.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('@tabler/core/dist/css/tabler-payments.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('@tabler/core/dist/css/tabler-vendors.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('@tabler/core/dist/css/demo.min.css')}}" rel="stylesheet"/>
    <style type="text/css" media="print">
    @page {
        size: auto; /* auto is the default, but you can set specific page sizes here */
        margin: 0; 
    }

    body {
        padding:20px;
    }


   
</style>

    <style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
      	--tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
      body {
      	font-feature-settings: "cv03", "cv04", "cv11";
      }
    </style>
    <style>
        .step-indicator-container {
            float: left; 
            width: 60px; 
            display: flex;
            flex-direction: column; 
            align-items: center;
        }

        .step-circle {
            width: 30px;
            height: 30px;
            background-color: #ccc;
            border-radius: 50%;
            margin-bottom: 10px; 
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
            font-size: 16px;
            color: #fff; 
        }

        .step-circle.active {
            background-color: #007bff; 
            color: #fff; 
        }

        #scrollToNext {
            position: fixed;
            bottom: 20px; 
            right: 20px; 
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none; 
            border-radius: 5px;
            cursor: pointer;
        }


        
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
<body>
    <div class="page">
        @include('components.navbar')
        <div class="page-wrapper">
            @yield('content')
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var successMessage = document.getElementById('success-message');

            if (successMessage) {
                setTimeout(function () {
                    setTimeout(function () {
                        successMessage.style.display = 'none';
                    }, 1000);
                }, 2000);
            }
        });
    </script>
    @stack('plugins')
    @stack('scripts')
    
    <script src="{{asset('@tabler/core/dist/js/tabler.min.js')}}" defer></script>
    <script src="{{asset('@tabler/core/dist/js/demo.min.js')}}" defer></script>
    
</body>
</html>