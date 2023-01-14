<?php

return [
    'menuTitle' => '联络人',
    'attributes' => [
        'first_name' => '名字',
        'last_name' => '姓氏',
        'name' => '姓名',
        'organization_id' => '组织',
        'email' => '邮箱',
        'phone' => '电话号码',
        'address' => '地址',
        'city' => '城市',
        'region' => '省/州',
        'country' => '国家',
        'postal_code' => '邮递区号',
    ],
    'index' => [
        'title' => '联络人',
        'header' => '联络人',
        'trashedLabel' => '显示已删除',
        'noTrashed' => '不包含已删除',
        'withTrashed' => '包含已删除',
        'onlyTrashed' => '仅显示已删除',
        'createContact' => '创建联络人',
        'createContactMobile' => '创建',
        'noneFound' => '没有符合查询的联络人。',
        'displayName' => ':last_name :first_name',
    ],
    'create' => [
        'title' => '创建联络人',
        'header' => '创建联络人',
        'createLabel' => '创建联络人',
        'successFlash' => '已创建联络人。',
    ],
    'edit' => [
        'header' => '编辑联络人 :name',
        'title' => ':last_name :first_name',
        'successFlash' => '已更新联络人。',
        'isDeleted' => '当前联络人已被删除。',
        'deleteLabel' => '删除联络人',
        'updateLabel' => '更新联络人',
    ],
    'delete' => [
        'confirmMessage' => '您确定要删除此联络人吗？',
        'successFlash' => '已删除联络人。',
    ],
    'restore' => [
        'confirmMessage' => '您确定要恢复此联络人吗？',
        'successFlash' => '已恢复联络人。',
    ],
];
