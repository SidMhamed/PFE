<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use App\Models\DocumentCategories;
use App\Models\Documenttypes;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $title = 'GLPI-Documents';
            $header = 'Documents';
            $Documents = Document::paginate(2);
            return view('front.Document')->with([
                'title' => $title,
                'header' => $header,
                'Documents' => $Documents
            ]);
    }


    function search(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            if ($query != '') {
                $data = Document::where('id', 'like', '%' . $query . '%')
                    ->OrWhere('name', 'like', '%' . $query . '%')
                    ->OrWhere('filename', 'like', '%' . $query . '%')
                    ->OrWhere('Comment', 'like', '%' . $query . '%')
                    ->OrWhere('updated_at', 'like', '%' . $query . '%')
                    ->OrWhere('created_at', 'like', '%' . $query . '%')
                    ->get();

            } else {
                $data = Document::orderBy('created_at', 'DESC')->get();
            }
            $total_row = $data->count();
            if ($total_row > 0) {
                foreach ($data as $row) {
                    $output .= '
           <tr>
            <td valign="top"><a href="' . route('Domaines.edit', $row->id) . '">' . $row->name . '</a></td>
            <td valign="top"> <img style="margin-left:3px; margin-right:6px;vertical-align: middle;" src="/public/icones/'.Documenttypes::findOrFail($row->documenttypes_id)->icon .'"><a href="/public/filename/'.$row->filename.'">'. $row->filename . '</a></td>
            <td valign="top">' . Documenttypes::findOrFail($row->documenttypes_id)->name . '</td>
            <td valign="top">' . $row->Comment . '</td>
           </tr>
           ';
                }
            } else {
                $output = '
          <tr>
           <td align="center" colspan="5" valign="top">Aucune donnée disponible</td>
          </tr>
          ';
            }
            $data = array(
                'table_data' => $output,
                'total_data' => $total_row,
            );
        }
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'GLPI-Documents';
        $header = 'Documents';
        $documenttypes = Documenttypes::all();
        return view('front.DocumentForm')->with([
         'title' => $title,
         'header' => $header,
         'documenttypes' => $documenttypes
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = '';
        if($request->hasFile('filename')){
            $file = $request->file('filename');
            $name = $file->getClientOriginalName();
            $file->move(public_path('filename'), $name);
        }
        Document::create([
            'name' => $request -> name,
            'filename' => $name,
            'documenttypes_id' => $request -> documenttypes_id,
            'Comment' => $request -> Comment,
            'users_id' => $request -> users_id,
        ]);
        return redirect()->route('Document.index')->with(['success' => 'Élément ajouté']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        //
    }
}
