@extends('front.template.main')
@section('title',$article->title)

@section('content')
<h3 class="title-front left">{{$article->title}}</h3>
<hr>
<div class="row">
	<div class="col-md-8">
		{!!$article->content!!}
		<hr>
		<h4>Comentarios</h4>
		@foreach($article->tags as $tag)
			{{$tag->name}}
		@endforeach
		<hr>
		<div id="disqus_thread"></div>
		<script>
		(function() { // DON'T EDIT BELOW THIS LINE
			var d = document, s = d.createElement('script');
			s.src = '//blogjoel.disqus.com/embed.js';
			s.setAttribute('data-timestamp', +new Date());
			(d.head || d.body).appendChild(s);
		})();
		</script>
		<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
	</div>
	<div class="col-md-4 aside">
		@include('front.partials.aside')
	</div>
</div>
@endsection