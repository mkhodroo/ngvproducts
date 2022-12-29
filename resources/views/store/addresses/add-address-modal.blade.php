<div class="modal fade bs-example-modal-sm" id="add-address-modal" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">افزودن آدرس</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0)" class="" id="add-address-form">
                    @csrf
                    <select name="city" id="city" class="select2" id="select2insidemodal" style="width: 100%; z-index:1075">
                        @foreach ($cities as $item)
                            <option value="{{ $item->id }}">استان: {{ $item->province }} - شهرستان: {{ $item->city }}</option>
                        @endforeach
                    </select>
                    آدرس کامل: 
                    <textarea name="address" id="address" class="form-control col-sm-12" placeholder="جزئیات آدرس.." rows="10"></textarea>
                </form>
                <button class="btn btn-success" onclick="add_address()">افزودن</button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    function open_add_address_modal(){
        $('#add-address-modal').modal('show');
    }

    function close_add_address_modal(){
        $('#add-address-modal').modal('hide');
    }

    function add_address() {
        $.ajax({
            url: `{{ route('add-address') }}`,
            data: $('#add-address-form').serialize(),
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'post',
            success: function(data) {
                console.log(data);
                close_add_address_modal();
                alert_notification('آدرس جدید با موفقیت اضافه شد.');
                location.reload();
            },
            error: function(data){
                console.log(data);
                error_notification(data.responseText);
            }
        })
    }

    $(document).ready(function() {
        $("#select2insidemodal").select2({
            dropdownParent: $("#add-address-modal")
        });
    });

</script>
