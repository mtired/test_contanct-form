<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use Illuminate\Pagination\Paginator;

class AdminController extends Controller
{
    //
    public function index(Request $request)
    {
        // 検索ボタンが押された場合だけ search() を実行
        if ($request->has('search')) {
            return $this->search($request);
        }

        // 初期表示（リセット用）
        $categories = Category::all();
        $contacts = Contact::paginate(7);

        return view('admin', [
            'contacts' => $contacts,
            'categories' => $categories,
            'keyword' => null,
            'gender' => null,
            'category_id' => null,
            'date' => null,
        ]);
    }

    public function search(Request $request)
    {
        $categories = Category::all();

        // 単一検索ワード（名前 OR メール）
        $keyword = $request->input('keyword');

        // プルダウン情報
        $gender = $request->input('gender');
        $category_id = $request->input('category_id');
        $date = $request->input('date');

        // クエリ生成
        $query = Contact::query();

        // ------------------------------------------------
        // 1. 名前 / メールアドレス 検索（1つの入力欄）
        // ------------------------------------------------
        if (!empty($keyword)) {
            $query->where(function ($q) use ($keyword) {
                // 姓・名・フルネーム
                $q->where('first_name', 'LIKE', "%$keyword%")
                    ->orWhere('last_name', 'LIKE', "%$keyword%")
                    ->orWhereRaw("CONCAT(first_name, ' ', last_name) LIKE ?", ["%$keyword%"])
                    ->orWhereRaw("CONCAT(last_name, ' ', first_name) LIKE ?", ["%$keyword%"])
                    // メールアドレス
                    ->orWhere('email', 'LIKE', "%$keyword%");
            });
        }

        // ------------------------------------------------
        // 2. 性別検索
        // ------------------------------------------------
        if (!empty($gender) && $gender !== 'all') {
            $query->where('gender', $gender);
        }

        // ------------------------------------------------
        // 3. お問い合わせ種類検索
        // ------------------------------------------------
        if (!empty($category_id) && $category_id !== 'all') {
            $query->where('category_id', $category_id);
        }

        // ------------------------------------------------
        // 4. 日付検索（created_at）
        // ------------------------------------------------
        if (!empty($date)) {
            $query->whereDate('created_at', $date);
        }

        // ページネーション
        $contacts = $query->paginate(7)->appends($request->all());

        return view('admin', compact(
            'contacts',
            'categories',
            'keyword',
            'gender',
            'category_id',
            'date'
        ));
    }
}
