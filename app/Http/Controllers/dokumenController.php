<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Session;
use Redirect;
use App\Documents;

class dokumenController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Documents::all();
        return view('index',compact('documents'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $documents = new Documents;
        $documents->judul_dokumen = $request->get('judul_dokumen');
        $documents->no_surat_satu = $request->get('no_surat_satu');
        $documents->no_surat_dua = $request->get('no_surat_dua');
        $documents->hari_tanggal = $request->get('hari_tanggal');
        $documents->pic_satu = $request->get('pic_satu');
        $documents->pic_dua = $request->get('pic_dua');
        $documents->jangka_waktu = $request->get('jangka_waktu');
        $documents->file_upload = $request->file('file_upload');

        $rules = array(
            'judul_dokumen' => 'required',
            'file_upload' => 'required|max:10000|mimes:pdf,doc,docx,jpeg,png,jpg'
            );

        $file_upload = $request->file('file_upload');
        $tujuan_upload = 'document-upload';
        $file_upload->move($tujuan_upload, $file_upload->getClientOriginalName());
        $documents->save();
        return redirect('documents')->with('alert-success','Data berhasil ditambahkan!');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     	$documents = Documents::where('id', $id)->get();
    	return view('edit', compact('documents'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $documents = Documents::where('id', $id)->first();
        $documents->judul_dokumen = $request->judul_dokumen;
	    $documents->no_surat_satu = $request->no_surat_satu;
	    $documents->no_surat_dua = $request->no_surat_dua;
	    $documents->hari_tanggal = $request->hari_tanggal;
	    $documents->pic_satu = $request->pic_satu;
	    $documents->pic_dua = $request->pic_dua;
	    $documents->jangka_waktu = $request->jangka_waktu;
        $documents->file_upload = $request->file_upload;
	    $documents->save();
	    return redirect()->route('documents.index')->with('alert-success', 'Data berhasil diubah!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $documents = Documents::where('id', $id)->first();
        $documents->delete();

        return redirect()->route('documents.index');
    }

}
