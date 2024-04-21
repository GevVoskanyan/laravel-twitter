<div class="card">

    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px;height: 50px; object-fit: cover" class="me-2 avatar-sm rounded-circle"
                    src="{{ $idea->user->getImageUrl() }}" alt="{{ $idea->user->name }}">
                <div>
                    <h5 class="card-title mb-0">
                        <a href="{{ route('users.show', $idea->user) }}">
                            {{ $idea->user->name }}
                        </a>
                    </h5>
                </div>
            </div>
            <div class="d-flex">
                <a href="{{ route('ideas.show', $idea->id) }}">View</a>
                @auth
                    @can('update', $idea)
                        <a class="mx-2" href="{{ route('ideas.edit', $idea->id) }}">Edit</a>
                        <form method="POST" action="{{ route('ideas.destroy', $idea) }}">
                            @csrf
                            @method('delete')
                            @if ((auth()->check() && auth()->user()->id == $idea->user_id) || auth()->user()->is_admin == true ?? '')
                                <button type="submit" class="ms-1 btn btn-danger btn-sm">x</button>
                            @endif
                        </form>
                    @endcan
                @endauth
            </div>
        </div>
    </div>
    <div class="card-body">
        @if ($editing ?? false)
            <form action="{{ route('ideas.update', $idea->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <textarea name="content" class="form-control" id="content" rows="3"></textarea>
                    @error('content')
                        <span class="fs-6 text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div class="">
                    <button class="btn btn-dark mb-2"> Update</button>
                </div>
            </form>
        @endif
        <p class="fs-6 fw-light text-muted">
            {{ $idea->content }}
        </p>
        <div class="d-flex justify-content-between">
            @include('ideas.shared.like-button')
            <div>
                <span class="fs-6 fw-light text-muted ">
                    <span class="fas fa-clock"></span>
                    <span>{{ $idea->created_at->diffForHumans() }}</span>
                </span>
            </div>
        </div>
        @include('shared.comments-box')
    </div>
</div>
