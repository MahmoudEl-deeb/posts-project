<form action="{{ url('posts/' . $post->id . '/comments') }}" method="POST">
    @csrf
    <!-- ...existing form fields... -->
    <button type="submit">Submit Comment</button>
</form>
