var crudClass = class crud {
  constructor(el) {
    this.el = el;
    this.id = el.attr("id");
    this.url = el.data("url");
    this.controller = el.data("controller");
    this.baseUrl = this.controller ?  siteUrl + this.controller +'/' : baseUrl;

    this.form = el.parents(".block-content").find("form").first();
    this.formFilter = $(this.el).parents("div.form-data").find(".form-filter");
    this.formAdd = $(this.el).parents("div.form-data").next();
    this.btnAdd = $(this.el).parents("div.block").find(".form-crud-btn-add");
  }
  init = function () {
    let dtColums = new Array();
    var form = this.form;
    var formFilter = this.formFilter;
    var formAdd = this.formAdd;
    var btnAdd = this.btnAdd;

    $(this.el)
      .find("th")
      .each(function (i, v) {
        let dtColum = new Object();
        dtColum["data"] = $(v).data("name");
        dtColum["className"] = $(v).data("class") ?? "";
        if ($(v).data("type") == "date") {
          dtColum["render"] = function (data, type, row) {
            var date = $.fn.dataTable
              .moment(data)
              .locale("id")
              .format("Do MMMM YYYY, h:mm:ss a");
            return date == "Invalid date" ? "" : date;
          };
        }
        if ($(v).data("type") == "number") {
          dtColum["render"] =  $.fn.dataTable.render.number( ',', '.' )
        }
        dtColums.push(dtColum);
      });
      var url = this.baseUrl;
    $("#" + this.id).dataTable({
      pageLength: 10,
      autoWidth: true,
      destroy: "true",
      serverSide: true,
      responsive: true,
      lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
      ajax: {
        url: url  + this.url,
        type: "POST",
        data: function (d) {
          if (!formFilter.is(":visible")) {
            form.find("input:not(:first)").each(function () {
              $(this).val("");
            });
          }
          return $.extend({}, d, getFormData(form));
        },
      },
      select: {
        style: "single",
      },
      scrollX: true,
      columns: dtColums,
      buttons: [
        // { extend: "copy", className: "btn btn-sm btn-primary" },
        // { extend: "print", className: "btn btn-sm btn-primary" },
        { extend: "csv", className: "btn btn-sm btn-primary" },
        {
          text: "Filter",
          className: "btn btn-sm btn-secondary",
          action: function (e, dt, node, config) {
            if (formFilter.is(":visible")) {
              hide(formFilter);
            } else {
              show(formFilter);
            }
          },
        },
        {
          text: "edit",
          className: "btn btn-sm btn-warning",
          action: function (e, dt, node, config) {
            var data = dt.rows(".selected").data();
            if (!data[0]) {
              toast.error("Pilih Data Terlebih Dahulu", 1);
            } else {
              btnAdd.trigger("click");
              $.each(data[0], function (index, value) {
                var $text = formAdd.find('input[name="' + index + '"]');

                if ($text.length == 1) {
                  $text.val(value).trigger('input')
                } else {
                  var select = formAdd.find('select[name="'+index+'"]');
                  select.append(new Option(
                    data[0][index+'_name'], 
                      value,
                        false,
                        false
                    )).trigger('change')
                }
              })
            }
          },
        },
        {
          text: "delete",
          className: "btn btn-sm btn-danger",
          action: function (e, dt, node, config) {
            var data = dt.rows(".selected").data();
            var reloadDt = dt.ajax.reload;

            if (!data[0]) {
              toast.error("Pilih Data Terlebih Dahulu", 1);
            } else {
              
              var confirm = toast.question("Apakah anda yakin ?");

              confirm.then((result) => {
                if (result.value) {
                  let data_ajax = data_ajax_init;
                  data_ajax["id"] = data[0]["id"];
                  
                  $.ajax({
                    url: url  + "delete",
                    data: data_ajax,
                    type: "POST",
                    dataType: "JSON",
                    success: function (res) {
                      if (res.error) toast.error(res.message, 1);

                      if (res.success) {
                        toast.success(res.message);
                        reloadDt();
                      }

                      if (res.redirect) window.location = res.redirect;
                    },
                  });
                }
              });
            }
          },
        },
      ],
      autoWidth: !1,
      dom:
        "<'row'\
          <'col-sm-12 col-md-6 text-left'f>\
            <'col-sm-12 col-md-6 text-right'B>\
          >\
          <'row'\
            <'col-sm-12'tr>\
          >\
          <'row mt-3'\
          <'col-sm-12 col-md-4'l>\
          <'col-sm-12 col-md-8'p>\
          >\
          <'row'\
          <'col-sm-12 col-md-12'i>\
          >",
    });
  };
  reload() {
    $("#" + this.id)
      .DataTable()
      .ajax.reload();
  }
  dt() {
    return this.dt;
  }
};
