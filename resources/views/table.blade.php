<x-table class="usersTable">
    <x-table-thead>
        @foreach ($headers as $header)
            <x-table-th :header="$header" />
        @endforeach
    </x-table-thead>
    <x-table-tbody>
        @foreach ($data as $dataRow)
            <x-table-tr :id="'user-' . $dataRow->id">
                <x-table-td>{{ $dataRow->id }}</x-table-td>
                <x-table-td class="username">{{ $dataRow->username }}</x-table-td>
                <x-table-td class="email">{{ $dataRow->email }}</x-table-td>
                <x-table-action>
                    <div class="menu-item px-3">
                        <a class="menu-link px-3 updateItem editTableUser"
                            data-url="{{ route('user.update', $dataRow->id) }}" id="updateItem" data-item="User"
                            data-bs-toggle="modal" data-bs-target="#createModal" data-data="{{ $dataRow }}"
                            data-input='{{ route('dashboard.getFormUser') }}'>Edit</a>
                    </div>
                    <div class="menu-item px-3">
                        <a class="menu-link px-3" data-url="{{ route('user.delete', $dataRow->id) }}" id="deleteItem"
                            data-item="User" data-id="{{ $dataRow->id }}">Delete</a>
                    </div>
                </x-table-action>
            </x-table-tr>
        @endforeach
    </x-table-tbody>
</x-table>
