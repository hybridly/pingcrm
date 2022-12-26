<?php

return [
    "menuTitle" => "Contacts",
    "attributes" => [
        "first_name" => "First Name",
        "last_name" => "Last Name",
        "name" => "Name",
        "organization_id" => "Organization",
        "email" => "Email",
        "phone" => "Phone",
        "address" => "Address",
        "city" => "City",
        "region" => "Province/State",
        "country" => "Country",
        "postal_code" => "Postal Code",
    ],
    "index" => [
        "title" => "Contacts",
        "header" => "Contacts",
        "trashedLabel" => "Trashed",
        "noTrashed" => "No Trashed",
        "withTrashed" => "With Trashed",
        "onlyTrashed" => "Only Trashed",
        "createContact" => "Create Contact",
        "createContactMobile" => "Create",
        "noneFound" => "No contacts found.",
        "displayName" => ":first_name :last_name",
    ],
    "create" => [
        "title" => "Create Contact",
        "header" => "Create Contact",
        "createLabel" => "Create Contact",
        "successFlash" => "Contact created.",
    ],
    "edit" => [
        "header" => "Edit Contact :name",
        "title" => ":first_name :last_name",
        "successFlash" => "Contact updated.",
        "isDeleted" => "This contact has been deleted.",
        "deleteLabel" => "Delete Contact",
        "updateLabel" => "Update Contact",
    ],
    "delete" => [
        "confirmMessage" => "Are you sure you want to delete this contact?",
        "successFlash" => "Contact deleted.",
    ],
    "restore" => [
        "confirmMessage" => "Are you sure you want to restore this contact?",
        "successFlash" => "Contact restored.",
    ],
];
