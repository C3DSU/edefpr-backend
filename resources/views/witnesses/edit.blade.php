@extends('adminlte::page')

@section('title', 'Editar Testemunha')

@section('css')
@endsection

@section('content_header')
    @include('helpers.flash-message')
    <h1>Editar testemunha</h1>
@stop

@section('content')
    @include('witnesses._form', [
        'form' => $form
    ])
@stop

@section('js')
    <script>
        $('#postcode').change(function () {
            $.ajax({
                url: '{{ route('postcode.search', '_postcode') }}'.replace('_postcode', $('#postcode').val()),
                success: function (xhr) {
                    console.log(xhr);
                    $('#uf').val(xhr.data.uf);
                    $('#city').val(xhr.data.city);
                    $('#neighborhood').val(xhr.data.neighborhood);
                    $('#street').val(xhr.data.street);
                    $('#number').focus();
                }
            });
        })
    </script>
@endsection
