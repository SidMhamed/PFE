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
    public function index(Request $request)
    {
        if($request->search !== null){
            $title = 'GLPI-Documents';
            $header = 'Documents';
            $search = $request->search;
            $Documents = Document::orderBy('created_at', 'DESC')->where('id','like','%'.$search.'%')
                                  ->OrWhere('id','like','%'.$search.'%')->paginate(2);
            return view('front.Document')->with([
                'title' => $title,
                'header' => $header,
                'Documents' => $Documents
            ]);
        }else{
            $title = 'GLPI-Documents';
            $header = 'Documents';
            $Documents = Document::paginate(2);
            return view('front.Document')->with([
                'title' => $title,
                'header' => $header,
                'Documents' => $Documents
            ]);
        }

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
