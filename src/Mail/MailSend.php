<?php

namespace LuzernTourismus\BulkMail\Mail;

use LuzernTourismus\BulkMail\Data\Mailing\MailingReader;
use LuzernTourismus\BulkMail\Data\Recipient\RecipientReader;
use Nemundo\App\Mail\Message\Attachment\InlineImageAttachment;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Debug\Debug;
use Nemundo\Project\Config\ProjectConfigReader;

class MailSend extends AbstractBase
{


    public function send($mailingId)
    {


        $tenantId = (new ProjectConfigReader())->getValue('m365_tenant_id');
        $clientId = (new ProjectConfigReader())->getValue('m365_client_id');
        $clientSecret = (new ProjectConfigReader())->getValue('m365_client_secret');

        $tokenUrl = "https://login.microsoftonline.com/$tenantId/oauth2/v2.0/token";
        $postData = [
            'client_id' => $clientId,
            'scope' => 'https://graph.microsoft.com/.default',
            'client_secret' => $clientSecret,
            'grant_type' => 'client_credentials'
        ];

        $ch = curl_init($tokenUrl);
        curl_setopt_array($ch, [
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => http_build_query($postData),
            CURLOPT_RETURNTRANSFER => true,
        ]);
        $response = curl_exec($ch);
        if ($response === false) {
            die('Token request failed: ' . curl_error($ch));
        }
        curl_close($ch);

        $token = json_decode($response, true)['access_token'] ?? null;
        if (!$token) {
            die("No access token received. Response: $response");
        }

        $mailingRow = (new MailingReader())->getRowById($mailingId);


        $text = '<!doctype html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Simple Transactional Email</title>
    <style media="all" type="text/css">
@media all {
  .btn-primary table td:hover {
    background-color: #ec0867 !important;
  }

  .btn-primary a:hover {
    background-color: #ec0867 !important;
    border-color: #ec0867 !important;
  }
}
@media only screen and (max-width: 640px) {
  .main p,
.main td,
.main span {
    font-size: 16px !important;
  }

  .wrapper {
    padding: 8px !important;
  }

  .content {
    padding: 0 !important;
  }

  .container {
    padding: 0 !important;
    padding-top: 8px !important;
    width: 100% !important;
  }

  .main {
    border-left-width: 0 !important;
    border-radius: 0 !important;
    border-right-width: 0 !important;
  }

  .btn table {
    max-width: 100% !important;
    width: 100% !important;
  }

  .btn a {
    font-size: 16px !important;
    max-width: 100% !important;
    width: 100% !important;
  }
}
@media all {
  .ExternalClass {
    width: 100%;
  }

  .ExternalClass,
.ExternalClass p,
.ExternalClass span,
.ExternalClass font,
.ExternalClass td,
.ExternalClass div {
    line-height: 100%;
  }

  .apple-link a {
    color: inherit !important;
    font-family: inherit !important;
    font-size: inherit !important;
    font-weight: inherit !important;
    line-height: inherit !important;
    text-decoration: none !important;
  }

  #MessageViewBody a {
    color: inherit;
    text-decoration: none;
    font-size: inherit;
    font-family: inherit;
    font-weight: inherit;
    line-height: inherit;
  }
}
</style>
  </head>
  <body style="font-family: Helvetica, sans-serif; -webkit-font-smoothing: antialiased; font-size: 16px; line-height: 1.3; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; background-color: #f4f5f6; margin: 0; padding: 0;">
    <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f4f5f6; width: 100%;" width="100%" bgcolor="#f4f5f6">
      <tr>
        <td style="font-family: Helvetica, sans-serif; font-size: 16px; vertical-align: top;" valign="top">&nbsp;</td>
        <td class="container" style="font-family: Helvetica, sans-serif; font-size: 16px; vertical-align: top; max-width: 600px; padding: 0; padding-top: 24px; width: 600px; margin: 0 auto;" width="600" valign="top">
          <div class="content" style="box-sizing: border-box; display: block; margin: 0 auto; max-width: 600px; padding: 0;">';

        /* <!-- START CENTERED WHITE CONTAINER -->
         <span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">



         This is preheader text. Some clients will show this text as a preview.</span>*/

        $text .= '<table role="presentation" border="0" cellpadding="0" cellspacing="0" class="main" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background: #ffffff; border: 1px solid #eaebed; border-radius: 16px; width: 100%;" width="100%">

              <!-- START MAIN CONTENT AREA -->
              <tr>
                <td class="wrapper" style="font-family: Helvetica, sans-serif; font-size: 16px; vertical-align: top; box-sizing: border-box; padding: 24px;" valign="top">                
            <img width="600" src="header">';

        $text .= '<p style="font-family: Helvetica, sans-serif; font-size: 16px; font-weight: normal; margin: 0; margin-bottom: 16px;">' . $mailingRow->text . '</p>';


