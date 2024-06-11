<?php

// Recipient's email address
require __DIR__ . '/vendor/autoload.php';
include('connect.php');
include('customFunc.php');

use PHPMailer\PHPMailer\PHPMailer;

$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'incredibleinfo333@gmail.com';
$mail->Password = 'jvza qobx oqyu uehp';
$mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587; // TCP port to connect to

//==========================

$mail->setFrom('incredibleinfo333@gmail.com', 'Multivendor');
$mail->addAddress('anasq8644@gmail.com', 'Second anas');
$mail->Subject = 'Welcome to our platform';
$mail->isHTML(true);




// HTML content
$html_content = "
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Document</title>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap' rel='stylesheet'>
</head>
<body>
        <table style='width:100%;border:1px solid #FDA621;' cellspacing='0'>
            <thead>
                <tr style='width: 100%;'>
                    <td style='width:100%;padding:10px;text-align:center;background:#eee;color:#fff;'><img src='https://multivender.sindhexpress.com/email-logo-1.png' style='display: inline-block;width:220px;' alt=''></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style='width:100%;padding:20px 16px;height:400px;vertical-align:baseline;font-family: Outfit, sans-serif;font-size:16px;'>
                        <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'> Welcome to Our Platform!</span><br>

                        <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'> Dear [Vendor Name] ,</span><br>

                        <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'> Thank you for registering on our platform! We're thrilled to have you join our community of vendors.</span><br>

                        <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'>Before you can start using our platform, your registration needs to be approved by our admin team. This process typically takes 2-4 hours. We'll notify you via email once your account is approved and ready for use.</span><br>
                        <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'>A friendly reminder: please refrain from sharing your email and password with anyone. Keeping your account information confidential helps ensure the security of your account and protects your privacy.
                        <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'>
                        Once again, thank you for choosing our platform. We're excited to see the value you'll bring to our community!
                        Best regards,</span><br>
                        <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'>
                        [Your Platform Name] Team</span><br>
                    </td>
                </tr>
            </tbody>
        </table>

</body>
</html>";

//=====confirmation email




// HTML content
$html_content = "
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Document</title>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap' rel='stylesheet'>
</head>
<body>
        <table style='width:100%;border:1px solid #FDA621;' cellspacing='0'>
            <thead>
                <tr style='width: 100%;'>
                    <td style='width:100%;padding:10px;text-align:center;background:#eee;color:#fff;'><img src='https://multivender.sindhexpress.com/email-logo-1.png' style='display: inline-block;width:220px;' alt=''></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style='width:100%;padding:20px 16px;height:400px;vertical-align:baseline;font-family: Outfit, sans-serif;font-size:16px;'>
                        <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'> $subjct</span><br>

                        <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'> Dear $actual_name ,</span><br>

                        <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'> We hope this email finds you well. We are reaching out to inform you about the latest status update regarding your $itemname purchase.</span><br>

                        <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'>  We are pleased to confirm that your service status has been updated to $statusname . This means that your $itemname is now fully operational and ready for use.</span><br>

                        <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'>  We are pleased to confirm that your service status has been updated to $statusname . This means that your $itemname is now fully operational and ready for use.</span><br>

                        <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'>To activate your service, please use the unique code provided in the coupon card sent to your email upon purchase. Simply provide this code to our vendor to avail of your service benefits.</span><br>

                        <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'>If you have already provided the code, congratulations! Your service is now active, and you can start enjoying its benefits immediately.</span><br>

                        <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'> If you have any questions or concerns regarding your service or its activation, please feel free to reach out to our customer support team at support@multivendor.com. We're here to assist you every step of the way.</span><br>

                        <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'>  Thank you for choosing Mutivendor for your service needs. We appreciate your business and look forward to serving you.</span><br>

                
                        <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'>
                        Best regards,</span><br>
                        <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'>
                        Express team Team</span><br>
                    </td>
                </tr>
            </tbody>
        </table>

</body>
</html>";




$mail->Body = $html_content2;
$mail->AltBody = 'This is the plain text message body';

// Send email and check if it sends successfully
if ($mail->send()) {
    echo "Email sent successfully!";
} else {
    echo "Failed to send email!";
}


$confirmation_email_content = "Subject: Your [Service Name] Status Update: Activation/Completion Confirmation

