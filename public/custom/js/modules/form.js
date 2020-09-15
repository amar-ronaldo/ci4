var formClass = class form {
  constructor(el, btn) {
    this.el = el;
    this.btn = btn;
    this.action = el.attr("action");
    this.idDt = el.data("iddt");
  }

  submit(data) {
    var btn = this.btn;
    let toast = new notifClass();
    var form = this.el;
    var idDt = this.idDt;

    $.ajax({
      url: this.action,
      enctype: "multipart/form-data",
      data: new FormData(this.el[0]),
      method: "POST",
      dataType: "JSON",
      headers: { "X-Requested-With": "XMLHttpRequest" },
      processData: false,
      contentType: false,
      cache: false,
      async: false,
      beforeSend: function () {
        btn.loading();
        One.layout("header_loader_on");
      },
      success: function (res) {
        if (res.error) toast.error(res.message, 1);

        if (res.success) {
          $(form).trigger("reset");
          $(form).find('select').val('').trigger('change') 

          toast.success(res.message)
        };
        
        if (res.redirect) {
          if (res.redirect == "single-crud") {
            $(form).parents(".block").find(".form-crud-btn-back").click();
            crud[idDt].reload();
          } else {
            window.location = res.redirect;
          }
        }
      },
      error: function (jqXHR, error, errorThrown) {
        if (jqXHR.status && jqXHR.status == 400) {
          toast.error(jqXHR.responseTextm, 1);
        } else {
          toast.error("Something Wrong..", 1);
        }
      },
      complete: function () {
        btn.loadingCompleted();
        One.layout("header_loader_off");
      },
    });
  }
};