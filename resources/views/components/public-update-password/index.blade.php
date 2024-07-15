<div class="modal fade text-left" id="updatePassword" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                        aria-label="Close">
                    <i data-feather="x"></i>
                </button>
                <h5 class="modal-title te" id="myModalLabel1">تغییر رمز عبور</h5>
            </div>
            <form method="POST" action="{{ route('user-panel.update.password') }}"  enctype="multipart/form-data" >
                @csrf
                <div class="modal-body">

                    <div class="input-group mb-3" id="show_hide_password" >
                        <div class="input-group-append input-group-text">
                            <a href="" class="d-flex align-items-center">
                                <i class="fa fa-eye-slash " ></i>
                            </a>
                        </div>

                        <input dir="rtl" name="password" value="{{ old('password') }}" required autocomplete="new-password"
                               type="password" class="form-control" placeholder="رمز عبور جدید">
                        <div class="input-group-append input-group-text">
                            <span class="fa fa-lock "></span>
                        </div>
                    </div>


                    <div class="input-group mb-3">
                        <input name="password_confirmation" required autocomplete="password_confirmation" dir="rtl"
                               type="password" class="form-control" placeholder="تکرار رمز عبور">
                        <div class="input-group-append input-group-text">
                            <span class="fa fa-lock"></span>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">لغو</span>
                    </button>
                    <button  type="submit" class="btn btn-primary ms-1" >
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">ثبت</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
