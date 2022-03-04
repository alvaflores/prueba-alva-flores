<div class="modal fade" id="estado-{{$article->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            @if($article->activate == 1)
                <form method="POST" action="{{route('article.deactivate',$article->id)}}">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT">
                    <div class="modal-body">
                        <h4>¿Desea Desactivar Articulo?</h4>
                    </div>
                    <div class="modal-footer d-flex justify-content-center align-items-center " >
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger waves-effect waves-light ">Desactivar Articulo</button>
                    </div>
                </form>
            @else
                <form method="POST" action="{{route('article.activate',$article->id)}}">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT">
                    <div class="modal-body">
                        <h4>¿Desea Activar Articulo ?</h4>
                    </div>
                    <div class="modal-footer d-flex justify-content-center align-items-center ">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success waves-effect waves-light ">Activar Articulo</button>
                    </div>
                </form>

            @endif
        </div>
    </div>
</div>
