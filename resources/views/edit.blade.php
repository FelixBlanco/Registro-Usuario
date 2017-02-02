@extends('layouts.app')

@section('content')
 @if (Auth::guest())

@else
    
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar {{$InfoUser->name}}</div>

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="PUT" action="{{ route('admin.update',$InfoUser->id) }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }} {{$InfoUser->name}}">

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
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }} {{$InfoUser->email}}">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
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
                                        <option value="{{$InfoUser->roles_id}}">{{$InfoUser->rol->name_roles}}</option>
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
                                        <option value="{{$InfoUser->pais_id}}">{{$InfoUser->pai->name_pais}}</option>
                                        @foreach($Pais as $Pai)
                                            <option value="{{$Pai->id}}">{{$Pai->name_pais}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i> Editar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endif

@endsection
