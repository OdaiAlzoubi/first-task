@props(['header' => '', 'body' => ''])
<div class="content d-flex flex-column flex-column-fluid">
    <div class="post d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container-xxl">
            <!--begin::Contacts App- Add New Contact-->
            <div class="row g-7" data-select2-id="select2-data-119-g3yt">
                <div class="">
                    <!--begin::Contacts-->
                    <div class="card card-flush h-lg-100">
                        <!--begin::Card header-->
                        <div class="card-header pt-7">
                            {{ $header }}
                        </div>
                        <!--begin::Card body-->
                        <div class="card-body pt-5">
                            {{ $body }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
