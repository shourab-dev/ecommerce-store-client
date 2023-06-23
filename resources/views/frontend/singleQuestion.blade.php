@extends('layouts.frontendLayouts')
@section('frontendContent')

<div id="content" class="site-content space-bottom-3 pt-4">
    <div class="container">
        <div class="card">
        <div class="card-header">
            <h1>{{ str($question->question_name)->headline() }}</h1>
        </div>
        <div class="card-body">
        <p class="text-primary">{{ $question->classRoom->name }} / Subject - {{ $question->subject->name }}</p>
        <p style="font-weight: 600">Publish Date {{ Carbon\Carbon::parse($question->date)->format('d (D) - M - Y') }}</p>
        
        @forelse ($question->pdfs as $key=>$pdf)
            
        <a href="{{ route('frontend.questions.pdf', $pdf->id) }}" target="_blank" class="btn btn-sm btn-dark"> ({{ ++$key }}) View Quetions PDF </a>
        @empty
        <p class="text-danger">No PDF File found!</p>
        @endforelse
                <hr>
                <h4 class="text-center">Questions Content</h4>
                <hr>
                {!!  $question->question  !!}
            </div>
        </div>
        
    </div>
</div>

@endsection