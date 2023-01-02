@extends('layouts.dashboard.main')
@section('title')
    قیمت ها
@endsection

@section('content')
    <div class="m-t-40">
        <button class="btn btn-info" id="add-product" onclick="open_add_modal()">افزودن</button>
    </div>
    <div class="table-responsive m-t-40">
        <table id="prices" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0"
            width="100%">
            <thead>
                <tr>
                    <th>شناسه محصول</th>
                    <th>محصول</th>
                    <th>شناسه تولیدکننده-فروشنده</th>
                    <th>تولیدکننده-فروشنده</th>
                    <th>قیمت</th>
                    <th>قیمت مرکز خدمات</th>
                    <th>حداقل تعداد مرکز خدمات</th>
                    <th>قیمت عمده</th>
                    <th>حداقل تعداد عمده</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    @include('admin.price.add')
@endsection

@section('script')
    <script>
        $('#prices').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            ajax: {
                url: '{{ route("admin-get-prices-data") }}',
                dataSrc: 'data',
            },
            columns: [
                { data: 'product.id' },
                { data: 'product.name' },
                { data: 'id' },
                { data: 'producer_seller' },
                { data: 'price',
                    render: function(data){
                        if(data){
                            return `${data.price}`;
                        }else{
                            return '';
                        }
                    }
                },
                { data: 'price',
                    render: function(data){
                        if(data){
                            return `${data.agency_price}`;
                        }else{
                            return '';
                        }
                    }
                },
                { data: 'price',
                    render: function(data){
                        if(data){
                            return `${data.min_agency_number}`;
                        }else{
                            return '';
                        }
                    }
                },
                { data: 'price',
                    render: function(data){
                        if(data){
                            return `${data.wholesaler_price}`;
                        }else{
                            return '';
                        }
                    }
                },
                { data: 'price',
                    render: function(data){
                        if(data){
                            return `${data.min_wholesaler_number}`;
                        }else{
                            return '';
                        }
                    }
                },
                
            ],
            "displayLength": 25,
        });
    </script>
@endsection
