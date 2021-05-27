@extends('layouts.app')
@section('content')
<div class="container align-content-center alert alert-success" role="alert">
              <h4 class="alert-heading alert alert-success">Ordinateur</h4>
        <div class="card">
            <div class="card-header alert-heading text-center">
                    Nouvel élément - Ordinateur
            </div>
            <div class="card-body">
                 <form action="{{route('addComputer')}}" method="POST">
                 @csrf
                <div class="row">
                    <div class="col-md-6">
                       <div class="form-group">
                            <label for="model">Nom</label>
                            <input type="text" name="name" id="Nom" class="form-control" placeholder="" aria-describedby="helpId">
                       </div>
                       <div class="form-group">
                            <label for="Lieu">Lieu</label><i class="fa fa-plus-circle mx-1" title="Ajouter"></i>
                            <select name="Lieu" id="Lieu" class="form-control">
                                <option value=""></option>
                            </select>
                       </div>
                       <div class="form-group">
                            <label for="RespTech">Responsable technique</label>
                            <i class="fa fa-plus-circle mx-1" title="Ajouter"></i>
                            <select name="RespTech" id="RespTech" class="form-control">
                                <option value=""></option>
                            </select>
                       </div>
                       <div class="form-group">
                            <label for="GpTech">Groupe technique</label>
                            <i class="fa fa-plus-circle mx-1" title="Ajouter"></i>
                            <select name="GpTech" id="GpTech" class="form-control">
                                <option value=""></option>
                            </select>
                       </div>
                       <div class="form-group">
                            <label for="UsaNum">Usager numéro</label>
                            <input type="text" name="UsaNum" id="UsaNum" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="Usager">Usager</label>
                            <input type="text" name="Usager" id="Usager" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="user">Utilisateur</label>
                            <i class="fa fa-plus-circle mx-1" title="Ajouter"></i>

                            <select name="user" id="user" class="form-control">
                                <option value=""></option>
                            </select>
                       </div>
                       <div class="form-group">
                            <label for="group">Group</label>
                            <i class="fa fa-plus-circle mx-1" title="Ajouter"></i>
                            <select name="group" id="group" class="form-control">
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="UUID">UUID</label>
                            <input type="text" name="UUID" id="UUID" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                                <label for="SMJ">Source mise à jour</label>
                                <i class="fa fa-plus-circle mx-1" title="Ajouter"></i>
                                <select name="SMJ" id="SMJ" class="form-control">
                                    <option value=""></option>
                                </select>
                       </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Statut">Statut</label>
                            <i class="fa fa-plus-circle mx-1" title="Ajouter"></i>
                            <select name="Statut" id="Statut" class="form-control">
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Type">Type</label>
                            <i class="fa fa-plus-circle mx-1" title="Ajouter"></i>
                            <select name="Type" id="Type" class="form-control">
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Fab">Fabricant</label>
                            <i class="fa fa-plus-circle mx-1" title="Ajouter"></i>
                            <select name="Fab" id="Fab" class="form-control">
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="model">Modél</label>
                            <i class="fa fa-plus-circle mx-1" title="Ajouter"></i>
                            <select name="model" id="model" class="form-control">
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="NumSerie">Numéro de Série</label>
                            <input type="text" name="NumSerie" id="NumSerie" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="NumDinventaire">Numéro de d'inventaire</label>
                            <input type="text" name="NumDinventaire" id="NumDinventaire" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="reseau">Réseau</label>
                            <i class="fa fa-plus-circle mx-1" title="Ajouter"></i>
                            <select name="reseau" id="reseau" class="form-control">
                                <option value=""></option>
                            </select>
                        </div>
                          <div class="form-group">
                            <label for="comment">Comment</label>
                             <textarea name="comment" id="comment" cols="30" rows="8" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12 text-center my-2">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">ajouter</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection

