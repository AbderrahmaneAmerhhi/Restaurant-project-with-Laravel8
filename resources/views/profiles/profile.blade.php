<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$user->name}}</title>
     {{-- My Style Style link  --}}
    <link rel="stylesheet" href="{{asset('css/profile.css')}}">
    {{-- Bootstrap5 file style --}}
    <link rel="stylesheet" href="../../css/Bootstrap5.css" >

        <link rel="shortcut icon" href="{{asset("images/logos/logosite.png")}}">
    {{-- font awosem cdn link --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    @if (auth()->user()->admin)
    {{-- Admin profile --}}

        <div class="profile-container">
        <div class="profile-box">
            <a href="/admin" class="back-btn">
                <i class="fa-solid fa-chevron-left"></i>
            </a>
            <a href="{{route('user.edit',$user->id)}}" class="edit-btn">
                <i class="fa-solid fa-pen-to-square"></i>
            </a>
            @if ($user->image !== 'image')
             <img src="{{asset('images/profile/'.$user->image)}}" class="profile-pic" alt="user_image">
            @else
             <img src="{{asset('images/profile/userImage.png')}}" class="profile-pic" alt="user_image">
            @endif
            <h3 class="user-name">{{$user->name}}</h3>
            <p class="email">{{$user->email}}</p>
            <p class="ville">{{$user->ville}}</p>

            <span>Admin</span>
            <div class="profile-bottom">
                <p>Logout</p>
                <form action="{{route("user.logout")}}" method="post">
                    @csrf
                   <button type="submit">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                   </button>
                  </form>
            </div>
        </div>
    </div>
    @else
    {{-- user profile --}}
    <div class="profile-container">
        <div class="profile-box">
            <a href="/" class="back-btn">
                <i class="fa-solid fa-chevron-left"></i>
            </a>
            <a href="{{route('user.edit',$user->id)}}" class="edit-btn">
                <i class="fa-solid fa-pen-to-square"></i>
            </a>
            @if ($user->image !== 'image')
             <img src="{{asset('images/profile/'.$user->image)}}" class="profile-pic" alt="user_image">
            @else
             <img src="{{asset('images/profile/userImage.png')}}" class="profile-pic" alt="user_image">
            @endif
            <h3 class="user-name">{{$user->name}}</h3>
            <p class="email">{{$user->email}}</p>
            <p class="ville">{{$user->ville}}</p>

            <span>User</span>
            <div class="profile-bottom">
                <p>Logout</p>
                <form action="{{route("user.logout")}}" method="post">
                    @csrf
                   <button type="submit">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                   </button>
                  </form>
            </div>
        </div>
    </div>
    @endif

     {{-- Bootstrap5 script --}}
     <script src="../../js/Bootstrap5.js"></script>
</body>
</html>
