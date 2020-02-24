$(document).ready(function () {
    $(".form").on("submit", function (event) {
        event.preventDefault();
        $("#errors").html("");
        var form = $(this);
        var url = form.attr('action');
        var request = $.ajax({
            type: "POST",
            url: url,
            dataType: "json",
            data: form.serialize(),
            success: function (response) {
                console.log(response);
            }
        });
        request.done(function (data) {
            $.each(data, function (key, val) {
                if (key == "url") {
                    $("#error_div").hide();
                    window.location.href = val;
                    return false;
                } else {
                    $("#errors").append('<li>' + val + '</li>');
                    $("#error_div").show();
                }
            });


        });

        request.fail(function (jqXHR, textStatus) {

            alert("Error de validación, favor intente nuevamente: " + textStatus);
        });
    });
    $(".tab").on("click", function (event) {
        $("#error_div").hide();
        $("#errors").html("");
        $('form').trigger("reset");
    });

    $(".customer-form").on("submit", function (event) {
        event.preventDefault();
        var form = $(this);
        var url = form.attr('action');
        var request = $.ajax({
            type: "POST",
            url: url,
            dataType: "html",
            data: form.serialize(),
            success: function (response) {
                console.log(response);
            }
        });
        request.done(function (data) {

        });

        request.fail(function (jqXHR, textStatus) {

            alert("Error de validación, favor intente nuevamente: " + textStatus);
        });
    });
});
