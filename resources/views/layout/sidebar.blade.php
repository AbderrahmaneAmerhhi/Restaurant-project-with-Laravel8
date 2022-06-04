<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Resto') }}</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--icon dsite likatban lfo9-->
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
                {{-- <!--- Search -->
                <div class="search">
                    <label >
                        <input type="text" placeholder="Search Here">
                        <ion-icon name="search"></ion-icon>
                    </label>
                </div> --}}
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

            {{-- <!-- Page Content -->
            <!-- Cards bhal hadok fin taykono statistics -->
            <div class="CardBox">
                <div class="Card">
                    <div>
                        <div class="numbers">1.0972</div>
                        <div class="CardName">Daily Views</div>
                    </div>
                    <div class="iconBox"><ion-icon name="eye"></ion-icon></div>
                </div>
                <div class="Card">
                    <div>
                        <div class="numbers">80</div>
                        <div class="CardName">Sales</div>
                    </div>
                    <div class="iconBox">
                        <ion-icon name="basket"></ion-icon>
                    </div>
                </div>
                <div class="Card">
                    <div>
                        <div class="numbers">239</div>
                        <div class="CardName">Comments</div>
                    </div>
                    <div class="iconBox">
                        <ion-icon name="chatbubbles"></ion-icon>
                    </div>
                </div>
                <div class="Card">
                    <div>
                        <div class="numbers">$7,172</div>
                        <div class="CardName">Earning</div>
                    </div>
                    <div class="iconBox">
                          <ion-icon name="cash"></ion-icon>
                    </div>
                </div>
            </div>
 --}}


             {{--maydar includ lalart  taykono les messgae bach mantihch fmochkil dstyle dmargin ope --}}
                 <div class="row">
                    <div class="col-md-6 mx-auto my-4">
                        @include('layout.alerts') {{-- hna fin antl3 les message dyali --}}

                    </div>
                </div>
             <div class="content-container">
        @yield('content')
        <!-- Navigation  -->
            <!--- details Lists --->
            <!--<div class="details">
                <!--- order details List
                <div class="recentOrders">
                    <div class="cartHeader">
                        <h2>Recent Oders</h2>
                        <a href="#" class="btn">View All</a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Price</td>
                                <td>Payment</td>
                                <td>status</td>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>Star Refrigerartore</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td><span class="status delivered">Delivred</span></td>
                            </tr>
                            <tr>
                                <td>Window Coolers</td>
                                <td>$1210</td>
                                <td>Due</td>
                                <td><span class="status pending">Pending</span></td>
                            </tr>
                            <tr>
                                <td>Speakers</td>
                                <td>$620</td>
                                <td>Paid</td>
                                <td><span class="status return">return</span></td>
                            </tr>
                            <tr>
                                <td>Hp Laptop</td>
                                <td>$110</td>
                                <td>Dua</td>
                                <td><span class="status inProgress">In Progress</span></td>
                            </tr>
                            <tr>
                                <td>Appele Watch </td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td><span class="status delivered">Delivred</span></td>
                            </tr>
                            <tr>
                                <td>Wall Fan</td>
                                <td>$110</td>
                                <td>Paid</td>
                                <td><span class="status pending">Pending</span></td>
                            </tr>
                            <tr>
                                <td>Adidas Shoes</td>
                                <td>$260</td>
                                <td>Paid</td>
                                <td><span class="status return">Return</span></td>
                            </tr>
                            <tr>
                                <td>Denim Shirts</td>
                                <td>$620</td>
                                <td>Due</td>
                                <td><span class="status inProgress">In Progress</span></td>
                            </tr>
                            <tr>
                                <td>Casual Shoeas</td>
                                <td>$520</td>
                                <td>Paid</td>
                                <td><span class="status pending">Pending</span></td>
                            </tr>
                            <tr>
                                <td>Wall Fan</td>
                                <td>$110</td>
                                <td>Paid</td>
                                <td><span class="status pending">Pending</span></td>
                            </tr>
                            <tr>
                                <td>Denim Shirts</td>
                                <td>$260</td>
                                <td>Due</td>
                                <td><span class="status inProgress">In Progress</span></td>
                            </tr>
                        </tbody>

                    </table>
                </div>

                <!-- New Costumers
                <div class="recentCustomers">
                    <div class="cartHeader">
                        <h2>Recent Customers</h2>
                    </div>

                    <table>
                        <tr>
                            <td width="60px"><div class="imgBx"><img src="images/img1.jpg" alt=""></div></td>
                            <td><h4>David<br><span>Italy</span></h4></td>
                        </tr>
                        <tr>
                            <td width="60px"><div class="imgBx"><img src="images/img2.jpg" alt=""></div></td>
                            <td><h4>Jonas<br><span>Germany</span></h4></td>
                        </tr>
                        <tr>
                            <td width="60px"><div class="imgBx"><img src="images/img3.jpg" alt=""></div></td>
                            <td><h4>Taha<br><span>Tunisy</span></h4></td>
                        </tr>
                        <tr>
                            <td width="60px"><div class="imgBx"><img src="images/img4.jpg" alt=""></div></td>
                            <td><h4>Marco<br><span>Brazill</span></h4></td>
                        </tr>
                        <tr>
                            <td width="60px"><div class="imgBx"><img src="images/img5.jpg" alt=""></div></td>
                            <td><h4>Anna<br><span>Russia</span></h4></td>
                        </tr>
                        <tr>
                            <td width="60px"><div class="imgBx"><img src="images/img6.jpg" alt=""></div></td>
                            <td><h4>Manolavi<br><span>Italy</span></h4></td>
                        </tr>
                        <tr>
                            <td width="60px"><div class="imgBx"><img src="images/img7.jpg" alt=""></div></td>
                            <td><h4>Thomas<br><span>Ausstria</span></h4></td>
                        </tr>
                        <tr>
                            <td width="60px"><div class="imgBx"><img src="images/img8.jpg" alt=""></div></td>
                            <td><h4>Serrio<br><span>Spain</span></h4></td>
                        </tr>
                        <tr>
                            <td width="60px"><div class="imgBx"><img src="images/img9.jpg" alt=""></div></td>
                            <td><h4>Xavi<br><span>spain</span></h4></td>
                        </tr>
                    </table>
                </div>

            </div>-->




        </div>
    </div>
     {{--  3D Pie Chart script  --}}
     <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
     {{-- Bootstrap5 script --}}
     <script src="../../js/Bootstrap5.js"></script>

     <!-- icons ankhdm b ionicons link dsite : https://ionic.io/ionicons/v4 -->
     <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
     {{-- Sweetalert script cdn --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- scriptat dyal mibyanat --}}
     <script src="{{asset('js/charts.js')}}"></script>


     <script>
    // Menu Toggel ( kolma wrkn 3la button d toggel i4br menu oila 3awdna wrkna iban )
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
