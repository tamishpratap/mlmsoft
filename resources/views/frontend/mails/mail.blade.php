<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{config('detailsApp.name')}} Enquiry Received</title>
</head>

<body style="margin:0; padding:0; background:#eef3f0; font-family:Arial, Helvetica, sans-serif; color:#1d2b24;">
    <table width="100%" cellpadding="0" cellspacing="0" border="0" role="presentation" style="background:#eef3f0; margin:0; padding:0;">
        <tr>
            <td align="center" style="padding:24px 12px;">
                <table width="100%" cellpadding="0" cellspacing="0" border="0" role="presentation" style="max-width:640px; background:#ffffff; border:1px solid #dbe6df; border-radius:14px; overflow:hidden;">

                    <tr>
                        <td style="background:#123524; padding:18px 22px;">
                            <table width="100%" cellpadding="0" cellspacing="0" border="0" role="presentation">
                                <tr>
                                    <td valign="middle" style="width:48px;">
                                        <div style="width:42px; height:42px; line-height:42px; text-align:center; border-radius:50%; background:#d79b32; color:#12291d; font-size:20px; font-weight:bold;">
                                            {{ str_split(config('detailsApp.name'), 1)[0] }}
                                        </div>
                                    </td>
                                    <td valign="middle" style="padding-left:12px;">
                                        <div style="color:#ffffff; font-size:18px; font-weight:bold; line-height:1.3;">
                                            {{config('detailsApp.name')}} Pvt. Ltd.
                                        </div>
                                        <div style="color:#cfe0d6; font-size:13px; line-height:1.5;">
                                            Official enquiry acknowledgement
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:26px 22px 10px; background:#f8fbf9;">
                            <table width="100%" cellpadding="0" cellspacing="0" border="0" role="presentation">
                                <tr>
                                    <td align="left">
                                        <span style="display:inline-block; background:#e4f2ea; color:#115535; border:1px solid #c7e0d1; border-radius:18px; padding:8px 13px; font-size:13px; font-weight:bold;">
                                            Enquiry received successfully
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-top:18px;">
                                        <h1 style="margin:0; color:#13271c; font-size:28px; line-height:1.25; font-weight:bold;">
                                            Thank you for contacting {{config('detailsApp.name')}}.
                                        </h1>
                                        <p style="margin:12px 0 0; color:#5f6f66; font-size:15px; line-height:1.7;">
                                            We have received your enquiry. Our team will review your message and contact you shortly with the right support.
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:18px 22px 6px; background:#f8fbf9;">
                            <table width="100%" cellpadding="0" cellspacing="0" border="0" role="presentation">
                                <tr>
                                    <td style="padding-bottom:12px;">
                                        <table width="86%" cellpadding="0" cellspacing="0" border="0" role="presentation" align="left">
                                            <tr>
                                                <td style="background:#ffffff; border:1px solid #dce8e1; border-radius:14px; padding:16px 18px;">
                                                    <p style="margin:0; color:#405149; font-size:15px; line-height:1.7;">
                                                        Dear User,<br>
                                                        Thank you for showing interest in {{config('detailsApp.name')}}. Your enquiry has been shared with our support team for review.
                                                    </p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                                <tr>
                                    <td align="right" style="padding-bottom:12px;">
                                        <table width="86%" cellpadding="0" cellspacing="0" border="0" role="presentation" align="right">
                                            <tr>
                                                <td style="background:#143524; border-radius:14px; padding:16px 18px;">
                                                    <p style="margin:0; color:#ffffff; font-size:15px; line-height:1.7;">
                                                        One of our representatives will connect with you shortly to understand your requirement and guide you with complete information.
                                                    </p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="padding-bottom:12px;">
                                        <table width="86%" cellpadding="0" cellspacing="0" border="0" role="presentation" align="left">
                                            <tr>
                                                <td style="background:#fff8eb; border:1px solid #eed9af; border-radius:14px; padding:16px 18px;">
                                                    <p style="margin:0 0 8px; color:#8a6827; font-size:12px; line-height:1.4; font-weight:bold; text-transform:uppercase;">
                                                        What happens next