@extends('layouts.dashboard.main')
@section('title')
    سفارش ها 
@endsection

@section('content')
    <div class="table-responsive m-t-40">
        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0"
            width="100%">
            <thead>
                <tr>
                    <th>شماره سفارش</th>
                    <th>نحوه ارسال</th>
                    <th>نحوه پرداخت</th>
                    <th>Created at</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders_code as $item)
                    <tr ondblclick="get_info({{$item->order_code}})">
                        <td>{{ $item->order_code }}</td>
                        <td>{{ $item->how_to_send }}</td>
                        <td>{{ $item->payment_status }}</td>
                        <td>{{ $item->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @include('admin.orders.edit')
@endsection

@section('script')
    <script>
        var table = $('#example23').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            "displayLength": 25,
        });


        function open_edit_modal() {
            $('#edit-modal').modal('show');
        }
        function close_edit_modal() {
            $('#edit-modal').modal('hide');
        }
        function refresh_table(){
            table.ajax.reload();
        }
    </script>
@endsection
