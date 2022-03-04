{{--
<div id="estado{{$user->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">

</div>
--}}


<div class="modal fade" id="estado-{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            @if($user->activate == 1)
                <form method="POST" action="{{route('user.deactivate',$user->id)}}">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT">

                    <div class="modal-header">
                        <h4 class="modal-title text-warning">Mensaje de  Advertencia!!</h4>
                    </div>
                    <div class="modal-body">
                        <h4>¿Desea Desactivar a {{$user->area}}?</h4>
                    </div>
                    <div class="modal-footer d-flex justify-content-center align-items-center " >
                        <button type="button" class="btn btn-default waves-effect btn-sm" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancelar</button>
                        <button type="submit" class="btn btn-danger waves-effect waves-light "><i class="fas fa-ban"></i> Desactivar Usuario</button>
                    </div>
                </form>
            @else
                <form method="POST" action="{{route('user.activate',$user->id)}}">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT">
                    <div class="modal-header">
                        <h4 class="modal-title text-warning">Mensaje de  Advertencia!!</h4>
                    </div>
                    <div class="modal-body">
                        <h4>¿Desea Activar a {{$user->area}} ?</h4>
                    </div>
                    <div class="modal-footer d-flex justify-content-center align-items-center ">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-window-close"></i> Cancelar</button>
                        <button type="submit" class="btn btn-success waves-effect waves-light "><i class="fas fa-check-circle"></i> Activar Usuario</button>
                    </div>
                </form>

            @endif
        </div>
    </div>
</div>
