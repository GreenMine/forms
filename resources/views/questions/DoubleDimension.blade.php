@php /** @var \App\Models\Questions\DoubleDimension $question */ @endphp
<label for="role" id="label-role">
    {{ $question->question->map(fn($q) => $q->text)->implode(' dub ') }}
</label>

<select name="question[{{ $question->id }}]" id="role">
    @foreach($question->variants as $variant)
        <option value="{{ $variant->id }}">{{ $variant->text }}</option>
    @endforeach
</select>
