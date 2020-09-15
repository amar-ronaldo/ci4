$(document).on("click", ".form-submit", function (e) {
  e.preventDefault();

  elbtn = $(this);
  elForm = $(this).parents("form");
  let lbtn = new btnClass(elbtn);
  let lform = new formClass(elForm, lbtn);
  if (elForm.valid()) {
    lform.submit();
  }
});
$(document).on("submit", ".myform", function (e) {
  return false;
});

$(document)
  .find(".datatable")
  .each(function () {
    $.fn.dataTable.ext.errMode = "throw";
    var idDt = $(this).attr("id");
    crud[idDt] = new crudClass($(this));
    crud[idDt].init();

    $(document).on(
      "keydown change",
      "#form-filter-" + idDt + " :input",
      function () {
        crud[idDt].reload();
      }
    );
  });

$(document).on("click", ".form-crud-btn-add", function (e) {
  e.preventDefault();
  var block = $(this).parents('.block')
  hide(  block.find(".form-crud-btn-add"));
  hide(  block.find(".form-data"));
  show(  block.find(".form-crud-btn-back"));
  show(  block.find(".form-add"));
  block.find(".form-add input:visible, .form-add select").first().focus();
  re_init_select2_ajax();
});

$(document).on("click", ".form-crud-btn-back", function (e, d, f) {
  e.preventDefault();
  var block = $(this).parents('.block')
  show(block.find(".form-crud-btn-add"));
  show(block.find(".form-data"));
  hide(block.find(".form-crud-btn-back"));
  hide(block.find(".form-add"));
  block.find(".form-add form").trigger("reset");
});

function hide(el) {
  $(el).removeClass("fadeIn");
  $(el).removeClass("animated").addClass("d-none");
}

function show(el) {
  $(el).removeClass("d-none");
  $(el).addClass("animated");
  $(el).addClass("fadeIn");
}

function getFormData($form) {
  var unindexed_array = $form.serializeArray();
  var indexed_array = {};

  $.map(unindexed_array, function (n, i) {
    indexed_array[n["name"]] = n["value"];
  });

  return indexed_array;
}

$(document).on("click", ".btn-block-option", function () {
  let type = $(this).data("action");
  let blok = $(this).parents(".block");
  let id = blok.attr("id");
  let hide = blok.hasClass("block-mode-hidden");
  switch (type) {
    case "pinned_toggle":
     
      if (blok.hasClass("block-mode-pinned")) {
        One.block("content_hide", "#" + id);
      } else {
        One.block("content_show", "#" + id);
      }
      pin_reposision()
      $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
    
      break;


    case "fullscreen_toggle":
      if (blok.hasClass("block-mode-fullscreen")) {
        One.block("content_show", "#" + id);
        pin_reposision()
      } else {
        One.block("content_show", "#" + id);
      }
      $('.block-mode-fullscreen').each(function(i,e){
        e.style.right = ''
      })
      break;
    }
    dt_adjust()
});

function pin_reposision(){
  $('.block-mode-pinned').each(function(i,e){
    e.style.right = ((21 * i) + 0.75) +'rem'
  })
}
function dt_adjust(){
  $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
}

$(document).on('click',"[data-scroll-to]",function() {
  var $this = $(this),
      $toElement      = $this.attr('data-scroll-to'),
      $focusElement   = $this.attr('data-scroll-focus'),
      $offset         = -60,
      $speed          = $this.attr('data-scroll-speed') * 1 || 500;

  $('html, body').animate({
    scrollTop: $($toElement).offset().top + $offset
  }, $speed);
  
  if ($focusElement) $($focusElement).focus();
});
pin_reposision()