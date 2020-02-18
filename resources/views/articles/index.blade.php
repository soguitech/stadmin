    <h1>Showing all Posts</h1>

    @forelse ($articles as $article)
        <li><a href="{{ route('articles.show', $article) }}">{{ $article->title }}</a></li>
    @empty
        <p> 'No posts yet' </p>
    @endforelse

