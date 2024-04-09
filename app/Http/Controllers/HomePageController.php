<?php

namespace App\Http\Controllers;

use App\Models\HomePage;
use App\Http\Requests\RequestHomePage;

class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $homePages = HomePage::orderByDesc('id')->get();

        return view('dashboard.home_pages.index', compact('homePages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.home_pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestHomePage $request)
    {
        $validated = $request->validated() + [
            'created_at' => now(),
        ];

        $homepage = HomePage::create($validated);

        return redirect(route('home-pages.index'))->with('success', 'Data halaman berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return HomePage::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $homepage = HomePage::findOrFail($id);

        return view('dashboard.home_pages.edit', compact('homepage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestHomePage $request, $id)
    {
        $validated = $request->validated() + [
            'updated_at' => now(),
        ];

        $homepage = HomePage::findOrFail($id);

        $homepage->update($validated);

        return redirect(route('home-pages.index'))->with('success', 'Data halaman berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $homepage = HomePage::findOrFail($id);

        $homepage->delete();

        return redirect(route('home-pages.index'))->with('success', 'Data halaman berhasil dihapus.');
    }
}
