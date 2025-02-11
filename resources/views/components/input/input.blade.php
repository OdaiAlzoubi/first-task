@props(['data'])
<input
    type="{{ $data['type'] ?? 'text' }}"
    class="form-control form-control-solid @error($data['name']) is-invalid @enderror {{ $data['class'] ?? '' }}"
    name="{{ $data['name'] }}"
    id="{{ $data['id'] ?? '' }}"
    {{-- value="{{ old($data['name'], $data['value']($data['name']) ?? '') }}" --}}
    value="{{ $data['value']($data['name']) ?? ''}}"
    placeholder=" {{ $data['placeholder'] ?? '' }}">
