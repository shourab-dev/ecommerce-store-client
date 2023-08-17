@extends('layouts.app')
@section('content')
<div class="container px-2 py-3">
    <div class="row justify-content-around">

        <div class="col-lg-8">
            <div class="card-style">
                <div class="card-header">
                    <h3 class="mb-2">All Categories</h3>
                </div>

                <div class="table-wrapper table-responsive">
                    <table class="table text-center">
                        <thead>
                            <tr>

                                <th>
                                    <h6>#</h6>
                                </th>
                                <th>
                                    <h6>Category Name</h6>
                                </th>


                                <th>
                                    <h6>Action</h6>
                                </th>
                            </tr>
                            <!-- end table row-->
                        </thead>
                        <tbody>
                            @foreach ($classRooms as $key=>$classRoom)
                            <tr>

                                <td class="min-width">
                                    <p>{{ ++$key }}</p>
                                </td>
                                <td class="min-width">
                                    <p><a href="#0">{{ str()->headline($classRoom->name) }}</a></p>
                                </td>


                                <td>
                                    <div class="action justify-content-center">
                                        <a href="{{ route('admin.class.edit', $classRoom) }}" class="text-primary me-2">
                                            <i class="lni lni-pencil"></i>
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
                <h3 class="mb-2">{{ isset($editedClassRoom) ? 'Edit' : 'Add' }} Category</h3>
            </div>
            <div class="card-body">
                <form method="post"
                    action="{{ isset($editedClassRoom) ? route('admin.class.update', $editedClassRoom) :  route('admin.class.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Category Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ isset($editedClassRoom) ? $editedClassRoom->name : old('name') }}"
                            placeholder="Example: Class 1 | Class 2">
                        @error('name')
                        <div class="text-danger my-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="country">Country Name</label>
                        <select name="country_id" id="country" class="form-control">

                            @foreach ($countries as $country)
                            @if (isset($editedClassRoom))
                            <option @selected($editedClassRoom->country_id == $country->id) value="{{ $country->id
                                }}">{{ $country->name }}</option>
                            @else
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endif
                            @endforeach
                        </select>
                        @error('country_id')
                        <div class="text-danger my-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="mt-2 btn btn-outline-primary w-100">{{ isset($editedClassRoom) ?
                        'Update
                        Country'
                        : 'Submit' }}</button>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection