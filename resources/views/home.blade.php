@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col col-md-offset-3 col-md-6">
            <nav class="panel panel-default">
             @if(Auth::check())    
                   <div class="panel-heading">
                    まずはフォルダを作成してください。
                </div>
                <div class="panel-body">
                    <div class="text-center">
                        <a href="{{ route('folders.create') }}" class="btn btn-primary">
                            フォルダ作成ページへ
                        </a>
                    </div>
                </div>
               @else 
             <div class="panel-heading">
                    loginしましょう
                </div>
                <div class="panel-body">
                    <div class="text-center">

                        <a href="{{ route('login') }}" class="btn btn-primary">
                            loginページへ
                        </a>
                        <a href="{{ route('register') }}">会員登録はこちら！</a>
                    </div>
                </div>
                @endif
                
            </nav>
        </div>
    </div>
</div>
@endsection
