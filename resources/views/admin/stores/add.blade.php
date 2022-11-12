<div class="modal fade bs-example-modal-lg" id="add-store-modal" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">افزودن انبار</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0)" class="" id="add-store-form">
                    @csrf
                    @include('inputs.text', [
                        'name' => 'name',
                        'label' => 'نام انبار'
                    ])
                    <hr>
                    استان و شهر
                    <select name="city_id" id="" class="col-sm-6 form-control select2">
                        @foreach ($cities as $item)
                            <option value="{{ $item->id }}">{{ $item->province }} - {{ $item->province }}</option>
                        @endforeach
                    </select>

                    <hr>
                    آدرس: 
                    <input type="text" name="address" id="" class="form-control">
                </form>
                <button class="btn btn-success" onclick="add_store()">افزودن</button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
