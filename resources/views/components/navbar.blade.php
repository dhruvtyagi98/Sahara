<nav class="navbar navbar-expand-lg navbar-light sticky-top" style="background-color: #f3ffb0;">
    <div class="container-fluid">
        <a class="nav-link navbar-brand" href="#">
            <div class="row">
                <div class="col-6">
                    <img id="logo" src="{{ asset('images/logo.png') }}" alt="">
                </div>
                <div class="col mt-1">
                    <h3>Sahara</h3>
                </div>
            </div>
        </a>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link navbar_link active" aria-current="page" href="">
                    <ion-icon name="home-outline"></ion-icon>&nbsp;Home
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link navbar_link" href="">
                    <ion-icon name="pricetags-outline"></ion-icon>&nbsp;My Orders
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link navbar_link" href="">
                    <ion-icon name="cart-outline"></ion-icon>&nbsp;Cart
                </a>
            </li>
        </ul>
        <ul class="navbar-nav">
            @if (Auth::user())
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img id="profile_pic_navbar" src="{{ asset(Auth::user()->profile_pic) }}">{{Auth::user()->name}}</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/user/profile">Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item btn" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">{{ __('Logout') }}</a></li>
                    </ul>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                </li>
            @else
                <li class="nav-item">
                    <button class="btn btn-primary" type="button" style="border-radius: 25px;padding: 10px;padding-inline: 30px;" data-bs-target="#login_modal" data-bs-toggle="modal">Login</button>
                </li>
            @endif 
        </ul>
    </div>
</nav>

<!-- Modal -->
<div class="modal fade" id="login_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Login Modal -->
            <div id="login_div">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Login
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-4">
                            <label for="login_email">Email &nbsp;<span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="login_email" name="email" placeholder="Enter Email" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="error">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="login_password">Password &nbsp;<span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="login_password" name="password" placeholder="Enter Password" required>
                        </div>
                        <div>
                            <p>Not Registered? <a type="button" id="register" style="color: blue;">Register</a></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>

            <!-- Register modal -->
            <div id="register_div" style="display: none;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Register
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-4">
                            <label for="name">Name &nbsp;<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Enter Name" required>
                            @error('name')
                                <div class="error">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="register_email">Email &nbsp;<span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="reqister_email" name="register_email" value="{{ old('register_email') }}" placeholder="Enter Email" required>
                            @error('register_email')
                                <div class="error">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="register_phone">Phone Number &nbsp;<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="reqister_phone" name="phone" value="{{ old('phone') }}" placeholder="Enter Phone Number" required>
                            @error('phone')
                                <div class="error">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="register_address">Address &nbsp;<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="reqister_address" name="address" value="{{ old('address') }}"placeholder="Enter Address" required>
                            @error('address')
                                <div class="error">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="register_password">Password &nbsp;<span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="register_password" name="register_password" placeholder="Enter Password" required>
                        </div>
                        <div class="mb-4">
                            <label for="register_password_confirm">Confirm Password &nbsp;<span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="register_password_confirm" name="password_confirmation" placeholder="Confirm Password" required>
                            @error('register_password')
                                <div class="error">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <p>Already Registered? <a type="button" id="login" style="color: blue;">Login</a></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#register').on('click', function(){
            $('#register_div').show();
            $('#login_div').hide();
        });

        $('#login').on('click', function(){
            $('#register_div').hide();
            $('#login_div').show();
        });

        if ('{{ $errors->first("email") }}') 
        {
            $('#login_modal').modal('show');
            $('#register_div').hide();
            $('#login_div').show();
        }
        else if ('{{ $errors->first("password") }}') {
            $('#login_modal').modal('show');
            $('#register_div').hide();
            $('#login_div').show();
        }
        else if ('{{ $errors->first("name") }}') {
            $('#login_modal').modal('show');
            $('#register_div').show();
            $('#login_div').hide();
        }
        else if ('{{ $errors->first("register_email") }}') {
            $('#login_modal').modal('show');
            $('#register_div').show();
            $('#login_div').hide();
        }
        else if ('{{ $errors->first("register_password") }}') {
            $('#login_modal').modal('show');
            $('#register_div').show();
            $('#login_div').hide();
        }
        else if ('{{ $errors->first("address") }}') {
            $('#login_modal').modal('show');
            $('#register_div').show();
            $('#login_div').hide();
        }
        else if ('{{ $errors->first("phone") }}') {
            $('#login_modal').modal('show');
            $('#register_div').show();
            $('#login_div').hide();
        }
    });
</script>