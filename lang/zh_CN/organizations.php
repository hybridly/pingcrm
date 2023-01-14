<?php

return [
    'menuTitle' => '组织',
    'attributes' => [
        'name' => '姓名',
        'email' => '邮箱',
        'phone' => '电话号码',
        'address' => '地址',
        'city' => '城市',
        'region' => '省/州',
        'country' => '国家',
        'postal_code' => '邮递区号',
    ],
    'index' => [
        'title' => '组织',
        'header' => '组织',
        'trashedLabel' => '显示已删除',
        'noTrashed' => '不包含已删除',
        'withTrashed' => '包含已删除',
        'onlyTrashed' => '仅显示已删除',
        'createOrganization' => '新增组织',
        'createOrganizationMobile' => '新增',
        'noneFound' => '没有符合查询的组织。',
    ],
    'create' => [
        'title' => '新增组织',
        'header' => '新增组织',
        'createLabel' => '新增组织',
        'successFlash' => '已新增组织。',
    ],
    'edit' => [
        'header' => '编辑组织 :name',
        'title' => ':name',
        'successFlash' => '已更新组织。',
        'isDeleted' => '当前组织已被删除。',
        'deleteLabel' => '删除组织',
        'updateLabel' => '更新组织',
    ],
    'delete' => [
        'confirmMessage' => '您确定要删除此组织吗？',
        'successFlash' => '已删除组织。',
    ],
    'restore' => [
        'confirmMessage' => '您确定要恢复此组织吗？',
        'successFlash' => '已恢复组织。',
    ],
];
