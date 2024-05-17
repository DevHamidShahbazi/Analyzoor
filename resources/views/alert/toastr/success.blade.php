@if(session('success'))
@section('script')
    <script type="text/javascript">
        toastr.success("{{ session('success') }}", 'انجام شد')
    </script>
    @php session()->forget('success') @endphp
@endsection

@endif
