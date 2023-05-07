@extends('layouts.app')
@section('content')
<div class="container px-2 py-3">

    <div class="row justify-content-around">

        <div class="col-lg-8">
            <div class="card-style">
                <div class="card-header">
                    <h3 class="mb-2">All Roles</h3>
                </div>

                <div class="table-wrapper table-responsive">
                    <table class="table text-center">
                        <thead>
                            <tr>
                               
                                <th>
                                    <h6>#</h6>
                                </th>
                                <th>
                                    <h6>Role Name</h6>
                                </th>
                                
                                <th>
                                    <h6>Action</h6>
                                </th>
                            </tr>
                            <!-- end table row-->
                        </thead>
                        <tbody>
                            @foreach ($roles as $key=>$role)
                            <tr>
                                
                                <td class="min-width">
                                    <p>{{ ++$key }}</p>
                                </td>
                                <td class="min-width">
                                    <p><a href="#0">{{ str()->headline($role->name) }}</a></p>
                                </td>
                                
                                <td>
                                    <div class="action justify-content-center">
                                        <a href="{{ route('role.edit', $role->id) }}" class="text-primary me-2">
                                            <i class="lni lni-pencil"></i>
                                        </a>
                                        <a href="#" class="text-danger">
                                            <i class="lni lni-trash-can"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                           
                        </tbody>
                    </table>
                    <!-- end table -->
                </div>



            </div>
        </div>

        <div class="card-style col-lg-4 align-self-start">
                <div class="card-header">
                    <h3 class="mb-2">Add Role</h3>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('role.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Role Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                                placeholder="Example: employee">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="mt-2 btn btn-primary w-100">Submit</button>
                    </form>
                </div>
            
            </div>
    </div>


</div>
@endsection