@extends('layouts.app')
@section('content')
<div class="container px-2 py-3">

    <div class="row justify-content-around">

        <div class="col-lg-8">
            <div class="card-style">
                <div class="card-header">
                    <h3 class="mb-2">All Countries</h3>
                </div>

                <div class="table-wrapper table-responsive">
                    <table class="table text-center">
                        <thead>
                            <tr>

                                <th>
                                    <h6>#</h6>
                                </th>
                                <th>
                                    <h6>Country Name</h6>
                                </th>
                                <th>
                                    <h6>Country Code</h6>
                                </th>

                                <th>
                                    <h6>Action</h6>
                                </th>
                            </tr>
                            <!-- end table row-->
                        </thead>
                        <tbody>
                            @foreach ($countries as $key=>$country)
                            <tr>

                                <td class="min-width">
                                    <p>{{ ++$key }}</p>
                                </td>
                                <td class="min-width">
                                    <p><a href="#0">{{ str()->headline($country->name) }}</a></p>
                                </td>
                                <td class="min-width">
                                    <p><a href="#0">{{ $country->code }}</a></p>
                                </td>

                                <td>
                                    <div class="action justify-content-center">
                                        <a href="{{ route('admin.country.edit', $country) }}" class="text-primary me-2">
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
                <h3 class="mb-2">{{ isset($editedCountry) ? 'Edit' : 'Add' }} Country</h3>
            </div>
            <div class="card-body">
                <form method="post" action="{{ isset($editedCountry) ? route('admin.country.update', $editedCountry) :  route('admin.country.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Country Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ isset($editedCountry) ? $editedCountry->name : old('name') }}"
                            placeholder="Example: China | Bangladesh | India">
                        @error('name')
                        <div class="text-danger my-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Country Code</label>
                        <input type="text" class="form-control" id="name" name="code" value="{{ isset($editedCountry) ? $editedCountry->code : old('code') }}"
                            placeholder="AU | UAE | BD | IN">
                        @error('code')
                        <div class="text-danger my-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="mt-2 btn btn-primary w-100">{{ isset($editedCountry) ? 'Update Country'  : 'Submit' }}</button>
                </form>
            </div>

        </div>
    </div>


</div>

@endsection