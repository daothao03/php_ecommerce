<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\FooterSocialDataTable;
use App\Http\Controllers\Controller;
use App\Models\FooterSocial;
use Illuminate\Http\Request;

class FooterSocialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FooterSocialDataTable $dataTable)
    {
        return $dataTable->render('admin.footer.footer-social.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.footer.footer-social.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'icon' => ['required', 'max:200'],
            'name' => ['required', 'max:200'],
            'url' => ['required', 'url'],
            'status' => ['required'],
        ]);

        $social = new FooterSocial();
        $social->icon = $request->icon;
        $social->name = $request->name;
        $social->url = $request->url;
        $social->status = $request->status;

        $social->save();

        toastr('Created Successfully!', 'success', 'success');

        return redirect()->route('admin.footer-social.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $social = FooterSocial::findOrFail($id);
        return view('admin.footer.footer-social.edit', compact('social'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'icon' => ['required', 'max:200'],
            'name' => ['required', 'max:200'],
            'url' => ['required', 'url'],
            'status' => ['required'],
        ]);

        $social = FooterSocial::findOrFail($id);
        $social->icon = $request->icon;
        $social->name = $request->name;
        $social->url = $request->url;
        $social->status = $request->status;

        $social->save();

        toastr('Updated Successfully!', 'success', 'success');

        return redirect()->route('admin.footer-social.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $social = FooterSocial::findOrFail($id);
        $social->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }

    public function changeStatus(Request $request)
    {
        $social = FooterSocial::findOrFail($request->id);

        $social->status = $request->status == 'true' ? 1 : 0;
        $social->save();

        return response(['message' => 'Status has been updated!']);
    }
}
