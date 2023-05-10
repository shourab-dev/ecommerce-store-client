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
        @foreach ($permissions as $key=>$permissionGrp)
        <div class="row">
            <div class="col-lg-12 px-3 py-3 border border-1">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-5">
                        <h4>{{ str()->headline($key) }}</h4>
                    </div>
                    <div class="col-lg-4  text-end">
                        <label>
                            <input type="checkbox" class="inputGrp" data-grp="{{ $key }}" value="true"
                                class="form-check-input"> Select
                            All
                        </label>

                    </div>
                </div>

            </div>
            @foreach ($permissionGrp as $permission)
            <div class="col-lg-3 border border-1 d-flex justify-content-center align-items-center">
                <div class="form-group">
                    <label>
                        <input {{ in_array($permission->id, $allActivePermissions) ? 'checked' : '' }} value="{{ $permission->id }}" type="checkbox" class="permissionCheckbox" data-group-key="{{ $key }}"
                            name="permissions[]">
                        {{ $permission->name }}</label>
                </div>
            </div>
            <div class="col-lg-9 border border-1">
                <p>{{ $permission->details }}</p>
            </div>
            @endforeach
        </div>
        @endforeach


    </form>



</div>
@endsection
@push('customJs')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
            //* CLICK ON INPUT GRP CHECKBOX
            let inputGrp = $('input[type="checkbox"].inputGrp');
            inputGrp.on('click', function(e) {

                let grpName = $(this).data('grp');
                let grpValue = $(this).is(':checked');
                let inputBtn  = $('input[data-group-key="' + grpName + '"]')
                let length = inputBtn.length
                

                if(grpValue){
                    inputBtn.prop('checked', true);
                } else{
                    inputBtn.prop('checked', false);
                }


            })

            //* CLICK ON ANY INPUT CHECKBOX
            let inputCheckbox = $('.permissionCheckbox')
            
            inputCheckbox.on('click', function(e){
                let grpName = $(this).data('group-key');
                let allGrpInput = $('input.permissionCheckbox[data-group-key="' + grpName + '"]');
                let allGrpInputChecked = $('input.permissionCheckbox[data-group-key="' + grpName + '"]:checkbox:checked');
                let inputGrp = $(`input[data-grp="${grpName}"].inputGrp`);
                
                if (allGrpInput.length != allGrpInputChecked.length){
                    inputGrp.prop('checked', false);
                }

                

            })






        })
</script>
@endpush