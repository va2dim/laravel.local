@foreach ($sources as $source)
    <option
        @if ($source->id == $quote->source_id)
            selected
        @endif
        value="{{ $source->id }}">{{ $source->item }}
    </option>
@endforeach