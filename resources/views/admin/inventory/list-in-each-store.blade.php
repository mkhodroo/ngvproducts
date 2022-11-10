@extends('layouts.dashboard.main')
@section('title')
    موجودی محصولات
@endsection

@section('content')
    <div class="m-t-40">
        <button class="btn btn-info" id="add-product" onclick="open_add_modal()">افزودن</button>
    </div>
    <div class="table-responsive m-t-40">
        <table id="stores" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0"
            width="100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Product Name</th>
                    <th>Producer Name</th>
                    <th>Store</th>
                    <th>Inventory</th>
                    <th>Description</th>
                    <th>Updated at</th>
                    <th>Created at</th>
                </tr>
            </thead>
        </table>
    </div>

    @include('admin.inventory.add', [
        'products' => $products,
        'stores' => $stores
    ])
@endsection

@section('script')
    <script>
        var table = $('#stores').DataTable({
            dom: 'Bfrtip',
            ajax: {
                url: '{{ route("admin-inventory-get-list-for-each-store") }}',
                dataSrc: '',
            },
            columns: [
                { data: 'id' },
                { data: 'product_name' },
                { data: 'producer_name' },
                { data: 'store_name' },
                { data: 'inventory' },
                { data: 'description' },
                { data: 'updated_at' },
                { data: 'created_at' }
            ],
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            "displayLength": 25,
        });

        $.get('{{ route("admin-inventory-get-list") }}', function(d){
            console.log(d);
        });

        function open_add_modal() {
            $('#add-inventory-modal').modal('show');
        }

        function add_inventory() {
            var data = $('#add-inventory-form').serialize();
            $.ajax({
                url: `{{ route('add-inventory') }}`,
                data: data,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: 'post',
                success: function(data) {
                    console.log(data);
                    alert_notification('موجودی اضافه شد');
                    refresh_table();
                    $('#add-store-modal').modal('hide');
                }
            })
        }

        function refresh_table(){
            table.ajax.reload();
        }
    </script>
@endsection
