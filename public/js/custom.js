$('.form-delete').find(':submit').on('click', function (e) {
  e.preventDefault();
  var $form = $(this);
  $('#confirm-delete').modal({backdrop: 'static', keyboard: false})
      .on('click', '#delete-btn', function () {
        $form.submit();
      });
});

function confirmDelete(e) {
  var $form = $(e).closest('.form-delete');
  $('#confirm-delete').modal({backdrop: 'static', keyboard: false})
      .on('click', '#delete-btn', function () {
        $form.submit();
      });
  return false;
}

function warningModal(body, title) {
  $('#warning-modal').find('.modal-title').text(title != null ? title : 'Warning');
  $('#warning-modal').find('.modal-body').html(body);
  $('#warning-modal').modal({backdrop: 'static', keyboard: false});
}
