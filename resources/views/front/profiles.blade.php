@extends('layouts.app')
@section('content')
    <main id="page">
        <h4 class="alert-heading alert text-white home">
            <a class="text-white aa" href="{{ route('home') }}">Accueil</a> >
            <a class="text-white aa" href="{{ route('profile.index') }}">{{ $header }}</a>
        </h4>
        <div class="home">
            {!! Form::open(['method' => 'POST', 'route' => 'SearchProfile.index', 'class' => 'form-horizontal']) !!}
            @csrf
            @include('front.SearchForm')
            {!! Form::close() !!}
        </div>
        <form action="#" method="post" name="massformComputer" id="massformComputer" class="home my-3">
            <table class="tab_glpi" width="95%">
                <tbody>
                    <tr class="">
                        <td width="30px">
                            <img src="/images/arrow-left-top.png" alt="" srcset="">
                        </td>
                        <td class="left" width="100%">
                            <a class="vsubmit" onclick="" title="Actions" href="">Actions</a>
                        </td>
                        <td class="left" width="100%">
                            <a href="{{ route('profile.create') }}" class="btn btn-success px-2">
                                <i class="fa fa-plus-circle" title="Ajouter"></i>
                            </a>
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
                                    <input id="checkall_19067763" type="checkbox" class="new_checkbox" name="checkbox"
                                        onclick="if ( checkAsCheckboxes('checkbox', 'massformComputer'))
                                {return true;}" title="Tout cocher Comme">
                                    <label for="checkbox" title="Tout cocher comme" class="label-checkbox">
                                        <span class="check"></span>
                                        <span class="box"></span>
                                    </label>
                                </div>
                            </th>
                            <th><a href="#">Nom</a></th>
                            <th><a href="#">ID</a></th>
                            <th><a href="#">Profil par default</a></th>
                            <th><a href="#">Dernière modification</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($profils as $profil)
                            <tr>
                                <td width="10px" valign="top">
                                    <span class="form-group-checkbox">
                                        <input id="check_1515325751" value="1" type="checkbox" class="new_checkbox"
                                            data-glpicore-ma-tags="common" name="checkbox" onclick="if ( checkAsCheckboxes('checkbox', 'massformComputer'))
                                    {return true;}" title="Tout cocher Comme">
                                        <label for="checkbox" title="Tout cocher comme" class="label-checkbox">
                                            <span class="check"></span>
                                            <span class="box"></span>
                                        </label>
                                    </span>
                                </td>
                                <td valign="top"><a href="{{ route('profile.edit', $profil->id) }}">{{ $profil->name }}</a>
                                </td>
                                <td valign="top">{{ $profil->id }}</td>
                                <td valign="top">{{ $profil->is_default }}</td>
                                <td valign="top">{{ $profil->created_at }}</td>
                            </tr>
                        @endforeach
                        <tr class="bg-white">
                            <th class="">
                                <div class="form-group-checkbox">
                                    <input id="check_879132758" type="checkbox" class="new_checkbox" name="checkbox"
                                        onclick="if ( checkAsCheckboxes('checkbox', 'massformComputer'))
                                   {return true;}" title="Tout cocher Comme">
                                    <label for="checkbox" title="Tout cocher comme" class="label-checkbox">
                                        <span class="check"></span>
                                        <span class="box"></span>
                                    </label>
                                </div>
                            </th>
                            <th><a href="#">Nom</a></th>
                            <th><a href="#">ID</a></th>
                            <th><a href="#">Profil par default</a></th>
                            <th><a href="#">Dernière modification</a></th>
                        </tr>
                    </tbody>
                </table>
            </div>
            <table class="tab_glpi" width="95%">
                <div class="d-flex justify-content-center my-3">
                    {!! $profils->links('layouts.pagination') !!}
                </div>
            </table>
            </table>
        </form>
    </main>
@endsection
