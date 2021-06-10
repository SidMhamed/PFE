<table class="tab_cadre_pager">
            <tbody class="">
                  <tr>
                      <td class="float-left">
                        <select class="px-2 py-1" name="selectSearch" id="selectSearch">
                            <option value="" class="alert-dark">Éléments visualisés</option>
                            <option value="Nom">Nom</option>
                            <option value="Statut">Statut</option>
                            <option value="Fabricant">Fabricant</option>
                            <option value="NumeroSerie">Numéro de série</option>
                            <option value="Type">Type</option>
                            <option value="Modele">Modèle</option>
                            <option value="Systeme">Système d'exploitation-Nom</option>
                            <option value="Lieu">Lieu</option>
                            <option value="DateDerniereModification">Dernière modification</option>
                        </select>
                      </td>
                    <td width="50%" class="text-center">
                        <input type="search" name="search" class="form-control  px-2 border-0" placeholder="Rechercher">
                    </td>
                    <td class="float-right">
                        <button type="submit" class="btn btn-success py-0 px-3"><i class="fa fa-search text-white mx-1"></i>Rechercher</button>
                    </td>
                      {{-- <td>
                      <form method="POST" action="#">
                         <select class="px-2 py-1">
                                        <option value="" class="alert-dark">Éléments visualisés</option>
                                        <option value="Nom">Page courante en PDF paysage</option>
                                        <option value="Statut">Statut</option>
                                        <option value="Fabricant">Fabricant</option>
                                        <option value="NumeroSerie">Numéro de série</option>
                           </select>
                           <button type="submit" name="export" class="unstyled pointer" title="Exporter"><i class="far fa-save"></i><span class="sr-only">Exporter<span>
                                <input type="hidden" name="_glpi_csrf_token" value="e42d907bbd90eb1e40ff38374801786f97fe301351e05cf06f2ca8dfcf2ce69b">
                           </button>
                      </form>
                      </td> --}}
                  </tr>
            </tbody>
        </table>
