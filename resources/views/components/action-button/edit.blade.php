<a
class="{{ $class ?? '' }}"
{{ $href ? 'href=' . $href . '' : '' }}
{{-- href="{{ $href ?? '' }}" --}}
data-item="{{ $item }}"
data-url="{{ $url ?? '' }}"
id="{{ $id ?? '' }}">
<i class="{{ $icon ?? '' }}">
    </i> {{ $text }}</a>
