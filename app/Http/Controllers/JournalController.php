<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Journal;

class JournalController extends Controller
{
    public function index()
    {
       
        $journal = Journal::orderBy('created_at', 'desc')->paginate(15);
        return view('journal.index', ['journals' => $journal]);
   
    }

}
