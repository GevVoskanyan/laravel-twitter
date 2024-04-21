@auth()
    <h4> Share yours ideas </h4>
    <div class="row">
        <form action="{{ route('ideas.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <textarea name="content" class="form-control" id="content" rows="3">{{ $idea->content ?? '' }}</textarea>
                @error('content')
                    <span class="fs-6 text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>
            <div class="">
                <button class="btn btn-dark"> Share</button>
            </div>
        </form>
    </div>
@endauth

@guest()
    <h4>{{ __('ideas.login_to_share') }}</h4>
@endguest
