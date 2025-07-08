<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="list-group">
                        <a class="list-group-item-action text-center my-1 p-2 border-white @section('dashboard') @show" href="{{route('user-panel.dashboard')}}">
                            <div class="d-flex justify-content-between align-items-center px-2">
                                <p class="m-0">پروفایل</p>
                                <i class="fa fa-user-alt"></i>
                            </div>
                        </a>
                        <a class="list-group-item-action text-center my-1 p-2 border-white @section('courses') @show" href="{{route('user-panel.courses')}}">
                            <div class="d-flex justify-content-between align-items-center px-2">
                                <p class="m-0">دوره‌های من</p>
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                        </a>
                        <a class="list-group-item-action text-center my-1 p-2 border-white @section('payments') @show" href="{{route('user-panel.payments')}}">
                            <div class="d-flex justify-content-between align-items-center px-2">
                                <p class="m-0">پرداخت‌ها</p>
                                <i class="fas fa-credit-card"></i>
                            </div>
                        </a>
                        <a class="list-group-item-action text-center my-1 p-2 border-white @section('comment') @show" href="{{route('user-panel.comment')}}">
                            <div class="d-flex justify-content-between align-items-center px-2">
                                <p class="m-0">نظرات شما</p>
                                <i class="fa fa-comment 2x"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
