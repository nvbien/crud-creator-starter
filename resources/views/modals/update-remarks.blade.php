<div class="modal" id="update-remarks" data-id="0">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Remarks <span class="remarks-type">Invoice</span> <b>INVOICE_CODE</b></h4>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <div class="col-sm-12">
                        {!! Form::textarea('remark',null, ['class' => 'form-control', 'id' => 'remark']) !!}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" id="save-rm-btn">Save</button>
                <button type="button" class="btn btn-sm btn-default" id="close-rm-btn">Close</button>
            </div>
        </div>
    </div>
</div>