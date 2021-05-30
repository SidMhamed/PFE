@extends('layouts.app')
@section('content')
   <div class="container align-content-center alert alert-success" role="alert">
              <h4 class="alert-heading alert alert-success">Groupes</h4>
        <div class="card">
            <div class="card-header alert-heading text-center">
                    Nouvel élément - Groupes
            </div>
            <div class="card-body">
                {!! Form::open(['method' => 'POST', 'route' => 'AddGroups', 'class' => 'form-horizontal']) !!}
                 <div class="row">
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                        {!! Form::label('name', 'Nom') !!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        </div>
                        <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                        {!! Form::label('comment', 'Commentaires') !!}
                        {!! Form::text('comment', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-12">
                       <button type="submit" class="btn btn-success">
                              <i class="fa fa-plus-circle" title="Ajouter"></i>
                        Ajouter</button>
                    </div>
                 </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    </div>
@endsection
