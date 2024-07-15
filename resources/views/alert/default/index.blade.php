@if(session('success') || session('error'))
    <br>
    <div class="d-flex justify-content-center">
        <div class="col-6" dir="rtl">
            <div class="alert alert-{{session('success') ? 'success' : 'danger'}} alert-dismissible fade show" role="alert">
                {{ session('success') ?? session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
    <br>
    @php session()->forget('error') @endphp
    @php session()->forget('success') @endphp
@endif
