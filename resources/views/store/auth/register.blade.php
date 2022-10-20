<div class="modal fade bs-example-modal-sm" id="register-modal" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">ثبت نام</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0)" class="" id="register-form">
                    @csrf
                    @include('inputs.text', [
                        'name' => 'name',
                        'label' => 'نام و نام خانوادگی',
                    ])
                    @include('inputs.text', [
                        'name' => 'cellphone',
                        'label' => 'شماره همراه',
                    ])
                    @include('inputs.text', [
                        'name' => 'password',
                        'label' => 'رمز عبور',
                    ])
                </form>
                <button class="btn btn-success" onclick="register()">ورود</button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    function open_register_modal(){
        $('#register-modal').modal('show');
    }

    function close_register_modal(){
        $('#register-modal').modal('hide');
    }

    function register() {
        $.ajax({
            url: `{{ route('customer-register') }}`,
            data: $('#register-form').serialize(),
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'post',
            success: function(data) {
                console.log(data);
                close_login_modal();
                alert_notification('ثبت نام انجام شد');
                location.reload();
            }
        })
    }
</script>
