<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\helpers\Html;

/**
 * @var dektrium\user\models\User $user
 * @var dektrium\user\models\Token $token
 */
     // смена урла для подтверждения для переопределения/ самый простой способ
    $rUrl=Html::a(Html::encode($token->url), $token->url);
    $rUrl= str_replace('/user/recover/','/urecovery/reset/',$rUrl);

?>

<body style="width:100%;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0;">
<div class="es-wrapper-color" style="background-color:#F1F1F1;">
    <!--[if gte mso 9]>
    <v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t">
        <v:fill type="tile" color="#f1f1f1"></v:fill>
    </v:background>
    <![endif]-->
    <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;padding:0;Margin:0;width:100%;height:100%;background-repeat:repeat;background-position:center top;">
        <tr style="border-collapse:collapse;">
            <td valign="top" style="padding:0;Margin:0;">
                <table class="es-header" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top;">
                    <tr style="border-collapse:collapse;">
                        <td align="center" bgcolor="#ffffff" style="padding:0;Margin:0;background-color:#FFFFFF;">
                            <table class="es-header-body" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#F9F5F5;" width="600" cellspacing="0" cellpadding="0" bgcolor="#f9f5f5" align="center">
                                <tr style="border-collapse:collapse;">
                                    <td style="padding:0;Margin:0;padding-top:15px;background-color:#FFFFFF;background-position:left top;" bgcolor="#ffffff" align="left">
                                        <table cellspacing="0" cellpadding="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
                                            <tr style="border-collapse:collapse;">
                                                <td width="600" valign="top" align="center" style="padding:0;Margin:0;">
                                                    <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
                                                        <tr style="border-collapse:collapse;">
                                                            <td align="center" style="padding:0;Margin:0;"> <a target="_blank" href="https://lookmybets.com/" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;font-size:14px;text-decoration:underline;color:#FFFFFF;"> <img class="adapt-img" src="https://lookmybets.com/images/53961555751172814.png" alt style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;" width="200"> </a> </td>
                                                        </tr>
                                                    </table> </td>
                                            </tr>
                                        </table> </td>
                                </tr>
                            </table> </td>
                    </tr>
                </table>
                <table class="es-content" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;">
                    <tr style="border-collapse:collapse;">
                        <td align="center" bgcolor="#ffffff" style="padding:0;Margin:0;background-color:#FFFFFF;">
                            <table class="es-content-body" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#251459;" width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center">
                                <tr style="border-collapse:collapse;">
                                    <td style="padding:0;Margin:0;padding-left:40px;padding-right:40px;background-color:#FFFFFF;background-position:left top;" align="left" bgcolor="#ffffff">
                                        <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
                                            <tr style="border-collapse:collapse;">
                                                <td width="520" valign="top" align="center" style="padding:0;Margin:0;">
                                                    <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
                                                        <tr style="border-collapse:collapse;">
                                                            <td align="center" style="Margin:0;padding-top:10px;padding-bottom:10px;padding-left:20px;padding-right:20px;">
                                                                <table border="0" width="100%" height="100%" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
                                                                    <tr style="border-collapse:collapse;">
                                                                        <td style="padding:0;Margin:0px 0px 0px 0px;border-bottom:1px solid #CCCCCC;background:none;height:1px;width:100%;margin:0px;"></td>
                                                                    </tr>
                                                                </table> </td>
                                                        </tr>
                                                        <tr style="border-collapse:collapse;">
                                                            <td esdev-links-color="#757575" class="es-m-txt-c" align="left" style="Margin:0;padding-top:10px;padding-bottom:20px;padding-left:30px;padding-right:30px;"> <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:24px;color:#696969;">Добрый день!</p><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:24px;color:#696969;">Mы отправили запрос на востановление пароля на сайте LOOK MY BET. Пожалуйста перейдите по ссылке ниже:</p> </td>
                                                        </tr>
                                                        <tr style="border-collapse:collapse;">
                                                            <td align="center" style="padding:0;Margin:0;padding-top:10px;padding-bottom:20px;"> <span class="es-button-border es-button-border-2" style="border-style:solid;border-color:#26A4D3;background:#CD0F6A;border-width:0px;display:inline-block;border-radius:50px;width:auto;">
                                                                    <a href="<?=$rUrl?>" class="es-button es-button-1" target="_blank" style="mso-style-priority:100 !important;text-decoration:none;transition:all 100ms ease-in;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:14px;color:#FFFFFF;border-style:solid;border-color:#CD0F6A;border-width:15px 30px 15px 30px;display:inline-block;background:#CD0F6A;border-radius:50px;font-weight:bold;font-style:normal;line-height:17px;width:auto;text-align:center;">Перейти по ссылке</a>
                                                                </span> </td>
                                                        </tr>
                                                        <tr style="border-collapse:collapse;">
                                                            <td align="left" class="es-m-txt-c" style="Margin:0;padding-top:10px;padding-bottom:10px;padding-left:30px;padding-right:30px;"> <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:15px;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:23px;color:#555555;">Если вы не можете нажать на ссылку, тогда скопируйте ёё и вставьте в ваш браузер.</p><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:15px;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:23px;color:#555555;"><br></p><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:15px;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:23px;color:#555555;">Если вы не создавали данный запрос просто проигнорируйте его.</p> </td>
                                                        </tr>
                                                        <tr style="border-collapse:collapse;">
                                                            <td align="center" style="Margin:0;padding-bottom:15px;padding-top:20px;padding-left:20px;padding-right:20px;">
                                                                <table border="0" width="100%" height="100%" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
                                                                    <tr style="border-collapse:collapse;">
                                                                        <td style="padding:0;Margin:0px 0px 0px 0px;border-bottom:1px solid #CCCCCC;background:none;height:1px;width:100%;margin:0px;"></td>
                                                                    </tr>
                                                                </table> </td>
                                                        </tr>
                                                        <tr style="border-collapse:collapse;">
                                                            <td align="center" style="padding:0;Margin:0;"> <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:12px;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:18px;color:#555555;">Мы в социальных сетях</p> </td>
                                                        </tr>
                                                    </table> </td>
                                            </tr>
                                        </table> </td>
                                </tr>
                            </table> </td>
                    </tr>
                </table>
                <table class="es-content" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;">
                    <tr style="border-collapse:collapse;">
                        <td align="center" bgcolor="#ffffff" style="padding:0;Margin:0;background-color:#FFFFFF;">
                            <table class="es-content-body" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#292828;" width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center">
                                <tr style="border-collapse:collapse;">
                                    <td align="left" style="Margin:0;padding-top:5px;padding-bottom:5px;padding-left:40px;padding-right:40px;background-position:left top;background-color:#FFFFFF;" bgcolor="#ffffff">
                                        <table cellspacing="0" cellpadding="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
                                            <tr style="border-collapse:collapse;">
                                                <td width="520" valign="top" align="center" style="padding:0;Margin:0;">
                                                    <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
                                                        <tr style="border-collapse:collapse;">
                                                            <td class="es-m-txt-c" align="center" style="padding:0;Margin:0;">
                                                                <table class="es-table-not-adapt es-social" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
                                                                    <tr style="border-collapse:collapse;">
                                                                        <td valign="top" align="center" style="padding:0;Margin:0;padding-right:10px;"> <a target="_blank" href="https://www.instagram.com/lookmybet/" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;font-size:15px;text-decoration:underline;color:#26A4D3;"><img title="Telegram" src="https://lookmybets.com/images/instagram-circle-black-bordered.png" alt="Inst" width="32" height="32" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;"></a> </td>
                                                                        <td valign="top" align="center" style="padding:0;Margin:0;padding-right:10px;"> <a target="_blank" href="https://www.youtube.com/channel/UCw9BOXOTaRzoMAZVBpkzBvA?view_as=subscriber" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;font-size:15px;text-decoration:underline;color:#26A4D3;"><img title="Youtube" src="https://lookmybets.com/images/youtube-circle-black-bordered.png" alt="Yt" width="32" height="32" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;"></a> </td>
                                                                        <td valign="top" align="center" style="padding:0;Margin:0;"> <a target="_blank" href="https://tglink.ru/lookmybets" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;font-size:15px;text-decoration:underline;color:#26A4D3;"><img title="Telegram" src="https://lookmybets.com/images/telegram-circle-black-bordered.png" alt="Telegram" width="32" height="32" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;"></a> </td>
                                                                    </tr>
                                                                </table> </td>
                                                        </tr>
                                                    </table> </td>
                                            </tr>
                                        </table> </td>
                                </tr>
                            </table> </td>
                    </tr>
                </table> </td>
        </tr>
    </table>
</div>
</body>
