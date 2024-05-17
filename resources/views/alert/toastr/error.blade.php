@if(session('error'))
    @section('script')
        <script type="text/javascript">
            toastr.error("{{ session('error') }}", 'خطا!')
        </script>
        @php session()->forget('error') @endphp
    @endsection
@endif
