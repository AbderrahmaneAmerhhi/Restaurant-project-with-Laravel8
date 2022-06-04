<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Resto') }}</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="shortcut icon" href="{{asset("images/logos/logosite.png")}}">
    {{-- My Style Style link  --}}
    <link rel="stylesheet" href="../../css/index.css">

     {{-- Swiper js cdn link --}}
     <link
    rel="stylesheet"
    href="https://unpkg.com/swiper@8/swiper-bundle.min.css"
    />

    {{-- font awosem cdn link --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @yield('style')
</head>
<body>

    {{-- navbar --}}
    <header>

       <a href="/" class="logo"><i class="fas fa-utensils"></i>RESTOTAMRI</a>

        <nav class="navbar">
            <a href="/" class="active">home</a>
            <a href="/#dishes" >dishes</a>
            <a href="/#about" >about</a>
            <a href="/#menu">menu</a>
            <a href="/#review" >reviews</a>
            <a href="/#review2">Add review</a>
        </nav>
          @if (Auth()->guard()->check())
          {{-- Dakchi li4aytl3 ila kan user mconnecte --}}
              <div class="icons">
                <i class="fas fa-bars" id="menu-bars"></i>
                {{---<i class="fas fa-search" id="search-icon"></i>--}}
                <a href="{{route('Jador.index')}}" class="fas fa-heart"></a>
                <a href="{{route('cart.index')}}" class="fas fa-shopping-cart"></a>
                <a href="{{route('user.profile',auth()->user()->id)}}" class="user" id="auth-icon">
                     @if (auth()->user()->image !== 'image')
                         <img src="{{asset('images/profile/'.auth()->user()->image)}}" alt="userImage">
                     @else
                         <img src="images/profile/userImage.png" alt="userImage">
                     @endif
                </a>
            </div>
          @else
          {{-- Dakchi li4aytl3 ila kan user mamconnectich --}}
          <div class="icons">
            <i class="fas fa-bars" id="menu-bars"></i>
            <a href="/login" class="fas fa-user" id="auth-icon"></a>
            {{---<i class="fas fa-search" id="search-icon"></i>--}}
            <a href="#" class="fas fa-heart"></a>
            <a href="{{route('cart.index')}}" class="fas fa-shopping-cart"></a>
          </div>
          @endif



    </header>

     {{-- ennd header navbar section --}}



    {{-- end shearch form --}}
     @yield('content')



     <!-- footer section start --->
     <section class="footer">
         <div class="box-container">
             <div class="box">
                 <h3>locations</h3>
                 <a href="#">Agadir</a>
                 <a href="#">Casablanca</a>
                 <a href="#">Marakesh</a>
                 <a href="#">Madrid Spain</a>
                 <a href="#">Doha Qatar</a>
             </div>
            <div class="box">
                <h3>quick links</h3>
                <a href="/#home">home</a>
                <a href="/#dishes">dishes</a>
                <a href="/#about">about</a>
                <a href="/#menu">menu</a>
                <a href="/#review">review</a>
                <a href="/#review2">Add review</a>
            </div>
            <div class="box">
                <h3>contact info</h3>
                <a href="#">+212-643488319</a>
                <a href="#">+212-643488319</a>
                <a href="#">abderrahmane.amerhhi@gmail.com</a>
                <a href="#">tamri2002@gmail.com</a>
                <a href="#">tamri agadir 37782</a>
            </div>
            <div class="box">
                <h3>follow us</h3>
                <a href="https://web.facebook.com/profile.php?id=100004412416678">facebook</a>
                <a href="https://www.instagram.com/abderrahmane_amerrhi/">instagram</a>
                <a href="https://www.linkedin.com/in/abderrahmane-amerrhi-807b40201/">linkedin</a>
            </div>
         </div>
         <div class="credit">copyright <i class="fa-solid fa-copyright"></i> 2022 by <span>ABDERRAHMANE AMERRHI</span></div>
     </section>

     <!-- foter section end -->



     <!-- loader part -->
     <div class="loader-container">
         <img src="images/LoaderGifs/loaderr.gif" alt="">
     </div>
    {{-- swiper js script --}}
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

     {{-- my script file --}}
     <script src="{{asset('js/index.js')}}"></script>

     <!-- icons ankhdm b ionicons link dsite : https://ionic.io/ionicons/v4 -->
     <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
     {{-- Sweetalert script cdn --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
