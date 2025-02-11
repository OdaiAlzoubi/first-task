@extends('layouts.master')
@section('content')
    <x-page-index>
        <x-slot:header>
            <div class="page-action">
                <a class="btn btn-primary createModal" data-url="{{ route('user.store') }}" id="AddItem" data-item="User"
                    data-bs-toggle="modal" data-bs-target="#createModal" data-input='@json($formUser)'>Add User</a>
                <a class="btn btn-primary createModal" data-url="{{ route('subject.store') }}" id="AddItem" data-item="User"
                    data-bs-toggle="modal" data-bs-target="#createModal" data-input='@json($formSubject)'>Add
                    Subject</a>
                <a class="btn btn-primary createModal" data-url="{{ route('mark.store') }}" id="AddItem" data-item="User"
                    data-bs-toggle="modal" data-bs-target="#createModal" data-input='@json($formMark)'>Set
                    mark</a>
                <a class="btn btn-primary createModal" data-url="{{ route('mark.addStudentToSubject') }}" id="AddItem"
                    data-item="User" data-bs-toggle="modal" data-bs-target="#createModal"
                    data-input='@json($fromStudentToSubject)'>student to subject</a>
            </div>
        </x-slot:header>
        <x-slot:body>
            @include('table', [($headers = $table['headers']), ($data = $users)])
        </x-slot:body>
    </x-page-index>
    @include('model', [($title = 'Add')])
    @include('model1', [($title = 'Add')])
@endsection
@section('script')
    @include('modal-js')
    <script src="{{ asset('assets/js/product/delete_item.js') }}"></script>
@endsection
