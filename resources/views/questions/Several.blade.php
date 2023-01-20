@php /** @var \App\Models\Questions\Several $question */ @endphp
<label for="role" id="label-role">
    {{ $question->question->text }}
    <small>(Check all that apply)</small>
</label>
@foreach($question->variants as $variant)
    <label>
        <input type="checkbox"
               name="question[{{$question->question->id}}]"
               value="{{ $variant->id }}"
        >
        {{ $variant->text }}
    </label>
@endforeach