$("#btn_filter").click(function(){
    $("input").each(function(){
        if($(this).val() == '') {
            $(this).remove();
        }
    });
    $("#form_id").submit();
});
