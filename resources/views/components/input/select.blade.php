<select class="form-select form-select-solid @error($data['name']) is-invalid @enderror" name="{{ $data['name'] }}"
    id=" {{ $data['id'] }}" data-control="select2" data-placeholder=" {{ $data['placeholder'] }}">
    <option></option>
    @foreach ($data['options'] as $key => $option)
        <option value="{{ $key }}" {{ $data['value']($data['name']) == $key ? 'selected' : '' }}>
            {{ $option }}</option>
    @endforeach
</select>
