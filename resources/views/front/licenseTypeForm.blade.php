@extends('layouts.app')
@section('content')
    <div class="container align-content-center border-0">
        <h4 class="alert-heading alert text-white home my-2">
            <a class="text-white aa" href="{{ route('home') }}">Accueil</a> >
            <a class="text-white aa" href="{{ route('') }}">{{ $header }}</a> >
            <a class="text-white aa" href="{{ route('') }}"><i class="fa fa-plus-circle"></i></a>
        </h4>
        <div id="card" class="card border-0">
            <div class="card-header alert-heading  border-success border-5">
                Nouvel élément - License
            </div>
            <div class="card-body">
                <form action="{{ route('') }}" method="POST">
                    @csrf
                        <table class="tab_cadre_fixe">
                            <tr class="">
                                
                            <tr class="">
                                <td>
                                    <label for="name">
                                    Nom
                                    </label>
                                </td>
                                <td>
                                    <input name="name" id="name" type="textfield" class="form-control">
                                </td>
                               
                                      <td rowspan="4">
                                    <label for="comment">
                                        Commentaires
                                    </label>
                                </td>
                                <td rowspan="8" class="">
                                    <textarea name="comment" id="comment" cols="45" rows="4"></textarea>
                                </td>
                            </tr> 

                            
                           
                            <tr>
                                <td colspan="4" class="text-center my-2">
                                    <button type="submit" class="btn btn-success"> <i class="fa fa-plus-circle mx-1"
                                            title="Ajouter"></i>ajouter</button>
                                </td>
                            </tr>
                        </table>
                </form>
            </div>
        </div>
      
           
 </div>
 @endsection
