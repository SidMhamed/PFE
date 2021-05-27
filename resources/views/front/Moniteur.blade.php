@extends('layouts.app')
@section('content')
<main id="page">
   <div class="col-md-12">
        <div class="form-group container">
            <a href="#" class="btn btn-primary">
                <i class="fa fa-plus-circle mx-1" title="Ajouter"></i>
            </a>
        </div>
    </div>
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
            <script type="text/javascript">
                    var massiveaction_windowe59f855a9415b6a820471339573d9573;$(function() {massiveaction_windowe59f855a9415b6a820471339573d9573=$('#massiveactioncontente59f855a9415b6a820471339573d9573').dialog({

                    width:800,

                    autoOpen: false,

                    height:400,

                    modal: true,

                    title: "Actions",

                    open: function (){
                    var fields = {"container":"massformComputer"};
                    var items = $('[id=massformComputer] [data-glpicore-ma-tags~=common]').each(function( index ) {
                        fields[$(this).attr('name')] = $(this).attr('value');
                        if (($(this).attr('type') == 'checkbox') && (!$(this).is(':checked'))) {
                            fields[$(this).attr('name')] = 0;
                        }
                    });
                    $(this).load('/glpi/ajax/massiveaction.php', fields);
                    }
                    });
                    });
            </script>
            <table class="tab_glpi" width="95%">
                <tbody>
                    <tr class="">
                        <td width="30px">
                            <img src="/images/arrow-left-top.png" alt="" srcset="">
                        </td>
                        <td class="left" width="100%">
                           <a class="vsubmit" onclick="massiveaction_windowe59f855a9415b6a820471339573d9573.dialog("open");" title="Actions" href="">Actions</a>
                        </td>
                    </tr>
                </tbody>
            </table>

        <div class="center">
             <table class="tab_cadrehov" border="0">
                 <thead>
                   <tr class="bg-white">
                     <th class="">
                         <div class="form-group-checkbox">
                            <input id="checkbox" type="checkbox" class="new_checkbox" name="checkbox" onclick="if ( checkAsCheckboxes('checkbox', 'massformComputer'))
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
                     <th><a href="#">Lieu</a></th>
                     <th><a href="#">Type</a></th>
                     <th><a href="#">Modèle</a></th>
                     <th><a href="#">Dernière modification</a></th>
                     <th><a href="#">Usager</a></th>
                    </tr>
                 </thead>
                 <tbody>
                     {{-- @foreach ($computers as $computer)
                     <tr>
                        <td>{{ $computer }}</td>
                        <td>{{ $computer }}</td>
                        <td>{{ $computer }}</td>
                        <td>{{ $computer }}</td>
                        <td>{{ $computer }}</td>
                     </tr>
                     @endforeach --}}
                     <tr class="bg-white">
                        <th class="">
                            <div class="form-group-checkbox">
                               <input id="checkbox" type="checkbox" class="new_checkbox" name="checkbox" onclick="if ( checkAsCheckboxes('checkbox', 'massformComputer'))
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
                        <th><a href="#">Lieu</a></th>
                        <th><a href="#">Type</a></th>
                        <th><a href="#">Modèle</a></th>
                        <th><a href="#">Dernière modification</a></th>
                        <th><a href="#">Usager</a></th>
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
    </form>
    </main>
@endsection
