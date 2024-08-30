@extends('layouts.app')

@section('title', 'Followers')

@section('content')
    @include('users.profile.header')

    @if ($user->followers->isNotEmpty())
        <div class="row justify-content-center">
            <div class="col-4">
                <h3 class="text-muted">Followers</h3>

                @foreach ($user->followers as $follower)
                    <div class="row align-items-center mt-3">
                        <div class="col-auto">
                        <a href="{{route('profile.show',$follower->user_follower->id)}}" >
                                @if ($follower->user_follower->avatar)
                                    <img src="{{ $follower->user_follower->avatar }}" alt=""
                                        class="rounded-circle avatar-sm">
                                @else
                                    <i class="fa-solid fa-circle-user text-secondary icon-sm"></i>
                                @endif
                            </a>
                        </div>
                        <div class="col ps-0 text-truncate">
                            <a href="{{route('profile.show',$follower->user_follower->id)}}" class="text-decoration-none text-dark fw-bold">
                                {{ $follower->user_follower->name }}
                            </a>
                        </div>
                        <div class="col-auto text-end">
                            @if ($follower->user_follower->id != Auth::user()->id)
                                @if ($follower->user_follower->isFollowed())
                                    <form action="{{route('follow.destroy',$follower->user_follower->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm text-secondary border-0">
                                            Unfollow
                                        </button>
                                    </form>
                                @else
                                <form action="{{route('follow.store',$follower->user_follower->id)}}" method="post">
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
