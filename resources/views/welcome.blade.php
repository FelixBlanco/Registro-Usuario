@extends('layouts.app')

@section('content')
 @if (Auth::guest())
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Welcome</div>

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 text-right">
                                    <label for="">Rol</label>
                                </div>
                                <div class="col-md-6">
                                    <select name="roles_id" id="" class="form-control">
                                        @foreach($Role as $Rol)
                                            <option value="{{$Rol->id}}">{{$Rol->name_roles}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 text-right">
                                    <label for="">Pais</label>
                                </div>
                                <div class="col-md-6">
                                    <select name="pais_id" id="" class="form-control">
                                        @foreach($Pais as $Pai)
                                            <option value="{{$Pai->id}}">{{$Pai->name_pais}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i> Register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@else
    
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    @if(Auth::user()->roles_id == 1)
                        <h3><b>{{ $Usuarios->count() }}</b> Usuarios</h3>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Lista de Usuarios</div>

                    <div class="panel-body">
                        <div class="form-group text-right">
                            @if(Auth::user()->roles_id == 1 or Auth::user()->roles_id == 2)
                            <a href="{{route('crear')}}" class="btn btn-success">Registro Usuario</a>
                            @endif
                        </div>
                        
                        <table class="table table-border">
                            <tr>
                                <th>Nombre</th>
                                <th>Pais</th>
                                <th></th>
                            </tr>
                            @foreach($Usuarios as $Usuario)
                                @if(Auth::user()->roles_id == 1)
                                    @if($Usuario->pais_id == Auth::user()->pais_id)
                                        <tr>
                                            <td>{{$Usuario->name}}</td>
                                            <td>{{$Usuario->pai->name_pais}}</td>
                                            <td class="text-right">
                                                <a href="{{route('admin.edit',$Usuario['id'])}}" class="btn btn-primary">Actualizar</a>
                                                <a href="" class="btn btn-danger">Eliminar</a>
                                            </td>
                                        </tr>
                                    @endif
                                @endif

                                @if(Auth::user()->roles_id == 2)
                                    @if($Usuario->pais_id == Auth::user()->pais_id)
                                        <tr>
                                            <td>{{$Usuario->name}}</td>
                                            <td>{{$Usuario->pai->name_pais}}</td>
                                            <td class="text-right">
                                                <a href="{{route('admin.edit',$Usuario['id'])}}" class="btn btn-primary">Actualizar</a>
                                                <a href="" class="btn btn-danger">Eliminar</a>
                                            </td>
                                        </tr>
                                    @endif
                                @endif

                                @if(Auth::user()->roles_id == 3)
                                    @if($Usuario->pais_id == Auth::user()->pais_id)
                                        <tr>
                                            <td>{{$Usuario->name}}</td>
                                            <td>{{$Usuario->pai->name_pais}}</td>

                                        </tr>
                                    @endif
                                @endif
                            @endforeach
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endif

@endsection
