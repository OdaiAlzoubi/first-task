@extends('layouts.master')
@section('content')
    <x-page-index>
        <x-slot:body>
            <div class="dt-container dt-bootstrap5 dt-empty-footer">
                <div class="table-responsive">
                    <table class="table align-middle table-row-dashed fs-6 gy-5 table-hover">
                        <thead>
                            <x-table-tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                @foreach ($tables['first_table'] as $header)
                                    <x-table-th :header="$header" />
                                @endforeach
                            </x-table-tr>
                        </thead>
                        <tbody class="fw-semibold text-gray-600">
                            <x-table-tr>
                                <x-table-td>{{ $user->username }}</x-table-td>
                                <x-table-td>{{ $user->email }}</x-table-td>
                            </x-table-tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </x-slot:body>
    </x-page-index>
    <x-page-index>
        <x-slot:body>
            <div class="dt-container dt-bootstrap5 dt-empty-footer">
                <div class="table-responsive">
                    <table class="table align-middle table-row-dashed fs-6 gy-5 table-hover">
                        <thead>
                            <x-table-tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                @foreach ($tables['second_table'] as $header)
                                    <x-table-th :header="$header" />
                                @endforeach
                                {{-- <th class="text-end min-w-70px">Actions</th> --}}
                            </x-table-tr>
                        </thead>
                        <tbody class="fw-semibold text-gray-600">
                            @foreach ($user->marks as $data)
                            <x-table-tr>
                                <x-table-td>{{ $data->subject->name }}</x-table-td>
                                <x-table-td>{{ $data->subject->pass_mark }}</x-table-td>
                                <x-table-td>{{ $data->mark }}</x-table-td>
                            </x-table-tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- @include('table', [($headers = $tables['first_table']), ($data = $user)])
        @include('table', [($headers = $tables['second_table']), ($subject = $user->marks)]) --}}
        </x-slot:body>
    </x-page-index>
@endsection
