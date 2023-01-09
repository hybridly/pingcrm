<?php

return [
    'menuTitle' => '連絡先',
    'attributes' => [
        'first_name' => '氏名（名）',
        'last_name' => '氏名（姓）',
        'name' => '氏名',
        'organization_id' => '組織',
        'email' => 'メールアドレス',
        'phone' => '電話番号',
        'address' => '住所',
        'city' => '市区町村',
        'region' => '都道府県・地域',
        'country' => '国',
        'postal_code' => '郵便番号',
    ],
    'index' => [
        'title' => '連絡先',
        'header' => '連絡先',
        'trashedLabel' => '削除された連絡先の表示',
        'noTrashed' => '表示しない',
        'withTrashed' => '表示する',
        'onlyTrashed' => '削除された連絡先のみ表示する',
        'createContact' => '新規作成',
        'createContactMobile' => '新規作成',
        'noneFound' => '連絡先は登録されていません',
        'displayName' => ':last_name :first_name',
    ],
    'create' => [
        'title' => '連絡先登録',
        'header' => '連絡先登録',
        'createLabel' => '登録する',
        'successFlash' => '連絡先を登録しました。',
    ],
    'edit' => [
        'header' => '連絡先編集 :name',
        'title' => ':last_name :first_name',
        'successFlash' => '連絡先を更新しました。',
        'isDeleted' => '削除されてた連絡先です。',
        'deleteLabel' => '削除する',
        'updateLabel' => '更新する',
    ],
    'delete' => [
        'confirmMessage' => '削除してもよろしいでしょうか？',
        'successFlash' => '連絡先を削除しました。',
    ],
    'restore' => [
        'confirmMessage' => '復元してもよろしいでしょうか？',
        'successFlash' => '連絡先を復元しました。',
    ],
];
