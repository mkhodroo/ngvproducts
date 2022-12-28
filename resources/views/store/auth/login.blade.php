<div class="modal fade bs-example-modal-sm" id="login-modal" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">ورود</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0)" class="" id="login-form">
                    @csrf
                    @include('inputs.text', [
                        'name' => 'cellphone',
                        'label' => 'نام کاربری',
                    ])
                    @include('inputs.text', [
                        'type' => 'password',
                        'name' => 'password',
                        'label' => 'رمز عبور',
                    ])
                </form>
                <button class="btn btn-success" onclick="login()">ورود</button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    function open_login_modal(){
        $('#login-modal').modal('show');
    }

    function close_login_modal(){
        $('#login-modal').modal('hide');
    }

    function login() {
        $.ajax({
            url: `{{ route('customer-login') }}`,
            data: $('#login-form').serialize(),
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'post',
            success: function(data) {
                console.log(data);
                close_login_modal();
                alert_notification('با موفقیت وارد شدید');
                location.reload();
            },
            error: function(data){
                console.log(data);
                error_notification(data.responseText);
            }
        })
    }

    function logout(){
        $.get(`{{ route('logout') }}`, function(data){
            alert_notification('با موفقیت خارج شدید');
            location.reload();
        });
    }
</script>
