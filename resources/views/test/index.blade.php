<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="{{asset('css/general.css')}}">
    <title>Joel</title>
  </head>
  <body>
    <h1>{{$article->title}}</h1>
    <hr>
    {{$article->content}}
    <hr>
    {{$article->user->name}} | {{$article->category->name}} |
    @foreach($article->tags as $tag)
      {{$tag->name}}
    @endforeach
  </body>
</html>
