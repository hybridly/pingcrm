<?php

return [
    'attributes' => [
        'first_name' => '氏名（名）',
        'last_name' => '氏名（姓）',
        'name' => '氏名',
        'email' => 'メールアドレス',
        'password' => 'パスワード',
        'role' => '権限',
        'photo_path' => 'プロフィール画像',
    ],
    'index' => [
        'title' => 'ユーザー管理',
        'header' => 'ユーザー管理',
        'trashedLabel' => '削除されたユーザーの表示',
        'noTrashed' => '表示しない',
        'withTrashed' => '表示する',
        'onlyTrashed' => '削除されたユーザーのみ表示する',
        'roleLabel' => '権限',
        'allRoles' => '全ての権限',
        'userRole' => 'ユーザー',
        'ownerRole' => '管理者',
        'createUser' => '新規作成',
        'createUserMobile' => '新規作成',
        'noneFound' => 'ユーザーは登録されていません',
        'displayName' => ':last_name :first_name',
    ],
    'create' => [
        'header' => 'ユーザー登録',
        'title' => 'ユーザー登録',
        'createLabel' => '登録する',
        'successFlash' => 'ユーザーを登録しました。',
    ],
    'edit' => [
        'header' => 'ユーザー編集 :name',
        'title' => ':last_name :first_name',
        'successFlash' => 'ユーザーを更新しました。',
        'isDeleted' => '削除されてたユーザーです。',
        'deleteLabel' => '削除する',
        'updateLabel' => '更新する',
    ],
    'delete' => [
        'confirmMessage' => '削除してもよろしいでしょうか？',
        'successFlash' => 'ユーザーを削除しました。',
    ],
    'restore' => [
        'confirmMessage' => '復元してもよろしいでしょうか？',
        'successFlash' => 'ユーザーを復元しました。',
    ],
];
