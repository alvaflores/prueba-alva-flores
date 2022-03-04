<div class="modal fade" id="confirm-{{$article->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
                <form method="POST" action="{{route('article.delete',$article->id)}}">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="DELETE">

                    <div class="modal-body">
                        <h4>¿Desea eliminar Articulo?</h4>
                    </div>
                    <div class="modal-footer d-flex justify-content-center align-items-center " >
                        <button type="button" class="btn btn-default waves-effect btn-sm" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger waves-effect waves-light ">Eliminar Registro</button>
                    </div>
                </form>
        </div>
    </div>
</div>
