{{ $label ?? '' }}
<select name="{{ $name ?? '' }}" id="{{ $id ?? '' }}" class="select2 form-control col-sm-12" style="width: 100%">
    @foreach ($objects as $item)
        <option value="{{ $item->id }}">{{ $item->name }}</option>
    @endforeach
</select>