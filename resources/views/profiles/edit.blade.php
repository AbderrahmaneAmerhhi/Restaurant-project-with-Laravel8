<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit {{$user->name}} Profile</title>
     {{-- My Style Style link  --}}
    <link rel="stylesheet" href="{{asset('css/profile.css')}}">
    {{-- Bootstrap5 file style --}}
    <link rel="stylesheet" href="../../css/Bootstrap5.css" >
        <link rel="shortcut icon" href="{{asset("images/logos/logosite.png")}}">
    {{-- font awosem cdn link --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    @if (auth()->user()->isAdmin())
        <div class="profile-container">
        <div class="profile-box">
            <a href="{{route('user.profile',$user->id)}}" class="back-btn">
                <i class="fa-solid fa-chevron-left"></i>
            </a>

            @if ($user->image !== 'image')
             <img src="{{asset('images/profile/'.$user->image)}}" class="profile-pic" alt="user_image">
            @else
             <img src="{{asset('images/profile/userImage.png')}}" class="profile-pic" alt="user_image">
            @endif
            {{-- Edit profile form --}}
            <form action="{{route('user.update',$user->id)}}" class="myForm text-center" id="{{$user->id}}" method="POST" enctype="multipart/form-data">
            @CSRF
             @method('PUT')
            <div class="form-group mb-2">
                <input type="file" name="image" id="file" accept="image/*">
                <label for="file">EDIT PIC</label>
            </div>
            <div class="form-group mb-3">
                <i class="fas fa-user"></i>
                <input type="text" value="{{$user->name}}" name="name" class="myInput"  id="name" required>
            </div>
            <div class="form-group mb-3">
                <i class="fas fa-envelope"></i>
                <input type="email" value="{{$user->email}}" name="email" class="myInput"  id="email" required>
            </div>

            <div class="form-group mb-3">
                <i class="fas fa-lock"></i>
                <input type="password" name="password_confirmation" class="myInput" placeholder="Enter the new Password" id="password" required>
            </div>
             <div class="form-group mb-3">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" class="myInput" placeholder="Re-enter your password" id="password" required>
            </div>
        </form>
            <button type="button" class="edit_btn"
            onclick="event.preventDefault();
             document.getElementById('{{$user->id}}').submit();
            ">Update</button>

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
    <div class="profile-container">
        <div class="profile-box">
            <a href="{{route('user.profile',$user->id)}}" class="back-btn">
                <i class="fa-solid fa-chevron-left"></i>
            </a>

            @if ($user->image !== 'image')
             <img src="{{asset('images/profile/'.$user->image)}}" class="profile-pic" alt="user_image">
            @else
             <img src="{{asset('images/profile/userImage.png')}}" class="profile-pic" alt="user_image">
            @endif
            {{-- Edit profile form --}}
            <form action="{{route('user.update',$user->id)}}" class="myForm text-center" id="{{$user->id}}" method="POST" enctype="multipart/form-data">
            @CSRF
             @method('PUT')
            <div class="form-group mb-2">
                <input type="file" name="image" id="file" accept="image/*">
                <label for="file">EDIT PIC</label>
            </div>
            <div class="form-group mb-3">
                <i class="fas fa-user"></i>
                <input type="text" value="{{$user->name}}" name="name" class="myInput"  id="name" required>
            </div>
            <div class="form-group mb-3">
                <i class="fas fa-envelope"></i>
                <input type="email" value="{{$user->email}}" name="email" class="myInput"  id="email" required>
            </div>

            <div class="form-group mb-3">
                <i class="fas fa-lock"></i>
                <input type="password" min="9"  name="password_confirmation" class="myInput" placeholder="Enter the new Password" id="password" required>
            </div>
             <div class="form-group mb-3">
                <i class="fas fa-lock"></i>
                <input type="password" min="9"  name="password" class="myInput" placeholder="Re-enter your password" id="password" required>
            </div>
        </form>
            <button type="button" class="edit_btn"
            onclick="event.preventDefault();
             document.getElementById('{{$user->id}}').submit();
            ">Update</button>

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

