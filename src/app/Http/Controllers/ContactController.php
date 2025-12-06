<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Category;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function index()
    {
        $categories = Category::all();
        return view('contact', compact('categories'));
    }

    public function confirm(Request $request)
    {
        $contact = $request->only(
            [
                'first_name',
                'last_name',
                'gender',
                'email',
                'address',
                'building',
                'category_id',
                'detail',
            ]
        );

        // 電話番号を結合
        $contact['tel'] = $request->tel1 . $request->tel2 . $request->tel3;

        return view('confirm', compact('contact'));
    }
}
