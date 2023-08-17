@extends('layouts.app')
@section('content')
<div class="p-4">
    <div class="card bg-white border-0 rounded-0 p-3">
        <h3>About</h3>
        <form action="{{ route('admin.aboutupdate') }}" method="POST" class="mt-3" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label for="featuredImage" class="w-100 my-2">
                About Feature Image
                <input type="file" class="form-control" name="featured">
                @error('featured')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </label>
            <label for="featuredImage" class="w-100 my-2">
                About Title
                <input type="text" name="title" class="form-control" value="{{ $about->title }}">
                @error('featured')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </label>

          
            <div class="form-group my-2">
                
              <label for="detail">About Detail</label>
                <textarea name="detail" id="detail" style="min-height: 250px"
                    class="form-control">{{ $about->detail }}</textarea>
                @error('detail')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button class="btn btn-primary">Update About</button>

        </form>
    </div>
</div>
@push('customJs')
<script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#detail' ), {
        removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption', 'ImageStyle', 'ImageToolbar',
        'ImageUpload'],
        } )
        .catch( error => {
        console.error( error );
        } );
</script>
@endpush
@endsection