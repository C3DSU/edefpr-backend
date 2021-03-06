@extends('adminlte::page')

@section('title', 'Processos')

@section('css')
@endsection

@section('content_header')
    @include('helpers.flash-message')
    <h1>Processos</h1>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <div class="pull-right">
                <a class="btn btn-xs btn-primary" href="{{ route('processes.create') }}">Abrir novo processo</a>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table class="table table-bordered table-condensed">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Titulo</th>
                        <th class="text-center">Assistido</th>
                        <th class="text-center">Parte Contrária</th>
                        <th class="text-center">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($processes as $process)
                        <tr class="text-center">
                            <td>{{ $process->id }}</td>
                            <td>{{ $process->title }}</td>
                            <td>{{ $process->assisted->name }}</td>
                            <td>{{ optional($process->counterPart)->name }}</td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="{{ route('processes.show', $process->id) }}">
                                    Visualizar
                                </a>
                                <a class="btn btn-xs btn-warning" href="{{ route('processes.edit', $process->id) }}">
                                    Editar
                                </a>
                                <a class="btn btn-xs btn-danger process-destroy" data-id="{{ $process->id }}">
                                    Arquivar
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix text-center">
            {{ $processes->links() }}
        </div>
    </div>
@stop

@section('js')
    <script src="//unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('.process-destroy').on('click', function () {
            var processId = $(this).data('id');

            swal("Confirma o arquivamento do processo?", {
                buttons: {
                    cancel: "Cancelar",
                    catch: {
                        text: "Confirmar",
                        value: "confirm",
                    },
                },
            })
                .then((value) => {
                    switch (value) {
                        case "confirm":
                            $.ajax({
                                url: '{{ route('processes.destroy', '_process') }}'.replace('_process', processId),
                                method: 'DELETE',
                                success: function (xhr) {
                                    swal("Sucesso!", "Processo arquivado", "success");
                                    window.location.reload();
                                },
                                error: function (xhr) {
                                    swal("Falha!", "Processo não pôde ser arquivado", "error");
                                }
                            });
                            break;
                        default:
                            swal("Operação cancelada!");
                    }
                });
        })
    </script>
@endsection
