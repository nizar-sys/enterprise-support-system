<?php

namespace App\Http\Controllers;

use App\Models\Bimbingan;
use Illuminate\Http\Request;
use App\Http\Requests\RequestBimbingan;
use App\Models\Jadwal;
use App\Models\Lecturer;
use Illuminate\Support\Facades\Hash;

class BimbinganController extends Controller
{

    public function __construct()
    {
        $this->middleware('role.excepts:pembina,dosen')->except('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guidances = Bimbingan::orderByDesc('id')->get();

        return view('dashboard.guidances.index', compact('guidances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $schedules = Jadwal::orderByDesc('id')->get();
        $lecturers = Lecturer::orderByDesc('id')->get();
        return view('dashboard.guidances.create', compact('schedules', 'lecturers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestBimbingan $request)
    {
        $validated = $request->validated() + [
            'created_at' => now(),
        ];

        $guidance = Bimbingan::create($validated);

        return redirect(route('guidances.index'))->with('success', 'Data bimbingan tugas akhir berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Bimbingan::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guidance = Bimbingan::findOrFail($id);
        $schedules = Jadwal::orderByDesc('id')->get();
        $lecturers = Lecturer::orderByDesc('id')->get();

        return view('dashboard.guidances.edit', compact('guidance', 'schedules', 'lecturers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestBimbingan $request, $id)
    {
        $validated = $request->validated() + [
            'updated_at' => now(),
        ];

        $guidance = Bimbingan::findOrFail($id);

        $guidance->update($validated);

        return redirect(route('guidances.index'))->with('success', 'Data bimbingan tugas akhir berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guidance = Bimbingan::findOrFail($id);
        $guidance->delete();

        return redirect(route('guidances.index'))->with('success', 'Data bimbingan tugas akhir berhasil dihapus.');
    }
}
