<div class="modal fade" id="createModal" tabindex="-1" style="display: none;" aria-hidden="true">
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
                <form id="createModalForm" class="form fv-plugins-bootstrap5 fv-plugins-framework">
                    <div class="mb-13 text-center">
                        <h1 class="mb-3 modalTitle"></h1>
                    </div>
                    <div id="contentCreateModal" class="modalBody"></div>
                    <div class="text-center">
                        <button type="reset" data-bs-dismiss="modal" class="btn btn-light me-3">Cancel</button>
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
