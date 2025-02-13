<div class="flex-column flex-lg-row-auto w-100 w-lg-300px w-xl-400px mb-10 mb-lg-0">
    <div class="card card-flush">
        {{-- <div class="card-header pt-7" id="kt_chat_contacts_header">
            <form class="w-100 position-relative" autocomplete="off">
                <i class="ki-duotone ki-magnifier fs-3 text-gray-500 position-absolute top-50 ms-5 translate-middle-y">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
                <input type="text" class="form-control form-control-solid px-13" name="search" value=""
                    placeholder="Search by username or email...">
            </form>
        </div> --}}
        <div class="card-body pt-5" id="kt_chat_contacts_body">
            <!--begin::List-->
            <div class="scroll-y me-n5 pe-5 h-200px h-lg-auto" data-kt-scroll="true"
                data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                data-kt-scroll-dependencies="#kt_header, #kt_app_header, #kt_toolbar, #kt_app_toolbar, #kt_footer, #kt_app_footer, #kt_chat_contacts_header"
                data-kt-scroll-wrappers="#kt_content, #kt_app_content, #kt_chat_contacts_body"
                data-kt-scroll-offset="5px" style="">
                @foreach ($users as $user)
                    <!--begin::User-->
                    <div class="d-flex flex-stack py-4 user-item" data-user-id="{{ $user->id }}">
                        <!--begin::Details-->
                        <div class="d-flex align-items-center">
                            <!--begin::Avatar-->
                            <div class="symbol symbol-45px symbol-circle">
                                <span class="symbol-label bg-light-danger text-danger fs-6 fw-bolder">M</span>
                            </div>
                            <!--begin::Details-->
                            <div class="ms-5">
                                <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2 open-chat-user" data-user-id={{ $user->id }} data-url="{{ route('chat.getMessages') }}" data-my-user="{{ auth()->user()->id }}">{{ $user->username }}</a>
                                <div class="fw-semibold text-muted">{{ $user->email }}</div>
                            </div>
                        </div>
                        <!--begin::Lat seen-->
                        <div class="d-flex flex-column align-items-end ms-2">
                            <span class="text-muted fs-7 mb-1">1 day</span>
                        </div>
                    </div>
                    <div class="separator separator-dashed d-none"></div>
                @endforeach
            </div>
            <!--end::List-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Contacts-->
</div>
