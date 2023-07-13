@extends('layouts.app')
@section('content')

<div class="px-4 mt-5">


    <div class="row">

        <div class="col-lg-8">
            <div class="card shadow p-3 border-0">
                <table class="table table-responsive">
                    <tr class="text-center">
                        <th>#</th>
                        <th>User Profile</th>
                        <th>User Name</th>
                        <th>User Phone</th>
                        <th>User Email</th>
                        <th>User Desc</th>
                        
                    </tr>
                    @forelse ($users as $key=>$user)
                    <tr>
                        <td class="col text-center">{{ $users->firstItem() + $key }}</td>
                        <td class="col text-center"><img
                                style="width: 50px;height:50px;border-radius:50%;object-fit:cover;"
                                src="{{ $user->profile_url ?? env('AVATAR').$user->name }}" alt=""></td>
                        <td class="col text-center">{{ $user->name }}</td>
                        <td class="col text-center">{{ $user->phone ?? "not found" }}</td>
                        <td class="col text-center">{{ $user->email }}</td>
                        <td class="col text-center">{{ str()->headline($user->getRoleNames()->first()) }}</td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="7">
                            <h5>No users found!</h5>
                        </td>
                    </tr>
                    @endforelse
                </table>


                {{ $users->links() }}
            </div>
        </div>
        <div class="col-lg-4">
            <form action="{{ route('register') }}" method="POST" class="card p-3 border-0 shadow">
                @csrf
                <input type="text" placeholder="User name" class="form-control my-2" name="name">
                <input type="text" placeholder="User email" class="form-control my-2" name="email">
                <input type="text" placeholder="User Password" class="form-control my-2" name="password">
                <input type="text" placeholder="Confirm Password" class="form-control my-2"
                    name="password_confirmation">
                <select name="role" class="form-control">
                    <option disabled selected> Select a Role </option>
                    @foreach ($roles as $role)
                    <option value="{{ $role->id }}">{{ str($role->name)->headline() }}</option>
                    @endforeach

                </select>
                <button class="btn btn-outline-primary w-100 rounded-0 mt-3">Register User</button>


            </form>
        </div>

    </div>


</div>


@endsection