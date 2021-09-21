
<!-- Post preview-->
@foreach($articles as $article)
    <div class="post-preview">
        <a href="{{route('single',[$article->getCategory->slug,$article->slug])}}">

            <h4 class="post-title">{{$article->title}}</h4>
            <img src="{{$article->image}}"/>
            <h6 class="post-subtitle">{{Str::limit($article->content,90)}}</h6>

        </a>
        <p class="post-meta">
            Posted by
            <a href="#!">My Laravel Blog - {{$article->getCategory->name}} </a>

            <span class="float-end active" style="font-size:13px">{{$article->created_at->diffForHumans()}}</span>
        </p>
    </div>
    <hr>
@endforeach