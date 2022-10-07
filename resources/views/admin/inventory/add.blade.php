<div class="modal fade bs-example-modal-lg" id="add-inventory-modal" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">افزودن موجودی</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0)" class="" id="add-inventory-form">
                    @csrf
                    @include('inputs.select2', [
                        'name' => 'product_id', 
                        'label' => 'محصول',
                        'objects' => $products
                    ])
                    @include('inputs.select2', [
                        'name' => 'store_id', 
                        'label' => 'انبار',
                        'objects' => $stores
                    ])
                    @include('inputs.text',[
                        'name' => 'number', 
                        'label' => 'تعداد'
                    ])
                </form>
                <button class="btn btn-success" onclick="add_inventory()">افزودن</button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
