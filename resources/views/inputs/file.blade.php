{{ $label ?? '' }}
@if (isset($value))
    <input type="hidden" name="{{ $name ?? ''}}" value="{{ $value }}" id="">
    <img src="{{ $value }}" alt="{{ $name ?? 'alt' }}" width="250">
@else
<input 
type="file" 
name="{{ $name ?? ''}}" 
id="{{ $id ?? '' }}" 
class="form-control {{ $class ?? '' }}">
@endif