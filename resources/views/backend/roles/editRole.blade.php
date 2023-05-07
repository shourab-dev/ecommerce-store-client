@extends('layouts.app')
@section('content')
<div class="card-style my-3 ">
    <div class="card-header">
        <h2>Edit User</h2>
    </div>
    <div class="card-body mt-2">
        <form action="" class="d-flex">
            <div class="col-10 mx-2"><input type="text" name="name" class="form-control" value="{{ $role->name }}">
            </div>
            <button class="btn btn-primary ">Update Role</button>
        </form>
    </div>


    <hr>


    <form action="" method="POST">
        @csrf
        <div class="row">
            <div class="col-lg-3 border border-1 d-flex justify-content-center align-items-center">
                <div class="form-group">
                    <label>
                        <input type="checkbox" name="permissions[]">
                        Name</label>
                </div>
            </div>
            <div class="col-lg-9 border border-1">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ut veritatis sapiente quam fuga soluta enim perferendis esse commodi aliquid, velit iste quia, ipsa officia accusamus, reiciendis recusandae rerum. Dolor reiciendis ipsam maiores reprehenderit nam facilis ea? A, molestiae nisi eos vero mollitia hic adipisci magnam autem maiores, eveniet recusandae dignissimos.</p>
            </div>
        </div>
    </form>



</div>
@endsection