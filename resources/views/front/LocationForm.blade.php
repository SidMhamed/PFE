@extends('layouts')
@section('content')
    <div class="container align-content-center border-0">
        <h4 class="alert-heading alert text-white">Location</h4>
        <div class="card">
            <div class="card-header alert-heading border-success border-5">
                Nouvel élément - Ordinateur
            </div>
            <div class="card-body">
                {!! Form::model($model, ['route' => ['models.update', $models->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                            {!! Form::label('Nom', 'Nom') !!}
                            {!! Form::text('Nom', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        </div>
                        <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                            {!! Form::label('CommeEnfantDe', 'Comme Enfant de') !!}
                            {!! Form::text('CommeEnfantDe', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        </div>
                        <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                            {!! Form::label('address', 'address') !!}
                            {!! Form::text('address', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        </div>
                        <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                            {!! Form::label('Codeposte', 'Code poste') !!}
                            {!! Form::text('Codeposte', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        </div>
                        <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                            {!! Form::label('ville', 'Ville') !!}
                            {!! Form::text('ville', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        </div>
                        <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                            {!! Form::label('pays', 'Pays') !!}
                            {!! Form::text('pays', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                            {!! Form::label('NumeroDeBatiment', 'Numero de Batiment') !!}
                            {!! Form::text('NumeroDeBatiment', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        </div>
                        <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                            {!! Form::label('NumeroDePiece', 'Numero de Piece') !!}
                            {!! Form::text('NumeroDePiece', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        </div>
                        <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                            {!! Form::label('latitude', 'Latitude') !!}
                            {!! Form::text('latitude', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        </div>
                        <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                            {!! Form::label('longitude', 'Longitude') !!}
                            {!! Form::text('longitude', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        </div>
                        <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                            {!! Form::label('altitude', 'Altitude') !!}
                            {!! Form::text('altitude', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        </div>
                        <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                            {!! Form::label('Commentaires', 'Commentaires') !!}
                            {!! Form::text('Commentaires', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="btn-group">
                            {!! Form::submit('Ajouter', ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
