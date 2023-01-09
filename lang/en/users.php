<?php

return [
    'attributes' => [
        'first_name' => 'First Name',
        'last_name' => 'Last Name',
        'name' => 'Name',
        'email' => 'Email',
        'password' => 'Password',
        'role' => 'Role',
        'photo_path' => 'Photo',
    ],
    'index' => [
        'title' => 'Users',
        'header' => 'Users',
        'trashedLabel' => 'Trashed',
        'noTrashed' => 'No Trashed',
        'withTrashed' => 'With Trashed',
        'onlyTrashed' => 'Only Trashed',
        'roleLabel' => 'Role',
        'allRoles' => 'All Roles',
        'userRole' => 'User',
        'ownerRole' => 'Owner',
        'createUser' => 'Create User',
        'createUserMobile' => 'Create',
        'noneFound' => 'No users found.',
        'displayName' => ':first_name :last_name',
    ],
    'create' => [
        'header' => 'Create User',
        'title' => 'Create User',
        'createLabel' => 'Create User',
        'successFlash' => 'User created.',
    ],
    'edit' => [
        'header' => 'Edit User :name',
        'title' => ':first_name :last_name',
        'successFlash' => 'User updated.',
        'isDeleted' => 'This user has been deleted.',
        'deleteLabel' => 'Delete User',
        'updateLabel' => 'Update User',
    ],
    'delete' => [
        'confirmMessage' => 'Are you sure you want to delete this user?',
        'successFlash' => 'User deleted.',
    ],
    'restore' => [
        'confirmMessage' => 'Are you sure you want to restore this user?',
        'successFlash' => 'User restored.',
    ],
];
