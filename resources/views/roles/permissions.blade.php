@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/all.css">
@endsection
<?php
$_permissions = [];
if ( isset( $role ) ) {
    $_permissions = json_decode( $role->permissions, true );
}
$i = 1;?>
<div class="col-md-12">
    <div class="box-header with-border"><h3>Permissions</h3>
        <div class="pull-right"><input type="text" onkeyup="filter_permissions()" id="filter"
                                       placeholder="filter by name"></div>
    </div>
    <table id="permission_table" width="100%" class="dataTable table table-bordered">
        <thead>
        <th>#</th>
        <th>Title</th>
        <th>
            <label style="margin-bottom: 0;">
                <input type="checkbox" id="index-all" name="permissions[index]"
                       class="flat-red index" {{array_key_exists('index', $_permissions) ? 'checked':''}}> View
            </label></th>
        <th>
            <label style="margin-bottom: 0;">
                <input type="checkbox" id="create-all" name="permissions[create]"
                       class="flat-red create" {{array_key_exists('create', $_permissions) ? 'checked':''}}> Create
            </label></th>
        <th>
            <label style="margin-bottom: 0;">
                <input type="checkbox" id="edit-all" name="permissions[edit]"
                       class="flat-red edit" {{array_key_exists('edit', $_permissions) ? 'checked':''}}> Edit
            </label></th>
        <th>
            <label style="margin-bottom: 0;">
                <input type="checkbox" id="delete-all" name="permissions[delete]"
                       class="flat-red delete" {{array_key_exists('delete', $_permissions) ? 'checked':''}}> Delete
            </label></th>
        <th>
            <label style="margin-bottom: 0;">
                <input type="checkbox" id="all" name="permissions[all]"
                       class="flat-red all" {{array_key_exists('all', $_permissions) ? 'checked':''}}> All
            </label>
        </th>
        </thead>
        <tbody>
        @foreach(
        [
            'activityLogs'=>'Activity Log',
            'users'=>'Users',
            'roles'=>'User Groups',
        ]
         as $k=>$role)
            <tr class="{{$i % 2 == 0 ? 'even' : 'old'}}">
                <td>{{$i}}</td>
                <td>{{$role}}</td>
                <td>
                    <label style="margin-bottom: 0;">
                        <input type="checkbox" name="permissions[{{$k}}.index]" data-key="{{$k}}"
                               data-type="index" id="index-{{$k}}"
                               class="minimal index {{$k}}" {{array_key_exists($k.'.index', $_permissions) ? 'checked':''}}>
                        View
                    </label>
                </td>
                <td>
                    <label style="margin-bottom: 0;">
                        <input type="checkbox" name="permissions[{{$k}}.create]" data-key="{{$k}}"
                               data-type="create" id="create-{{$k}}"
                               class="minimal create {{$k}}" {{array_key_exists($k.'.create', $_permissions) ? 'checked':''}}>
                        Create
                    </label>
                </td>
                <td>
                    <label style="margin-bottom: 0;">
                        <input type="checkbox" name="permissions[{{$k}}.edit]" data-key="{{$k}}" data-type="edit"
                               id="edit-{{$k}}"
                               class="minimal edit {{$k}}" {{array_key_exists($k.'.edit', $_permissions) ? 'checked':''}}>
                        Edit
                    </label>
                </td>
                <td>
                    <label style="margin-bottom: 0;">
                        <input type="checkbox" name="permissions[{{$k}}.delete]" data-key="{{$k}}"
                               data-type="delete" id="delete-{{$k}}"
                               class="minimal delete {{$k}}" {{array_key_exists($k.'.delete', $_permissions) ? 'checked':''}}>
                        Delete
                    </label>
                </td>
                <td>
                    <label style="margin-bottom: 0;">
                        <input type="checkbox" name="permissions[{{$k}}.all]" data-key="{{$k}}" data-type=""
                               id="all-{{$k}}"
                               class="minimal-red all {{$k}}" {{array_key_exists($k.'.all', $_permissions) ? 'checked':''}}>
                        All
                    </label>
                </td>
            </tr>
            <?php $i ++;?>
        @endforeach
        </tbody>
    </table>
</div>

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
    <script>
      jQuery(document).ready(function ($) {
        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        }).on('ifChanged', function (e) {
          edit_checkbox(e, this);
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        }).on('ifChanged', function (e) {
          edit_checkbox(e, this);
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        }).on('ifChanged', function (e) {
          edit_checkbox(e, this);
        });
//
//            $('#all').change(function(){
//                if($(this).is(':checked')){
//                    console.log('check-all');
//                }
//                else{
//                    console.log('un-check-all');
//                }
//            });
//            $('body').on('change','#all',function(){
//                if($(this).is(':checked')){
//                    console.log('check-all');
//                }
//                else{
//                    console.log('un-check-all');
//                }
//            });

      });

      function edit_checkbox(e, ele) {
        var id = $(ele).attr('id');
        var key = $(ele).data('key');
        var type = $(ele).data('type');
        var checked = $(ele).is(':checked');
        switch (id) {
          case 'all':
            if (checked) {
              $('input[type="checkbox"]').iCheck('check');
            }
            else {
              $('input[type="checkbox"]').iCheck('uncheck');
            }
            break;
          default:
            var cls = id.replace("-all", "");
            if (checked) {
              $('input[type="checkbox"].' + cls).iCheck('check');
            }
            else {
              $('input[type="checkbox"].' + cls).iCheck('uncheck');
            }
            if (cls == 'create'
              || cls == 'edit'
              || cls == 'delete') {
              if (checked) {
                $('input[type="checkbox"].index').iCheck('check');
              }
            }
            if ($(ele).hasClass('all')) {
              if (checked) {
                $('input[type="checkbox"].' + key).iCheck('check');
              }
              else {
                $('input[type="checkbox"].' + key).iCheck('uncheck');
              }
            }
            else if ($(ele).hasClass('create')
              || $(ele).hasClass('edit')
              || $(ele).hasClass('delete')) {
              if (checked) {
                $('input[type="checkbox"].index.' + key).iCheck('check');
              }
            }
            else if (!checked) {
              $('input[type="checkbox"].all.' + key).iCheck('uncheck');
            }
            if (!checked) {
              $('#all').prop('checked', false).iCheck('edit');
              $('input[type="checkbox"].all.' + key).prop('checked', false).iCheck('edit');
              $('#' + type + '-all').prop('checked', false).iCheck('edit');
            } else {

            }
            break;
        }
      }

      function filter_permissions() {
        // Declare variables
        var input, filter, table, tr, td, i;
        input = document.getElementById("filter");
        filter = input.value.toUpperCase();
        table = document.getElementById("permission_table");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
          td = tr[i].getElementsByTagName("td")[1];
          if (td) {
            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
              tr[i].style.display = "";
            } else {
              tr[i].style.display = "none";
            }
          }
        }
      }
    </script>
@endsection