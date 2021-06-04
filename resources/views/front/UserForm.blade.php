@extends('layouts.app')
@section('content')
<div class="container align-content-center border-0" role="alert">
              <h4 class="alert-heading alert text-white">{{$header}}</h4>
        <div class="card border-0">
            <div class="card-header alert-heading  border-success border-5">
                   Nouvel élément - Téléphone
            </div>
            <div class="card-body">
                 <form action="#" method="POST">
                 @csrf
                    <table class="tab_cadre_fixe">
                        <tr>
                            <tr></tr>
                            <tr></tr>
                            <tr></tr>
                            <td></td>
                        </tr>
                        <tr></tr>
                        <tr></tr>
                        <tr></tr>
                        <tr></tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
