<!-- Jquery -->
<script src="{{theme_asset('assets/newjs/jquery.min.js')}}"></script>


<!--    Bootstrap Js-->
<!-- <script src="bootstrap/js/bootstrap.bundle.min.js"></script> -->
<script src="{{theme_asset('assets/bootstrap/js/popper.min.js')}}"></script>
<script src="{{theme_asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
<!--    Select All Js-->
<!-- <script src="js/select2.min.js"></script> -->
<!-- Owl Carousel -->
<script src="{{theme_asset('assets/newjs/owl.carousel.min.js')}}"></script>
{{--    Font Awesome Js--}}
<script src="{{theme_asset('assets/newjs/fontawesome/font.js')}}"></script>
<!-- Home Jquery -->
<script src="{{theme_asset('assets/newjs/main.js')}}"></script>
<script src="{{theme_asset('assets/newjs/custom.js')}}"></script>
<script src="{{theme_asset('assets/newjs/select-style.js')}}"></script>
<script>
    jQuery(document).ready(function($) {
        $('select').selectstyle({
            width  : 400,
            height : 300,
            theme  : 'light',
            onchange : function(val){}
        });
    });
</script>

