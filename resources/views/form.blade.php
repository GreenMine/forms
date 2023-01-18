@php /** @var App\Models\Form $form */ @endphp
<h2>{{ $form->name }}</h2>
<h1>{{ $form->title }}</h1>
@foreach($form->questions as $question)
    <h3>{{ $question->question->text }}</h3>
    @foreach($question->variants as $variant)
        <div>{{ $variant->text }}</div>
    @endforeach
    <br>
@endforeach