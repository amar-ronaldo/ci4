$('.form-submit').on('click',function(){
    elbtn = $(this)
    elForm = $(this).parents('form')
    var lbtn = new btn(elbtn)
    var lform = new form(elForm,lbtn)
    if(elForm.valid()){
        lform.submit()
    }
    
})

class btn{
    constructor(el) {
        this.el = el;
        this.defaultTxt = el.text();
        this.loadingTxt = 'Loading..';
    }
    loading = function(el){
        $(el).text(this.loadingTxt)
        $(el).attr('disabled',true)
    }
    loadingCompleted(el){
        $(el).removeAttr('disabled')
        $(el).text(this.defaultTxt)
    }
}


class form{

    constructor(el,btn) {
        this.el = el;
        this.btn = btn;
        this.action = el.action;
    }
    submit(data) {
        if (typeof data === 'undefined'){
            data  = this.el.serialize()
        }
        var btn = this.btn
        $.ajax({
            url:this.action,
            data:data,
            method:'POST',
            dataType:'JSON',
            headers: {'X-Requested-With': 'XMLHttpRequest'},
            beforeSend:function(){
                btn.loading()
                One.layout('header_loader_on');
            },
            success :function(res){
                if(res.error)
                    toast.error(res.message);

                if(res.success)
                    toast.success(res.message);

                if(res.redirect)
                    window.location = res.redirect
                

            },
            error: function(jqXHR,error, errorThrown) {  
                if(jqXHR.status&&jqXHR.status==400){
                    toast.error(jqXHR.responseText);
                }else{
                    toast.error('Something Wrong..');
                }
           },
            complete :function(){
                btn.loadingCompleted()
                One.layout('header_loader_off');
            }
        })
    }
}

class notif{
    constructor(){
        this.toast = Swal.mixin({
            buttonsStyling: false,
            customClass: {
                confirmButton: 'btn btn-success m-1',
                cancelButton: 'btn btn-danger m-1',
                input: 'form-control'
            }
        });
    }
    success(message,isNotif = 1) {
        if (isNotif == 1)
        One.helpers('notify', {type: 'success', icon: 'fa fa-check mr-1', message: message})
        else
        this.toast.fire('Success' , message, 'success')
    }
    error(message,isNotif = 1) {
        if (isNotif == 1)
        this.toast.fire('Error' , message, 'error');             
        else
        One.helpers('notify', {type: 'danger', icon: 'fa fa-times mr-1', message: message});
        
    }
    info(message,isNotif = 1) {
        if (isNotif == 1)
        this.toast.fire('Info' , message, 'info');             
        else
        One.helpers('notify', {type: 'info', icon: 'fa fa-info-circle mr-1', message: message});
    }
    warning(message,isNotif = 1) {
        if (isNotif == 1)
        this.toast.fire('Info' , message, 'warning');             
        else
        One.helpers('notify', {type: 'warning', icon: 'fa fa-exclamation mr-1', message: message});
    }
    
}
class crud{
    quesion = function () {
        toast.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this imaginary file!',
            icon: 'warning',
            showCancelButton: true,
            customClass: {
                confirmButton: 'btn btn-danger m-1',
                cancelButton: 'btn btn-secondary m-1'
            },
            confirmButtonText: 'Yes, delete it!',
            html: false,
            preConfirm: e => {
                return new Promise(resolve => {
                    setTimeout(() => {
                        resolve();
                    }, 50);
                });
            }
        }).then(result => {
            if (result.value) {
                toast.fire('Deleted!', 'Your imaginary file has been deleted.', 'success');
                // result.dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
            } else if (result.dismiss === 'cancel') {
                toast.fire('Cancelled', 'Your imaginary file is safe :)', 'error');
            }
        });
    }
}
const toast = new notif()