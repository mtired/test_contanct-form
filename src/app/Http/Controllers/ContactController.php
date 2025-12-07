<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function index(Request $request)
    {
        $categories = Category::all();

        // 修正で戻ってきた場合（hidden の値が送られている場合）
        if ($request->all()) {
            $contact = $request->except('_token');
            return view('contact', compact('categories', 'contact'));
        }

        return view('contact', compact('categories'));
    }

    public function confirm(ContactRequest $request)
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
                'tel1',
                'tel2',
                'tel3',
            ]
        );

        // 電話番号を結合
        $contact['tel'] = $request->tel1 . $request->tel2 . $request->tel3;

        $category = Category::find($request->category_id);

        return view('confirm', compact('contact', 'category'));
    }
}
