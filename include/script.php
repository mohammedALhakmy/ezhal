

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="lib/wow/wow.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Template Javascript -->
<script src="js/main.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    @if(Session::has('message'))
    var type = "{{Session::get('alert-type','info')}}"
    toastr.options = {
        'progressBar': true,
        'closeButton': true,
    };
    switch(type){
        case 'info':
            toastr.info("{{Session::get('message')}}",'تم بنجاح!',{timeOut:60000});
            break;
        case 'success':
            toastr.success("{{Session::get('message')}}",'تم بنجاح!',{timeOut:60000});
            break;
        case 'warning':
            toastr.warning("{{Session::get('message')}}",'عفوا !',{timeOut:60000});
            break;
        case 'error':
            toastr.error("{{Session::get('message')}}",'تم حذف البيانات بنجاح',{timeOut:60000});
            break;
    }
    @endif
</script>
