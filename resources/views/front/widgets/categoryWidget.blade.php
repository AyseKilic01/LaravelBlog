@isset($categories)
<div class="col-md-3 ">
    <div class="card">
        <div class="card-header">
            Kategoriler
        </div>
        <div class="list-group" id="list-tab" role="tablist">
            @foreach($categories as $category)
                <a class="list-group-item list-group-item-action" id="list-home-list" data-toggle="list"
                   href="{{route('category',$category->slug)}}" role="tab" aria-controls="home">
                    {{$category->name}}
                    <span class="badge bg-danger float-end text-white">
                        {{$category->getCountArticle()}}
                    </span></a>
            @endforeach
        </div>
    </div>
</div>
@endif
