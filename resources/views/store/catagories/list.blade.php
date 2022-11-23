@extends('layouts.app')

@section('content')
    <section class="page-section">
        <div class="col-sm-12">
            <div class="row col-sm-12">
                @foreach ($products as $item)
                    @include('store.products.single',[
                        'product' => $item
                    ])
                @endforeach
            </div>
        </div>
    </section>

    <script>
        $('.sale a').html('{{ $catagory }}')
        $('.sale a').attr('href','{{ route("show-catagory-by-name", [ 'name' => $catagory ]) }}')
    </script>
@endsection