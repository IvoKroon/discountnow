/**
 * Created by ivokroon on 08/01/16.
 */
var ROOT_URL = "http://localhost/discountnow/";

$(".save_button_disc").on("click", function(){
    var button = $(this);
    if(button.hasClass("de_save_button")){
        button.removeClass("de_save_button");
        button.html("Opslaan");

        var dId = button.data("discountid");
        doAjax(ROOT_URL+"ajax/save_discount_ajax.php","POST", {data:"remove_saved",dId:dId});

    }else{
        button.addClass("de_save_button");
        button.html("Verwijderen");

        var dId = button.data("discountid");
        doAjax(ROOT_URL+"ajax/save_discount_ajax.php","POST", {data:"add_saved",dId:dId});
    }
});

function doAjax(link, kind, dataArray) {
    var request = $.ajax({
        method: kind,
        url: link,
        data: dataArray,
        //dataType: "json"
    });

    request.done(function (msg) {
        console.log(msg);
    });

    request.fail(function (jqXHR, textStatus) {
        console.log(textStatus);
    });
}