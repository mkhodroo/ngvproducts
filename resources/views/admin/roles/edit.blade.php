

<div class="modal fade bs-example-modal-lg" id="edit-modal" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">ویرایش محصول</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <ul class="nav nav-tabs">
                        <li class="active" ><a href="#role" data-toggle="tab">نقش</a></li> |
                        <li class="" ><a href="#access" data-toggle="tab">دسترسی ها</a></li> |
                    </ul>
                    <div class="tab-content">
                        <div id="role" class="tab-pane active">
                            <form action="javascript:void(0)" id="edit-form">
                                @csrf
                                <div id="info"></div>
                            </form>
                            <button class="btn btn-success" onclick="edit()">ویرایش</button>
                        </div>

                        <div id="access" class="tab-pane fade">
                            <form action="javascript:void(0)" class="" id="role-access-form" >
                                @csrf
                                <table id="list" class="table">
                                    <thead>
                                    <tr><th>دسترسی</th><th></th></tr>
                                    </thead>
                                    <tbody id="role-access-tbody">
                                    <tr class="list_var">
                                        <td>
                                            <select class="select2" name="list-method_0" id="list-method_0">
                                                @foreach ($methods as $item)
                                                    <option value="{{ $item->id }}">{{ $item->fa_name }}</option>                                                
                                                @endforeach
                                            </select>
                                        </td>
                                        <td class="del-area"><button class="list_del">Delete</button></td>
                                    </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>
                                                <input type="button" value="Add" class="list_add btn btn-warning">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <button class="btn btn-success" onclick="edit_access()">ثبت تغییرات</button>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>

    function get_info(id) {
        $.get(`{{ url("admin/roles/get") }}/${id}`, function (data) {
            console.log(data);
            $('#info').html('');
            $('#role-access-tbody').html('');

            $('#info').append(`@include('inputs.hidden', ['name' => 'id', 'value' => '${data.id}' ])`)
            $('#info').append(`@include('inputs.text', ['name' => 'name', 'value' => '${data.name}' ,'label' => 'نام انگلیسی نقش',])`)
            $('#info').append(`@include('inputs.text', ['name' => 'fa_name', 'value' => '${data.fa_name}' ,'label' => 'نام فارسی نقش',])`)
            
            $('#role-access-tbody').append(`@include('inputs.hidden', ['name' => 'role_id', 'value' => '${data.id}' ])`);
            var i = 0;
            data.access.forEach(function(item){
                $('.list_add').click();
                $('#list-method_' + i).val(item.method_id);
                i++;
           })

            open_edit_modal();
            
            
        })
    }

    function edit() {
        alert();
        $.ajax({
            url: `{{ route('admin-edit-role') }}`,
            data: $('#edit-form').serialize(),
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'post',
            success: function(data) {
                console.log(data);
                alert_notification(data);
                refresh_table();
            }
        })
    }

    function edit_access() {
        $.ajax({
            url: `{{ route('admin-edit-role-access') }}`,
            data: $('#role-access-form').serialize(),
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'post',
            success: function(data) {
                console.log(data);
                alert_notification(data);
                var role_id = $('input[name="role_id"]').val();
                get_info(role_id);
            }
        })
    }

    $('#list').addInputArea({
        area_del: '.del-area'
    });

    
</script>
