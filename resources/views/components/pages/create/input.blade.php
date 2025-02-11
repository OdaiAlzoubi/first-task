@props(['fields'])


@foreach ($fields as $field)
    <div class="fv-row mb-7 fv-plugins-icon-container">
        <label class="fs-6 fw-semibold form-label mt-3 {{ isset($field['required']) && $field['required'] ? 'required' : '' }}">{{ $field['label'] }}</label>
        @if ($field['type'] == 'select')
            <x-input.select :data="$field" :name="$field['name']" :class="$field['class']" :id="$field['id']" :options="$field['options']" />
        @elseif ($field['type'] == 'textarea')
            <x-input.textarea :data="$field" :name="$name" :class="$field['class']" :id="$field['id']" />
        @else
            <x-input.input :data="$field" :type="$field['type']" :class="$field['class']" :name="$field['name']" :id="$field['id']"
                :value="$field['value']" />
        @endif
    </div>
@endforeach
