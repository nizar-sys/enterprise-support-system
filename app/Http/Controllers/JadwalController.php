<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;
use App\Http\Requests\RequestJadwal;
use Illuminate\Support\Facades\Hash;

class JadwalController extends Controller
{

    public function __construct()
    {
        $this->middleware('role.excepts:pembina')->except(['index', 'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = Jadwal::orderByDesc('id')->get();

        return view('dashboard.schedules.index', compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.schedules.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestJadwal $request)
    {
        $validated = $request->validated() + [
            'created_at' => now(),
        ];

        $schedule = Jadwal::create($validated);

        return redirect(route('schedules.index'))->with('success', 'Data jadwal bimbingan ta berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Jadwal::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $schedule = Jadwal::findOrFail($id);

        return view('dashboard.schedules.edit', compact('schedule'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestJadwal $request, $id)
    {
        $validated = $request->validated() + [
            'updated_at' => now(),
        ];

        $schedule = Jadwal::findOrFail($id);

        $schedule->update($validated);

        return redirect(route('schedules.index'))->with('success', 'Data jadwal bimbingan ta berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $schedule = Jadwal::findOrFail($id);
        $schedule->delete();

        return redirect(route('schedules.index'))->with('success', 'Data jadwal bimbingan ta berhasil dihapus.');
    }
}
