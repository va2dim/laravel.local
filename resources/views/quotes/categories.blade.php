@foreach ($categories as $category)
    <option
            @if ($category->id == $quote->category_id)
            selected
            @endif
            value="{{ $category->id }}">{{ $category->title}}
    </option>
@endforeach