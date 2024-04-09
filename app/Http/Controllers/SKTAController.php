<?php

namespace App\Http\Controllers;

use App\Models\SKTA;
use App\Http\Requests\RequestSKTA;

class SKTAController extends Controller
{
    public function __construct()
    {
        $this->middleware('role.excepts:pembina,dosen')->except(['index', 'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skta = SKTA::orderByDesc('id')->get();

        return view('dashboard.skta.index', compact('skta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.skta.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestSKTA $request)
    {
        $validated = $request->validated() + [
            'created_at' => now(),
        ];

        if ($request->hasFile('surat')) {
            $fileName = time() . '.' . $request->surat->extension();
            $validated['surat'] = $fileName;

            // move file
            $request->surat->move(public_path('uploads/files'), $fileName);
        }

        $skta = SKTA::create($validated);

        return redirect(route('skta.index'))->with('success', 'Surat keterangan tugas akhir berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return SKTA::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $skta = SKTA::findOrFail($id);

        return view('dashboard.skta.edit', compact('skta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestSKTA $request, $id)
    {
        $validated = $request->validated() + [
            'updated_at' => now(),
        ];

        $skta = SKTA::findOrFail($id);
        $validated['surat'] = $skta->surat;

        if ($request->hasFile('surat')) {
            $fileName = time() . '.' . $request->surat->extension();
            $validated['surat'] = $fileName;

            // move file
            $request->surat->move(public_path('uploads/files'), $fileName);

            // delete old file
            $oldPath = public_path('/uploads/files/' . $skta->surat);
            if (file_exists($oldPath) && $skta->surat != 'khs.png') {
                unlink($oldPath);
            }
        }
        $skta->update($validated);

        return redirect(route('skta.index'))->with('success', 'Surat keterangan tugas akhir berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $skta = SKTA::findOrFail($id);
        // delete old file
        $oldPath = public_path('/uploads/files/' . $skta->surat);
        if (file_exists($oldPath) && $skta->surat != 'surat.png') {
            unlink($oldPath);
        }
        $skta->delete();

        return redirect(route('skta.index'))->with('success', 'Surat keterangan tugas akhir berhasil dihapus.');
    }
}
