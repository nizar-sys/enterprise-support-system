<?php

namespace App\Http\Controllers;

use App\Models\Tugasakhir;
use App\Http\Requests\RequestTugasakhir;
use App\Models\Bimbingan;
use App\Models\KelengkapanTA;
use App\Models\Lecturer;
use App\Models\SKTA;
use App\Models\TAT;
use App\Models\TopikTugasAkhir;

class TugasakhirController extends Controller
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
        $projects = Tugasakhir::orderByDesc('id')->get();

        return view('dashboard.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lecturers = Lecturer::orderByDesc('id')->get();
        $topics = TopikTugasAkhir::orderByDesc('id')->get();
        $guidances = Bimbingan::orderByDesc('id')->get();
        $completeness = KelengkapanTA::orderByDesc('id')->get();
        $skta = SKTA::orderByDesc('id')->get();
        $tat = TAT::orderByDesc('id')->get();

        return view('dashboard.projects.create', compact('lecturers', 'topics', 'guidances', 'completeness', 'skta', 'tat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestTugasakhir $request)
    {
        $validated = $request->validated() + [
            'created_at' => now(),
        ];

        $project = Tugasakhir::create($validated);

        return redirect(route('projects.index'))->with('success', 'Data tugas akhir berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Tugasakhir::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Tugasakhir::findOrFail($id);
        $lecturers = Lecturer::orderByDesc('id')->get();
        $topics = TopikTugasAkhir::orderByDesc('id')->get();
        $guidances = Bimbingan::orderByDesc('id')->get();
        $completeness = KelengkapanTA::orderByDesc('id')->get();
        $skta = SKTA::orderByDesc('id')->get();
        $tat = TAT::orderByDesc('id')->get();

        return view('dashboard.projects.edit', compact('project', 'lecturers', 'topics', 'guidances', 'completeness', 'skta', 'tat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestTugasakhir $request, $id)
    {
        $validated = $request->validated() + [
            'updated_at' => now(),
        ];

        $project = Tugasakhir::findOrFail($id);

        $project->update($validated);

        return redirect(route('projects.index'))->with('success', 'Data tugas akhir berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Tugasakhir::findOrFail($id);
        $project->delete();

        return redirect(route('projects.index'))->with('success', 'Data tugas akhir berhasil dihapus.');
    }
}
