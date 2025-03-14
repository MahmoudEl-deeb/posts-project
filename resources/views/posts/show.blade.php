<x-layout title="Show Post">
    <div class="max-w-3xl mx-auto space-y-6">

        <div class="bg-white rounded border border-gray-200">
            <div class="px-4 py-3 bg-gray-50 border-b border-gray-200">
                <h2 class="text-base font-medium text-gray-700">Post Info {{ $post->id }}</h2>
            </div>
            <div class="px-4 py-4">
                <div class="mb-2">
                    <h3 class="text-lg font-medium text-gray-800">Title :- {{ $post->title }} <span class="font-normal"></span></h3>
                </div>
                <div>
                    <h3 class="text-lg font-medium text-gray-800">description :- {{ $post->description }}</h3>
                    <p class="text-gray-600"></p>
                </div>
            </div>
        </div>

        <!-- Post Creator Info Card -->
        <div class="bg-white rounded border border-gray-200">
            <div class="px-4 py-3 bg-gray-50 border-b border-gray-200">
                <h2 class="text-base font-medium text-gray-700">Post Creator Info</h2>
            </div>
            <div class="px-4 py-4">
                <div class="mb-2">
                    <h3 class="text-lg font-medium text-gray-800">Name :- {{ $post->user->name}} <span class="font-normal"></span></h3>
                </div>
                <div class="mb-2">
                    <h3 class="text-lg font-medium text-gray-800">Email :-  {{ $post->user->email}}<span class="font-normal"></span></h3>
                </div>
                <div>
                    <h3 class="text-lg font-medium text-gray-800">Created At :- {{ $post->created_at}} <span class="font-normal"></span></h3>
                </div>
            </div>
        </div>
        <!-- Comments Section -->
    <div class="mt-6 border-t pt-4">
        <h2 class="text-xl font-semibold">Comments ({{ $post->comments->count() }})</h2>

        <!-- Add Comment Form -->

        <form action="{{ route('comments.store', $post) }}" method="POST" class="mt-4">
            @csrf
            <textarea name="body" rows="3" class="w-full p-2 border rounded" placeholder="Add a comment..." required></textarea>
            <button type="submit" class="mt-2 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Post Comment
            </button>
        </form>


        <!-- Display Comments -->
        <div class="mt-4 space-y-4">
            @foreach ($post->comments as $comment)
            <div class="p-4 border rounded">
                <p class="text-gray-800">{{ $comment->body }}</p>




                <form action="{{ route('comments.destroy', $comment) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="ml-2 text-600 hover:underline bg-red-600 px-4 py-1 my-2">
                        Delete
                    </button>
                </form>


            </div>
            @endforeach
        </div>
    </div>

        <!-- Back Button -->
        <div class="flex justify-end">
            <a href="{{ route('posts.index') }}" class="px-4 py-2 bg-gray-600 text-white font-medium rounded hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                Back to All Posts
            </a>
        </div>
    </div>
</x-layout>

