<?php
return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@example.com',
    'user.passwordResetTokenExpire' => 3600,
    'baseImageUrl' => YII_ENV!='prod'?   'http://localhost35/upload/news/':   'https://lookmybets.com/upload/news/',    // needs here absolute url
];
