@extends('layouts.customerAuthUi')
@push('customerCss')
<style>
    #profileImage {
        display: none;
    }

    #profileImage~p {
        font-size: 12px;
        text-align: center;
        color: #4a6cf7;
    }

    .profileLabel {
        width: 100%;

    }

    .profile_url {
       
        width: 200px;
        height: 200px;
        border-radius: 50%;
        display: block;
        margin: auto;
        

    }

    .br {
        border-right: 1px solid #ddd;
    }
</style>
@endpush
@section('customerUi')

<div class="container p-4">
    <div class="row justify-content-evenly ">
        <div class="card col-lg-8 border-0 shadow">
            <form action="{{ route('user.profile.update') }}" enctype="multipart/form-data" method="POST">
                @csrf
            <div class="row">
                <div class="col-lg-4 p-4 br">
                    <label for="profileImage" class="profileLabel">
                        <img class="profile_url" src="{{ auth()->guard('user')->user()->profile_url ?? env('AVATAR').auth()->guard('user')->user()->name }}" alt="">
                    </label>
                    <input type="file" id="profileImage" name="profile">
                    <p>Click Profile Picture to Upload new Photo</p>
                </div>
                <div class="col-lg-8 px-5 py-3">
                    <input type="text" value="{{ auth()->guard('user')->user()->name }}" name="name" class="form-control rounded-0 mb-2" placeholder="User Name" >
                    <input type="email" value="{{ auth()->guard('user')->user()->email }}" name="email" class="form-control rounded-0 mb-2" placeholder="User Email" >
                    <input type="text" value="{{ auth()->guard('user')->user()->details->phone ?? '' }}" name="phone" class="form-control rounded-0 mb-2" placeholder="User Phone" >
                    @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <textarea name="address" class="form-control rounded-0 mb-2" placeholder="Address">{{ auth()->guard('user')->user()->details->address ?? '' }}</textarea>
                    <button class="btn btn-primary rounded-0">Update Profile</button>
                </div>
            </div>
            </form>
        </div>
        <div class="card col-lg-3 border-0 shadow">
            <h6 class="text-primary my-3">Change Password</h6>
            <form action="">
                <input type="password" name="oldPassword" class="form-control rounded-0 mb-2" placeholder="Old Password">
                <input type="password" name="password" class="form-control rounded-0 mb-2" placeholder="New Password">
                <input type="password" name="password_confirmation" class="form-control rounded-0 mb-2" placeholder="Confirm Password">
                <button class="btn btn-primary rounded-0">Update Password</button>
            </form>
        </div>
    </div>
    
</div>


@push('customerJs')

<script>
    const profilInput = document.querySelector(`#profileImage`);
          const profilImg = document.querySelector(`.profile_url`);
          profilInput.addEventListener('change',(e)=>{
            const blob = URL.createObjectURL(e.target.files[0])
            profilImg.src = blob
          })
</script>
@endpush

@endsection