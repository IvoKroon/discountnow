/**
 * Created by ivokroon on 08/01/16.
 */
var ROOT_URL = "http://localhost/discountnow/";

$(".save_button_disc").on("click", function(){
    var button = $(this);
    if(button.hasClass("de_save_button")){
        button.removeClass("de_save_button");
        button.html("Opslaan");

    }else{
        button.addClass("de_save_button");
        button.html("Verwijderen");
    }
});

function doAjax(link, kind, dataArray) {
    var request = $.ajax({
        url: link,
        method: kind,
        data: dataArray
    });

    request.done(function (msg) {
        console.log(msg);
    });

    request.fail(function (jqXHR, textStatus) {
        console.log(textStatus);
    });
}