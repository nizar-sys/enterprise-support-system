<?php

namespace App\Http\Controllers;

use App\Models\Logbook;
use Illuminate\Http\Request;
use App\Http\Requests\RequestLogbook;
use App\Models\Bimbingan;
use Illuminate\Support\Facades\Hash;

class LogbookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($guidanceId)
    {
        $guidance = Bimbingan::findOrFail($guidanceId);
        $logbooks = Logbook::orderByDesc('id')
        ->whereBimbinganId($guidanceId)
        ->get();

        return view('dashboard.logbooks.index', compact('logbooks', 'guidance'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($guidanceId)
    {
        $guidance = Bimbingan::findOrFail($guidanceId);
        return view('dashboard.logbooks.create', compact('guidance'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestLogbook $request, $guidanceId)
    {
        $validated = $request->validated() + [
            'bimbingan_id' => $guidanceId,
            'created_at' => now(),
        ];


        if($request->hasFile('progres')){
            $fileName = time() . '.' . $request->progres->extension();
            $validated['progres'] = $fileName;

            // move file
            $request->progres->move(public_path('uploads/files'), $fileName);
        }

        $logbook = Logbook::create($validated);

        return redirect(route('logbooks.index', $guidanceId))->with('success', 'Data catatan bimbingan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Logbook::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($guidanceId, $id)
    {
        $logbook = Logbook::findOrFail($id);
        $guidance = Bimbingan::findOrFail($guidanceId);

        return view('dashboard.logbooks.edit', compact('logbook', 'guidance'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestLogbook $request, $guidanceId, $id)
    {
        $validated = $request->validated() + [
            'updated_at' => now(),
        ];

        $logbook = Logbook::findOrFail($id);
        $validated['progres'] = $logbook->progres;

        if($request->hasFile('progres')){
            $fileName = time() . '.' . $request->progres->extension();
            $validated['progres'] = $fileName;

            // move file
            $request->progres->move(public_path('uploads/files'), $fileName);

            // delete old file
            $oldPath = public_path('/uploads/files/'.$logbook->progres);
            if(file_exists($oldPath) && $logbook->progres != 'progres.png'){
                unlink($oldPath);
            }
        }
        $logbook->update($validated);

        return redirect(route('logbooks.index', $guidanceId))->with('success', 'Data catatan bimbingan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($guidanceId, $id)
    {
        $logbook = Logbook::findOrFail($id);
        // delete old file
        $oldPath = public_path('/uploads/files/'.$logbook->progres);
        if(file_exists($oldPath) && $logbook->progres != 'progres.png'){
            unlink($oldPath);
        }
        $logbook->delete();

        return redirect(route('logbooks.index', $guidanceId))->with('success', 'Data catatan bimbingan berhasil dihapus.');
    }
}
