<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\FooterTwoDataTable;
use App\Http\Controllers\Controller;
use App\Models\FooterTitle;
use App\Models\FooterTwo;
use Illuminate\Http\Request;

class FooterTwoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FooterTwoDataTable $dataTable)
    {
        $title = FooterTitle::first();
        return $dataTable->render('admin.footer.footer-two.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.footer.footer-two.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:100'],
            'url' => ['required', 'url'],
            'status' => ['required']
        ]);

        $footer = new FooterTwo();
        $footer->name = $request->name;
        $footer->url = $request->url;
        $footer->status = $request->status;

        $footer->save();

        toastr('Created Successfully!', 'success', 'success');

        return redirect()->route('admin.footer-two.index');
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
        $footer = FooterTwo::findOrFail($id);
        return view('admin.footer.footer-two.edit', compact('footer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'max:100'],
            'url' => ['required', 'url'],
            'status' => ['required']
        ]);

        $footer = FooterTwo::findOrFail($id);
        $footer->name = $request->name;
        $footer->url = $request->url;
        $footer->status = $request->status;

        $footer->save();

        toastr('Created Successfully!', 'success', 'success');

        return redirect()->route('admin.footer-two.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $footer = FooterTwo::findOrFail($id);
        $footer->delete();

        return response(['status' => 'success', 'message' => 'Deleted successfully!']);
    }

    public function changeStatus(Request $request)
    {
        $footer = FooterTwo::findOrFail($request->id);
        $footer->status = $request->status == 'true' ? 1 : 0;

        $footer->save();

        return response(['message' => 'Status has been updated!']);
    }

    public function changeTitle(Request $request)
    {
        $request->validate([
            'title' => ['required', 'max:100']
        ]);

        FooterTitle::updateOrCreate(
            ['id' => 1],
            ['footer_two_title' => $request->title]
        );

        toastr('Updated Successfully', 'success', 'success');

        return redirect()->back();
    }
}
