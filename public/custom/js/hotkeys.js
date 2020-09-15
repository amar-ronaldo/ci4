 
  function check_urlis_dataplayer(){
    if (baseUrl !== siteUrl+'backend/dataplayer/') {
      return false;
    }
  }
  hotkeys('f1', function(event) {
    event.preventDefault();
    check_urlis_dataplayer();
    $('#block-transaction').find('.block-header .block-options .form-crud-btn-add').click()
    return false;
  });

  hotkeys('f2', function(event) {
    event.preventDefault();
    check_urlis_dataplayer();
    $('#block-member').find('.block-header .block-options .form-crud-btn-add').click()
    return false;
  });

  hotkeys('f3', function(event) {
    event.preventDefault();
    check_urlis_dataplayer();
    $('#block-site').find('.block-header .block-options .form-crud-btn-add').click()
    return false;
  });
  
  hotkeys('f4', function(event) {
    event.preventDefault();
    check_urlis_dataplayer();
    $('#block-payment').find('.block-header .block-options .form-crud-btn-add').click()
    return false;
  });
 