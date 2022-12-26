<?php

return [
    "menuTitle" => "組織",
    "attributes" => [
        "name" => "組織名",
        "email" => "メールアドレス",
        "phone" => "電話番号",
        "address" => "住所",
        "city" => "市区町村",
        "region" => "都道府県・地域",
        "country" => "国",
        "postal_code" => "郵便番号",
    ],
    "index" => [
        "title" => "組織",
        "header" => "組織",
        "trashedLabel" => "削除された組織の表示",
        "noTrashed" => "表示しない",
        "withTrashed" => "表示する",
        "onlyTrashed" => "削除された組織のみ表示する",
        "createOrganization" => "新規作成",
        "createOrganizationMobile" => "新規作成",
        "noneFound" => "組織は登録されていません",
    ],
    "create" => [
        "header" => "組織登録",
        "title" => "組織登録",
        "createLabel" => "登録する",
        "successFlash" => "組織を登録しました。",
    ],
    "edit" => [
        "header" => "組織編集 :name",
        "title" => ":name",
        "successFlash" => "組織を更新しました。",
        "isDeleted" => "この組織は削除されています。",
        "deleteLabel" => "削除する",
        "updateLabel" => "更新する",
    ],
    "delete" => [
        "confirmMessage" => "削除してもよろしいでしょうか？",
        "successFlash" => "組織を削除しました。",
    ],
    "restore" => [
        "confirmMessage" => "復元してもよろしいでしょうか？",
        "successFlash" => "組織を復元しました。",
    ],
];
