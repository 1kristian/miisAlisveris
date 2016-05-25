$(document).ready(function () {

    $("input").click(function () {
        if (this.id == "AutoFillClick") {

            var FormData = {
                "payment_name": $(this).attr("name"),
                "payment_company": $(this).attr("company"),
                "payment_address": $(this).attr("address"),
                "payment_city": $(this).attr("city"),
                "payment_postcode": $(this).attr("postcode"),
                "payment_country": $(this).attr("country"),
                "shipping_name": $(this).attr("name"),
                "shipping_company": $(this).attr("company"),
                "shipping_address": $(this).attr("address"),
                "shipping_city": $(this).attr("city"),
                "shipping_postcode": $(this).attr("postcode"),
                "shipping_country": $(this).attr("country"),
            }

            $("#autoFillForm").autofill(FormData);
        }
    });
});



