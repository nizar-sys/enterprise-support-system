<?php

namespace App\Http\Controllers;

use App\Models\TAT;
use App\Http\Requests\RequestTat;

class TATController extends Controller
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
        $tat = TAT::orderByDesc('id')->get();

        return view('dashboard.tat.index', compact('tat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.tat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestTat $request)
    {
        $validated = $request->validated() + [
            'created_at' => now(),
        ];

        if ($request->hasFile('surat_keterangan_lulus')) {
            $fileName = 'skl-' . time() . '.' . $request->surat_keterangan_lulus->extension();
            $validated['surat_keterangan_lulus'] = $fileName;

            // move file
            $request->surat_keterangan_lulus->move(public_path('uploads/files'), $fileName);
        }

        if ($request->hasFile('tugas_akhir')) {
            $fileName = 'ta-' . time() . '.' . $request->tugas_akhir->extension();
            $validated['tugas_akhir'] = $fileName;

            // move file
            $request->tugas_akhir->move(public_path('uploads/files'), $fileName);
        }

        $tat = TAT::create($validated);

        return redirect(route('tat.index'))->with('success', 'Data tugas akhir terdahulu berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return TAT::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tat = TAT::findOrFail($id);

        return view('dashboard.tat.edit', compact('tat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestTat $request, $id)
    {
        $validated = $request->validated() + [
            'updated_at' => now(),
        ];

        $tat = TAT::findOrFail($id);
        $validated['surat_keterangan_lulus'] = $tat->surat_keterangan_lulus;

        if ($request->hasFile('surat_keterangan_lulus')) {
            $fileName = 'skl-' . time() . '.' . $request->surat_keterangan_lulus->extension();
            $validated['surat_keterangan_lulus'] = $fileName;

            // move file
            $request->surat_keterangan_lulus->move(public_path('uploads/files'), $fileName);

            // delete old file
            $oldPath = public_path('/uploads/files/' . $tat->surat_keterangan_lulus);
            if (file_exists($oldPath) && $tat->surat_keterangan_lulus != 'khs.png') {
                unlink($oldPath);
            }
        }

        $validated['tugas_akhir'] = $tat->tugas_akhir;

        if ($request->hasFile('tugas_akhir')) {
            $fileName = 'ta-' . time() . '.' . $request->tugas_akhir->extension();
            $validated['tugas_akhir'] = $fileName;

            // move file
            $request->tugas_akhir->move(public_path('uploads/files'), $fileName);

            // delete old file
            $oldPath = public_path('/uploads/files/' . $tat->tugas_akhir);
            if (file_exists($oldPath) && $tat->tugas_akhir != 'khs.png') {
                unlink($oldPath);
            }
        }
        $tat->update($validated);

        return redirect(route('tat.index'))->with('success', 'Data tugas akhir terdahulu berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tat = TAT::findOrFail($id);
        // delete old file
        $oldPath = public_path('/uploads/files/' . $tat->surat_keterangan_lulus);
        if (file_exists($oldPath) && $tat->surat_keterangan_lulus != 'surat_keterangan_lulus.png') {
            unlink($oldPath);
        }
        // delete old file
        $oldPath = public_path('/uploads/files/' . $tat->tugas_akhir);
        if (file_exists($oldPath) && $tat->tugas_akhir != 'tugas_akhir.png') {
            unlink($oldPath);
        }
        $tat->delete();

        return redirect(route('tat.index'))->with('success', 'Data tugas akhir terdahulu berhasil dihapus.');
    }
}
