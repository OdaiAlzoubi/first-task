<div class="flex-lg-row-fluid ms-lg-7 ms-xl-10 chat-user">
    <div class="card" id="kt_chat_messenger">
        <div class="card-header" id="kt_chat_messenger_header">
            <div class="card-title">
                <div class="d-flex justify-content-center flex-column me-3">
                    <p href="#" class="fs-4 fw-bold text-gray-900 text-hover-primary me-1 mb-2 lh-1 chat-username"></p>
                </div>
            </div>
        </div>
        <div class="card-body" id="kt_chat_messenger_body">
            <div class="scroll-y me-n5 pe-5 h-300px h-lg-auto" data-kt-element="messages" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_header, #kt_app_header, #kt_app_toolbar, #kt_toolbar, #kt_footer, #kt_app_footer, #kt_chat_messenger_header, #kt_chat_messenger_footer" data-kt-scroll-wrappers="#kt_content, #kt_app_content, #kt_chat_messenger_body" data-kt-scroll-offset="5px" style="">
            </div>
        </div>
        <div class="card-footer pt-4" id="kt_chat_messenger_footer">
            <textarea class="form-control form-control-flush mb-3" rows="1" data-kt-element="input" placeholder="Type a message"></textarea>
            <div class="d-flex flex-stack">
                <div class="d-flex align-items-center me-2">
                </div>
                <button class="btn btn-primary" type="button" data-kt-element="send" data-url="{{ route('chat.send') }}">Send</button>
            </div>
        </div>
    </div>
</div>
