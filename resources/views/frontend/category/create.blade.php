@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">添加分类</div>
                    <div class="panel-body">
                        <div class="col-sm-12">
                            <form action="" class="form-horizontal" method="post">
                                {!! csrf_field() !!}
                                <div class="form-group">
                                    <label>分类名</label>
                                    <input type="text" name="category_name" class="form-control" placeholder="分类名">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary">确认添加</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection