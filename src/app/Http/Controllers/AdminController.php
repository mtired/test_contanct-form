<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Pagination\Paginator;

class AdminController extends Controller
{
    //
    public function index()
    {
        $contacts = Contact::paginate(7);
        return view('admin', compact('contacts'));
    }
}
