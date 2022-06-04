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

    <title>Register</title>
</head>
<body>
  <div class="container">
        <div class="myCard">
            <div class="row">
                <div class="col-md-6">
                    <div class="myLeftCtn">
                        <form action="{{route('user.register')}}" class="myForm text-center" method="POST">
                            @CSRF
                            <header>Register</header>
                            <div class="form-group mb-3">
                                <i class="fas fa-user"></i>
                                <input type="text" class="myInput" placeholder="Username" name="name" id="username" required>
                                <div class="invalid-feedback">Please fill out field</div>
                            </div>
                            <div class="form-group mb-3">
                                <i class="fas fa-envelope"></i>
                                <input type="email" name="email" class="myInput" placeholder="Email" id="email" required>
                            </div>
                             <div class="form-group mb-3">
                                <i class="fas fa-solid fa-city"></i>
                                <input type="city" class="myInput" placeholder="Ville" name="ville" id="username" required>
                            </div>
                            <div class="form-group mb-3">
                                <i class="fas fa-lock"></i>
                                <input type="password" min="9"  name="password" class="myInput" placeholder="Password" id="password" required>
                            </div>
                           <div class="form-group mb-3">
                                <span>
                                        <small>I have an account </small>,
                                        <a href="/login"  class="register-link">Sign in</a>
                                </span>

                            </div>
                            <input type="submit" class="butt" value="SIGN UP">

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
