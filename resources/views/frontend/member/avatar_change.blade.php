@extends('layouts.member')

@section('member')

    <div class="panel panel-default">
        <div class="panel-heading">
            更换头像
        </div>
        <div class="panel-body">
            <div class="col-sm-12">
                <form action="" enctype="multipart/form-data" class="form-horizontal" method="post">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label>头像</label>
                        <input type="file" name="file">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">确认更换</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection