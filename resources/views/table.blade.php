<x-table>
    <x-table-thead>
        @foreach ($headers as $header)
            <x-table-th :header="$header" />
        @endforeach
    </x-table-thead>
    <x-table-tbody>
        @foreach ($data as $dataRow)
            <x-table-tr>
                <x-table-td>{{ $dataRow->id }}</x-table-td>
                <x-table-td>{{ $dataRow->username }}</x-table-td>
                <x-table-td>{{ $dataRow->email }}</x-table-td>
                <x-table-action>
                    <div class="menu-item px-3">
                        <a class="menu-link px-3 updateItem" data-url="{{ route('user.update', $dataRow->id) }}" id="updateItem"
                            data-item="User" data-bs-toggle="modal" data-bs-target="#editModal" data-data="{{ $dataRow }}">Edit</a>
                    </div>
                    <div class="menu-item px-3">
                        <a class="menu-link px-3" data-url="{{ route('user.delete', $dataRow->id) }}" id="deleteItem"
                            data-item="User">Delete</a>
                    </div>
                </x-table-action>
            </x-table-tr>
        @endforeach
    </x-table-tbody>
</x-table>
