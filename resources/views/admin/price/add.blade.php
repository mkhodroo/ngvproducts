<div class="modal fade bs-example-modal-lg" id="add-modal" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel"> افزودن قیمت</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div>
                        <form action="{{ route('admin-add-price-with-file') }}" id="product-image-form" class="dropzone" enctype="multipart/form-data">
                            @csrf
                        </form>
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
    Dropzone.options.dropzone =
    {
        maxFilesize: 1,
        renameFile: function(file) {
            var dt = new Date();
            var time = dt.getTime();
        return time+file.name;
        },
        acceptedFiles: ".xlsx",
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
            alert_notification(response);
        },
        error: function(file, response)
        {
            console.log(response);
            return false;
        }
    };

    function open_add_modal() {
        $('#add-modal').modal('show');
    }
</script>
