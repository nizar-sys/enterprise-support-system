<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use Illuminate\Http\Request;
use App\Http\Requests\RequestLecturer;
use Illuminate\Support\Facades\Hash;

class LecturerController extends Controller
{
    public function __construct()
    {
        $this->middleware('roles:admin')->except(['index', 'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lecturers = Lecturer::orderByDesc('id')->get();

        return view('dashboard.lecturers.index', compact('lecturers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.lecturers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestLecturer $request)
    {
        $validated = $request->validated() + [
            'created_at' => now(),
        ];

        $lecturer = Lecturer::create($validated);

        return redirect(route('lecturers.index'))->with('success', 'Data dosen berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Lecturer::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lecturer = Lecturer::findOrFail($id);

        return view('dashboard.lecturers.edit', compact('lecturer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestLecturer $request, $id)
    {
        $validated = $request->validated() + [
            'updated_at' => now(),
        ];

        $lecturer = Lecturer::findOrFail($id);

        $lecturer->update($validated);

        return redirect(route('lecturers.index'))->with('success', 'Data dosen berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lecturer = Lecturer::findOrFail($id);
        $lecturer->delete();

        return redirect(route('lecturers.index'))->with('success', 'Data dosen berhasil dihapus.');
    }
}
