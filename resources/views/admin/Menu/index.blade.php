@extends('layout.sidebar')


@section('search')
   {{-- section shearch   --}}
   <div class="search">
       <form action="{{route('menus.search')}}" method="POST" id="serach">
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

      <!-- Cards for statistics -->
            <div class="CardBox">
                <div class="Card">
                    <div>
                        <div class="numbers">{{$POPULARMenusCount}}</div>
                        <div class="CardName">Popular Menus</div>
                    </div>
                    <div class="iconBox">
                        <ion-icon name="star"></ion-icon>
                    </div>
                </div>
                <div class="Card">
                    <div>
                        <div class="numbers">{{$MenusCount}}</div>
                        <div class="CardName">Menus</div>
                    </div>
                    <div class="iconBox">
                        <ion-icon name="clipboard"></ion-icon>
                    </div>
                </div>
                <div class="Card">
                    <div>
                        <div class="numbers">{{$catsCount}}</div>
                        <div class="CardName">Categories</div>
                    </div>
                    <div class="iconBox"><ion-icon name="albums"></ion-icon></div>
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
    {{-- Menu list --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="div-header d-flex flex-row justify-content-between align-item-center border-bottom p-2">
                            <h3>
                                <ion-icon name="list"></ion-icon>
                            </h3>
                            <a href="{{route("Menu.create")}}" class="btn btn-primary">
                               <i class="fas fa-plus"></i>
                            </a>
                        </div>
                        <!--- details Lists --->
                        <div class="menu-details">
                                <!--- menu details List -->
                                <div class="list ">
                                    <div class="cartHeader">
                                        <h2>Menus</h2>
                                        <a href="/Menu" class="btn">View All</a>
                                    </div>
                                     <div class="table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <td>#ID</td>
                                                <td>Title</td>
                                                <td>Description</td>
                                                <td>Pric</td>
                                                <td>Old Price</td>
                                                <td>Image</td>
                                                <td class="text-center">Action</td>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($menus as $menu)
                                                <tr>
                                                    <td>{{$menu->id}}</td>
                                                    <td>{{$menu->title}}</td>
                                                    <td>{{Str::limit($menu->description,10)}}</td>
                                                    <td>{{$menu->pric}} MAD</td>
                                                    <td>{{$menu->old_price}} MAD</td>
                                                    <td>
                                                        <img src="{{asset('images//menu/'.$menu->image)}}" alt="menu_image"
                                                             class="img-fluid rounded-circle"
                                                             width="70"
                                                             height="70"
                                                        >
                                                    </td>

                                                    <td class="d-flex flex-row justify-content-center align-items-center ">
                                                        <a href="{{route('Menu.edit',$menu->id)}}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                                                        {{-- delete form --}}
                                                        <form id="{{$menu->id}}" action="{{route("Menu.destroy",$menu->id)}}" method="post" style="margin-left: 4px !important">
                                                           @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger btn-sm"
                                                               onclick="event.preventDefault();

                                                                    Swal.fire({
                                                                    title: 'Are you sure?',
                                                                    text: 'Do you want to delete category {{$menu->title}}',
                                                                    icon: 'warning',
                                                                    showCancelButton: true,
                                                                    confirmButtonColor: '#3085d6',
                                                                    cancelButtonColor: '#d33',
                                                                    confirmButtonText: 'Yes, delete it!'
                                                                    }).then((result) => {
                                                                    if (result.isConfirmed) {
                                                                        document.getElementById('{{$menu->id}}').submit();
                                                                        Swal.fire(
                                                                        'Deleted!',
                                                                        'The category has been deleted.',
                                                                        'success'
                                                                        )
                                                                    }
                                                                    })
                                                               "
                                                            >
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                                                        @if ($menu->POPULAR === 0)
                                                            <form  action="{{route("menu.popular",$menu->id)}}" method="post" style="margin-left: 4px !important">
                                                           @csrf
                                                            @method('PUT')
                                                            <button class="btn btn-pr btn-sm" type="submit"
                                                                    title="this Menu POPULAR"
                                                            >
                                                                <i class="fa-solid fa-fire text-white"></i>
                                                            </button>
                                                          </form>
                                                        @else
                                                        <form  action="{{route("menu.NONpopular",$menu->id)}}" method="post" style="margin-left: 4px !important">
                                                           @csrf
                                                            @method('PUT')
                                                            <button class="btn btn-secondary btn-sm" type="submit"
                                                                    title="This Menu is no longer POPULAR"
                                                            >
                                                                <i class="fa-solid fa-dumpster-fire  text-white"></i>
                                                            </button>
                                                          </form>
                                                        @endif

                                                    </td>
                                                </tr>
                                            @endforeach
                                       </tbody>

                                    </table>

                                        {{-- Menu Pagination--}}
                                        <div class="justify-content-center d-flex">
                                            {{$menus->links("pagination::bootstrap-4")}}
                                        </div>



                                </div>
                                </div>
                               {{-- Category  --}}
                               <div class="menu-category">
                                    <div class="cartHeader">
                                        <h2>Category <span class="fw-light fs-6">(get menu by category)</span></h2>
                                    </div>

                                    <table>
                                        @foreach ($cats as $cat)
                                            <tr>
                                            <td><a href="{{route('category.menus',$cat->id)}}">{{$cat->title  }}</a></td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                            {{-- end category --}}
                            </div>
                             {{-- Menu Pagination
                                    <div class="justify-content-center d-flex">
                                           {{$menus->links("pagination::bootstrap-4")}}
                                    </div> --}}



                        </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
@endsection
