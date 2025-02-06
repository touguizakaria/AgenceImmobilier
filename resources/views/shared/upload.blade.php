@php
$class ??= null;
$name ??= '';
$multiple ??= false;
@endphp
<div @class(["form-group", $class])>
    <label for=""{{ $name }}>{{ $label }}</label>
    <input type="file" class="form-control @error($name) is-invalid @enderror" id="{{ $name }}" name="{{ $name . ($multiple ? '[]' : '') }}" @if($multiple) multiple @endif>

    @error($name)
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
