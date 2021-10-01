$(document).ready(function () {

    //add to favorites button
    $("#add").click(function () {

        let symbol = $("#add").attr("value");
        let message = $("#message");

        $.post("src/detailsphp.php?add", {symbol: symbol}, function (response) {
            let jsonResp = JSON.parse(response);
            if (jsonResp.fail) message.html(jsonResp.fail);
            else window.location.assign(jsonResp.redirect);
        })
    })

    //remove from favorites button
    $("#remove").click(function () {

        let symbol = $("#remove").attr("value");
        let message = $("#message");

        $.post("src/detailsphp.php?remove", { symbol: symbol}, function (response) {
            let jsonResp = JSON.parse(response);
            if (jsonResp.fail) message.html(jsonResp.fail);
            else  window.location.assign(jsonResp.redirect);
        })
    })

})