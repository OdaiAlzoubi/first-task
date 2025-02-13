$(document).ready(function () {
    let messagesContainer = $('[data-kt-element="messages"]');
    $(".open-chat-user").click(function (e) {
        e.preventDefault();
        var userId = $(this).data("user-id");
        var username = $(this).text();
        var url = $(this).data("url");

        $(".chat-username").text(username).attr("data-user-id", userId);
        messagesContainer.html("<p>Loading messages...</p>");

        $.ajax({
            url: url,
            type: "GET",
            data: { user_id: userId },
            success: function (response) {
                messagesContainer.html("");
                if (!response.messages || response.messages.length === 0) {
                    messagesContainer.html("<p>No messages yet.</p>");
                    return;
                }
                $.each(response.messages, function (index, message) {
                    if (message.sender_id == response.current_user_id) {
                        displayOutgoingMessage(message.message);
                    } else {
                        displayIncomingMessage(message.message);
                    }
                });
                scrollToBottom();
            },
            error: function (xhr) {
                console.error("Error:", xhr);
                messagesContainer.html("<p>Error loading messages.</p>");
            },
        });
    });

    $('[data-kt-element="send"]').on("click", function () {
        var messageText = $('[data-kt-element="input"]').val().trim();
        var receiverId = $(".chat-username").data("user-id");
        var url = $(this).data("url");
        if (!messageText || !receiverId) return;

        displayOutgoingMessage(messageText);
        scrollToBottom();
        $.ajax({
            url: url,
            type: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr("content"),
                message: messageText,
                receiver_id: receiverId,
            },
            success: function (response) {
                $('[data-kt-element="input"]').val("");
            },
            error: function (xhr) {
                console.error("Error:", xhr);
            },
        });
    });

    $('[data-kt-element="input"]').on("keypress", function (e) {
        if (e.which === 13 && !e.shiftKey) {
            e.preventDefault();
            $('[data-kt-element="send"]').click();
        }
    });

    function displayIncomingMessage(message) {
        var messageTemplate = `
            <div class="d-flex justify-content-start mb-10">
                <div class="d-flex flex-column align-items-start">
                    <div class="p-5 rounded bg-light-info text-gray-900 fw-semibold mw-lg-400px text-start">${message}</div>
                </div>
            </div>`;
        messagesContainer.append(messageTemplate);
    }

    function displayOutgoingMessage(message) {
        var messageTemplate = `
            <div class="d-flex justify-content-end mb-10">
                <div class="d-flex flex-column align-items-end">
                    <div class="p-5 rounded bg-light-primary text-gray-900 fw-semibold mw-lg-400px text-end">${message}</div>
                </div>
            </div>`;
        messagesContainer.append(messageTemplate);
    }
    function scrollToBottom() {
        messagesContainer.scrollTop(messagesContainer.prop("scrollHeight"));
    }
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher("b40e4594f02c815a494c", {
        cluster: "eu",
        forceTLS: true,
    });
    var channel = pusher.subscribe("chat." + myId);
    channel.bind("message.sent", function (data) {
        console.log(data.message.message);
        displayIncomingMessage(data.message.message);
        scrollToBottom();
    });
});
