

<div class="modal fade bs-example-modal-lg" id="edit-product-modal" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">ویرایش محصول</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <ul class="nav nav-tabs">
                        <li class="active" ><a href="#product" data-toggle="tab">محصول</a></li> |
                        <li class="" ><a href="#producer" data-toggle="tab">تولیدکنندگان</a></li> |
                        <li><a href="#images" data-toggle="tab">تصاویر</a></li> |
                    </ul>
                    <div class="tab-content">
                        <div id="product" class="tab-pane active">
                            <div class="col-sm-12">
                                <form action="javascript:void(0)" class="" id="edit-product-form" >
                                    @csrf
                                    <div id="info">
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm-12">
                                <button class="btn btn-success" onclick="edit_product()">ثبت تغییرات</button>
                            </div>
                        </div>
                        <div id="producer" class="tab-pane fade">
                            <form action="javascript:void(0)" class="" id="producer-info-form" >
                                @csrf
                                <div id="producer-info">
                                    <table id="list" class="table">
                                        <thead>
                                          <tr><th>تولید کننده</th><th>قیمت محصول</th><th></th></tr>
                                        </thead>
                                        <tbody id="producer-info-tbody">
                                          <tr class="list_var">
                                            <td>
                                                <input type="hidden" name="list-id_0" id="list-id_0">
                                                <input type="text" name="list-name_0" id="list-name_0">
                                            </td>
                                            <td><input type="text" name="list-price_0" id="list-price_0"></td>
                                            <td class="del-area"><button class="list_del">Delete</button></td>
                                          </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td>
                                                    <input type="button" value="Add" class="list_add btn btn-warning">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <button class="btn btn-success" onclick="edit_product_producer_info()">ثبت تغییرات</button>
                                                </td>
                                            </tr>
                                        </tfoot>
                                      </table>
                                </div>
                            </form>
                        </div>
                        <div id="images" class="tab-pane fade">
                            <form action="{{ route('add-product-image') }}" id="product-image-form" class="dropzone" enctype="multipart/form-data">
                                @csrf
                                @include('inputs.hidden',[
                                    'name' => 'id',
                                    'id' => 'product_id'
                                ])
                            </form>
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
    function get_info(id) {
        $.get(`{{ url("admin/products/get") }}/${id}`, function (data) {
            console.log(data);
            $('#info').html('');
            $('#producer-info-tbody').html('');

            $('#info').append(`@include('inputs.hidden', ['name' => 'id', 'value' => '${data.id}' ])`)
            $('#info').append(`@include('inputs.text', ['name' => 'name', 'value' => '${data.name}' ,'label' => 'نام محصول',])<hr>`)
            $('#info').append(`
                دسته بندی محصول: 
                <select name="product_catagory_id" class="select2 form-control">
                    <option value="">انتخاب کنید</option>
                    @foreach($catagories as $c)
                        <option value="{{ $c->id }}" >{{ $c->name }}</option>
                    @endforeach
                </select>
                <hr>
            `);
            if(data.catagory){
                $(`select[name="product_catagory_id"]`).val(data.catagory.id);
            }    
            $('#product_id').val(data.id);
            $('#edit-product-modal').modal('show');
            
            $('#producer-info-tbody').append(`@include('inputs.hidden', ['name' => 'product_id', 'value' => '${data.id}' ])`);
            var i = 0;
            data.producers.forEach(function(item){
                $('.list_add').click();
                $('#list-id_' + i).val(item.id);
                $('#list-name_' + i).val(item.name);
                $('#list-price_' + i).val(item.price.price);
                i++;
           })
            Dropzone.options.dropzone =
            {
                init: function(){
                    thisDropzone = this;
                    var mockFile = { name: 'asd', size: 5 };
                    thisDropzone.options.addedfile.call(thisDropzone, mockFile);
                    thisDropzone.options.thumbnail.call(thisDropzone, mockFile, "/public/products/images/bB7XTvLnSO.png");
                },
                maxFilesize: 12,
                renameFile: function(file) {
                    var dt = new Date();
                    var time = dt.getTime();
                return time+file.name;
                },
                acceptedFiles: ".jpeg,.jpg,.png,.gif",
                addRemoveLinks: true,
                timeout: 5000,
                removedfile: function(file) 
                {
                    var name = file.upload.filename;
                    $.ajax({
                        headers: {
                                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                                },
                        type: 'POST',
                        url: '{{ route('remove-product-image') }}',
                        data: {filename: name},
                        success: function (data){
                            console.log("File has been successfully removed!!");
                        },
                        error: function(e) {
                            console.log(e);
                        }});
                        var fileRef;
                        return (fileRef = file.previewElement) != null ? 
                        fileRef.parentNode.removeChild(file.previewElement) : void 0;
                },
                success: function(file, response) 
                {
                    console.log(response);
                },
                error: function(file, response)
                {
                    console.log(response);
                return false;
                }
            };
        })
    }

    function edit_product() {
        $.ajax({
            url: `{{ route('admin-edit-product') }}`,
            data: $('#edit-product-form').serialize(),
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'post',
            success: function(data) {
                console.log(data);
                alert_notification(data);
                refresh_table();
            }
        })
    }

    function edit_product_producer_info() {
        $.ajax({
            url: `{{ route('admin-edit-product-producer') }}`,
            data: $('#producer-info-form').serialize(),
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'post',
            success: function(data) {
                console.log(data);
                alert_notification(data);
                var product_id = $('input[name="product_id"]').val();
                get_info(product_id);
            }
        })
    }

    $('#list').addInputArea({
        area_del: '.del-area'
    });

    
</script>
