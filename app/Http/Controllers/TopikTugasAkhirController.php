<?php

namespace App\Http\Controllers;

use App\Models\TopikTugasAkhir;
use Illuminate\Http\Request;
use App\Http\Requests\RequestTopikTugasAkhir;
use Illuminate\Support\Facades\Hash;

class TopikTugasAkhirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics = TopikTugasAkhir::orderByDesc('id')->get();

        return view('dashboard.topics.index', compact('topics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.topics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestTopikTugasAkhir $request)
    {
        $validated = $request->validated() + [
            'created_at' => now(),
        ];

        $topic = TopikTugasAkhir::create($validated);

        return redirect(route('topics.index'))->with('success', 'Data topik tugas akhir berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return TopikTugasAkhir::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $topic = TopikTugasAkhir::findOrFail($id);

        return view('dashboard.topics.edit', compact('topic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestTopikTugasAkhir $request, $id)
    {
        $validated = $request->validated() + [
            'updated_at' => now(),
        ];

        $topic = TopikTugasAkhir::findOrFail($id);

        $topic->update($validated);

        return redirect(route('topics.index'))->with('success', 'Data topik tugas akhir berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $topic = TopikTugasAkhir::findOrFail($id);
        $topic->delete();

        return redirect(route('topics.index'))->with('success', 'Data topik tugas akhir berhasil dihapus.');
    }
}
