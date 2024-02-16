@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">Adminstracion de editoriales<div>
                <div class="card-header">
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#crearEditorial"> Agregar</button>
                        <button type="button" class="btn btn-warning m-2" onclick="editar()" data-bs-toggle="modal" data-bs-target="#editarEditorial">Devolucion de prestamo</button>
                       
                       <!-- <button type="button" class="btn btn-danger  m-2" onclick="eliminar()" data-bs-toggle="modal" data-bs-target="#eliminarEditorial">Anular/Activar</button> -->

                    </div>
                </div>
                <div class="card-body">
                    {{ $dataTable->table() }}
                </div>
            </div>
        </div>

        <!-- Modal -->
<div class="modal fade" id="crearEditorial" tabindex="-1" aria-labelledby="crearEditorialLabel" aria-hidden="true">
      @include('prestamo.create')
</div>

<div class="modal fade" id="editarEditorial" tabindex="-1" aria-labelledby="editarEditorialLabel" aria-hidden="true">
    @include('prestamo.devolucion')
</div>

<div class="modal fade" id="eliminarEditorial" tabindex="-1" aria-labelledby="eliminarEditorialLabel" aria-hidden="true">
    @include('usuario.eliminar')
</div>

@endsection
@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush

<script>
    function editar() {
       let data = obtenerFilaSeleccionada();

       let form = document.forms['form-prestamo-devolucion'];
       form.action = '/prestamo/devolucion/' + data.id;
       
    }

    function eliminar() {
        let data = obtenerFilaSeleccionada();
        let form = document.forms['form-usuario-eliminar'];
       form.action = '/author/' + data.id;
       
    }


    function obtenerFilaSeleccionada() {
        let items = document.getElementsByClassName('selected');
    
        if (items.length == 0) {
            alert('Debes seleccionar una fila');
            return false;
        }
           
        let data = {
            id: items[0].cells[0].innerText,
        }

        return data;
    }
</script>