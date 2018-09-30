<!--   Core JS Files   -->
<script src="{{url('js/core/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{url('js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{url('js/core/bootstrap-material-design.min.js')}}" type="text/javascript"></script>
<script src="{{url('js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
<!--  Google Maps Plugin    -->

<!-- Chartist JS -->
<script src="{{url('js/plugins/chartist.min.js')}}"></script>
<!--  Notifications Plugin    -->
<script src="{{url('js/plugins/bootstrap-notify.js')}}"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{url('js/material-dashboard.min.js')}}" type="text/javascript"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="{{url('js/demo.js')}}"></script>

<script>
    $(document).ready(function () {
        {!! showNotification() !!}
    })
</script>