<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use App\Models\DocumentCategories;
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
                    ->OrWhere('tech', 'like', '%' . $query . '%')
                    ->OrWhere('date_creation', 'like', '%' . $query . '%')
                    ->OrWhere('date_expiration', 'like', '%' . $query . '%')
                    ->OrWhere('others', 'like', '%' . $query . '%')
                    ->OrWhere('domaintypes_id', '%' . $query . '%')
                    ->OrWhere('comment', 'like', '%' . $query . '%')
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
            <td valign="top">' . $row->filename . '</td>
            <td valign="top">' . $row->link . '</td>
            <td valign="top">' . $row->link . '</td>
            <td valign="top">' . DocumentCategories::findOrFail($row->documentcategories_id)->name . '</td>
            <td valign="top">' . $row->date_expiration . '</td>
            <td valign="top">' . $row->updated_at . '</td>
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
        $documentCategories = DocumentCategories::all();
        return view('front.DocumentForm')->with([
         'title' => $title,
         'header' => $header,
         'documentCategories' => $documentCategories
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
        Document::create($request->all());
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
