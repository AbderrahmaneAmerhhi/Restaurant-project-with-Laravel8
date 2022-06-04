@extends('layout.sidebar')


@section('search')
   {{-- section   shearch   --}}
   <div class="search">
       <form action="{{route('orders.search')}}" method="POST" id="serach">
        @csrf
             <label>
              <input type="text" placeholder="Search Here" name="search" id="search"
                     onabort="event.preventDefault();
                         document.getElementById('serach').submit();
                     "
              >
              <ion-icon name="search"></ion-icon>

            </label>
        </form>
    </div>
@endsection
@section('content')
  <!-- Cards -->
            <div class="CardBox">
                <div class="Card">
                    <div>
                        <div class="numbers">{{$sales}}</div>
                        <div class="CardName">Orders</div>
                    </div>
                    <div class="iconBox">
                        <ion-icon name="basket"></ion-icon>
                    </div>
                </div>
                <div class="Card">
                    <div>
                        <div class="numbers">{{$ArchivedOrders}}</div>
                        <div class="CardName">Orders Archive</div>
                    </div>
                    <div class="iconBox">
                       <ion-icon name="archive"></ion-icon>
                    </div>
                </div>
                <div class="Card">
                    <div>
                        <div class="numbers">{{$usersCount}}</div>
                        <div class="CardName">Customers</div>
                    </div>
                    <div class="iconBox"><ion-icon name="person"></ion-icon></div>
                </div>

                <div class="Card">
                    <div>
                        <div class="numbers">{{$Earning}}DH</div>
                        <div class="CardName">Earning</div>
                    </div>
                    <div class="iconBox">
                          <ion-icon name="cash"></ion-icon>
                    </div>
                </div>
            </div>
    {{-- orders list --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="div-header d-flex flex-row justify-content-between align-item-center border-bottom p-2">
                            <h3>
                                <ion-icon name="list"></ion-icon>
                            </h3>
                        </div>
                        <!--- details Lists --->
                        <div class="cat-details">
                                <!--- category details List -->
                                <div class="list">
                                    <div class="cartHeader">
                                        <h2>Orders</h2>
                                         @if (Route::currentRouteName() == 'orders.archive')
                                            <a href="{{route('orders.index')}}" class="btn">View Orders</a>
                                        @else
                                             <a href="{{route('orders.archive')}}" class="btn">View Archived Orders</a>
                                        @endif

                                    </div>
                                    <div class="table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <td>#ID</td>
                                                <td>Customers</td>
                                                <td>Menu</td>
                                                <td>Quantity</td>
                                                <td>Price</td>
                                                <td>Total</td>
                                                <td>Paid</td>
                                                <td>Deliverde</td>
                                                <td class="text-center">Action</td>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            @foreach ($orders as $order)
                                                 <tr>
                                                    <td>{{$order->id}}</td>
                                                    <td>
                                                        {{$order->User->name}}
                                                    </td>
                                                    <td>{{$order->menu_name}}</td>
                                                    <td>{{$order->qte}}</td>
                                                    <td>{{$order->price}} MAD</td>
                                                    <td>{{$order->total}} MAD</td>
                                                    <td>
                                                         @if ($order->paid)
                                                          <i class="fa fa-check text-success"></i>

                                                        @else
                                                          <i class="fa fa-close text-danger"></i>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($order->deliverde)
                                                          <i class="fa fa-check text-success"></i>

                                                        @else
                                                          <i class="fa fa-close text-danger"></i>
                                                        @endif
                                                    </td>

                                                    <td class="d-flex flex-row justify-content-center align-items-center ">
                                                        {{-- delevred button --}}
                                                        @if ($order->deliverde === 0)
                                                            <form id="{{$order->id}}" action="{{route('orders.update',$order->id)}}" method="POST">
                                                          @csrf
                                                          @method('PUT')
                                                          <button
                                                            title="Menu Delivered"
                                                            onclick="event.preventDefault();
                                                            document.getElementById({{$order->id}}).submit();"
                                                            class="btn  btn-pr  btn-sm ml-2" >
                                                                <i class="fa fa-check text-white"></i>
                                                                </button>
                                                            </form>
                                                        @endif

                                                        @if (empty($order->deleted_at))
                                                             {{-- Archive form --}}
                                                         <form id="{{$order->id}}" action="{{route("orders.destroy",$order->id)}}" method="post" style="margin-left: 4px !important">
                                                           @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger btn-sm"
                                                                title="Archive order"
                                                               onclick="event.preventDefault();

                                                                    Swal.fire({
                                                                    title: 'Are you sure?',
                                                                    text: 'Do you want to Archive this  Order',
                                                                    icon: 'warning',
                                                                    showCancelButton: true,
                                                                    confirmButtonColor: '#3085d6',
                                                                    cancelButtonColor: '#d33',
                                                                    confirmButtonText: 'Yes, Archive it!'
                                                                    }).then((result) => {
                                                                    if (result.isConfirmed) {
                                                                        document.getElementById('{{$order->id}}').submit();
                                                                        Swal.fire(
                                                                        'Deleted!',
                                                                        'The Order has been Archived.',
                                                                        'success'
                                                                        )
                                                                    }
                                                                    })
                                                               "
                                                            >
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                                                        @else
                                                            <form  id="{{$order->id}}"
                                                                    action="{{route("order.unarchive",$order->id)}}"
                                                                    method="Post">
                                                                    @csrf
                                                                    @method("PUT")
                                                                <button
                                                                title="Unarchive this Order"
                                                                onclick="event.preventDefault();
                                                                document.getElementById({{$order->id}}).submit();"
                                                                class="btn  btn-pr  btn-sm ml-2" >
                                                                    <i class="fa-solid fa-diagram-next text-white"></i>
                                                                </button>
                                                                </form>

                                                        @endif


                                                    </td>
                                                </tr>

                                            @endforeach
                                       </tbody>

                                    </table>
                                    </div>


                                </div>

                            </div>
                             {{-- Pagination --}}
                                    <div class="justify-content-center d-flex">
                                           {{$orders->links("pagination::bootstrap-4")}}
                                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
@endsection
