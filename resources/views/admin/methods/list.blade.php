@extends('layouts.dashboard.main')
@section('title')
    متدها
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
                    <th>Name</th>
                    <th>Position</th>
                    <th>Updated at</th>
                    <th>Created at</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($objects as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->fa_name }}</td>
                        <td>{{ $item->updated_at }}</td>
                        <td>{{ $item->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @include('admin.methods.add')
@endsection

@section('script')
    <script>
        $('#methods').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            "displayLength": 25,
        });

        function open_add_modal() {
            $('#add-method-modal').modal('show');
        }

        function add_method() {
            
            $.ajax({
                url: `{{ route('add-method') }}`,
                data: $('#add-method-form').serialize(),
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: 'post',
                success: function(data) {
                    console.log(data);
                    alert_notification('محصول اضافه شد');
                    $('#add-method-modal').modal('hide');
                }
            })
        }
    </script>
@endsection
