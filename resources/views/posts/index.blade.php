<x-navbar title="Index Page">
    <div>
        <nav>

        </nav>
    </div>
    
    
    <div class="text-center">
        <a href="{{ route('posts.create') }}" class="mt-4 px-4 py-2 bg-green-600 text-white font-medium rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
            Create Post
        </a>
    </div>
    <div class="mt-6 rounded-lg border border-gray-200">
        <div class="overflow-x-auto rounded-t-lg">
            <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
                <thead class="text-left">
                    <tr>
                        <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">ID</th>
                        <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">Title</th>
                        <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">Posted By</th>
                        
                        <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">Slug</th>
                        <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">Image</th>
                        <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">Created At</th>
                        <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($posts as $post)
                    <tr>
                        <td class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">{{ $post->id }}</td>
                        <td class="px-4 py-2 whitespace-nowrap text-gray-700">{{ $post->title }}</td>
                        <td class="px-4 py-2 whitespace-nowrap text-gray-700">{{$post->user ? $post->user->name : 'No User'}}</td>
                        <td class="px-4 py-2 whitespace-nowrap text-gray-700">{{ $post->slug }}</td>
                        @if($post->image)
    <td class="py-2"><img src="{{ Storage::url($post->image) }}" alt="Post Image" width="100"></td>
    @else <td class="px-4 py-2 whitespace-nowrap text-gray-700">No Image</td>
@endif
                        <td class="px-4 py-2 whitespace-nowrap text-gray-700">{{ $post->created_at->format('Y-m-d') }}</td>
                        <td class="px-4 py-2 whitespace-nowrap text-gray-700 space-x-2">
                            <a href="{{ route('posts.show', $post['id']) }}" class="inline-block px-4 py-1 text-xs font-medium text-white bg-blue-400 rounded hover:bg-blue-500">View</a>
                            <a href="{{ route('posts.edit', $post['id']) }}" class="inline-block px-4 py-1 text-xs font-medium text-white bg-yellow-600 rounded hover:bg-blue-700">Update</a>
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('posts.delete', $post['id']) }}" class="inline-block px-4 py-1 text-xs font-medium text-white bg-red-600 rounded hover:bg-blue-700">Delete</a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

       
        <div class="mt-4">
    {{ $posts->links('vendor.pagination.tailwind') }}
        </div>
    </div>
</x-navbar>

