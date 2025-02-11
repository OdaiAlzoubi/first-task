@props(['add', 'indexRoute', 'createRoute'])

<!--begin::Card title-->
{{-- <div class="card-title">
    <!--begin::Search-->
    <div class="d-flex align-items-center position-relative my-1">
        <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4">
            <span class="path1"></span>
            <span class="path2"></span>
        </i>
        <input type="text" data-kt-ecommerce-product-filter="search"
            class="form-control form-control-solid w-250px ps-12" placeholder="Search Product" />
    </div>
</div> --}}
<!--begin::Card toolbar-->
<div class="card-toolbar flex-row-fluid justify-content-end gap-5">
    <div class="w-100 mw-150px">
        {{-- <form method="GET" action="{{ $indexRoute }}">
            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="perPage"
                id="perPage" onchange="this.form.submit()">
                <option value="10" {{ request('perPage') == 10 ? 'selected' : '' }}>10</option>
                <option value="25" {{ request('perPage') == 25 ? 'selected' : '' }}>25</option>
                <option value="50" {{ request('perPage') == 50 ? 'selected' : '' }}>50</option>
                <option value="100" {{ request('perPage') == 100 ? 'selected' : '' }}>100
                </option>
            </select>
        </form> --}}
    </div>
    {{-- Add --}}
    <a href="{{ $createRoute }}" class="btn btn-primary"><i class="ki-duotone ki-plus fs-2"></i> Add {{ $add }}</a>
</div>
