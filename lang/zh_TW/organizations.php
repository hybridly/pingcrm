<?php

return [
    'menuTitle' => '組織',
    'attributes' => [
        'name' => '姓名',
        'email' => 'E-mail',
        'phone' => '電話號碼',
        'address' => '地址',
        'city' => '城市',
        'region' => '省/州',
        'country' => '國家',
        'postal_code' => '郵遞區號',
    ],
    'index' => [
        'title' => '組織',
        'header' => '組織',
        'trashedLabel' => '顯示已刪除',
        'noTrashed' => '不包含已刪除',
        'withTrashed' => '包含已刪除',
        'onlyTrashed' => '僅顯示已刪除',
        'createOrganization' => '新增組織',
        'createOrganizationMobile' => '新增',
        'noneFound' => '沒有符合查詢的組織。',
    ],
    'create' => [
        'title' => '新增組織',
        'header' => '新增組織',
        'createLabel' => '新增組織',
        'successFlash' => '已新增組織。',
    ],
    'edit' => [
        'header' => '編輯組織 :name',
        'title' => ':name',
        'successFlash' => '已更新組織。',
        'isDeleted' => '當前組織已被刪除。',
        'deleteLabel' => '刪除組織',
        'updateLabel' => '更新組織',
    ],
    'delete' => [
        'confirmMessage' => '您確定要刪除此組織嗎？',
        'successFlash' => '已刪除組織。',
    ],
    'restore' => [
        'confirmMessage' => '您確定要恢復此組織嗎？',
        'successFlash' => '已恢復組織。',
    ],
];
