<div>
    <form action="{{ route('ideas.comments.store', $idea->id) }}" method="post">
        @csrf
        <div class="mb-3">
            <textarea name="comment" class="fs-6 form-control" rows="1"></textarea>
            @error('comment')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <button type="submit" class="btn btn-primary btn-sm"> Post Comment</button>
        </div>
    </form>
    <hr>
    @forelse ($idea->comments as $comment)
        <div class="d-flex align-items-start">
            <img style="width:35px; height: 35px; object-fit: cover" class="me-2 avatar-sm rounded-circle"
                src="{{ $comment->user->getImageUrl() }}" alt="{{ $comment->user->name }}">
            <div class="w-100">
                <div class="d-flex justify-content-between">
                    <h6 class="">{{ $comment->user->name }}</h6>
                    <small class="fs-6 fw-light text-muted"> {{ $comment->created_at->diffForHumans() }}</small>
                </div>
                <p class="fs-6 mt-3 fw-light">
                    {{ $comment->comment }}
                </p>
            </div>
        </div>
    @empty
        <p>No comments found!</p>
    @endforelse
</div>
