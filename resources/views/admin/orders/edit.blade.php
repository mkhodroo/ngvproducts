

<div class="modal fade bs-example-modal-lg" id="edit-modal" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">جزئیات سفارش</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <ul class="nav nav-tabs">
                        <li class="active" ><a href="#product" data-toggle="tab">سفارش</a></li> |
                    </ul>
                    <div class="tab-content">
                        <div id="product" class="tab-pane active">
                            <div class="col-sm-12">
                                <form action="javascript:void(0)" class="" id="edit-form" >
                                    @csrf
                                    <div id="info" class="table-responsive">
                                        <h3>شماره سفارش: <span id="order-code"></span></h3>
                                        <hr>
                                        <div>
                                            @csrf
                                        </div>
                                        <table id="order-items" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>محصول</th>
                                                    <th>انبار</th>
                                                    <th>تولید کننده</th>
                                                    <th>تعداد</th>
                                                    <th>قیمت واحد </th>
                                                    <th>قیمت</th>
                                                </tr>
                                            </thead>
                                            <tbody id="order-items-tbody">

                                            </tbody>
                                        </table>
                                    </div>
                                </form>
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
    function get_info(order_code) {
        $.get(`{{ url("admin/orders/get") }}/${order_code}`, function (data) {
            console.log(data);
            open_edit_modal();
            var tbody = $('#order-items-tbody');
            $('#order-code').html(order_code)
            tbody.html('');
            data.forEach(function(item){
                tbody.append('<tr>');
                tbody.append(`<td>${item.product_name}</td>`);
                if(item.store_id){
                    tbody.append(`<td>${item.store.name}</td>`)
                }else{
                    tbody.append(`<td>
                        <select name="store_for_order_${item.id}">
                            @foreach ($stores as $store)
                                <option value="{{ $store->id }}">{{ $store->name }}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-danger" onclick="save_order_store(${item.id})">ثبت</button>
                        </td>`);
                }
                tbody.append(`<td>${item.producer_name}</td>`);
                tbody.append(`<td>${item.number}</td>`);
                tbody.append(`<td class="camma-value">${item.price}</td>`);
                tbody.append(`<td class="camma-value">${item.price * item.number}</td>`);
                tbody.append('</tr>');
            })
            camma_sep();
        })
    }

    function save_order_store(order_id) {
        var fd = new FormData();
        fd.append('order_id', order_id);
        fd.append('store_id', $(`select[name="store_for_order_${order_id}"]`).val());
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val()
            },
            method: 'post',
            url: `{{ route('admin-save-order-store') }}`,
            data: fd,
            processData: false,
            contentType: false,
            success: function (data) {
                console.log(data);
                alert_notification('ذخیره شد');
                get_info(data.order_code);
            }
        })
    }


    
</script>
