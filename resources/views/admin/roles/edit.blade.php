

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
                    <form action="javascript:void(0)" id="edit-form">
                        @csrf
                        <div id="info"></div>
                    </form>
                </div>
                <button class="btn btn-success" onclick="edit()">ویرایش</button>
                
                
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

            $('#info').append(`@include('inputs.hidden', ['name' => 'id', 'value' => '${data.id}' ])`)
            $('#info').append(`@include('inputs.text', ['name' => 'name', 'value' => '${data.name}' ,'label' => 'نام انگلیسی نقش',])`)
            $('#info').append(`@include('inputs.text', ['name' => 'fa_name', 'value' => '${data.fa_name}' ,'label' => 'نام فارسی نقش',])`)
            
            open_edit_modal();
            
            
        })
    }

    function edit() {
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

    
</script>
