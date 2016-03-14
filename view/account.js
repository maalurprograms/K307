/**
 * Created by bcosaj on 08.03.2016.
 */

$(document).ready(function(){
    $("#note_container > div").each(function(){
        if ($(this).attr("id") != 0){
            $(this).hide();
        }
    });
    $('.ac_nav_li li').click( function() {
        linkID = $(this).attr("id");
        $("#note_container > div").each(function(){
            if ($(this).attr("id") == linkID){
                $(this).show();
                $("#"+$(this).attr("id")).css("background", "#4FC47A")
                $("#"+$(this).attr("id")).css("color", "white")
            } else {
                $(this).hide();
                $("#"+$(this).attr("id")).css("background", "white")
                $("#"+$(this).attr("id")).css("color", "black")
            }
        });
    });
});