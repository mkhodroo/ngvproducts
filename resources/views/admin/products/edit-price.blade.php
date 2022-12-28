<div class="modal fade bs-example-modal-lg" id="price-modal" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none; z-index: 1062 !important;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="background: rgb(195, 219, 225)">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">لیست قیمت برای </h4>
            </div>
            <div class="modal-body table-responsive">
                <form action="javascript:void(0)" class="" id="price-form">
                    @csrf
                    <table class="table table-stripped">
                        <tr>
                            <th>قیمت خرده فروشی</th>
                            <th>قیمت برای مرکز خدمات</th>
                            <th>حداقل تعداد خرید برای مرکز خدمات</th>
                            <th>قیمت عمده فروشی</th>
                            <th>حداقل تعداد برای عمده فروش</th>
                        </tr>
                        <tbody id="prices"></tbody>
                        <form action="javascript:void(0)" id="price-form">
                            <tfoot>
                                <tr>
                                    <td>
                                        <input type="hidden" name="product_producer_id" id="product_producer_id">
                                        <input type="text" name="price" id="">
                                    </td>
                                    <td><input type="text" name="agency_price" id=""></td>
                                    <td><input type="text" name="min_agency_number" id=""></td>
                                    <td><input type="text" name="wholesaler_price" id=""></td>
                                    <td><input type="text" name="min_wholesaler_number" id=""></td>
                                </tr>
                            </tfoot>
                        </form>
                    </table>
                </form>
                <button class="btn btn-success" id="add-price">افزودن</button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect text-left" onclick="close_price_modal()">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    function add_price() {
            $.ajax({
                url: `{{ route('admin-add-producer-price') }}`,
                data: $('#price-form').serialize(),
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: 'post',
                success: function(data) {
                    console.log(data);
                    alert_notification('قیمت اضافه شد');
                    open_price_modal(data.product_producer_id);
                }
            })
        }

    
    function open_price_modal(producer_id){
        var url = "{{ route('admin-get-producer-price', [ 'producer_id' => 'producer_id' ]) }}";
        url = url.replace('producer_id', producer_id);
        $.get(url, function(data){
            var prices = $("#prices");
            prices.html("");
            data.forEach(function(item){
                console.log(item);
                prices.append(`<tr>`)
                prices.append(`<td>${item.price}</td>`)
                prices.append(`<td>${item.agency_price}</td>`)
                prices.append(`<td>${item.min_agency_number}</td>`)
                prices.append(`<td>${item.wholesaler_price}</td>`)
                prices.append(`<td>${item.min_wholesaler_number}</td>`)
                prices.append(`</tr>`)
            })
        })
        $("#price-form #product_producer_id").val(producer_id);
        $('#add-price').attr('onclick', `add_price(${producer_id})`);
        $("#price-modal").modal("show");
    }

    function close_price_modal(){
        $("#price-modal").modal("hide");
    }

</script>
