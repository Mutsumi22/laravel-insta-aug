<div class="modal fade" id="hide-post-{{ $post->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content border-danger">
            <div class="modal-header border-danger">
                <h5 class="modal-title text-danger" id="modalTitleId">
                      <i class="fa-solid fa-user-slash"></i>  Hide Post 
                </h5>
            </div>
            <div class="modal-body"> 
                <div class="container-fluid">
                    <p class="fw-bold d-inline">Are you sure you want to hide this post? # 
                        {{ $post->id }}</span>
                          <img src="{{ $post->image }}" alt="Post ID {{ $post->id }}"  class="img-thumbnail">
                    </p>
                    <p>{{$post->description}}</p>
                </div>
            </div>
            <div class="modal-footer">
                <form action="{{route('admin.posts.hide',$post->id)}}" method="post">
                    @csrf
                    @method('DELETE')

                    <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-danger btn-sm">Hide</button>
                </form>

            </div>
        </div>
    </div>
</div>


{{-- activate --}}

<div class="modal fade" id="visible-post-{{ $post->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content border-success">
            <div class="modal-header border-success">
                <h5 class="modal-title text-success" id="modalTitleId">
                    Visible Post <i class="fa-solid fa-user-check"></i>
                </h5>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <p class="fw-bold d-inline">
                      Are you sure you want to visible this post 
                    </p>
                </div>
            </div>
            <div class="modal-footer">
                <form action="{{route('admin.posts.visible', $post->id)}}" method="post">
                    @csrf
                    @method('PATCH')

                    <button type="button" class="btn btn-outline-success btn-sm" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-success btn-sm">Visible</button>
                </form>

            </div>
        </div>
    </div>
</div>
