@php /** @var \App\Models\Questions\Text $question */ @endphp
<label for="email" id="label-email">
    {{ $question->question->text }}
</label>

<input type="text" placeholder="Enter answer" />