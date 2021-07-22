jQuery(document).ready(function ($) {
  $('input#_virtual').click(function () {
    const _wphostbill_service_tab = $('.wphostbill_service_tab');
    const _general_tab = $('.general_tab');
    const checked = $('input#_virtual:checked').length;
    if (checked > 0) {
      return
    }
    if (_wphostbill_service_tab.hasClass('active')){
      _general_tab.addClass('active');
      $('#general_product_data').show();
    }

  });
})