<div class="col-6">
    <!--begin::Items-->
    <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
        <!--begin::Symbol-->
        <div class="symbol symbol-30px me-5 mb-8">
            <span class="symbol-label">
                <i class="{{ $icon }}">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
            </span>
        </div>
        <!--end::Symbol-->
        <!--begin::Stats-->
        <div class="m-0">
            <!--begin::Number-->
            <span class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">{{ $count }}</span>
            <!--end::Number-->
            <!--begin::Desc-->
            <span class="text-gray-500 fw-semibold fs-6">{{ $text }}</span>
            <!--end::Desc-->
        </div>
        <!--end::Stats-->
    </div>
    <!--end::Items-->
</div>
