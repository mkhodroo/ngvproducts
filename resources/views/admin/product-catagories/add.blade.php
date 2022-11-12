<div class="modal fade bs-example-modal-lg" id="add-modal" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">افزودن دسته بندی محصول</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0)" class="" id="add-form">
                    @csrf
                    @include('inputs.text', [
                        'name' => 'name',
                        'label' => 'نام دسته بندی',
                    ])
                </form>
                <button class="btn btn-success" onclick="add()">افزودن</button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    function add() {
            $.ajax({
                url: `{{ route('add-product-catagory') }}`,
                data: $('#add-form').serialize(),
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: 'post',
                success: function(data) {
                    console.log(data);
                    alert_notification('دسته بندی محصول اضافه شد');
                    refresh_table();
                    get_info(data.id);
                    close_add_modal();
                }
            })
        }
</script>
