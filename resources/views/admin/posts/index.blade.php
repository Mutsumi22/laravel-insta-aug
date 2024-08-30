@extends('layouts.app')


@section('title', 'Admin:posts')


@section('content')
    <table class="table table-hover align-middle">
        <thead class="table-sm table-primary">
            <td>ID</td>
            <td></td>
            <td>CATEGORY</td>
            <td>OWNER</td>
            <td>CREATED AT</td>
            <td>STATUS</td>
            <td></td>
        </thead>
        <tbody>
            @foreach ($all_posts as $post)
                <tr>
                    <td>
                       {{ $post->id }}
                    </td>
                    <td>
                        <a href="{{route('post.show',$post->id)}}">
                            <img src="{{ $post->image }}" alt="" class="img-thumbnail avatar-lg">
                       </a>
                    </td>
                    <td>
                        @foreach ($post->category_post as $category_post)
                            <div class="badge bg-secondary bg-opacity-50">
                                {{ $category_post->category->name }}
                            </div>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{route('profile.show', $post->user->id)}}" class="text-decoration-none text-dark">
                             {{ $post->user->name}}
                        </a>
                    </td>
                    <td>{{ $post->created_at->diffForHumans() }}</td>
                    <td class="text-center">
                        @if ($post->trashed())
                            <i class="fa-solid fa-circle text-secondary "></i> Hidden
                        @else    
                            <i class="fa-solid fa-circle text-primary "></i> Visible    
                        @endif
                    </td>
                    <td>            
                           <button type="button" class="btn btn-sm" data-bs-toggle="dropdown">
                                <i class="fa-solid fa-ellipsis"></i>
                            </button>
                            <div class="dropdown-menu">
                                @if ($post->trashed())
                                    <button type="button" class=" btn dropdown-item text-success" data-bs-toggle="modal"
                                        data-bs-target="#visible-post-{{ $post->id }}">
                                        <i class="fa-solid fa-eye"></i> Visible post ID: {{ $post->id }}
                                    </button>
                                @else
                                    <button type="button" class=" btn dropdown-item text-danger" data-bs-toggle="modal"
                                        data-bs-target="#hide-post-{{ $post->id }}">
                                        <i class="fa-solid fa-eye-slash"></i> Hide Post ID: {{ $post->id }}
                                    </button>
                                @endif
                            </div>

                        @include('admin.posts.modal.status')
                    </td>
                </tr>
            @endforeach$
        </tbody>

    </table>

@endsection
