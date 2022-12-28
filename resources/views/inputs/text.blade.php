{{ $label ?? '' }}<input 
type="{{ $type ?? 'text' }}" 
name="{{ $name ?? ''}}" 
value="{{ $value ?? '' }}"
id="{{ $id ?? '' }}" 
class="form-control {{ $class ?? '' }}">