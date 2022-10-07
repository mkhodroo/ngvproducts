<div class="modal fade bs-example-modal-lg" id="edit-product-modal" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">ویرایش محصول</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0)" class="" id="edit-product-form">
                    @csrf
                    @include('inputs.hidden',[
                        'name' => 'id'
                    ])
                    @include('inputs.text', [
                        'name' => 'name',
                        'label' => 'نام محصول',
                    ])
                </form>
                <button class="btn btn-success" onclick="edit_product()">ویرایش</button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    function get_info(id) {
        $.get(`{{ url("admin/products/get") }}/${id}`, function (data) {
            console.log(data);
            $("input[name='id']").val(data.id);
            $("input[name='name']").val(data.name);
            $('#edit-product-modal').modal('show');
        })
    }

    function edit_product() {
        $.ajax({
            url: `{{ route('admin-edit-product') }}`,
            data: $('#edit-product-form').serialize(),
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'post',
            success: function(data) {
                console.log(data);
                alert_notification(data);
                $('#edit-product-modal').modal('hide');
            }
        })
    }
</script>
