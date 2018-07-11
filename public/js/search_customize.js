$(function () {
  var label = $('#dataTableBuilder_filter label');
  $(label).addClass('has-feedback-right');
  $(label).addClass('form-group');
  $(label).append('<i class="form-control-feedback fa fa-search"></i>');
  $("#dataTableBuilder_filter label input").attr('placeholder', 'Search...');
});