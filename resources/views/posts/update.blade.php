<x-navbar title="Create New Post">
    <div class="max-w-3xl mx-auto">
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-xl font-semibold text-gray-800">Update post</h2>
            </div>

            <div class="px-6 py-4">
            <form method="POST" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PATCH')

                    <!-- Title Input -->
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                        <input
                            name="title"
                            type="text"
                            value="{{ $post->title}}"
                            id="title"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 py-2 px-3 border"
                        >
                        @if ($errors->has('title'))
                            @foreach ($errors->get('title') as $error)
                                <p class="text-red-500 text-sm mt-1">{{ $error }}</p>
                            @endforeach
                        
                        @endif
                    </div>

                    <!-- Description Textarea -->
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <textarea
                            name="description"
                            id="description"
                            rows="5"

                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 py-2 px-3 border"
                        >{{ $post->description}}</textarea>
                        @if ($errors->has('description'))
                            @foreach ($errors->get('description') as $error)
                                <p class="text-red-500 text-sm mt-1">{{ $error }}</p>
                            @endforeach
                        
                        @endif
                    </div>
                </div>
                <div class="mb-4">
                <label for="image">Upload Image:</label>
                <input type="file" name="image" id="image">
                @if ($errors->has('image'))
                            @foreach ($errors->get('image') as $error)
                                <p class="text-red-500 text-sm mt-1">{{ $error }}</p>
                            @endforeach
                        @endif
            </div> 

                    <!-- Post Creator Select -->
                    <div class="mb-6">
                        <label for="creator" class="block text-sm font-medium text-gray-700 mb-1">Post Creator</label>
                        <select
                            name="id"
                            id="creator"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 py-2 px-3 border bg-white"
                            >
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ $user->id == $post->user->id ? 'selected' : '' }}>{{$user->name}}</option>
                        @endforeach
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end">
                        <button
                            type="submit"
                            class="px-4 py-2 bg-green-600 text-white font-medium rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 hover:cursor-pointer"
                        >
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-navbar>
