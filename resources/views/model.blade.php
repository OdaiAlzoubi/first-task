<div class="modal fade" id="editModal" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content rounded">
            <div class="modal-header pb-0 border-0 justify-content-end">
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
            </div>
            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                <form id="editUser" class="form fv-plugins-bootstrap5 fv-plugins-framework">
                    <div class="mb-13 text-center">
                        <h1 class="mb-3">{{ $title }}</h1>
                    </div>
                    <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span class="required">Name</span>
                        </label>
                        <input type="text" class="form-control form-control-solid" placeholder="Enter Name"
                            name="name" id="name">
                        <div
                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                        </div>
                    </div>
                    <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span class="required">UserName</span>
                        </label>
                        <input type="text" class="form-control form-control-solid" placeholder="Enter UserName"
                            name="username" id="username">
                        <div
                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                        </div>
                    </div>
                    <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span class="required">Email</span>
                        </label>
                        <input type="text" class="form-control form-control-solid" placeholder="Enter Email"
                            name="email" id="email">
                        <div
                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                        </div>
                    </div>
                    {{-- User Status --}}
                    <div class="d-flex flex-stack mb-8">
                        <div class="me-5">
                            <label for="status" class="fs-6 fw-semibold">User Status</label>
                        </div>
                        <select class="form-select form-select-solid" name="status" id="status">
                            <option value="active" selected>Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>

                    <div class="text-center">
                        <button type="reset" data-bs-dismiss="modal"
                            class="btn btn-light me-3">Cancel</button>
                        <button type="submit" class="btn btn-primary">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
