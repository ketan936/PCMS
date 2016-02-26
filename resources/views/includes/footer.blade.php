        <script>window.BASE_PATH = "<?php echo url() ;?>"; </script>
        <script>window.X_ACCESS_TOKEN = "<?php echo csrf_token(); ?>"</script>
        <script src="{{ asset('/plugins/jQuery/jQuery-2.1.3.min.js') }}"></script>
        <script src="{{ asset('/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/plugins/daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/plugins/timepicker/bootstrap-timepicker.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/js/modules/restaurant/Restaurant.js') }}"></script>
        <script src="{{ asset('/js/modules/restaurant/RestaurantMenuItem.js') }}"></script>
        <script src="{{ asset('/js/modules/restaurant/RestaurantMenuCategory.js') }}"></script>
        <script src="{{ asset('/js/modules/popup/Popup.js') }}"></script>       
    </body>
</html>