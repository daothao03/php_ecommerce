<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CodSetting;
use Illuminate\Http\Request;

class PaymentSettingController extends Controller
{
    public function index()
    {
        $codSetting = CodSetting::first();
        return view('admin.payment-settings.index', compact(
            'codSetting'
        ));
    }
}