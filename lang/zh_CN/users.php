<?php

return [
    'attributes' => [
        'first_name' => '名字',
        'last_name' => '姓氏',
        'name' => '姓名',
        'email' => '邮箱',
        'password' => '密码',
        'role' => '帐户类型',
        'photo_path' => '头像',
    ],
    'index' => [
        'title' => '用户',
        'header' => '用户',
        'trashedLabel' => '显示已删除',
        'noTrashed' => '不包含已删除',
        'withTrashed' => '包含已删除',
        'onlyTrashed' => '仅显示已删除',
        'roleLabel' => '帐户类型',
        'allRoles' => '帐户类型',
        'userRole' => '用户',
        'ownerRole' => '管理员',
        'createUser' => '新增用户',
        'createUserMobile' => '新增',
        'noneFound' => '没有符合查询的用户。',
        'displayName' => ':last_name :first_name',
    ],
    'create' => [
        'title' => '新增用户',
        'header' => '新增用户',
        'createLabel' => '新增用户',
        'successFlash' => '已新增用户。',
    ],
    'edit' => [
        'header' => '编辑用户 :name',
        'title' => ':last_name :first_name',
        'successFlash' => '已更新用户。',
        'isDeleted' => '当前用户已被删除。',
        'deleteLabel' => '删除用户',
        'updateLabel' => '更新用户',
    ],
    'delete' => [
        'confirmMessage' => '您确定要删除此用户吗？',
        'successFlash' => '已删除用户。',
    ],
    'restore' => [
        'confirmMessage' => '您确定要恢复此用户吗？',
        'successFlash' => '已恢复用户。',
    ],
];
