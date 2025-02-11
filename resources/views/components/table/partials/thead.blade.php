@props(['headers'])
<thead>
    <x-table-tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
        {{ $slot }}
        <th class="text-end min-w-70px">Actions</th>
    </x-table-tr>
</thead>
