<p>请点击下面链接重置密码：</p>
<p>
    <a href="{{url(config('app.url').route('password.reset', $this->token, false))}}" target="_blank">
        {{url(config('app.url').route('password.reset', $this->token, false))}}
    </a>
</p>
<p style="text-align: right">来自 <b>{{config('app.name')}}</b>.</p>