Dear [Customer's Name],

We hope this email finds you well. We are reaching out to inform you about the latest status update regarding your [Service Name] purchase. 

We are pleased to confirm that your service status has been updated to **[Active/Complete]**. This means that your [Service Name] is now fully operational and ready for use.

To activate your service, please use the unique code provided in the coupon card sent to your email upon purchase. Simply provide this code to our vendor to avail of your service benefits.

If you have already provided the code, congratulations! Your service is now active, and you can start enjoying its benefits immediately.

If you have any questions or concerns regarding your service or its activation, please feel free to reach out to our customer support team at [Customer Support Email/Phone Number]. We're here to assist you every step of the way.

Thank you for choosing [Your Company Name] for your service needs. We appreciate your business and look forward to serving you.

Best Regards,

[Your Name]
[Your Position]
[Your Company Name]
[Contact Information]";


$suspend_content = "
<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset='UTF-8'>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<title>Document</title>
<link rel='preconnect' href='https://fonts.googleapis.com'>
<link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
<link href='https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap' rel='stylesheet'>
</head>
<body>
<table style='width:100%;border:1px solid #FDA621;' cellspacing='0'>
<thead>
    <tr style='width: 100%;'>
        <td style='width:100%;padding:10px;text-align:center;background:#eee;color:#fff;'><img src='https://multivender.sindhexpress.com/email-logo-1.png' style='display: inline-block;width:220px;' alt=''></td>
    </tr>
</thead>
<tbody>
    <tr>
        <td style='width:100%;padding:20px 16px;height:400px;vertical-align:baseline;font-family: Outfit, sans-serif;font-size:16px;'>
            <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'>Notice of Account Suspension</span><br>

            <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'> Dear " . $vendor__name . " ,</span><br>

            <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'>   We regret to inform you that your vendor account with Multivendor has been suspended. This decision was made following a thorough review of your account activity and adherence to our policies. </span><br>

            <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'>  Reasons for Suspension: </span><br>

            <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'>  We have inspect your activty and you are found guilty in voliating our policy and terms and condition<br>
                Impact of Suspension: </span><br>

            <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'> 1).Inability to access your vendor dashboard. </span><br>
            <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'> 2).Suspension of pending orders and payments. </span><br>
            <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'> 3).Loss of privileges associated with vendor status. </span><br>

            <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'>Next Steps:<br>
                
            Review our Terms of Service to understand the policies you may have violated.
            If you believe this suspension is in error, please reach out to our support team at https:multivendor.com/contact.php to appeal the decision.</span><br>

            <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'>Take corrective actions as necessary to ensure compliance with our policies.<br>
            Please note that further violations may result in permanent termination of your vendor account. We value your partnership and hope to resolve this matter swiftly.</span><br>

            <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'> Sincerely,<br>
            Admin<br>
            Multivendor</span><br>
        </td>
    </tr>
</tbody>
</table>

</body>
</html>";

$termination_content = "
<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset='UTF-8'>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<title>Document</title>
<link rel='preconnect' href='https://fonts.googleapis.com'>
<link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
<link href='https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap' rel='stylesheet'>
</head>
<body>
<table style='width:100%;border:1px solid #FDA621;' cellspacing='0'>
<thead>
    <tr style='width: 100%;'>
        <td style='width:100%;padding:10px;text-align:center;background:#eee;color:#fff;'><img src='https://multivender.sindhexpress.com/email-logo-1.png' style='display: inline-block;width:220px;' alt=''></td>
    </tr>
</thead>
<tbody>
    <tr>
        <td style='width:100%;padding:20px 16px;height:400px;vertical-align:baseline;font-family: Outfit, sans-serif;font-size:16px;'>
            <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'>Notice of Account Termination</span><br>

            <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'> Dear " . $vendor__name . " ,</span><br>

            <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'>   W We regret to inform you that your vendor account with [Platform/Company Name] has been terminated. This decision was made following a thorough review of your account activity and adherence to our policies. </span><br>

            <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'>  Reasons for termination: </span><br>

            <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'>  We have inspect your activty and you are still found guilty in voliating our policy and terms and condition<br>
            Impact of termination: </span><br>

            <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'> 1).Permanent loss of access to your vendor dashboard. </span><br>
            <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'> 2).Suspension of pending orders and payments. </span><br>
            <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'> 3).Revocation of all privileges associated with vendor status. </span><br>

            <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'>Next Steps:<br>
            This decision is final, and your vendor account will not be reinstated. We take the integrity of our platform and the trust of our users seriously, and we cannot tolerate behavior that compromises these principles.</span><br>

            <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'>We appreciate any past contributions you may have made to our platform and regret any inconvenience this termination may cause. Please be advised that any attempt to create a new account or circumvent this termination will result in further action.</span><br>
            <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'>If you have any questions or concerns regarding this termination, you may contact our support team at https:multivendor.com/contact.php for clarification.</span><br>

            <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'> Sincerely,<br>
            Admin<br>
            Multivendor</span><br>
        </td>
    </tr>
</tbody>
</table>

</body>
</html>";

$approve_back = "
<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset='UTF-8'>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<title>Document</title>
<link rel='preconnect' href='https://fonts.googleapis.com'>
<link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
<link href='https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap' rel='stylesheet'>
</head>
<body>
<table style='width:100%;border:1px solid #FDA621;' cellspacing='0'>
<thead>
    <tr style='width: 100%;'>
        <td style='width:100%;padding:10px;text-align:center;background:#eee;color:#fff;'><img src='https://multivender.sindhexpress.com/email-logo-1.png' style='display: inline-block;width:220px;' alt=''></td>
    </tr>
</thead>
<tbody>
    <tr>
        <td style='width:100%;padding:20px 16px;height:400px;vertical-align:baseline;font-family: Outfit, sans-serif;font-size:16px;'>
            <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'>Notice of Account Re-approval</span><br>

            <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'> Dear " . $vendor__name . " ,</span><br>

            <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'>   I hope this message finds you well. I am writing to request the reinstatement of my vendor account, which was recently suspended. </span><br>

            <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'> Upon reviewing the reasons for the suspension, I understand the concerns raised by your team. I want to assure you that I take compliance with [Platform/Company Name]'s policies very seriously, and I am committed to rectifying any issues that led to the suspension of my account. </span><br>

            <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'> To address the concerns raised, I have taken the following corrective actions: </span><br>

            <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'> [Detail corrective action taken, such as removing prohibited items from listings, updating account information, etc.]</span><br>

            <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'>I believe that these measures demonstrate my commitment to operating within the guidelines set forth by [Platform/Company Name] and maintaining a positive partnership with your platform. I am eager to continue providing quality services/products to your customers and contributing to the success of the platform.</span><br>

            <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'>I kindly request that you reconsider the suspension of my vendor account and approve its reinstatement at your earliest convenience. If there are any additional steps or information required from my end, please do not hesitate to let me know, and I will promptly provide it.</span><br>

            <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'>IThank you for your attention to this matter. I look forward to your favorable response and the opportunity to resume my vendor activities on [Platform/Company Name].</span><br>

            <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'> Sincerely,<br>
            Admin<br>
            Multivendor</span><br>
        </td>
    </tr>
</tbody>
</table>

</body>
</html>";
