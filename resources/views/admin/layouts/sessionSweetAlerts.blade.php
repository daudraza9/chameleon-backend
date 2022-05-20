<script type="text/javascript">
    @if(session('success'))
    swal("Success!", "{{ session('success') }}", "success");
    @endif

    @if(session('error'))
    swal("Error!", "{{ session('error') }}", "error");
    @endif
</script>