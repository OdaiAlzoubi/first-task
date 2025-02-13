@extends('layouts.master')
@section('css')
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
@endsection
@section('content')
    <div class="content d-flex flex-column flex-column-fluid">
        <div class="post d-flex flex-column-fluid">
            <div class="container-xxl">
                <div class="d-flex flex-column flex-lg-row">
                    <!--begin::Sidebar-->
                    @include('chat.users')
                    <!--begin::Content-->
                    @include('chat.chat')
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        const myId = {{ auth()->user()->id }};
    </script>
    <script src="{{ asset('assets/js/chat.js') }}"></script>
@endsection
