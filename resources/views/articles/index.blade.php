@extends('layout')

@section('content')

<div id="wrapper">
	<div id="page" class="container">
		<div id="content">
			<div class="title">
                @forelse ($articles as $article)
                    {{-- We can do on this way below --}}
                    {{-- <a href="{{ route('articles.show', $article) }}"> --}}
                    <a href="{{ $article->path() }}"><h2>{{ $article->title }}</h2></a>
                        
                        <p><img src="/images/banner.jpg" alt="" class="image image-full" /> </p>
                        {{ $article->excerpt }}
                    </a>
                    @empty
                        <p>No relevant articles yet.</p>
                @endforelse
		</div>
		
	</div>
</div>
@endsection