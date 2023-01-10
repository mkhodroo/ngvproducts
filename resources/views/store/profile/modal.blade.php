<div class="modal fade bs-example-modal-sm" id="profile-modal" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">پروفایل</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                
                <p><a href="">پروفایل</a></p>
                <p><a href="{{ route('my-orders') }}">سفارشات من</a></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    function open_profile_modal(){
        $('#profile-modal').modal('show');
    }

    function close_login_modal(){
        $('#profile-modal').modal('hide');
    }

</script>
