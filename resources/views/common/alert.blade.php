{{-- Message --}}
@if (Session::has('success'))
    <div class="alert alert-success d-flex bg-light-primary rounded border-primary border border-dashed rounded-3 p-6 alert-dismissible fade show" role="alert">
        <div class="d-flex flex-stack flex-grow-1">
            <div class="fw-semibold">
                <h4 class="text-gray-900 fw-bold">Success!</h4>
                <div class="fs-6 text-gray-700">{{ session('success') }}</div>
            </div>
            <button type="button" class="btn-close" style="font-size: 20px;" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif

@if (Session::has('error'))
<div class="alert alert-danger alert-dismissible d-flex bg-light-danger rounded border-danger border border-dashed rounded-3 p-6" role="alert">
    <div class="d-flex flex-stack flex-grow-1">
        <div class="fw-semibold">
            <h4 class="text-gray-900 fw-bold">Error!</h4>
            <div class="fs-6 text-gray-700">{{ session('error') }}</div>
        </div>
        <button type="button" class="btn-close" style="font-size: 20px;" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif

