@extends('layouts.dashboard.main')
@section('title')
    انبار
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
                    <th>Name</th>
                    <th>Province</th>
                    <th>City</th>
                    <th>Address</th>
                    <th>Updated at</th>
                    <th>Created at</th>
                </tr>
            </thead>
        </table>
    </div>

    @include('admin.stores.add')
@endsection

@section('script')
    <script>
        var table = $('#stores').DataTable({
            dom: 'Bfrtip',
            ajax: {
                url: '{{ route("admin-store-get-list") }}',
                dataSrc: '',
            },
            columns: [
                { data: 'id' },
                { data: 'name' },
                { data: 'city.province' },
                { data: 'city.city' },
                { data: 'address' },
                { data: 'updated_at' },
                { data: 'created_at' }
            ],
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            "displayLength": 25,
        });

        $.get('{{ route("admin-store-get-list") }}', function(d){
            console.log(d);
        });

        function open_add_modal() {
            $('#add-store-modal').modal('show');
        }

        function add_store() {
            var data = $('#add-store-form').serialize();
            $.ajax({
                url: `{{ route('add-store') }}`,
                data: data,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: 'post',
                success: function(data) {
                    console.log(data);
                    table.ajax.reload();
                    alert_notification('انبار اضافه شد');
                    $('#add-store-modal').modal('hide');
                }
            })
        }
    </script>
@endsection
