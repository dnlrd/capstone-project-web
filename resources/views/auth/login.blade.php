<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <script src="{{asset('@tabler/core/dist/js/tabler.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('@tabler/core/dist/css/tabler.min.css')}}">

    <link href="{{asset('@tabler/core/dist/css/tabler.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('@tabler/core/dist/css/tabler-flags.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('@tabler/core/dist/css/tabler-payments.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('@tabler/core/dist/css/tabler-vendors.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('@tabler/core/dist/css/demo.min.css')}}" rel="stylesheet"/>
    <style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
      	--tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
      body {
      	font-feature-settings: "cv03", "cv04", "cv11";
      }
    </style>
</head>
<body>
<div class="page page-center">
    <div class="container container-tight py-4">
   

      <div class="card card-md">
        <div class="card-body">
          <h2 class="h2 text-center mb-4">Login to your account</h2>
          <form method="POST" action="{{ route('login') }}">
          @csrf
            <div class="mb-3">
              <label class="form-label">Email address</label>
              <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus>
            </div>
            <div class="mb-2">
              <label class="form-label">
                Password
                
              </label>
              <div class="input-group input-group-flat">
                <input id="password" class="form-control"  type="password" name="password" required>
                <span class="input-group-text">
                  <a href="#" class="link-secondary" data-bs-toggle="tooltip" aria-label="Show password" data-bs-original-title="Show password"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"></path></svg>
                  </a>
                </span>
              </div>
            </div>
            <div class="form-footer">
              <button type="submit" class="btn btn-primary w-100">Sign in</button> 
            </div>
          </form>
          @if ($errors->any())
<div class="alert alert-danger mt-2" id="error-container">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

        </div>
    </div>
  </div>
  <script>
    // Toggle the type of the input field when the link is clicked
    const passwordInput = document.querySelector("input[type='password']");
    const showPasswordLink = document.querySelector("a[href='#']");
    
    showPasswordLink.addEventListener("click", function() {
      passwordInput.setAttribute("type", passwordInput.getAttribute("type") === "password" ? "text" : "password");
    });
  </script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
        const errorContainer = document.getElementById('error-container');

        if (errorContainer) {
            setTimeout(function () {
                errorContainer.style.transition = 'opacity 1s';
                errorContainer.style.opacity = '0';
                setTimeout(function () {
                    errorContainer.remove();
                }, 1000); 
            }, 5000);
        }
    });
</script>
  <script src="{{asset('@tabler/core/dist/js/tabler.min.js')}}" defer></script>
    <script src="{{asset('@tabler/core/dist/js/demo.min.js')}}" defer></script>
</body>
</html>