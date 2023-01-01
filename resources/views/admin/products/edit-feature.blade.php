<div class="modal fade bs-example-modal-lg" id="feature-modal" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none; z-index: 1062 !important;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="background: rgb(195, 219, 225)">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">لیست ویژگی ها برای </h4>
            </div>
            <div class="modal-body table-responsive">
                <form action="javascript:void(0)" class="" id="feature-form">
                    @csrf
                    <table class="table table-striped">
                        <tr>
                            <th>ویژگی</th>
                            <th>توضیحات</th>
                        </tr>
                        <tbody id="features"></tbody>
                        <form action="javascript:void(0)" id="feature-form">
                            <tfoot>
                                <tr>
                                    <td>
                                        <input type="hidden" name="producer_id" id="product_producer_id">
                                        <input type="text" name="key" id="">
                                    </td>
                                    <td><input type="text" name="value" id=""></td>
                                </tr>
                            </tfoot>
                        </form>
                    </table>
                </form>
                <button class="btn btn-success" id="add-feature">افزودن</button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect text-left" onclick="close_feature_modal()">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    function add_feature() {
            $.ajax({
                url: `{{ route('admin-add-producer-feature') }}`,
                data: $('#feature-form').serialize(),
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: 'post',
                success: function(data) {
                    console.log(data);
                    alert_notification('ویژگی اضافه شد');
                    open_feature_modal(data.producer_id);
                }
            })
        }

    
    function open_feature_modal(producer_id){
        var url = "{{ route('admin-get-producer-feature', [ 'producer_id' => 'producer_id' ]) }}";
        url = url.replace('producer_id', producer_id);
        $.get(url, function(data){
            var prices = $("#features");
            prices.html("");
            data.forEach(function(item){
                console.log(item);
                prices.append(`<tr>`)
                prices.append(`<td>${item.key}</td>`)
                prices.append(`<td>${item.value}</td>`)
                prices.append(`</tr>`)
            })
        })
        $("#feature-form #product_producer_id").val(producer_id);
        $('#add-feature').attr('onclick', `add_feature(${producer_id})`);
        $("#feature-modal").modal("show");
    }

    function close_feature_modal(){
        $("#feature-modal").modal("hide");
    }

</script>
