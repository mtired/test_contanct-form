<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Contact;
use App\Models\Category;

class AdminContacts extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    // ▼ 検索フォームの入力値（ボタン押すまで使わない）
    public $formKeyword = '';
    public $formGender = '';
    public $formCategory = '';
    public $formDate = '';

    // ▼ 実際に検索に使う値（ボタンを押した時だけ更新）
    public $keyword = '';
    public $gender = '';
    public $category_id = '';
    public $date = '';

    public $showModal = false;
    public $modalContact = null;

    public function search()
    {
        // フォームの値を検索用プロパティにコピー
        $this->keyword = $this->formKeyword;
        $this->gender = $this->formGender;
        $this->category_id = $this->formCategory;
        $this->date = $this->formDate;

        // ページネーションを 1 ページ目へ戻す
        $this->resetPage();
    }

    public function resetFilters()
    {
        // フォームの値をクリア
        $this->reset(['formKeyword', 'formGender', 'formCategory', 'formDate']);

        // 検索条件もクリア
        $this->reset(['keyword', 'gender', 'category_id', 'date']);

        $this->resetPage();
    }

    public function openModal($id)
    {
        $this->modalContact = Contact::with('category')->find($id);
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function delete()
    {
        if ($this->modalContact) {
            $this->modalContact->delete();
        }
        $this->showModal = false;
    }

    // ▼ 検索処理（実際の検索はここだけ）
    public function getContactsProperty()
    {
        $query = Contact::with('category');

        if ($this->keyword) {
            $q = $this->keyword;
            $query->where(function ($sub) use ($q) {
                $sub->where('first_name', 'like', "%$q%")
                    ->orWhere('last_name', 'like', "%$q%")
                    ->orWhere('email', 'like', "%$q%")
                    ->orWhereRaw("CONCAT(first_name, ' ', last_name) LIKE ?", ["%$q%"])
                    ->orWhereRaw("CONCAT(last_name, ' ', first_name) LIKE ?", ["%$q%"]);
            });
        }

        if ($this->gender && $this->gender !== 'all') {
            $query->where('gender', $this->gender);
        }

        if ($this->category_id) {
            $query->where('category_id', $this->category_id);
        }

        if ($this->date) {
            $query->whereDate('created_at', $this->date);
        }

        return $query->paginate(7);
    }

    public function render()
    {
        return view('livewire.admin-contacts', [
            'categories' => Category::all(),
        ]);
    }
}
