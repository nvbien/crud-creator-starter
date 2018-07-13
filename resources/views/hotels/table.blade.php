@section('css')
    @include('layouts.datatables_css')
@endsection

{!! $dataTable->table(['width' => '100%']) !!}

@section('scripts')
    @include('layouts.datatables_js')
    {!! $dataTable->scripts() !!}
    @if(isset($hotel))
    <script>
        function change_check_value(ele,id){
            var checked = $(ele).is(':checked');
            var dat = {'user_id': id, 'status' : checked};
            console.log(dat);
            $.ajax({
                url : '{{route('hotel.setAdmin', $hotel->id)}}',
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: dat,
                success: function (result) {
                    return true;
                },
                error: function () {
                    alert('Upload error, please try again');
                }
            });
        }
    </script>
    @endif
@endsection
