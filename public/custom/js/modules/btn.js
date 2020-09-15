var btnClass = class btn {
    constructor(el) {
      this.el = el;
      this.defaultTxt = el.text();
      this.loadingTxt = "Loading..";
    }
    loading = function () {
      $(this.el).text(this.loadingTxt);
      $(this.el).attr("disabled", true);
    };
    loadingCompleted() {
      $(this.el).removeAttr("disabled");
      $(this.el).text(this.defaultTxt);
    }
  };