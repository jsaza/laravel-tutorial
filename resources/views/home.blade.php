@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    あなたはログイン済みです！
                </div>
            </div>
        </div>
        <br />
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">料金表</div>

                <div class="panel-body">
                    <ul>
                        <li><a href="/lara/charge/micro">Micro 1490 円(税込)/月</a></li>
                        <li><a href="/lara/charge/small">Small 4800円(税込)/月</a></li>
                        <li><a href="/lara/charge/medium">Medium 6900 円(税込)/月</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
