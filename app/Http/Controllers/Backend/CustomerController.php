<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\CustomerDataTable;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(CustomerDataTable $dataTable) {
        return $dataTable->render('admin.customer.index');
    }

    public function changeStatus(Request $request) {
        $user = User::findOrFail($request->id);

        $user->status = $request->status == 'true' ? 'active' : 'inactive';

        $user->save();

        return response(['message' => 'Status has been updated!']);
    }
}