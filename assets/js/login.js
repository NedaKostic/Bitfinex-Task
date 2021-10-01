$(document).ready(function () {

    $("#login").click(function () {

        $.post("src/login.php?login", function (response) {
            let jsonResp = JSON.parse(response);
            window.location.assign(jsonResp.redirect);
        })

        $(this).hide();
    })

})