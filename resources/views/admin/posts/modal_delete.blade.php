  <div class="modal fade" id="modal_post_delete-{{$post->slug}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Conferma</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <h3>Sei sicuro di voler cancellare?</h3>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>

          <form action="{{ route('admin.posts.destroy', ['post' => $post->slug]) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Cancella</button>
          </form>
        </div>
      </div>
    </div>
  </div>