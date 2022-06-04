@extends('layout.sidebar')


@section('search')
   {{-- section shearch   --}}
   <div class="search">
       <form action="{{route('reviews.search')}}" method="POST" id="serach">
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
   <!-- Cards  -->
            <div class="CardBox">

                <div class="Card">
                    <div>
                        <div class="numbers">{{$Allreviews}}</div>
                        <div class="CardName">All Reviews</div>
                    </div>
                    <div class="iconBox">
                       <ion-icon name="chatbubbles"></ion-icon>
                    </div>
                </div>
                <div class="Card">
                    <div>
                        <div class="numbers">{{$reviews}}</div>
                        <div class="CardName">Reviews Active</div>

                    </div>
                    <div class="iconBox"><ion-icon name="checkmark"></ion-icon></div>
                </div>
                <div class="Card">
                    <div>
                        <div class="numbers">{{$reviewsArchive}}</div>
                        <div class="CardName">Reviews Archive</div>
                    </div>
                    <div class="iconBox">
                        <ion-icon name="archive"></ion-icon>
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
    {{-- Categories list --}}
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
                                        <h2>Reviews</h2>
                                        @if (Route::currentRouteName() == 'reviews.archive')
                                            <a href="{{route('reviews.index')}}" class="btn">View  Reviews</a>
                                        @else
                                            <a href="{{route('reviews.archive')}}" class="btn">View Archived Reviews</a>
                                        @endif

                                    </div>
                                     <div class="table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <td>#ID</td>
                                                <td class="text-center">comment</td>
                                                <td>User</td>
                                                <td>Status</td>
                                                <td class="text-center">Action</td>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($comments as $comment)
                                                <tr>
                                                    <td>{{$comment->id}}</td>
                                                    <td class="text-center">{{Str::limit($comment->comment,70)}}</td>
                                                    <td>{{$comment->user->name}}</td>
                                                    <td>
                                                         @if ($comment->status && empty($comment->deleted_at))
                                                          <i class="fa fa-check text-success"></i>

                                                        @else
                                                          <i class="fa fa-close text-danger"></i>
                                                        @endif

                                                    </td>

                                                    <td class="d-flex flex-row justify-content-center align-items-center ">
                                                       @if ($comment->status === 0 &&  empty($comment->deleted_at))

                                                            <form  id="{{$comment->id}}"
                                                                action="{{route("reviews.update",$comment->id)}}"
                                                                method="Post">
                                                                @csrf
                                                                @method("PUT")
                                                            <button
                                                            onclick="event.preventDefault();
                                                            document.getElementById({{$comment->id}}).submit();"
                                                            class="btn  btn-pr  btn-sm ml-2" >
                                                                <i class="fa fa-check text-white"></i>
                                                            </button>
                                                            </form>

                                                        @endif
                                                        @if (empty($comment->deleted_at))
                                                            {{-- delete form --}}
                                                            <form id="{{$comment->id}}" action="{{route("reviews.destroy",$comment->id)}}" method="post" style="margin-left: 4px !important">
                                                            @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-danger btn-sm"
                                                                title="Archive this Review"
                                                                onclick="event.preventDefault();

                                                                        Swal.fire({
                                                                        title: 'Are you sure?',
                                                                        text: 'Do you want to delete this Review ',
                                                                        icon: 'warning',
                                                                        showCancelButton: true,
                                                                        confirmButtonColor: '#3085d6',
                                                                        cancelButtonColor: '#d33',
                                                                        confirmButtonText: 'Yes, Archive it!'
                                                                        }).then((result) => {
                                                                        if (result.isConfirmed) {
                                                                            document.getElementById('{{$comment->id}}').submit();
                                                                            Swal.fire(
                                                                            'Deleted!',
                                                                            'The review has been Archived.',
                                                                            'success'
                                                                            )
                                                                        }
                                                                        })
                                                                "
                                                                >
                                                                    <i class="fa-solid fa-box-archive"></i>
                                                                </button>
                                                            </form>
                                                        @else
                                                         <form  id="{{$comment->id}}"
                                                                action="{{route("review.unarchive",$comment->id)}}"
                                                                method="Post">
                                                                @csrf
                                                                @method("PUT")
                                                            <button
                                                            title="Unarchive this Review"
                                                            onclick="event.preventDefault();
                                                            document.getElementById({{$comment->id}}).submit();"
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
                                           {{$comments->links("pagination::bootstrap-4")}}
                                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
@endsection
