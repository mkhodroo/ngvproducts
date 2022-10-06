@extends('layouts.dashboard.main')
@section('title')
    محصولات
@endsection

@section('content')
    <div class="m-t-40">
        <button class="btn btn-info" id="add-product" onclick="open_add_modal()">افزودن</button>
    </div>
    <div class="table-responsive m-t-40">
        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0"
            width="100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Updated At</th>
                    <th>Created At</th>
                </tr>
            </thead>
        </table>
    </div>

    @include('admin.products.add')
@endsection

@section('script')
    <script>
        $('#example23').DataTable({
            dom: 'Bfrtip',
            ajax: {
                url: '{{ route("admin-products-get-list") }}',
                dataSrc: 'data',
            },
            columns: [
                { data: 'id' },
                { data: 'name' },
                { data: 'updated_at' },
                { data: 'created_at' }
            ],
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            "displayLength": 25,
        });

        function open_add_modal() {
            $('#add-product-modal').modal('show');
        }

        function add_product() {
            
            $.ajax({
                url: `{{ route('add-product') }}`,
                data: $('#add-product-form').serialize(),
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: 'post',
                success: function(data) {
                    console.log(data);
                    alert_notification('محصول اضافه شد');
                    $('#add-product-modal').modal('hide');
                }
            })
        }
    </script>
@endsection
