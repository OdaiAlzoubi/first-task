<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.updateItem').click(function(e) {
            e.preventDefault();
            var data = $(this).data('data');
            var url = $(this).data('url');
            openEditSubjectModal(data, url);
        });

        function openEditSubjectModal(data, url) {
            $('#name').val(data.name || '');
            $('#username').val(data.username || '');
            $('#email').val(data.email || '');
            $('#editUser').attr('url', url);
            if (typeof data.status !== 'active') {
                $('#createSubjectModal input[name="status"]').prop('checked', data.status);
            }
            $('#editModal').modal('show');
        }

        $('input').on('input', function() {
            var input = $(this);
            var errorDiv = input.next('.invalid-feedback');
            input.removeClass('is-invalid');
            errorDiv.html('');
        });

        $('#editUser').on('submit', function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                url: $(this).attr('url'),
                type: 'PUT',
                data: formData,
                success: function(response) {
                    $('#editModal').modal('hide');
                },
                error: function(xhr) {
                    var errors = xhr.responseJSON.errors;
                    if (errors.name) {
                        $('#name').addClass('is-invalid');
                        $('#name').next('.invalid-feedback').html(errors.name[0]);
                    } else {
                        $('#name').removeClass('is-invalid');
                    }
                    if (errors.username) {
                        $('#username').addClass('is-invalid');
                        $('#username').next('.invalid-feedback').html(errors.username[0]);
                    } else {
                        $('#username').removeClass('is-invalid');
                    }
                    if (errors.email) {
                        $('#email').addClass('is-invalid');
                        $('#email').next('.invalid-feedback').html(errors.username[0]);
                    } else {
                        $('#email').removeClass('is-invalid');
                    }
                }
            });
        });

        // Create Modal
        $(".createModal").click(function() {
            var inputs = $(this).data("input");
            var url = $(this).data('url');
            var inputHtml = '';
            $.each(inputs, function(index, field) {
                inputHtml += generateInputField(field.label, field.name, field.id, field.type,
                    field);
            });
            $('#createModal .modalBody').html(inputHtml);
            $('#createModalForm').attr('url', url);
            $('#createModal').modal('show');

        });

        function generateInputField(label, name, id, type = 'text', field = {}) {
            if (type === 'text' || type === 'email' || type === 'number') {
                return `
        <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                <span class="required">${label}</span>
            </label>
            <input type="${type}" class="form-control form-control-solid" placeholder="Enter ${label}" name="${name}" id="${id}">
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
        </div>
        `;
            }

            if (type === 'select' && field.options) {
                let optionsHtml = `<option value="">${field.placeholder || 'Select an option'}</option>`;
                for (const [key, option] of Object.entries(field.options)) {
                    const selected = field.selectedValue && field.selectedValue == key ? 'selected' : '';
                    optionsHtml += `<option value="${option.id}" ${selected}>${option.name}</option>`;
                }

                return `
        <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container ${field.hide ? field.hide : ''}">
            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                <span class="required">${label}</span>
            </label>
            <select class="form-select form-select-solid ${field.class}" name="${name}" id="${id}" data-control="select2">
                ${optionsHtml}
            </select>
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
        </div>
        `;
            }

            return '';
        }


        $('#createModalForm').on('submit', function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            console.log(formData);
            $.ajax({
                url: $(this).attr('url'),
                type: 'POST',
                data: formData,
                success: function(response) {
                    $('#createModal').modal('hide');
                    // location.reload();
                },
                error: function(xhr) {
                    var errors = xhr.responseJSON.errors;
                    // $.each(errors, function(field, messages) {
                    //     $('#' + field).addClass('is-invalid');
                    //     $('#' + field).next('.fv-plugins-message-container').html(messages[0]);
                    // });
                }
            });
        });

        $(document).on('change', '.getSubject', function() {
            var studentId = $('#student_id').val();
            $.ajax({
                url: '/student/' + studentId + '/subjects',
                type: 'GET',
                success: function(response) {
                    var select = $('#subject_id');
                    select.empty();
                    select.append('<option value="">Select a subject</option>');
                    $.each(response, function(index, subject) {
                        select.append('<option value="' + subject.id + '">' + subject.name + '</option>');
                    });
                }
    
        });
    });
</script>
