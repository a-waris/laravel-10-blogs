@foreach($comments as $comment)
    <div class="mb-6 bg-gray-100 p-4 rounded shadow">
        <div class="flex items-center mb-2">
            <strong class="text-lg">{{ $comment->user->name }}</strong>
            <span class="ml-auto text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
        </div>
        <p class="mb-2">{{ $comment->body }}</p>

        <!-- Reply Form -->
        <div class="mt-4">
            <button class="text-blue-500 hover:text-blue-700 mb-2" onclick="document.getElementById('reply-form-{{ $comment->id }}').classList.toggle('hidden')">Reply</button>
            <form method="post" action="{{ route('comments.store') }}" id="reply-form-{{ $comment->id }}" class="hidden">
                @csrf
                <div class="form-group mb-2">
                    <input type="text" name="body" class="form-control p-2 w-full border rounded" placeholder="Write a reply..." />
                    <input type="hidden" name="article_id" value="{{ $article_id }}" />
                    <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
                </div>
                <div class="form-group">
                    <input type="submit" class="btn bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" value="Post Reply" />
                </div>
            </form>
        </div>

        <!-- Nested Comments/Replies -->
        @if($comment->replies->count() > 0)
            <div class="ml-6 border-l-2 border-gray-300 pl-4 mt-4">
                @include('articles.comments-display', ['comments' => $comment->replies])
            </div>
        @endif
    </div>
@endforeach
