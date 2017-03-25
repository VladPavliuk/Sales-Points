<?php

return [
    'GET:user/account' => 'user/showUserAccountPage',

    'GET:user/sign-in' => 'user/showSignInPage',

    'POST:user/sign-in' => 'user/signIn',
    'GET:log-out' => 'user/logout',
];