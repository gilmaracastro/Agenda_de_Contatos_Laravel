@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Contatos <h3 align="right"><a href="formulario">  
          <button type="button" class="btn btn-danger">Adicionar Contato</button></a>
        </div>          
        <div class="panel-body">
          @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
          @endif
            <table class="table" >            
                <thead>
                  <tr>
                    <th>Nome</th>
                    <th>Detalhes</th>
                    <th>Editar</th>
                    <th>Excluir</th>                            
                    </tr>
                </thead>
                <tbody>
                  @foreach ($contato as $p)
                    <tr>
                      <td>{{$p->nome }}</td>
                      <td><a class="btn btn-success" a href="detalhes/{{ $p->id }}">Detalhes</a></td>
                      <td> <a class="btn btn-success" href="cadastro/{{ $p->id }}/editar">Editar</a></td>
                      <!-- <td class="deletar" data-link><button >Deletar</button></td> -->
                      <td><a class="btn btn-success" onclick="return myFunction()" a href="cadastro/{{$p->id }}/deletar">Deletar </a></td>                                
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
</div>

<script>     
  function myFunction(){   
    if(confirm('Tem certeza que deseja deletar essa linha?')){
      return true;
    }
    return false;        
  }       
   
</script>
@endsection


    

   





