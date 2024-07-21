<div class="card mb-2">
    <a href="{{route($category->parent ? 'child.article.category' : 'parent.article.category',$category->slug)}}">
        <div class="card-content">
            <img class="card-img-top img-fluid p-2"
                 style="border-top-left-radius: 16px;border-top-right-radius: 16px"
                 src="{{$category->image}}" alt="{{$category->alt}}"/>
            <div class="card-body p-1">
                <p class="card-title text-center">{{$category->name}}</p>
            </div>
        </div>
    </a>
</div>
