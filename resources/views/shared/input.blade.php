@php
$label ??= null;
$type ??= 'text';
$class ??= null;
$name ??= '';
$value ??= '';
@endphp
<div @class(["form-group", $class])>
    <label for=""{{ $name }}>{{ $label }}</label>

    @if($type==='textarea')
        <textarea class="form-control @error($name) is-invalid @enderror" name="{{ $name }}" id=" {{ $name }}" cols="30" rows="5">{{ old($name, $value) }}</textarea>
    @else
        <input type="{{ $type }}" class="form-control @error($name) is-invalid @enderror" id="{{ $name }}" name="{{ $name }}" value="{{ old($name, $value) }}">
    @endif

    @error($name)
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
