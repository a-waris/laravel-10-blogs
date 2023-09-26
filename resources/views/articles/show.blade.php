
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $article->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ $article->body }}
                </div>

                <!-- Comments Section -->
                <div class="mt-8 p-2">
                    <h3 class="text-xl font-semibold mb-4">Comments</h3>
                    @include('articles.comments-display', ['comments' => $article->comments, 'article_id' => $article->id])

                    <!-- Add Comment Form -->
                    <form action="{{ route('comments.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="article_id" value="{{ $article->id }}">
                        <textarea name="body" rows="4" class="w-full p-2 border rounded" placeholder="Add a comment..."></textarea>
                        <button type="submit" class="mt-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Post Comment
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
