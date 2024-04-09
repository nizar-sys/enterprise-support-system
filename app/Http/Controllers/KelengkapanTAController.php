<?php

namespace App\Http\Controllers;

use App\Models\KelengkapanTA;
use App\Http\Requests\RequestKelengkapanTA;

class KelengkapanTAController extends Controller
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
        $completeness = KelengkapanTA::orderByDesc('id')->get();

        return view('dashboard.completeness.index', compact('completeness'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.completeness.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestKelengkapanTA $request)
    {
        $validated = $request->validated() + [
            'created_at' => now(),
        ];

        if ($request->hasFile('khs')) {
            $fileName = time() . '-khs.' . $request->khs->extension();
            $validated['khs'] = $fileName;

            // move file
            $request->khs->move(public_path('uploads/files'), $fileName);
        }

        if ($request->hasFile('eprt')) {
            $fileName = time() . '-eprt.' . $request->eprt->extension();
            $validated['eprt'] = $fileName;

            // move file
            $request->eprt->move(public_path('uploads/files'), $fileName);
        }

        $completen = KelengkapanTA::create($validated);

        return redirect(route('completeness.index'))->with('success', 'Data kelengkapan tugas akhir berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return KelengkapanTA::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $completen = KelengkapanTA::findOrFail($id);

        return view('dashboard.completeness.edit', compact('completen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestKelengkapanTA $request, $id)
    {
        $validated = $request->validated() + [
            'updated_at' => now(),
        ];

        $completen = KelengkapanTA::findOrFail($id);
        $validated['khs'] = $completen->khs;

        if ($request->hasFile('khs')) {
            $fileName = time() . '-khs.' . $request->khs->extension();
            $validated['khs'] = $fileName;

            // move file
            $request->khs->move(public_path('uploads/files'), $fileName);

            // delete old file
            $oldPath = public_path('/uploads/files/' . $completen->khs);
            if (file_exists($oldPath) && $completen->khs != 'khs.png') {
                unlink($oldPath);
            }
        }

        $validated['eprt'] = $completen->eprt;

        if ($request->hasFile('eprt')) {
            $fileName = time() . '-eprt.' . $request->eprt->extension();
            $validated['eprt'] = $fileName;

            // move file
            $request->eprt->move(public_path('uploads/files'), $fileName);

            // delete old file
            $oldPath = public_path('/uploads/files/' . $completen->eprt);
            if (file_exists($oldPath) && $completen->eprt != 'eprt.png') {
                unlink($oldPath);
            }
        }
        $completen->update($validated);

        return redirect(route('completeness.index'))->with('success', 'Data kelengkapan tugas akhir berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $completen = KelengkapanTA::findOrFail($id);
        // delete old file
        $oldPath = public_path('/uploads/files/' . $completen->khs);
        if (file_exists($oldPath) && $completen->khs != 'khs.png') {
            unlink($oldPath);
        }
        $completen->delete();

        return redirect(route('completeness.index'))->with('success', 'Data kelengkapan tugas akhir berhasil dihapus.');
    }
}
