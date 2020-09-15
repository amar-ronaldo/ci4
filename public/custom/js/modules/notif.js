var notifClass = class notif {
    constructor() {
      this.toast = Swal.mixin({
        buttonsStyling: false,
        customClass: {
          confirmButton: "btn btn-success m-1",
          cancelButton: "btn btn-danger m-1",
          input: "form-control",
        },
      });
    }
    success(message, isNotif = 0) {
      if (isNotif == 1) this.toast.fire("Success", message, "success");
      else
        One.helpers("notify", {
          type: "success",
          icon: "fa fa-check mr-1",
          message: message,
        });
    }
    error(message, isNotif = 0) {
      if (typeof message == "object") {
        var temp_message = "";
        Object.entries(message).forEach(([key, value]) => {
          temp_message += `${value} <br>`;
        });
        message = temp_message;
      }
  
      if (isNotif == 1) this.toast.fire("Error", message, "error");
      else
        One.helpers("notify", {
          type: "danger",
          icon: "fa fa-times mr-1",
          message: message,
        });
    }
    info(message, isNotif = 1) {
      if (isNotif == 1) this.toast.fire("Info", message, "info");
      else
        One.helpers("notify", {
          type: "info",
          icon: "fa fa-info-circle mr-1",
          message: message,
        });
    }
    warning(message, isNotif = 1) {
      if (isNotif == 1) this.toast.fire("Info", message, "warning");
      else
        One.helpers("notify", {
          type: "warning",
          icon: "fa fa-exclamation mr-1",
          message: message,
        });
    }
    question(title){
        return this.toast
        .fire({
          title: title,
          text: '',
          icon: "warning",
          showCancelButton: true,
          customClass: {
            confirmButton: "btn btn-danger m-1",
            cancelButton: "btn btn-secondary m-1",
          },
          confirmButtonText: "Iya",
          html: false,
          preConfirm: (e) => {
            return new Promise((resolve) => {
              setTimeout(() => {
                resolve();
              }, 50);
            });
          },
        })
     
    }
  };