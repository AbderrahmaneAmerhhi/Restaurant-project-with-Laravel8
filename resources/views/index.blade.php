@extends('layout.app')

@section('content')
    {{-- Index page content  --}}

    <!--- Home Section Start ---->
       <section class="home" id="home">

           <div class="swiper home-slider">
               <div class="swiper-wrapper wrapper">
                   <div class="swiper-slide slide">
                       <div class="content">
                           <span>our royalty dishes</span>
                           <h3>Couscous</h3>
                           <p>The varied Moroccan traditional food that we offer many of this dish, such as couscous with meat or chicken and various vegetables, as well as couscous with fish.</p>
                           <a href="#" class="btn">order now</a>
                       </div>
                       <div class="image">
                           <img src="{{asset('images/backgrounds/CouscoBack.png')}}" alt="">
                       </div>
                   </div>

                   <div class="swiper-slide slide">
                        <div class="content">
                            <span>our royalty dishes</span>
                            <h3>Bastilla</h3>
                            <p>Bastila is one of the most traditional Moroccan dishes that are prepared in most Moroccan proportions and we offer you this unique dish in a variety of different forms.</p>
                            <a href="#" class="btn">order now</a>
                        </div>
                        <div class="image">
                            <img src="{{asset('images/backgrounds/bstillabacknew.png')}}" alt="">
                        </div>
                    </div>

                    <div class="swiper-slide slide">
                        <div class="content">
                            <span>our royalty dishes</span>
                            <h3>Fish</h3>
                            <p>We offer the most delicious various marine dishes such as tagine with fish,
                                 a traditional Moroccan dish, fried fish such as sardines and seafood,
                                  which are served in various forms,
                                   and the unique Spanish paella dish, We also offer the most delicious grilled fish
                                 .</p>
                            <a href="#" class="btn">order now</a>
                        </div>
                        <div class="image">
                            <img src="{{asset('images/backgrounds/fishback.png')}}" alt="">
                        </div>
                    </div>
               </div>

               <div class="swiper-pagination"></div>

           </div>
       </section>


    <!--- Home Section End --->

    @if ($propmenus !== 0)
         <!-- Dish section Strat  --->
      <section class="dishes" id="dishes">
          <h3 class="sub-heading">our dishes</h3>
          <h1 class="heading">popular dishes</h1>
          <div class="box-container">
              @foreach ($propmenus as $propmenu)
              <div class="box">
                  <form action="{{route('Jador.store')}}" method="POST">
                      @csrf
                      @if (auth()->user())
                          <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                          <input type="hidden" name="menu_id" value="{{$propmenu->id}}">
                      @endif
                    <button type="submit"> <i class="fas fa-heart"></i></button>
                    {{--<a href="#" class="fas fa-eye"></a>--}}
                  </form>
                  <img src="{{asset('images/menu/'.$propmenu->image)}}" alt="">
                  <h3>{{$propmenu->title}}</h3>

                  <span>{{$propmenu->pric}} MAD</span>
                  <form action="{{route('cart.add',$propmenu->id)}}" method="POST">

                    <input type="hidden" name="quantity"  value="1">
                    @csrf
                    <button
                     type="submit"
                     class="btn">add to cart</button>
                </form>

              </div>
              @endforeach
          </div>
      </section>
    <!-- Dish section End  --->
     @endif


    <!-- About Section Start -->
      <section class="about" id="about">
        <h3 class="sub-heading">about us</h3>
        <h1 class="heading">why choose us?</h1>
        <div class="row">
            <div class="image">
                <img src="{{asset('images/backgrounds/aboutbackk.png')}}" alt="">
            </div>
            <div class="content">
                <h3>Best Food In The kingdom</h3>
                <p>Our restaurant features traditional Moroccan dishes delicious and varied and offers foreign dishes, especially Italian pizzas, plumbers and a variety of drinks and we have many branches in several cities in the Kingdom and my brother's
                 branches outside the Kingdom</p>
                <p>
                    We offer our dishes in high quality we make sure the health of
                    our customers and care for them and work in our restaurants
                     the most experienced cooks we offer many additional services
                      excellent discounts you will not find except in our restaurants,
                       advances evenings on the music of KNAWA and the  historical
                        Moroccan and African  music , free food delivery  ,Can you also pay easily with your bank card or through your mobile phone,
                        we hope
                      to like you and visit our restaurants with your friends and family and enjoy the dishes.
                </p>
                <div class="icons-container">
                    <div class="icons">
                        <i class="fas fa-shipping-fast"></i>
                        <span>free delivery</span>
                    </div>
                    <div class="icons">
                        <i class="fas fa-dollar-sign"></i>
                        <span>easy payments</span>
                    </div>
                    <div class="icons">
                        <i class="fas fa-headset"></i>
                        <span>24/7 service</span>
                    </div>
                </div>
            </div>
        </div>
      </section>

    <!-- About Section End -->



    <!-- menu Section start-->

     <section class="menu" id="menu">
        <h3 class="sub-heading">our menu</h3>
        <h1 class="heading">today's speciality</h1>
        <div class="box-container">
            @foreach ($menus as $menu)
                 <div class="box">
                    <div class="image">
                        <img src="{{asset('images/menu/'.$menu->image)}}" alt="">
                        <form action="{{route('Jador.store')}}" method="POST">
                            @csrf
                            @if (auth()->user())
                                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                                <input type="hidden" name="menu_id" value="{{$menu->id}}">
                            @endif
                            <button type="submit"> <i class="fas fa-heart"></i></button>
                        </form>
                    </div>
                    <div class="content">

                        <h3>{{$menu->title}}</h3>
                        <p>
                            {{$menu->description}}
                        </p>
                        <span class="price">{{$menu->pric}} MAD</span>
                        <form action="{{route('cart.add',$menu->id)}}" method="POST">
                            {{--  nsift qte =1 f index  cart --}}
                            <input type="hidden" name="quantity"  value="1">
                            @csrf
                            <button
                            type="submit"
                            class="btn">add to cart</button>
                        </form>

                    </div>
                </div>
            @endforeach


        </div>
     </section>

    <!-- menu section end -->

    <!-- review section start -->
    @if ($reviews->count())
    <section class="review" id="review">
        <h3 class="sub-heading">customer's review</h3>
        <h1 class="heading">what they say</h1>
            <div class="swiper-container review-slider ">
                    <div class="swiper-wrapper">

            @foreach ($reviews as $review)
                     @if ($review->status)
                          <div class="swiper-slide slide">
                                <i class="fas fa-quote-right"></i>
                                <div class="userrev">
                                    @if ($review->user->image === 'image')
                                    <img src="{{asset('images/profile/userImage.png')}}" alt="user-image">
                                    @else
                                    <img src="{{asset('images/profile/'.$review->user->image)}}" alt="user-image">
                                    @endif

                                    <div class="user-info">
                                        <h3>{{$review->user->name}}</h3>
                                    </div>

                                </div>
                                    <p>
                                    {{$review->comment}}
                                    </p>

                            </div>

                     @endif


            @endforeach




           </div>
        </div>
    </section>
     @endif
    <!-- review section end -->

     <!-- Ordre Section start -->
      <div class="review2" id="review2">
        <h3 class="sub-heading">review</h3>
        <h1 class="heading">Add your review about our services</h1>
        <form action="{{route('reviews.store')}}" method="POST">
            @csrf
            <div class="inputBox">
                <div class="input">
                    <span>your review</span>
                    <textarea name="comment" placeholder="entre your review" id="" cols="30" rows="10"></textarea>
                </div>
            </div>

            <input type="submit" value="add your review" class="btn">
        </form>
      </div>

     <!-- Ordre Section end --->
@endsection
