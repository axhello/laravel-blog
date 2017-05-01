@if ( Session::has('success') )
    <script>
        $.notify({
            icon: 'pe-7s-bell',
            message: '{{ Session::get('success') }}'
        },{
            type: "success",
            placement: {
                from: 'top',
                align: 'center'
            }
        });
    </script>
@endif
@if ( Session::has('error') )
    <script>
        $.notify({
            icon: 'pe-7s-bell',
            message: '{{ Session::get('error') }}'
        },{
            type: "danger",
            placement: {
                from: 'top',
                align: 'center'
            }
        });
    </script>
@endif
@if ( Session::has('info') )
    <script>
        $.notify({
            icon: 'pe-7s-bell',
            message: '{{ Session::get('info') }}'
        },{
            type: "info",
            placement: {
                from: 'top',
                align: 'center'
            }
        });
    </script>
@endif