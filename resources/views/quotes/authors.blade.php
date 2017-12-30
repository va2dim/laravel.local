@foreach ($authors as $author)
    <option
        @if ($author->id == $quote->author_id)
            selected
        @endif
            value="{{ $author->id }}">{{ $author->name }}
    </option>
@endforeach