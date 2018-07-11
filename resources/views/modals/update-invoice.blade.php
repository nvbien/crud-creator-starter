<div class="modal" id="update-invoice" data-id="0">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Update Invoice <b>INVOICE_CODE</b></h4>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <div class="col-sm-3 col-title">
                        {!! Form::label('type', 'Type:') !!}
                    </div>
                    <div class="col-sm-9">
                        {!! Form::select('type', ['plus' => 'Plus','minus' => 'Minus'],null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-3 col-title">
                        {!! Form::label('amount', 'Amount:') !!}
                        <span class="required">*</span>
                    </div>
                    <div class="col-sm-9">
                        {!! Form::text('amount',null, ['class' => 'form-control decimal']) !!}
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-3 col-title">
                        {!! Form::label('reason', 'Reason:') !!}
                        <span class="required">*</span>
                    </div>
                    <div class="col-sm-9">
                        {!! Form::textarea('reason',null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" id="save-inv-btn">Save</button>
                <button type="button" class="btn btn-sm btn-default" id="close-inv-btn">Close</button>
            </div>
        </div>
    </div>
</div>