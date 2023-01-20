@php
/**
 * @var \App\Models\Questions\DoubleDimension $question
 */

$variants = $question->variants;
@endphp
<table>
    <tr>
        <td></td>
        @foreach($variants as $variant)
            <td>{{ $variant->text }}</td>
        @endforeach
    </tr>
    @foreach($question->questions as $question)
        <tr>
            <td>{{ $question->text }}</td>
            @for($i = 0; $i < count($variants); $i++)
                <td><input type="radio" name="question[{{ $question->id }}]"></td>
            @endfor
        </tr>
    @endforeach
</table>