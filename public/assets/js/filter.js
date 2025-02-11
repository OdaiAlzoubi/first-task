$(document).ready(function () {
    $(".dropdown-menu").on("click", function (e) {
        e.stopPropagation();
    });
    $("#resetFilter").on("click", function () {
        $("input[type='text'], input[type='number'], input[type='date']").val(
            ""
        );
        $("input[type='checkbox']").prop("checked", false);
        $("select").prop("selectedIndex", -1);
        $(this).closest("form").submit();
        $(".filter-form").submit();
    });
    $("#created_at_from").on("change", function () {
        var fromDate = $(this).val();
        if (fromDate) {
            $("#created_at_to").attr("min", fromDate);
            // Clear 'to' date if it's before 'from' date
            var toDate = $("#created_at_to").val();
            if (toDate && toDate < fromDate) {
                $("#created_at_to").val("");
            }
        } else {
            $("#created_at_to").removeAttr("min");
        }
    });
    $("#created_at_to").on("change", function () {
        var toDate = $(this).val();
        if (toDate) {
            $("#created_at_from").attr("max", toDate);
            // Clear 'from' date if it's after 'to' date
            var fromDate = $("#created_at_from").val();
            if (fromDate && fromDate > toDate) {
                $("#created_at_from").val("");
            }
        } else {
            $("#created_at_from").removeAttr("max");
        }
    });
});
