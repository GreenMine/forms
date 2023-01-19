@php /** @var \App\Models\Questions\Text $question */ @endphp
<label for="email" id="label-email">
    {{ $question->question->text }}
</label>

<input type="email"
       id="email"
       placeholder="Enter answer" />