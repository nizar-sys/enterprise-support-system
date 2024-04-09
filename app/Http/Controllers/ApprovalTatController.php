<?php

namespace App\Http\Controllers;

use App\Models\ApprovalTat;
use App\Http\Requests\RequestApprovalTat;
use App\Models\TAT;

class ApprovalTatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($tatId)
    {
        $tat = TAT::findOrFail($tatId);
        $approvalTat = ApprovalTat::orderByDesc('id')
        ->whereTatId($tatId)
        ->get();

        return view('dashboard.approval_tat.index', compact('approvalTat', 'tat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($tatId)
    {
        $tat = TAT::findOrFail($tatId);
        return view('dashboard.approval_tat.create', compact('tat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestApprovalTat $request, $tatId)
    {
        $validated = $request->validated() + [
            'tat_id' => $tatId,
            'created_at' => now(),
        ];

        $approvalTat = ApprovalTat::create($validated);

        return redirect(route('approval-tat.index', $tatId))->with('success', 'Data approval tugas akhir berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return ApprovalTat::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($tatId, $id)
    {
        $approvalTat = ApprovalTat::findOrFail($id);
        $tat = TAT::findOrFail($tatId);

        return view('dashboard.approval_tat.edit', compact('approvalTat', 'tat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestApprovalTat $request, $tatId, $id)
    {
        $validated = $request->validated() + [
            'updated_at' => now(),
        ];

        $approvalTat = ApprovalTat::findOrFail($id);

        $approvalTat->update($validated);

        return redirect(route('approval-tat.index', $tatId))->with('success', 'Data approval tugas akhir berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($tatId, $id)
    {
        $approvalTat = ApprovalTat::findOrFail($id);
        $approvalTat->delete();

        return redirect(route('approval-tat.index', $tatId))->with('success', 'Data approval tugas akhir berhasil dihapus.');
    }
}
