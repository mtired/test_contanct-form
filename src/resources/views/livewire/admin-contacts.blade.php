<div>
    <!-- ▼ Livewire 検索フォーム -->
    <div class="search-area">
        <form wire:submit.prevent="search" class="search-form">
            <div class="search-row">
                <input type="text" class="search-input"
                    placeholder="名前やメールアドレス"
                    wire:model.defer="formKeyword">

                <select class="search-select" wire:model.defer="formGender">
                    <option value="" disabled selected>性別</option>
                    <option value="all">全て</option>
                    <option value="1">男性</option>
                    <option value="2">女性</option>
                    <option value="3">その他</option>
                </select>

                <select class="search-select" wire:model.defer="formCategory">
                    <option value="">お問い合わせの種類</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->content }}</option>
                    @endforeach
                </select>

                <input type="date" class="search-input" wire:model.defer="formDate">

                <button class="search-btn" type="submit">検索</button>
            </div>
        </form>

        <button class="reset-btn" wire:click="resetFilters">リセット</button>
    </div>
    <!-- エクスポート（そのまま） -->
    <div class="table-header">
        <button class="export-btn">エクスポート</button>
        <div class="pagination-wrapper">
            {{ $this->contacts->links() }}
        </div>
    </div>

    <!-- 一覧 -->
    <table class="admin-table">
        <thead>
            <tr>
                <th>お名前</th>
                <th>性別</th>
                <th>メールアドレス</th>
                <th>お問い合わせの種類</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($this->contacts as $contact)
            <tr>
                <td>{{ $contact->first_name }} {{ $contact->last_name }}</td>
                <td>
                    @if($contact->gender == 1) 男性
                    @elseif($contact->gender == 2) 女性
                    @else その他
                    @endif
                </td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->category->content }}</td>
                <td>
                    <button class="detail-btn"
                        wire:click="openModal({{ $contact->id }})">
                        詳細
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- ▼ モーダル（ここが必要！） -->
    @if($showModal && $modalContact)
    <div class="modal-overlay">
        <div class="modal-card">

            <!-- 閉じるボタン -->
            <button class="modal-close" wire:click="closeModal">×</button>

            <table class="modal-table">
                <tr>
                    <th>お名前</th>
                    <td>{{ $modalContact->first_name }}　{{ $modalContact->last_name }}</td>
                </tr>

                <tr>
                    <th>性別</th>
                    <td>
                        @if($modalContact->gender == 1) 男性
                        @elseif($modalContact->gender == 2) 女性
                        @else その他
                        @endif
                    </td>
                </tr>

                <tr>
                    <th>メールアドレス</th>
                    <td>{{ $modalContact->email }}</td>
                </tr>

                <tr>
                    <th>電話番号</th>
                    <td>{{ $modalContact->tel }}</td>
                </tr>

                <tr>
                    <th>住所</th>
                    <td>{{ $modalContact->address }}</td>
                </tr>

                <tr>
                    <th>建物名</th>
                    <td>{{ $modalContact->building }}</td>
                </tr>

                <tr>
                    <th>お問い合わせの種類</th>
                    <td>{{ $modalContact->category->content }}</td>
                </tr>

                <tr>
                    <th>お問い合わせ内容</th>
                    <td class="modal-multiline">{!! nl2br(e($modalContact->detail)) !!}</td>
                </tr>
            </table>

            <div class="modal-footer">
                <button wire:click="delete" class="modal-delete-btn">削除</button>
            </div>

        </div>
    </div>
    @endif
</div>