@if(Session::has('message'))
<script>
    toastr.options = {
        "progressBar": true,
        "closeButton" : true,

    }
    toastr.success("{{ Session::get('message') }}",'Success!',{timeOut:12000});
</script>
@endif



