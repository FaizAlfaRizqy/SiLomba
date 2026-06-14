<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotifikasiController extends Controller
{
    public function index()
    {
        // For now, we will return dummy static data for the notifications
        // since there's no AdminNotification model specified yet.
        return view('admin.notifikasi');
    }
}
