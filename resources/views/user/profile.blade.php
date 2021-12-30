@extends('layouts.app')
@section('title', 'Sahara | Profile')
@section('main-content')
    <!-- Profile content -->
<div class="card shadow" id="profile">
    <div class="card-header" style="background-color: #fdffea;">
        <h3><ion-icon class="mt-2" name="person-outline"></ion-icon>&nbsp;Profile</h3>
    </div>
    <div class="card-body">
        <form action="/user/update" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-5" style="margin-left: 80px;">
                    <div class="mt-3">
                        <img id="profile_pic" src="../{{ Auth::user()->profile_pic }}">
                        <input class="mt-3" type="file" name="profile_pic" style="margin-left: 80px;">
                    </div>
                </div>
                <div class="col-5">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                                <input class="form-control" type="text" name="user_name" value="{{ Auth::user()->name }}" required>
                                @error('user_name')
                                    <div class="error">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="phone">Phone</label>
                                <input class="form-control" id="phone" type="number" name="phone_no" value="{{ Auth::user()->phone_no }}" required>
                                @error('phone_no')
                                    <div class="error">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input class="form-control" id="email" type="email" value="{{ Auth::user()->email }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="address">Address</label>
                        <input class="form-control" id="address" type="text" name="user_address" value="{{ Auth::user()->address }}" required>
                        @error('user_address')
                            <div class="error">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="password">Old Password</label>
                                <input class="form-control" type="password" id="old_password">
                                <div class="error" id="old_password_error" style="display: none">
                                    Wrong password!
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="password">New Password</label>
                                <input class="form-control" type="password" name="user_password" id="new_password" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="float-right">
                        <button type="submit" class="btn btn-primary" name="profile_button">Submit</button>
                    </div>
                </div>
            </div>
            
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $("#old_password").focusout(function(){
            var email = $("#email").val();
            var current_password = $(this).val();
            $.ajax({
                url: "/user/check_password",
                type:'POST',
                data:{'email':email,'current_password':current_password},
                success : function(response)
                {
                    if(response.success == false){
                        $('#new_password').attr('disabled', true);
                        $("#old_password_error").show();
                    }
                    else{
                        $("#old_password_error").hide();
                        $('#new_password').attr('disabled', false);
                    }
                }
            });
        });

        if ('{{ session()->has("message") }}') {
            toastr.success('{{ session()->get("message") }}');
        }
    });
</script>
@endsection