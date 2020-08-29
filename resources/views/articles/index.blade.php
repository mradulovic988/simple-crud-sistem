@extends('layout')

@section('content')

<div id="wrapper">
	<div id="page" class="container">
		<div id="content">
			<div class="title">
                @foreach ($articles as $article)
                    {{-- We can do on this way below --}}
                    {{-- <a href="{{ route('articles.show', $article) }}"> --}}
                    <a href="{{ $article->path() }}"></a>
                        <h2>{{ $article->title }}</h2>
                        <p><img src="/images/banner.jpg" alt="" class="image image-full" /> </p>
                        {{ $article->body }}
                    </a>
                @endforeach
		</div>
		
	</div>
</div>
@endsection