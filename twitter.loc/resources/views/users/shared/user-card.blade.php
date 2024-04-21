<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:200px;height: 200px; object-fit: cover" class="me-3 avatar-sm rounded-circle"
                    src="{{ $user->getImageUrl() }}" alt="{{ $user->name }}">
                <div>
                    <h3 class="card-title mb-0">
                        <a href="{{ route('users.show', $user) }}"> {{ $user->name }}</a>
                    </h3>
                    <span class="fs-6 text-muted">{{ $user->email }}</span>
                </div>
            </div>
            @auth()
                @if (auth()->id() === $user->id)
                    <a href="{{ route('users.edit', $user->id) }}">Edit</a>
                @endif
            @endauth
        </div>
        <div class="px-2 mt-4">
            <h5 class="fs-5"> Bio : </h5>
            <p>
                {{ $user->bio ?? '' }}
            </p>
            @include('users.shared.user-stats')
            @auth()
                @can('update', $user)
                    <div class="mt-3">
                        @if (Auth::user()->follows($user))
                            <form action="{{ route('users.unfollow', $user->id) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-danger btn-sm"> Unfollow</button>
                            </form>
                        @else
                            <form action="{{ route('users.follow', $user->id) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-sm"> Follow</button>
                            </form>
                        @endif
                    </div>
                @endcan
            @endauth
        </div>
    </div>
</div>
