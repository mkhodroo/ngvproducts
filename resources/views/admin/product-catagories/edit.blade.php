

<div class="modal fade bs-example-modal-lg" id="edit-modal" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">ویرایش دسته بندی</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <ul class="nav nav-tabs">
                        <li class="active" ><a href="#catagory" data-toggle="tab">دسته بندی</a></li> |
                    </ul>
                    <div class="tab-content">
                        <div id="catagory" class="tab-pane active">
                            <div class="col-sm-12">
                                <form action="javascript:void(0)" class="" id="edit-form" >
                                    @csrf
                                    <div id="info">
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm-12">
                                <button class="btn btn-success" onclick="edit()">ثبت تغییرات</button>
                            </div>
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
        $.get(`{{ url("admin/product-catagories/get") }}/${id}`, function (data) {
            console.log(data);
            $('#info').html('');

            $('#info').append(`@include('inputs.hidden', ['name' => 'id', 'value' => '${data.id}' ])`)
            $('#info').append(`@include('inputs.text', ['name' => 'name', 'value' => '${data.name}' ,'label' => 'نام محصول',])`)
            $('#edit-modal').modal('show');
            
        })
    }

    function edit() {
        $.ajax({
            url: `{{ route('admin-edit-catagory') }}`,
            data: $('#edit-form').serialize(),
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'post',
            success: function(data) {
                console.log(data);
                alert_notification(data);
                get_info(data.id)
                refresh_table();
            }
        })
    }

    
</script>
