@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-3">
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="{{route('member')}}">会员中心</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('member.password')}}">修改密码</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">安全退出</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-9 col-sm-12">
                @yield('member')
            </div>
        </div>
    </div>

@endsection