@extends('layouts.app')
@section('content')
<main id="page">
    <div>
        <table class="tab_cadre_pager">
            <tbody>
                  <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                  </tr>
            </tbody>
        </table>
    </div>
    <form action="#" method="post" name="massformComputer" id="massformComputer">
        <table class="tab_glpi" width="95%">
                <tbody>
                    <tr class="">
                        <td width="30px">
                            <img src="/images/arrow-left-top.png" alt="" srcset="">
                        </td>
                        <td class="left" width="100%">
                           <a class="vsubmit" onclick="massiveaction_windowe59f855a9415b6a820471339573d9573.dialog("open");" title="Actions" href="">Actions</a>
                        </td>
                        <td class="left" width="100%">
                            <a href="{{route('Computer.form')}}" class="btn btn-success px-2 py-0">
                              <i class="fa fa-plus-circle" title="Ajouter"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>

        <div class="center">
             <table class="tab_cadrehov" border="0">
                 <thead>
                   <tr class="">
                     <th>
                         <div class="form-group-checkbox">
                            <input id="checkall_19067763" type="checkbox" class="new_checkbox" name="checkbox" onclick="if ( checkAsCheckboxes('checkbox', 'massformComputer'))
                            {return true;}" title="Tout cocher Comme">
                            <label for="checkbox" title="Tout cocher comme" class="label-checkbox">
                               <span class="check"></span>
                               <span class="box"></span>
                            </label>
                         </div>
                     </th>
                     <th><a href="#">Nom</a></th>
                     <th><a href="#">Statut</a></th>
                     <th><a href="#">Fabricant</a></th>
                     <th><a href="#">Numéro de série</a></th>
                     <th><a href="#">Type </a></th>
                     <th><a href="#">Modèle </a></th>
                     <th><a href="#">Système d'exploitation-Nom</a></th>
                     <th><a href="#">Lieu</a></th>
                     <th><a href="#">Dernière modification</a></th>
                    </tr>
                 </thead>
                 <tbody>
                     @foreach ($computers as $computer)
                     <tr>
                        <td width="10px" valign="top">
                            <span class="form-group-checkbox">
                                <input id="check_1515325751"  value="1" type="checkbox" class="new_checkbox" data-glpicore-ma-tags="common" name="checkbox" onclick="if ( checkAsCheckboxes('checkbox', 'massformComputer'))
                                {return true;}" title="Tout cocher Comme">
                                <label for="checkbox" title="Tout cocher comme" class="label-checkbox">
                                   <span class="check"></span>
                                   <span class="box"></span>
                                </label>
                            </span>
                        </td>
                        <td  valign="top"><a href="{{route('EditComputer',$computer->id)}}">{{ $computer->nom }}</a></td>
                        <td  valign="top"></td>
                        <td  valign="top">{{App\Models\glpi_fabricant::findOrFail($computer->fabricant_id)->Nom}}</td>
                        <td  valign="top">{{$computer->numeroDeSerie}}</td>
                        <td  valign="top">{{App\Models\glpi_computertypes::findOrFail($computer->computertypes_id)->name}}</td>
                        <td  valign="top">{{App\Models\glpi_computermodels::findOrFail($computer->computermodels_id)->Nom}}</td>
                        <td  valign="top"></td>
                        <td  valign="top">{{App\Models\glpi_location::findOrFail($computer->locations_id)->Nom}}</td>
                        <td  valign="top">{{ $computer->updated_at }}</td>
                     </tr>
                     @endforeach
                     <tr class="bg-white">
                        <th class="">
                            <div class="form-group-checkbox">
                               <input id="check_879132758" type="checkbox" class="new_checkbox" name="checkbox" onclick="if ( checkAsCheckboxes('checkbox', 'massformComputer'))
                               {return true;}" title="Tout cocher Comme">
                               <label for="checkbox" title="Tout cocher comme" class="label-checkbox">
                                  <span class="check"></span>
                                  <span class="box"></span>
                               </label>
                            </div>
                        </th>
                        <th><a href="#">Nom</a></th>
                        <th><a href="#">Statut</a></th>
                        <th><a href="#">Fabricant</a></th>
                        <th><a href="#">Numéro de série</a></th>
                        <th><a href="#">Type </a></th>
                        <th><a href="#">Modèle </a></th>
                        <th><a href="#">Système d'exploitation-Nom</a></th>
                        <th><a href="#">Lieu</a></th>
                        <th><a href="#">Dernière modification</a></th>
                       </tr>
                 </tbody>
             </table>
        </div>
        <table class="tab_glpi" width="95%">
            <tbody>
                <tr class="">
                    <td width="30px">
                        <img src="/images/arrow-left.png" alt="" srcset="">
                    </td>
                    <td class="left" width="100%">
                       <a class="vsubmit" onclick="massiveaction_windowe59f855a9415b6a820471339573d9573.dialog("open");" title="Actions" href="">Actions</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </table>
    </form>
    </main>
@endsection
