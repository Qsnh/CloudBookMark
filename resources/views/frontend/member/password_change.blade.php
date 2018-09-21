@extends('layouts.member')

@section('member')

    <div class="panel panel-default">
        <div class="panel-heading">
            修改密码
        </div>
        <div class="panel panel-body">
            <div class="col-sm-12">
                <form action="" class="form-horizontal" method="post">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label>原密码</label>
                        <input type="password" name="old_password" class="form-control" placeholder="原密码">
                    </div>
                    <div class="form-group">
                        <label>新密码</label>
                        <input type="password" name="new_password" class="form-control" placeholder="新密码">
                    </div>
                    <div class="form-group">
                        <label>再输入一次</label>
                        <input type="password" name="new_password_confirmation" class="form-control" placeholder="再输入一次">
                    </div>
                    <div class="form-group text-right">
                        <button class="btn btn-primary">确认修改</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection