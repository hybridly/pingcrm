<?php

return [
    'attributes' => [
        'first_name' => '名字',
        'last_name' => '姓氏',
        'name' => '姓名',
        'email' => 'E-mail',
        'password' => '密碼',
        'role' => '帳戶類型',
        'photo_path' => '頭像',
    ],
    'index' => [
        'title' => '用戶',
        'header' => '用戶',
        'trashedLabel' => '顯示已刪除',
        'noTrashed' => '不包含已刪除',
        'withTrashed' => '包含已刪除',
        'onlyTrashed' => '僅顯示已刪除',
        'roleLabel' => '帳戶類型',
        'allRoles' => '帳戶類型',
        'userRole' => '用戶',
        'ownerRole' => '管理員',
        'createUser' => '新增用戶',
        'createUserMobile' => '新增',
        'noneFound' => '沒有符合查詢的用戶。',
        'displayName' => ':last_name :first_name',
    ],
    'create' => [
        'title' => '新增用戶',
        'header' => '新增用戶',
        'createLabel' => '新增用戶',
        'successFlash' => '已新增用戶。',
    ],
    'edit' => [
        'header' => '編輯用戶 :name',
        'title' => ':last_name :first_name',
        'successFlash' => '已更新用戶。',
        'isDeleted' => '當前用戶已被刪除。',
        'deleteLabel' => '刪除用戶',
        'updateLabel' => '更新用戶',
    ],
    'delete' => [
        'confirmMessage' => '您確定要刪除此用戶嗎？',
        'successFlash' => '已刪除用戶。',
    ],
    'restore' => [
        'confirmMessage' => '您確定要恢復此用戶嗎？',
        'successFlash' => '已恢復用戶。',
    ],
];
