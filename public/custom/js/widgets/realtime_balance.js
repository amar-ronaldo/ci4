function w_rtb_reload(){
        $.ajax({
            url:siteUrl+'backend/dashboard/widget_rtb',
            data:data_ajax_init,
            dataType:'html',
            type:'post',
            success:function(data){
                $('.w_rtb_body').html(data)
                money_format()
            }
        })
}
$(document).on('click','.btn-block-option-w-rtb',function(){
    w_rtb_reload()

})
w_rtb_reload()
setInterval(function(){ w_rtb_reload() }, 5000);