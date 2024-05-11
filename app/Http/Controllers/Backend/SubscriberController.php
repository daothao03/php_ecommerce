<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\NewsLetterDataTable;
use App\Http\Controllers\Controller;
use App\Mail\NewsLetter as MailNewsLetter;
use App\Models\NewsLetter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(NewsLetterDataTable $dataTable)
    {
        return $dataTable->render('admin.subscriber.index');
    }

    public function sendEmail(Request $request)
    {
        $request->validate([
            'subject' => ['required'],
            'message' => ['required']
        ]);

        //pluck: lay hang loat
        $emails = NewsLetter::where('is_verified', 1)->pluck('email')->toArray();
        Mail::to($emails)->send(new MailNewsLetter($request->subject, $request->message));

        toastr('Mail has been send', 'success', 'success');

        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subcriber = NewsLetter::findOrFail($id);
        $subcriber->delete();

        return response(['status' => 'success', 'message' => 'deleted successfully']);
    }
}
