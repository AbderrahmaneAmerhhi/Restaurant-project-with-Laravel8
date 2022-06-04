<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
      {{-- My Style Style link  --}}
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    {{-- Bootstrap5 file style --}}
    <link rel="stylesheet" href="../../css/Bootstrap5.css" >
        <link rel="shortcut icon" href="{{asset("images/logos/logosite.png")}}">
    {{-- font awosem cdn link --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Login</title>
</head>
<body>
    <div class="row">
                    <div class="col-md-6 mx-auto my-4">
                        @include('layout.alerts')

                    </div>
                </div>
  <div class="container">
        <div class="myCard">
            <div class="row">
                <div class="col-md-6">
                    <div class="myLeftCtn">
                        <form action="{{route('user.auth')}}" class="myForm text-center" method="POST">
                            @CSRF
                            <header>Login</header>

                            <div class="form-group mb-3">
                                <i class="fas fa-envelope"></i>
                                <input type="email" name="email" class="myInput" placeholder="Email" id="email" required>
                            </div>
                            <div class="form-group mb-3">
                                <i class="fas fa-lock"></i>
                                <input type="password" min="9" name="password" class="myInput" placeholder="Password" id="password" required>
                            </div>
                            <div class="form-group mb-3">
                                <span>
                                        <small>I don't have an account </small>,
                                        <a href="/register"  class="register-link">Sign up</a>
                                </span>
                            </div>
                            <input type="submit" class="butt" value="SIGN IN">

                        </form>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="myRightCtn">
                        <div class="box">
                            <img src="{{asset('images/backgrounds/loginpackgrnn.jpg')}}" class="login-background" alt="Login-background">
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>

      {{-- Bootstrap5 script --}}
     <script src="../../js/Bootstrap5.js"></script>

</body>
</html>
