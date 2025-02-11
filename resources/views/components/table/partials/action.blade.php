@props(['actions', 'data'])

<td class="text-end">
    <a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary"
        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
        <i class="ki-solid ki-dots-horizontal fs-2x"></i></a>
    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
        data-kt-menu="true">
        {{ $slot }}
        {{-- @foreach ($actions as $text => $action)
            <div class="menu-item px-3">
                {!! $action($data) !!}
            </div>
        @endforeach --}}
    </div>
</td>
