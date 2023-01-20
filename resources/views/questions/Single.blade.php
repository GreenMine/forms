@php /** @var \App\Models\Questions\Several $question */ @endphp
<label for="role" id="label-role">
    {{ $question->question->text }}
</label>

<select name="question[{{ $question->id }}]" id="role">
    @foreach($question->variants as $variant)
        <option value="{{ $variant->id }}">{{ $variant->text }}</option>
    @endforeach
</select>
