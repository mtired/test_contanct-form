<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;


class ConfirmController extends Controller
{
    //
    public function index()
    {
        return view('confirm');
    }

    public function thanks(Request $request)
    {
        $contact = $request->only(
            [
                'first_name',
                'last_name',
                'gender',
                'email',
                'tel',
                'address',
                'building',
                'category_id',
                'detail',
            ]
        );

        Contact::create($contact);

        return view('thanks');
    }
}
