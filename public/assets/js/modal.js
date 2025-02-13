$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $(".updateItem").click(function (e) {
        e.preventDefault();
        var data = $(this).data("data");
        var url = $(this).data("url");
        var inputUrl = $(this).data("input");
        $.ajax({
            url: inputUrl,
            type: "GET",
            success: function (response) {
                var inputHtml = "";
                $.each(response.data, function (index, field) {
                    if (
                        field.name !== "password" &&
                        field.name !== "password_confirmation"
                    ) {
                        inputHtml += generateInputField(
                            field.label,
                            field.name,
                            field.id,
                            field.type,
                            field
                        );
                    }
                });
                $("#createModal .modalBody").html(inputHtml);
                $("#name").val(data.name || "");
                $("#username").val(data.username || "");
                $("#email").val(data.email || "");
                $("#role").val(data.role || "");
                $("#status").val(data.status || "");
                $("#createModalForm").attr("url", url);
                $("#createModalForm").addClass("editTableUser");
                $("#createModal").modal("show");
            },
            error: function (xhr) {
                console.log(xhr);
            },
        });
    });

    // Create Modal
    $(".createModal").click(function () {
        var inputUrl = $(this).data("input");
        var url = $(this).data("url");
        var thisModel = $(this);
        $.ajax({
            url: inputUrl,
            type: "GET",
            success: function (response) {
                var inputHtml = "";
                $.each(response.data, function (index, field) {
                    inputHtml += generateInputField(
                        field.label,
                        field.name,
                        field.id,
                        field.type,
                        field
                    );
                });
                $("#createModal .modalBody").html(inputHtml);
                $("#createModalForm").attr("url", url);
                if ($(thisModel).hasClass("editTableUser")) {
                    $("#createModalForm").addClass("editTableUser");
                } else {
                    $("#createModalForm").removeClass("editTableUser");
                }
                $('.modalTitle').html(thisModel.data('item'));
                $("#createModal").modal("show");
            },
            error: function (xhr) {
                console.log(xhr);
            },
        });
    });

    function generateInputField(label, name, id, type = "text", field = {}) {
        if (
            type === "text" ||
            type === "email" ||
            type === "number" ||
            type === "password"
        ) {
            return `
        <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container ${
            field.hide ? field.hide : ""
        }">
            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                <span class="required">${label}</span>
            </label>
            <input type="${type}" class="form-control form-control-solid" placeholder="Enter ${label}" name="${name}" id="${id}">
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
        </div>
        `;
        }

        if (type === "select" && field.options) {
            return getSelectHtml(field);
        }

        return "";
    }

    $("#createModalForm").on("submit", function (e) {
        e.preventDefault();
        var formData = $(this).serialize();
        var thisForm = $(this);
        $.ajax({
            url: $(this).attr("url"),
            type: "POST",
            data: formData,
            success: function (response) {
                if (thisForm.hasClass("editTableUser")) {
                    var existingRow = $("#user-" + response.user.id);
                    if (existingRow.length > 0) {
                        existingRow
                            .find(".username")
                            .text(response.user.username);
                        existingRow.find(".email").text(response.user.email);
                        existingRow
                            .addClass("table-success")
                            .delay(2000)
                            .queue(function (next) {
                                $(this).removeClass("table-success");
                                next();
                            });
                    } else {
                        $(".usersTable tbody")
                            .append(
                                `
    <tr id="user-${response.user.id}">
        <td>${response.user.id}</td>
        <td class="username">${response.user.username}</td>
        <td class="email">${response.user.email}</td>
        <td class="text-end">
            <a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary"
                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                <i class="ki-solid ki-dots-horizontal fs-2x"></i>
            </a>
            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                data-kt-menu="true">
                <div class="menu-item px-3">
                    <a class="menu-link px-3 updateItem editTableUser"
                        data-url="/user/update/${
                            response.user.id
                        }" id="updateItem" data-item="User"
                        data-bs-toggle="modal" data-bs-target="#createModal" data-data='${JSON.stringify(
                            response.user
                        )}'
                        data-input='{{ route('dashboard.getFormUser') }}'>Edit</a>
                </div>
                <div class="menu-item px-3">
                    <a class="menu-link px-3" data-url="/user/delete/${
                        response.user.id
                    }" id="deleteItem"
                        data-item="User">Delete</a>
                </div>
            </div>
        </td>
    </tr>
`
                            )
                            .find("tr:last")
                            .hide()
                            .fadeIn(500);
                    }
                }
                Swal.fire({
                    icon: "success",
                    text: response["message"],
                    showConfirmButton: false,
                    timer: 3000,
                });
                $("#createModal").modal("hide");
            },
            error: function (xhr) {
                var errors = xhr.responseJSON.errors;
                $.each(errors, function (field, messages) {
                    $("#" + field).addClass("is-invalid");
                    $("#" + field)
                        .next(".fv-plugins-message-container")
                        .html(messages[0]);
                    $("#" + field).on("input change", function () {
                        $(this).removeClass("is-invalid");
                        $(this).next(".fv-plugins-message-container").html("");
                    });
                });
            },
        });
    });

    // Show Subject After Identifying Student
    $(document).on("change", ".getSubject", function () {
        var studentId = $("#student_id").val();
        const finalUrl = $(this).data("url").replace(":id", studentId);
        $.ajax({
            url: finalUrl,
            type: "GET",
            success: function (response) {
                var select = $("#subject_id");
                select.empty();
                let optionsHtml = `<option value="">Select</option>`;
                for (const [key, option] of Object.entries(response.data)) {
                    optionsHtml += `<option value="${key}">${option}</option>`;
                }
                select.html(optionsHtml);
                $(".select-d-none").removeClass("d-none");
            },
        });
    });
    // Show Mark After Identifying Subject And Student
    $(document).on("change", ".getMark", function () {
        $(".input-d-none").removeClass("d-none");
    });

    // Input Type Select
    function getSelectHtml(field) {
        let optionsHtml = `<option value="">${
            field.placeholder ? field.placeholder : "Select an option"
        }</option>`;
        for (const [key, option] of Object.entries(
            field.options ? field.options : []
        )) {
            const selected =
                field.selectedValue && field.selectedValue == key
                    ? "selected"
                    : "";
            optionsHtml += `<option value="${key}" ${selected}>${option}</option>`;
        }
        return `
        <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container ${
            field.hide ? field.hide : ""
        }">
            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                <span class="required">${field.label ? field.label : ""}</span>
            </label>
            <select class="form-select form-select-solid ${
                field.class ? field.class : ""
            }" name="${field.name ? field.name : ""}" id="${field.id ? field.id : ""}" data-control="select2" ${field.data ? field.data : ""} data-placeholder="${field.placeholder ? field.placeholder : "Select an option"}">
                ${optionsHtml}
            </select>
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
        </div>
        `;
    }
});
