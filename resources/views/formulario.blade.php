@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Formulário de cadastro</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                     @if(Request::is('*/editar'))                  

                    {!!Form::model($contato,['method'=>'PATCH','url'=>'cadastro/'.$contato->id, 'files'=>true]) !!}

                    @else
                    {!! Form::open(['url'=>'cadastro/salvar', 'files'=> true]) !!}
                    @endif

                  
                    {!! Form::label('nome','Nome:') !!}
                    {!! Form:: input('text','nome',null,['class'=>'form-control','autofocus','placeholder'=>'Nome']) !!}

                    {!!Form::label('email', 'Email:') !!}
                    {!!Form::input('text','email',null,['class'=>'form-control','autofocus','placeholder'=>'Email']) !!}

                    
                    {!!Form::label('foto', 'Foto:') !!}
                    {!!Form::file('foto') !!}
                     @if(!empty($contato->foto))
                        <label> Arquivo salvo:</label><br>

                            <img src="\agendas/public/images/{{$contato->foto}}" width="150" height="150" >
                     @endif
                     <br>
                     <br>
                    
                    {!!Form::submit('Salvar',['class'=>'btn btn-danger']) !!}    
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