        /*<p style="font-family: Helvetica, sans-serif; font-size: 16px; font-weight: normal; margin: 0; margin-bottom: 16px;">Hi there</p>
        <p style="font-family: Helvetica, sans-serif; font-size: 16px; font-weight: normal; margin: 0; margin-bottom: 16px;">Sometimes you just want to send a simple HTML email with a simple design and clear call to action. This is it.</p>*/

        /*  $mail->text .= '<table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; box-sizing: border-box; width: 100%; min-width: 100%;" width="100%">
               <tbody>
                 <tr>
                   <td align="left" style="font-family: Helvetica, sans-serif; font-size: 16px; vertical-align: top; padding-bottom: 16px;" valign="top">
                     <table role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: auto;">
                       <tbody>
                         <tr>
                           <td style="font-family: Helvetica, sans-serif; font-size: 16px; vertical-align: top; border-radius: 4px; text-align: center; background-color: #921FC5;" valign="top" align="center" bgcolor="#921FC5"> <a href="http://htmlemail.io" target="_blank" style="border: solid 2px #921FC5; border-radius: 4px; box-sizing: border-box; cursor: pointer; display: inline-block; font-size: 16px; font-weight: bold; margin: 0; padding: 12px 24px; text-decoration: none; text-transform: capitalize; background-color: #921FC5; border-color: #921FC5; color: #ffffff;">Call To Action</a> </td>
                         </tr>
                       </tbody>
                     </table>
                   </td>
                 </tr>
               </tbody>
             </table>
             <p style="font-family: Helvetica, sans-serif; font-size: 16px; font-weight: normal; margin: 0; margin-bottom: 16px;">This is a really simple email template. Its sole purpose is to get the recipient to click the button with no distractions.</p>
             <p style="font-family: Helvetica, sans-serif; font-size: 16px; font-weight: normal; margin: 0; margin-bottom: 16px;">Good luck! Hope it works.</p>*/

        $text .= '</td>
              </tr>

              <!-- END MAIN CONTENT AREA -->
              </table>';

        /*<!-- START FOOTER -->
        <div class="footer" style="clear: both; padding-top: 24px; text-align: center; width: 100%;">
          <table role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;" width="100%">
            <tr>
              <td class="content-block" style="font-family: Helvetica, sans-serif; vertical-align: top; color: #9a9ea6; font-size: 16px; text-align: center;" valign="top" align="center">
                <span class="apple-link" style="color: #9a9ea6; font-size: 16px; text-align: center;">Company Inc, 7-11 Commercial Ct, Belfast BT1 2NB</span>
              </td>
            </tr>

          </table>
        </div>*/

        $text .= ' <!-- END FOOTER -->
            
<!-- END CENTERED WHITE CONTAINER --></div>
        </td>
        <td style="font-family: Helvetica, sans-serif; font-size: 16px; vertical-align: top;" valign="top">&nbsp;</td>
      </tr>
    </table>
  </body>
</html>';


        $logoFilename = 'C:\test\header.png';
        $base64 = base64_encode(file_get_contents($logoFilename));

        $recipientReader = new RecipientReader();
        $recipientReader->model->loadMailing();
        $recipientReader->filter->andEqual($recipientReader->model->mailingId, $mailingId);
        foreach ($recipientReader->getData() as $recipientRow) {

            (new Debug())->write($recipientRow->email);

            $graphEndpoint = 'https://graph.microsoft.com/v1.0/users/' . $recipientRow->mailing->mailFrom . '/sendMail';
            $payload = [
                "message" => [
                    "subject" => $recipientRow->mailing->subject,
                    "body" => [
                        "contentType" => "HTML",
                        "content" => $text
                    ],
                    "toRecipients" => [
                        ["emailAddress" => ["address" => $recipientRow->email]]
                    ],

                    "attachments" => [[

                        "@odata.type" => "#microsoft.graph.fileAttachment",
                        "name" => "logo.png",
                        "contentType" => "image/png",
                        "isInline" => true,
                        "contentId" => "header",
                        "contentBytes" => $base64  // "iVBORw0KGgoAAAANSUhEUgAA..."  // Base64 des PNG

                    ]]

                ],
                "saveToSentItems" => true
            ];




            $ch = curl_init($graphEndpoint);
            curl_setopt_array($ch, [
                CURLOPT_POST => true,
                CURLOPT_HTTPHEADER => [
                    "Authorization: Bearer $token",
                    "Content-Type: application/json"
                ],
                CURLOPT_POSTFIELDS => json_encode($payload),
                CURLOPT_RETURNTRANSFER => true,
            ]);
            $resp = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if ($resp === false || $httpCode >= 300) {
                die("Send failed. HTTP $httpCode. Response: $resp Error: " . curl_error($ch));
            }
            curl_close($ch);


        }


    }


}