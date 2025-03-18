<x-navbar title="Delete">
<form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirmDelete()">
    @csrf
    @method('DELETE')
    <button type="submit" class="px-4 py-1 text-xs font-medium text-white bg-red-600 rounded hover:bg-red-700">Delete</button>
</form>
</x-navbar>
<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete post?");
    }
</script>
