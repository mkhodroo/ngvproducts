

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
                        <li class="active" ><a href="#product" data-toggle="tab">محصول</a></li>
                        <li><a href="#images" data-toggle="tab">تصاویر</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="product" class="tab-pane fade in active">
                            <form action="javascript:void(0)" class="" id="edit-product-form" >
                                @csrf
                                <div id="info">
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
                
                <button class="btn btn-success" onclick="edit_product()">ویرایش</button>
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
            $('#info').html('')
            $('#info').append(`@include('inputs.hidden', ['name' => 'id', 'value' => '${data.id}' ])`)
            $('#info').append(`@include('inputs.text', ['name' => 'name', 'value' => '${data.name}' ,'label' => 'نام محصول',])`)
            $('#info').append(`@include('inputs.text', ['name' => 'price', 'value' => '${data.price}' ,'label' => 'قیمت',])`)
            $('#product_id').val(data.id);
            $('#edit-product-modal').modal('show');

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
                $('#edit-product-modal').modal('hide');
            }
        })
    }

    
</script>
