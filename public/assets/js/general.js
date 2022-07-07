/**
 * @description Trigger modal and render trnsaftion details
 * @param string $route
 *
 * @returns modal view
 */
$(document).on("click", "#transfer-details-modal", function (event) {
    event.preventDefault();
    $route = $(this).attr("data-url");

    $.ajax({
        url: $route,
        beforeSend: function () {
            $("#modal-body").html(
                '<div class="pr-calculator-fee-container d-flex justify-content-center align-items-center"><div class="tw-loader tw-loader--sm"><div class="tw-loader__stripe"></div><div class="tw-loader__stripe"></div><div class="tw-loader__stripe"></div><div class="tw-loader__stripe"></div><div class="tw-loader__stripe"></div></div></div>'
            );
        },
        // return the result
        success: function (result) {
            setTimeout(() => {
                // Clear modal body before appending transaction data
                $("#modal-body").empty().html(result);
            }, 800);
        },
        complete: function () {
            $("#spinner-icon").hide();
        },
        error: function (jqXHR, testStatus, error) {
            displayMessage(
                "An error occured while trying to retrieve transaction details.",
                "error"
            );
            $("#spinner-icon").hide();
        },
        timeout: 8000,
    });
});

/**
 * @description Close bootstrap modal backdrop on click
 */
$('.close').click(function() {
    $(".modal-backdrop").remove();
});

/**
 * @description Display session message with Sweet Alert
 * @param string message
 * @param string type
 *
 * @returns toast
 */
function displayMessage(message, type) {
    const Toast = swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 8000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });
    Toast.fire({
        icon: type,
        title: message,
    });
}

