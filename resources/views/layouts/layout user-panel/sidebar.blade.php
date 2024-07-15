<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="list-group">
                        <a class="list-group-item-action text-center my-1 p-2 text-white border-white @section('dashboard') @show" href="{{route('user-panel.dashboard')}}">
                            <div class="d-flex justify-content-between align-items-center px-2">
                                <p class="m-0">پروفایل</p>
                                <i class="fa fa-user-alt"></i>
                            </div>
                        </a>
                        <a class="list-group-item-action text-center my-1 p-2 text-white border-white @section('comment') @show" href="{{route('user-panel.comment')}}">
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
