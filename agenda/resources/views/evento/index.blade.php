@extends('layouts.app')
@section('content')

<div class="container">
    
    <div id="agenda">  
        
    </div>

</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#evento">
  
</button>

<!-- Modal -->
<div class="modal fade" id="evento" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Agenda de Citas Veterinarias</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                
                <form action="">

                    {!! csrf_field() !!}

                    <div class="form-group">
                      <input type="hidden" class="form-control" name="id" id="id" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="form-group">
                      <label for="doc">Documento de Identidad</label>
                      <input type="text" class="form-control" name="doc" id="doc" aria-describedby="helpId" placeholder="Ingrese el Documento de identidad">
                      <small id="helpId" class="form-text text-muted"></small>
                    </div>

                    <div class="form-group">
                      <label for="title">Nombres y Apellidos</label>
                      <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="">
                      <small id="helpId" class="form-text text-muted"></small>
                    </div>

                    <div class="form-group">
                      <label for="descripcion">Nombre de la Mascota</label>
                      <input type="text" class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="">
                      <small id="helpId" class="form-text text-muted"></small>
                    </div>

                    <div class="form-group col-md-4">
                      <label for="hora">Hora</label>
                      <input maxlength="5" type="text" class="form-control" name="hora" id="hora" aria-describedby="helpId" placeholder="00:00">
                      <small id="helpId" class="form-text text-muted"></small>
                    </div>
                      
                    <div class="form-group col-md-4">
                      <label for="start">start</label>
                      <input type="date" class="form-control" name="start" id="start" aria-describedby="helpId" placeholder="">
                      <small id="helpId" class="form-text text-muted"></small>
                    </div>
                    
                    <div class="d-none">
                      <label for="end">end</label>
                      <input type="date" class="form-control" name="end" id="end" aria-describedby="helpId" placeholder="">
                      <small id="helpId" class="form-text text-muted"></small>
                    </div>

                </form>

            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-success" id="btnguardar">Guardar</button>
            <button type="button" class="btn btn-danger" id="btneliminar">Cancelar Cita</button>
            </div>
        </div>
    </div>
</div>
    
@endsection