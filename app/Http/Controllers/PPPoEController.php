<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PPPoEUser;

class PPPoEController extends Controller
{
    public function index()
    {
        $pppoeUsers = PPPoEUser::with(['user', 'package', 'odp'])->get();
        return view('admin.pppoe-users.index', compact('pppoeUsers'));
    }
}