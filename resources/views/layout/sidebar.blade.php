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
    <link rel="stylesheet" href="../../css/app.css">
    {{-- Bootstrap5 file style --}}
    <link rel="stylesheet" href="../../css/Bootstrap5.css" >

    {{-- font awosem cdn link --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @yield('style')
</head>
<body>
     {{-- Side bar  --}}
                    <!-- Navigation  -->
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon"><ion-icon name="restaurant"></ion-icon></span>
                        <span class="title">Resto Tamri</span>
                    </a>
                </li>
                <li>
                    <a href="/admin">
                        <span class="icon"><ion-icon name="home"></ion-icon></span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="/categories">
                        <span class="icon"><ion-icon name="apps"></ion-icon></span>
                        <span class="title">Categories</span>
                    </a>
                </li>
                <li>
                    <a href="/Menu">
                        <span class="icon"><ion-icon name="list-box"></ion-icon></span>
                        <span class="title">Menus</span>
                    </a>
                </li>
                <li>
                    <a href="/reviews">
                        <span class="icon"><ion-icon name="chatbubbles"></ion-icon></span>
                        <span class="title">Reviews</span>
                    </a>
                </li>
                <li>
                    <a href="/users">
                        <span class="icon"><ion-icon name="person"></ion-icon></span>
                        <span class="title">Customers</span>
                    </a>
                </li>
                <li>
                    <a href="/orders">
                        <span class="icon"><ion-icon name="cash"></ion-icon></span>
                        <span class="title">Orders</span>
                    </a>
                </li>
                <li>
                    <form action="{{route("user.logout")}}" method="post">
                    @csrf
                   <button type="submit">
                        <span class="icon"><ion-icon name="log-out"></ion-icon></span>
                        <span class="title">Sing out</span>
                   </button>
                  </form>
                </li>
            </ul>
        </div>

        <!-- main -->
        <div class="main">
            <!-- Top BAR  -->
            <div class="topBar">
                <div class="toggle">
                    <ion-icon name="menu"></ion-icon>
                </div>

                @yield('search')
                <!-- userImg -->
                <a class="user" href="{{route('user.profile',auth()->user()->id)}}">
                     @if (auth()->user()->image !== 'image')
                         <img src="{{asset('images/profile/'.auth()->user()->image)}}" alt="userImage">
                     @else
                         <img src="{{asset('images/profile/userImage.png')}}" alt="userImage">
                     @endif

                </a>
            </div>


                 <div class="row">
                    <div class="col-md-6 mx-auto my-4">
                        @include('layout.alerts')
                    </div>
                </div>
             <div class="content-container">
        @yield('content')



        </div>
    </div>
     {{--  3D Pie Chart script  --}}
     <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
     {{-- Bootstrap5 script --}}
     <script src="../../js/Bootstrap5.js"></script>

     <!-- icons ankhdm b ionicons doc url  : https://ionic.io/ionicons/v4 -->
     <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
     {{-- Sweetalert script cdn --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- scriptat dyal mibyanat --}}
     <script src="{{asset('js/charts.js')}}"></script>


     <script>
    // Menu Toggel
        let toggle = document.querySelector('.toggle');
        let navigation = document.querySelector('.navigation');
        let main = document.querySelector('.main');
        toggle.onclick = function(){
          navigation.classList.toggle('active');
          main.classList.toggle('active');
        }
     // Add hover class in selected list item
        let list = document.querySelectorAll('.navigation  li');
        function activeLink(){
            list.forEach((item) =>
            item.classList.remove('hoverd'));
            this.classList.add('hoverd');

        }
        list.forEach((item) =>
           item.addEventListener('mouseover', activeLink));
     </script>
     @yield('script')
</body>
</html>
