/**
 * Created by ivokroon on 08/01/16.
 */
$(function() {
    $( "#datepicker" ).datepicker();
    $( "#datepicker2" ).datepicker();
});

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


//ADD DISCOUNT REMOVE SOME FIELDS.

var style = $(".style_value");
var form = $(".add_discount_form");
var type = $(".add_discount_type");
//var discount_korting = $(".add_discount_korting")

var code_field = '<div class="form-group add_discount_code"> ' +
    '<label class="col-sm-3">Code</label>' +
    '<div class="col-sm-9"> '+
    '<input type="text" class="form-control" name="code" placeholder="Code">'+
    '</div>'+
    '</div>';

var kind_code_field = '<div class="form-group add_discount_korting">'+
    '<label class="col-sm-3 class=">Kortingsoort</label>'+
    '<div class="col-sm-9">'+
    '<div class="input-group">'+
    '<span class="input-group-addon">'+
    '€ <input type="radio" name="kind"  aria-label="" value="1" checked>'+
    '% <input type="radio" name="kind" aria-label="" value="2">'+
    '</span>'+
    '<input type="text" name="amount" class="form-control amount_textfield" placeholder="Korting">'+
    '</div>'+
    '</div>'+
    '</div>';



style.change(function(){

    if(style.val() == 1) {

        if(!form.children().hasClass("add_discount_korting")){
            form.append(kind_code_field);
            $(".add_discount_korting").insertBefore(".add_discount_type")
        }
        //REMOVE ADD DISCOUNT CODE
        if(form.children().hasClass("add_discount_code")) {
            $(".add_discount_code").remove();
        }

    }else if(style.val() == 2){
        if(form.children().hasClass("add_discount_code")){
            $(".add_discount_code").remove();
        }
        if(form.children().hasClass("add_discount_korting")){
            $(".add_discount_korting").remove();
        }

    }else if(style.val() == 0) {
        if (!form.hasClass("add_discount_code")) {
            form.append(code_field);
            $(".add_discount_code").insertAfter(".add_discount_kind");
        }

        if(!form.children().hasClass("add_discount_korting")){
            form.append(kind_code_field);
            $(".add_discount_korting").insertBefore(".add_discount_type")
        }
    }
});

function checkAndAddBeforeClass(check_class,add_html,before_class){
    if(!form.hasClass(check_class)){
        $(form).append(add_html);
        $(add_html).insertBefore(before_class)
    }
}

function checkAndAddAfterClass(check_class,add_html,after_class){
    if(!form.hasClass(check_class)){
        $(form).append(add_html);
        $(add_html).insertBefore(after_class)
    }
}
