<form class="form fv-plugins-bootstrap5 fv-plugins-framework {{ isset($form['class']) ? $form['class'] : '' }}"
    method="post" action="{{ $form['action'] }}" id="{{ $form['id'] ?? ''}}"
    {{-- id="{{ isset($form['id'] ? $form['id'] : '') }}" --}}
    {{-- @if (isset($form['file']) && $form['file']) enctype="multipart/form-data" @endif --}}
    enctype="multipart/form-data">
    @csrf
    @if ($form['method'] == 'update')
        @method('PUT')
    @elseif ($form['method'] == 'delete')
        @method('DELETE')
    @endif
    {{ $slot }}

</form>
