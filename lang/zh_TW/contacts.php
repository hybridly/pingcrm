<?php

return [
    'menuTitle' => '聯絡人',
    'attributes' => [
        'first_name' => '名字',
        'last_name' => '姓氏',
        'name' => '姓名',
        'organization_id' => '組織',
        'email' => 'E-mail',
        'phone' => '電話號碼',
        'address' => '地址',
        'city' => '城市',
        'region' => '省/州',
        'country' => '國家',
        'postal_code' => '郵遞區號',
    ],
    'index' => [
        'title' => '聯絡人',
        'header' => '聯絡人',
        'trashedLabel' => '顯示已刪除',
        'noTrashed' => '不包含已刪除',
        'withTrashed' => '包含已刪除',
        'onlyTrashed' => '僅顯示已刪除',
        'createContact' => '新增聯絡人',
        'createContactMobile' => '新增',
        'noneFound' => '沒有符合查詢的聯絡人。',
        'displayName' => ':last_name :first_name',
    ],
    'create' => [
        'title' => '新增聯絡人',
        'header' => '新增聯絡人',
        'createLabel' => '新增聯絡人',
        'successFlash' => '已新增聯絡人。',
    ],
    'edit' => [
        'header' => '編輯聯絡人 :name',
        'title' => ':last_name :first_name',
        'successFlash' => '已更新聯絡人。',
        'isDeleted' => '當前聯絡人已被刪除。',
        'deleteLabel' => '刪除聯絡人',
        'updateLabel' => '更新聯絡人',
    ],
    'delete' => [
        'confirmMessage' => '您確定要刪除此聯絡人嗎？',
        'successFlash' => '已刪除聯絡人。',
    ],
    'restore' => [
        'confirmMessage' => '您確定要恢復此聯絡人嗎？',
        'successFlash' => '已恢復聯絡人。',
    ],
];
