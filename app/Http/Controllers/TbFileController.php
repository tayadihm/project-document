<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TbFileController;

class TbFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $file = TbFile::paginate(4);
        return view('file.index',compact('file'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $file = new TbFile;
        return view('file.create',compact('file'))->renderSection()['content'];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $maxId = \DB::table('upload_documents')->max('id') + 1;
        try{
            $uploaded = $request->file('file');
            $file = new TbFile;
            $file->id = $maxId;
            $file->nama = $request->nama;
            $file->file = $maxId."-".$uploaded->getClientOriginalName();
            $file->save();
 
           $uploaded->move(public_path('documents/'),$file->file); //Folder lokasi File
           \Session::flash('flash_message','Dokumen berhasil ditambahkan');
       }catch(\Exception $e){
            echo $e->getMessage();
            echo "<br>".$e->getLine();
            die();
            }
            $response = array(
            'status' => 'success',
            'url' => action('TbFileController@index'),
    );
    return $response;
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = TbFile::findOrFail($id);
        unlink(public_path('documents/').$file->file); //menghapus dokumen pada folder terkait
        $file->delete();
 
        \Session::flash('flash_message','Dokumen berhasil di hapus');
        return redirect()->action('TbFileController@index');
    }
}
