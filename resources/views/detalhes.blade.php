@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Detalhes</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <img src="\agenda/public/images/{{$contato->foto}}" width="150" height="150" >
                    <div align="center">
                        Nome:{{ $contato->nome }}<br>
                        Email:{{ $contato->email }}
                    </div
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
