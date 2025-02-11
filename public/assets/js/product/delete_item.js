$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();

    function copyTextToClipboard(text) {
        if (!text) {
            console.error("No text to copy!");
            alert("No text to copy!");
            return;
        }
        navigator.clipboard
            .writeText(text)
            .then(function () {
                showCopyMessage();
            })
            .catch(function (err) {
                alert("Failed to copy text: " + err);
            });
    }

    function showCopyMessage() {
        $("#copyMessage").fadeIn(300);

        setTimeout(function () {
            $("#copyMessage").fadeOut(300);
        }, 2000);
    }

    $(".copyable").click(function () {
        var textToCopy = $(this).attr("data-bs-original-title");
        console.log(textToCopy);
        if (textToCopy) {
            copyTextToClipboard(textToCopy);
        } else {
            console.error("Title attribute is empty or undefined!");
            alert("No text available to copy.");
        }
    });

    $(document).on("click", "#deleteItem", function () {
        Swal.fire({
            title: `Are you sure you want to delete the ${$(this).data(
                "item"
            )}?`,
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete!",
            cancelButtonText: "No, cancel",
            customClass: {
                confirmButton: "btn btn-danger",
                cancelButton: "btn fw-bold btn-light",
            },
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: $(this).data("url"),
                    type: "DELETE",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    data: {
                        // id: id,
                        // _token: appConfig.csrfToken,
                    },
                    success: function (response) {
                        // $("tr[data-id=" + id + "]").remove();
                        Swal.fire({
                            title: response.message,
                            icon: "success",
                        });
                    },
                    error: function (xhr) {
                        Swal.fire({
                            title: "Failed!",
                            text: xhr.responseJSON.message,
                            icon: "error",
                        });
                    },
                });
            }
        });
        // const id = $(this).data("id");
        // confirmAndDelete(id);
    });
});
