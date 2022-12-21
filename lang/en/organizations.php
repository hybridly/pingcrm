<?php

return [
    "attributes" => [
        "name" => "Name",
        "email" => "Email",
        "phone" => "Phone",
        "address" => "Address",
        "city" => "City",
        "region" => "Province/State",
        "country" => "Country",
        "postal_code" => "Postal Code",
    ],
    "countries" => [
        "CA" => "Canada",
        "US" => "United States",
    ],
    "index" => [
        "title" => "Organizations",
        "header" => "Organizations",
        "trashedLabel" => "Trashed",
        "noTrashed" => "No Trashed",
        "withTrashed" => "With Trashed",
        "onlyTrashed" => "Only Trashed",
        "createOrganization" => "Create Organization",
        "createOrganizationMobile" => "Create",
        "noneFound" => "No organizations found.",
    ],
    "create" => [
        "header" => "Create Organization",
        "title" => "Create Organization",
        "createLabel" => "Create Organization",
        "successFlash" => "Organization created.",
    ],
    "edit" => [
        "header" => "Edit Organization :name",
        "title" => ":name",
        "successFlash" => "Organization updated.",
        "isDeleted" => "This organization has been deleted.",
        "deleteLabel" => "Delete Organization",
        "updateLabel" => "Update Organization",
    ],
    "delete" => [
        "confirmMessage" =>
            "Are you sure you want to delete this organization?",
        "successFlash" => "Organization deleted.",
    ],
    "restore" => [
        "confirmMessage" =>
            "Are you sure you want to restore this organization?",
        "successFlash" => "Organization restored.",
    ],
];
