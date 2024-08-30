@extends('layouts.app')

@section('title', 'Following')

@section('content')
    @include('users.profile.header')

    @if ($user->following->isNotEmpty())
        <div class="row justify-content-center">
            <div class="col-4">
                <h3 class="text-muted">Following</h3>

                @foreach ($user->following as $following)
                    <div class="row align-items-center mt-3">
                        <div class="col-auto">
                        <a href="{{route('profile.show',$following->user_following->id)}}" >
                                @if ($following->user_following->avatar)
                                    <img src="{{ $following->user_following->avatar }}" alt=""
                                        class="rounded-circle avatar-sm">
                                @else
                                    <i class="fa-solid fa-circle-user text-secondary icon-sm"></i>
                                @endif
                            </a>
                        </div>
                        <div class="col ps-0 text-truncate">
                            <a href="{{route('profile.show',$following->user_following->id)}}" class="text-decoration-none text-dark fw-bold">
                                {{ $following->user_following->name }}
                            </a>
                        </div>
                        <div class="col-auto text-end">
                            @if ($following->user_following->id != Auth::user()->id)
                                @if ($following->user_following->isFollowed())
                                    <form action="{{route('follow.destroy',$following->user_following->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm text-secondary border-0">
                                            Unfollow
                                        </button>
                                    </form>
                                @else
                                <form action="{{route('follow.store',$following->user_following->id)}}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-sm text-primary border-0">Follow</button>
                                </form>

                                @endif
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
    @endif

@endsection
