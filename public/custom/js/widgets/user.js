function w_user_reload(){
        $.ajax({
            url:siteUrl+'backend/dashboard/widget_user',
            data:data_ajax_init,
            dataType:'html',
            type:'post',
            success:function(data){
                $('.w_user_body').html(data)
                money_format()
            }
        })
}
$(document).on('click','.btn-block-option-w-user',function(){
    w_user_reload()

})
w_user_reload()
setInterval(function(){ w_user_reload() }, 5000);