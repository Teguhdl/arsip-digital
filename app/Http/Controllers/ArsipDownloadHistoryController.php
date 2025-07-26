<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArsipDownloadHistory;

class ArsipDownloadHistoryController extends Controller
{
    public function index()
    {
        $histories = ArsipDownloadHistory::with(['arsip', 'user'])
            ->orderBy('downloaded_at', 'desc')
            ->paginate(20); 

        return view('main.arsip.history', compact('histories'));
    }
}
