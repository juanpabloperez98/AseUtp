@extends('base')
@section('title','Categorias')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto my-5">
            <div class="jumbotron jumbotron-fluid p-5" style="border-radius: 30px;">

                @if(session('info'))
                
                
                    <div class="alert alert-success text-center mb-5">
                        {{ session('info')}}
                    </div>                                       
                

                
                @endif




                <div class="container">
                  <h1 class="display-4 p-3" style="background-color: #b2bec3">Lista de categorias</h1>
                  <a href="{{ route('categories.create') }}" class="btn btn-sm btn-primary float-right">
                      Crear
                  </a>

                  <div class="container body my-5">
                      <table class="table table-striped table-hover">
                          <thead>
                              <tr>
                                  <th width="10px"></th>
                                  <th>Nombre</th>
                                  <th colspan="3"></th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($categories as $category)
                              <tr>
                                  <td>
                                      {{$category->id}}
                                  </td>
                                  <td>
                                      {{$category->name}}
                                  </td>
                                  <td width="10px">
                                      <a href="{{ route('categories.show', [$category->id]) }}" class="btn btn-sm btn-primary float-right">
                                        ver
                                    </a>
                                  </td>

                                  <td width="10px">
                                      <a href="{{ route('categories.edit', [$category->id]) }}" class="btn btn-sm btn-success float-right">
                                        editar
                                    </a>
                                  </td>
                                  
                                  <td width="10px">
                                      {!! Form::open(['route'=>['categories.destroy',$category->id],'method'=>'DELETE']) !!}
                                      <button class="btn btn-sm btn-danger">
                                          Eliminar
                                      </button>
                                      {!! Form::close() !!}
                                  </td>
                              </tr>                                  
                              @endforeach
                          </tbody>
                      </table>

                      {{$categories->render()}}
                  </div>                  

                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection