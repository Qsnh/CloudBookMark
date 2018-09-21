<div class="container">
    <div class="row">
        <div class="col-sm-12" style="margin-bottom: 10px;">
            <a href="{{route('category.create')}}" class="btn btn-primary">添加分类</a>
        </div>

        <div class="col-sm-12">
            @forelse($categories as $category)
                <div class="panel panel-default">
                    <div class="panel-heading">{{$category->category_name}}</div>
                    <div class="panel-body">

                    </div>
                </div>
            @empty
                <p class="text-center">暂无数据</p>
            @endforelse
        </div>
    </div>
</div>