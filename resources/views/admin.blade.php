@extends('layouts.master')
@section('content')
    <x-page-index>
        <x-slot:header>
            <div class="page-action">
                <a class="btn btn-primary createModal editTableUser" data-url="{{ route('user.store') }}" id="AddItem" data-item="Add User"
                    data-bs-toggle="modal" data-bs-target="#createModal" data-input='{{ route('dashboard.getFormUser') }}'>Add User</a>
                <a class="btn btn-primary createModal" data-url="{{ route('subject.store') }}" id="AddItem" data-item="Add Subject"
                    data-bs-toggle="modal" data-bs-target="#createModal" data-input='{{ route('dashboard.getFormSubject') }}'>Add
                    Subject</a>
                <a class="btn btn-primary createModal" data-url="{{ route('mark.addStudentToSubject') }}" id="AddItem"
                    data-item="Student to Subject" data-bs-toggle="modal" data-bs-target="#createModal"
                    data-input='{{ route('dashboard.getFromStudentToSubject') }}'>Student to Subject</a>
                    <a class="btn btn-primary createModal" data-url="{{ route('mark.store') }}" id="AddItem" data-item="Set Mark"
                    data-bs-toggle="modal" data-bs-target="#createModal" data-input='{{ route('dashboard.getFormMark') }}'>Set
                    mark</a>
            </div>
        </x-slot:header>
        <x-slot:body>
            @include('table', [($headers = $table['headers']), ($data = $users)])
        </x-slot:body>
    </x-page-index>
    @include('model1')
@endsection
@section('script')
    {{-- @include('modal-js') --}}
    <script src="{{ asset('assets/js/product/delete_item.js') }}"></script>
    <script src="{{ asset('assets/js/modal.js') }}"></script>
@endsection
