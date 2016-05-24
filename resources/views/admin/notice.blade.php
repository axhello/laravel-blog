@if ( Session::has('success') )
    <script>
        window.onload = function () {
            toastr.success("{{ Session::get('success') }}", "成功提醒!", opts);
        };
    </script>
@endif
@if ( Session::has('errors') )
    <script>
        window.onload = function () {
            toastr.success("{{ Session::get('errors') }}", "失败提示!", opts);
        };
    </script>
@endif
@if ( Session::has('info') )
    <script>
        window.onload = function () {
            toastr.info('{{ Session::get('info') }}');
        };
    </script>
@endif