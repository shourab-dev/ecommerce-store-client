@extends('layouts.app')
@section('content')

<div class="container px-2 py-3">

    <form action="{{ route('admin.questions.filter') }}">
        <div class="row">


            <div class="form-group col-lg-4">
                <br>
                <select name="country" id="country" class="form-control">
                    <option disabled selected> Select Country</option>
                    @foreach ($countries as $country)
                    <option value="{{ $country->id }}"> {{ $country->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-lg-4">
                <br>
                <select name="classRoom" id="classRoom" class="form-control">
                    <option disabled selected> Select Class</option>

                </select>
            </div>
            <div class="form-group col-lg-4">
                <br>
                <select name="subject" id="subject" class="form-control">
                    <option disabled selected> Select Subject</option>

                </select>
            </div>
            <div class="form-group mt-3 col-lg-4">
                <br>
                <select name="type" id="questionType" class="form-control">
                    <option disabled selected> Select Type</option>
                    @foreach ($types as $type)
                    <option value="{{ $type->id }}"> {{ $type->type }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mt-3 col-lg-3">
                <label for="" class="w-100">
                    From
                    <input type="date" name="from" id="fromDate" class="form-control"></label>
            </div>
            <div class="form-group mt-3 col-lg-3">
                <label for="" class="w-100">
                    To
                    <input type="date" name="to" id="toDate" class="form-control"></label>
            </div>

            <div class="form-group mt-3 col-lg-2">
                <br>
                <button class="btn w-100 rounded-0 btn-primary">Filter</button>
            </div>

        </div>
    </form>



    <div class="card text-center bg-light round-md p-3 border-0 shadow-sm mt-5">
        <table class="table table-responsive table-border">
            <tr>
                <th>
                    #
                </th>
                <th>
                    Question Name
                </th>
                <th>
                    Has PDF
                </th>
                <th>
                    Question Type
                </th>
                <th>
                    Actions
                </th>
            </tr>
            @foreach ($questions as $key=>$question)

            <tr>
                <td width="5%">{{ $questions->firstItem() + $key}}</td>
                <td width="40%">{{ $question->question_name }}</td>
                <td width="10%">
                    @if ($question->hasPdf > 0)
                    <span class="badge bg-primary">{{ $question->hasPdf }} pdf found</span>
                    @else
                    <span class="text-sm ">{{ "No pdf found" }}</span>
                    @endif
                </td>
                <td width="30%">
                    @forelse ($question->types as $type)
                    <span class="badge bg-primary text-white rounded-0">{{ $type->type }}</span>
                    @empty
                    <span class="badge bg-danger text-white">{{ "Un-sorted" }}</span>
                    @endforelse
                </td>
                <td width="25%">
                    <a title="Edit Question" href="{{ route('admin.questions.show', $question->id) }}">
                        <i class="lni lni-eye"></i>
                    </a>
                    <a class="text-danger mx-2" title="Delete Question" href="{{ route('admin.questions.delete',$question->id) }}">
                        <i class="lni lni-trash-can"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </table>


    </div>


    @if($questions->lastPage() > 1)
    <div class="card mt-2 p-2 border-0 shadow-sm">

        <div>

            {{ $questions->appends(request()->query())->links() }}
        </div>
    </div>
    @endif



</div>

@push('customJs')
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script>
    $(function(){
    $('select[name="country"]').change(function(e){
        
        let selectCountry = $(this).val()

        $.ajax({
            url: "{{ route('admin.questions.classes') }}",
            method: 'GET',
            data: {
                country: selectCountry
            },

            success: function(data){
                $('select[name="classRoom"]').empty()
                let res = JSON.parse(data)
                res.map(option => {
                    $('select[name="classRoom"]').append(`<option value="${option.id}">${option.name}</option>`)
                })
            },
            error: function(err){
                
                $('select[name="classRoom"]').empty()
                $('select[name="classRoom"]').append(`<option value="">${err.responseText}</option>`)
            }
        })

    })


    $('select[name="classRoom"]').change(function(e){
        let selectClass = $(this).val()
        
        $.ajax({
        url: "{{ route('admin.questions.subjects') }}",
        method: 'GET',
        data: {
        class: selectClass
        },
        
        success: function(data){
        $('select[name="subject"]').empty()
        let res = JSON.parse(data)
        res.map(option => {
        $('select[name="subject"]').append(`<option value="${option.id}">${option.name}</option>`)
        })
        },
        error: function(err){
        
        $('select[name="subject"]').empty()
        $('select[name="subject"]').append(`<option value="">${err.responseText}</option>`)
        }
        })
    })


 })
</script>
@endpush

@endsection