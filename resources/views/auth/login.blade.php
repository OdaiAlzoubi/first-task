@extends('auth.master')
@section('content')
    <div class="d-flex flex-center flex-column align-items-stretch h-lg-100 w-md-400px">
        <div class="d-flex flex-center flex-column flex-column-fluid pb-15 pb-lg-20">
            <form class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate" id="kt_sign_in_form"
                data-kt-redirect-url="index.html" action="{{ route('login') }}" method="POST">
                @csrf
                {{-- <div class="text-center mb-11">
                    <h1 class="text-gray-900 fw-bolder mb-3">Sign In</h1>
                    <div class="text-gray-500 fw-semibold fs-6">Your Social Campaigns</div>
                </div>
                <!--begin::Separator-->
                <div class="separator separator-content my-14">
                    <span class="w-125px text-gray-500 fw-semibold fs-7">Or with email</span>
                </div> --}}
                <!--begin::Input group=-->
                <div class="fv-row mb-8 fv-plugins-icon-container">
                    <input type="text" placeholder="Email" name="email" autocomplete="off"
                        class="form-control bg-transparent @error('email') is-invalid @enderror">
                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                    </div>
                    @include('common.error',[$name='email'])
                </div>
                <div class="fv-row mb-3 fv-plugins-icon-container">
                    <input type="password" placeholder="Password" name="password" autocomplete="off"
                        class="form-control bg-transparent @error('password') is-invalid @enderror">
                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                    </div>
                    @include('common.error',[$name='password'])
                </div>
                <!--begin::Wrapper-->
                {{-- <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                    <div></div>
                    <!--begin::Link-->
                    <a href="authentication/layouts/overlay/reset-password.html" class="link-primary">Forgot Password ?</a>
                </div> --}}
                <div class="d-grid mb-10">
                    <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                        <span class="indicator-label">Sign In</span>
                        <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
