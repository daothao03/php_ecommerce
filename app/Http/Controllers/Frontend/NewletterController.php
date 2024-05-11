<?php

namespace App\Http\Controllers\Frontend;

use App\Helper\MailHelper;
use App\Http\Controllers\Controller;
use App\Mail\SubscriptionVerification;
use App\Models\NewsLetter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class NewletterController extends Controller
{

    public function newLetter(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email']
        ]);

        $existsubscribers = NewsLetter::where('email', $request->email)->first();

        if (!empty($existsubscribers)) {
            if ($existsubscribers->is_verified == 0) {
                $existsubscribers->verified_token = \Str::random(25);
                $existsubscribers->save();

                MailHelper::mailConfig();
                Mail::to($existsubscribers->email)->send(new SubscriptionVerification($existsubscribers));

                return response(['status' => 'success', 'message' => 'Hãy mở hộp thư để xác minh']);
            } elseif ($existsubscribers->is_verified == 1) {
                return response(['status' => 'error', 'message' => 'Email đã đăng ký nhận bản tin trước đó']);
            }
        } else {
            $subscriber = new NewsLetter();
            $subscriber->email = $request->email;
            $subscriber->verified_token = \Str::random(25);
            $subscriber->is_verified = 0;

            $subscriber->save();

            MailHelper::mailConfig();
            Mail::to($subscriber->email)->send(new SubscriptionVerification($subscriber));

            return response(['status' => 'success', 'message' => 'Hãy mở hộp thư để xác minh']);
        }
    }

    public function newsLetterEmailVarify(string $token)
    {
        $verify = NewsLetter::where('verified_token', $token)->first();
        if ($verify) {
            $verify->verified_token = 'verified';
            $verify->is_verified = 1;

            $verify->save();
            toastr('Email verification successfully', 'success', 'success');
            return redirect()->route('home');
        } else {
            toastr('Invalid token', 'error', 'Error');
            return redirect()->route('home');
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
    }
}