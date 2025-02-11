{{-- @props(['action', 'method'])

<form class="form fv-plugins-bootstrap5 fv-plugins-framework" method="{{ $method }}" action="{{ $action }}">
    @csrf
    {{ $slot }}
    <!--begin::Separator-->
    <div class="separator mb-6"></div>
    <div class="d-flex justify-content-end">
        <button type="reset" class="btn btn-light me-3">Cancel</button>
        <button type="submit" class="btn btn-primary">
            <span class="indicator-label">Save</span>
            <span class="indicator-progress">Please wait...
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
        </button>
    </div>
</form> --}}
{{ $slot }}
