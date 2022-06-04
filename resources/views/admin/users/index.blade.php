@extends('layout.sidebar')


@section('search')
   {{-- section   shearch   --}}
   <div class="search">
       <form action="{{route('users.search')}}" method="POST" id="serach">
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
                        <div class="numbers">{{$usersCount}}</div>
                        <div class="CardName">Customers</div>
                    </div>
                    <div class="iconBox"><ion-icon name="person"></ion-icon></div>
                </div>
                <div class="Card">
                    <div>
                        <div class="numbers">{{$usersArchivedCount}}</div>
                        <div class="CardName">Customers Archive</div>
                    </div>
                    <div class="iconBox">
                        <ion-icon name="archive"></ion-icon>
                    </div>
                </div>
                <div class="Card">
                    <div>
                        <div class="numbers">{{$reviews}}</div>
                        <div class="CardName">Reviews</div>
                    </div>
                    <div class="iconBox">
                        <ion-icon name="chatbubbles"></ion-icon>
                    </div>
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
    {{-- users list --}}
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
                                        <h2>Customers</h2>
                                        {{-- Export user  --}}
                                        <a  title="Export All users"
                                        class="btn  btn-sm btn-success mr-0"
                                            href="{{ route('users-export') }}">
                                            <i class="fa-solid fa-download text-white"></i>
                                        </a>
                                        @if (Route::currentRouteName() == 'users.archive')
                                            <a href="{{route('users.index')}}" class="btn">View Users</a>
                                        @else
                                            <a href="{{route('users.archive')}}" class="btn">View Archived Users</a>
                                        @endif

                                    </div>
                                    <div class="table-responsive">
                                            <table>
                                            <thead>
                                                <tr>
                                                    <td>#ID</td>
                                                    <td>Image</td>
                                                    <td>Name</td>
                                                    <td>email</td>
                                                    <td>ville</td>
                                                    <td class="text-center">Action</td>
                                                </tr>
                                            </thead>

                                            <tbody>

                                                @foreach ($users as $user)
                                                @if (!$user->admin)
                                                    <tr>
                                                        <td>{{$user->id}}</td>
                                                        <td>
                                                            @if ($user->image !== 'image')
                                                                <img src="{{asset('images/profile/'.$user->image)}}" class="img-fluid rounded-circle"
                                                                alt=""
                                                                width="50"
                                                                height="50">
                                                            @else
                                                            <img src="{{asset('images/profile/userImage.png')}}" class="img-fluid rounded-circle"
                                                                alt=""
                                                                width="50"
                                                                height="50">
                                                            @endif

                                                        </td>
                                                        <td>{{$user->name}}</td>
                                                        <td>{{$user->email}}</td>
                                                        <td>{{$user->ville}}</td>

                                                        <td class="d-flex flex-row justify-content-center align-items-center ">
                                                            {{-- Export user  --}}
                                                            <a  title="Export user"
                                                            class="btn  btn-sm btn-success"
                                                                href="{{ route('Export-User',$user->id) }}">
                                                                <i class="fa-solid fa-download text-white"></i>
                                                            </a>
                                                            @if ($user->deleted_at)
                                                            {{-- Unarchive form --}}
                                                            <form  id="{{$user->id}}"
                                                                        action="{{route("user.unarchive",$user->id)}}"
                                                                        method="Post"
                                                                        style="margin-left: 4px !important">
                                                                        @csrf
                                                                        @method("PUT")
                                                                    <button
                                                                    title="Unarchive this User Account"
                                                                    onclick="event.preventDefault();
                                                                    document.getElementById({{$user->id}}).submit();"
                                                                    class="btn  btn-pr  btn-sm" >
                                                                        <i class="fa-solid fa-diagram-next text-white"></i>
                                                                    </button>
                                                                    </form>
                                                            @else
                                                                {{-- Archive form --}}
                                                            <form id="{{$user->id}}" action="{{route("users.remove",$user->id)}}" method="post" style="margin-left: 4px !important">
                                                            @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-danger btn-sm "
                                                                title="Archive User Account"
                                                                onclick="event.preventDefault();

                                                                        Swal.fire({
                                                                        title: 'Are you sure?',
                                                                        text: 'Do you want to Arhive User  {{$user->name}} Account',
                                                                        icon: 'warning',
                                                                        showCancelButton: true,
                                                                        confirmButtonColor: '#3085d6',
                                                                        cancelButtonColor: '#d33',
                                                                        confirmButtonText: 'Yes, Archive it!'
                                                                        }).then((result) => {
                                                                        if (result.isConfirmed) {
                                                                            document.getElementById('{{$user->id}}').submit();
                                                                            Swal.fire(
                                                                            'Deleted!',
                                                                            'The User Account has been Archived.',
                                                                            'success'
                                                                            )
                                                                        }
                                                                        })
                                                                "
                                                                >
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            </form>

                                                            @endif

                                                        </td>
                                                    </tr>
                                                @endif

                                                @endforeach
                                        </tbody>

                                        </table>

                                    </div>

                                </div>

                            </div>
                             {{-- Pagination --}}
                                    <div class="justify-content-center d-flex">
                                           {{$users->links("pagination::bootstrap-4")}}
                                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
@endsection
