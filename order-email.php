<?php


  // Recipient's email address
  require __DIR__ . '/vendor/autoload.php';

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
  $combined_name = $firstname.$lastname;
  $mail->addAddress($useremail, $combined_name);
  $mail->Subject = 'Thanks for ordering';
  $mail->isHTML(true);




  $html_content2 = "<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap' rel='stylesheet'>

    <title>Document</title>
</head>

<body>
    <table style='width:100%;background:#fff;padding:10px;max-width:600px;border:1px solid #eee;margin:0px auto;border-radius:4px;' cellspacing='0'>
        <tbody>
            <tr>
                <td style='width: 100%;text-align:center;padding:10px;vertical-align:middle'><img src='https://multivender.sindhexpress.com/email-logo-1.png' alt=''></td>
            </tr>
        </tbody>
        <tbody>

            <td class='width:100%;padding:10px;'>
                <table style='max-width: 450px;margin:10px auto;'>
                    <tbody>
                        <tr>
                            <td style='width: 100%;text-align:left;padding:10px;vertical-align:middle;font-size:16px;font-weight:600;font-family: Outfit, sans-serif;color:#FF9600;'>
                                Dear [Customer's Name],
                            </td>
                        </tr>
                        <tr>
                            <td style='width: 100%;text-align:left;padding:10px;vertical-align:middle;font-size:12px;font-weight:400;font-family: Outfit, sans-serif;'>
                                Thank you for choosing [Your Company Name] for your recent purchase.
                            </td>
                        </tr>
                        <tr>
                            <td style='width: 100%;text-align:left;padding:10px;vertical-align:middle;font-size:12px;font-weight:400;font-family: Outfit, sans-serif;'>
                                We're pleased to confirm that your order has been received and is now being processed. Here are the details of your order:
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>

        </tbody>
        <tbody>
            <tr>
                <td style='width:100%;padding:10px;'>
                    <table style='width:100%;max-width: 450px;margin:10px auto;' cellspacing='0'>
                        <thead style='border-collapse: collapse;color: #000000;background: #E1E1E1;'>
                            <tr>
                                <th style='padding: 12px;font-size: 14px;font-weight: 400;font-family: Outfit, sans-serif;'>sno</th>
                                <th style='padding: 12px;font-size: 14px;font-weight: 400;border: 1px solid #eee;font-family: Outfit, sans-serif;'>name</th>
                                <th style='padding: 12px; font-size: 14px;font-weight: 400;border: 1px solid #eee;font-family: Outfit, sans-serif;'>item-type</th>
                                <th style='padding: 12px;font-size: 14px;font-weight: 400;font-family: Outfit, sans-serif;'>price</th>
                            </tr>
                        </thead>
                        <tbody style='border-collapse: collapse;'>
                            <tr>
                                <td style='border: 1px solid #eee;padding: 12px;font-size: 14px;font-weight: 400;font-family: Outfit, sans-serif;white-space:word-break;'>sno</td>
                                <td style='padding: 12px;font-size: 14px;font-weight: 400;border: 1px solid #eee;font-family: Outfit, sans-serif;white-space:word-break;'>child tution services x 1</td>
                                <td style='padding: 12px; font-size: 14px;font-weight: 400;border: 1px solid #eee;font-family: Outfit, sans-serif;white-space:word-break;'>item-type</td>
                                <td style='border: 1px solid #eee;padding: 12px;font-size: 14px;font-weight: 400;font-family: Outfit, sans-serif;white-space:word-break;'>price</td>
                            </tr>
                            <tr>
                                <td style='border: 1px solid #eee;padding: 12px;font-size: 14px;font-weight: 400;font-family: Outfit, sans-serif;white-space:word-break;text-align:right;' colspan='3'>subtotal</td>
                                <td style='border: 1px solid #eee;padding: 12px;font-size: 14px;font-weight: 400;font-family: Outfit, sans-serif;white-space:word-break;'>price</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
        <tbody>
            <td class='width:100%;padding:10px;'>
                <table style='max-width: 450px;margin:10px auto;'>
                    <tbody>
                        <tr>
                            <td style='width: 100%;text-align:start;padding:10px;vertical-align:middle;font-size:18px;font-weight:400;font-family: Outfit, sans-serif;'>
                                Your coupon code there
                            </td>
                        </tr>

                    </tbody>
                </table>
            </td>
        </tbody>
        <tbody>
            <tr>
                <td style='width:100%;max-width:450px;min-height:250px;display:block;margin:10px auto;background:url(\"https://multivender.sindhexpress.com/coupon-bg.jpg\");background-size:cover;background-repeat:no-repeat;border-radius:16px;padding:10px;display:flex;align-items:center;'>

                    <table style='width:100%;padding:10px;'>
                        <tbody>
                            <tr>
                                <td style='width:100%;font-size:18px;color:#fff;padding:10px 0px;font-weight:500; font-family: Outfit, sans-serif;'>child tution services - 1</td>
                            </tr>
                            <tr>
                                <td style='width:100%;font-size:14px;color:#fff;padding:10px 0px;font-family: Outfit, sans-serif;'><span style='color:#FF9900;font-size:14px'>Vendor-name : </span> M anas </td>
                            </tr>
                            <tr>
                                <td style='width:100%;font-size:14px;color:#fff;padding:10px 0px;font-family: Outfit, sans-serif;'><span style='color:#FF9900;font-size:14px'>Price : </span>1799 </td>
                            </tr>
                            <tr>
                                <td style='width:100%;font-size:14px;color:#fff;padding:10px 0px;font-family: Outfit, sans-serif;'><span style='color:#FF9900;font-size:14px'>Location : </span> NH 5, Rani Bagh Qasimabad, Hyderabad, Sindh, Pakistan </td>
                            </tr>
                            <tr>
                                <td style='width:100%;font-size:22px;color:#fff;padding:10px 0px;font-weight:700;font-family: Outfit, sans-serif;'>AZH-11-8086148</td>
                            </tr>

                        </tbody>
                    </table>

                </td>
            </tr>
            <td style='width:100%;max-width:450px;min-height:250px;display:block;margin:10px auto;background:url(\"https://multivender.sindhexpress.com/coupon-bg.jpg\");background-size:cover;background-repeat:no-repeat;border-radius:16px;padding:10px;display:flex;align-items:center;'>

                <table style='width:100%;padding:10px;'>
                    <tbody>
                        <tr>
                            <td style='width:100%;font-size:18px;color:#fff;padding:10px 0px;font-weight:500; font-family: Outfit, sans-serif;'>child tution services - 1</td>
                        </tr>
                        <tr>
                            <td style='width:100%;font-size:14px;color:#fff;padding:10px 0px;font-family: Outfit, sans-serif;'><span style='color:#FF9900;font-size:14px'>Vendor-name : </span> M anas </td>
                        </tr>
                        <tr>
                            <td style='width:100%;font-size:14px;color:#fff;padding:10px 0px;font-family: Outfit, sans-serif;'><span style='color:#FF9900;font-size:14px'>Price : </span>1799 </td>
                        </tr>
                        <tr>
                            <td style='width:100%;font-size:14px;color:#fff;padding:10px 0px;font-family: Outfit, sans-serif;'><span style='color:#FF9900;font-size:14px'>Location : </span> NH 5, Rani Bagh Qasimabad, Hyderabad, Sindh, Pakistan </td>
                        </tr>
                        <tr>
                            <td style='width:100%;font-size:22px;color:#fff;padding:10px 0px;font-weight:700;font-family: Outfit, sans-serif;'>AZH-11-8086148</td>
                        </tr>

                    </tbody>
                </table>

            </td>
            </tr>
        </tbody>
        <tbody>
            <td class='width:100%;padding:0px;'>
                <table style='max-width: 450px;margin:10px auto;'>
                    <tbody>
                        <tr>
                            <td style='width: 100%;text-align:left;padding:10px 0px;vertical-align:middle;font-size:12px;font-weight:400;font-family: Outfit, sans-serif;'>
                                This coupon code serves as a token of our appreciation for choosing our service. You can redeem this code during your next purchase or service booking to enjoy exclusive benefits or discounts.
                            </td>
                        </tr>
                        <tr>
                            <td style='width: 100%;text-align:left;padding:10px 0px;vertical-align:middle;font-size:12px;font-weight:400;font-family: Outfit, sans-serif;'>
                                Once your service is successfully completed, please don't forget to share this coupon code with us. You can simply reply to this email with the code or provide it to our customer support team. Upon verification, we'll ensure that the benefits associated with this coupon are applied to your account.
                            </td>
                        </tr>
                        <tr>
                            <td style='width: 100%;text-align:left;padding:10px 0px;vertical-align:middle;font-size:12px;font-weight:400;font-family: Outfit, sans-serif;'>
                                Should you have any questions or require further assistance regarding your order or the coupon code, feel free to reach out to our customer support team at [Customer Support Email/Phone Number]. We're here to assist you every step of the way.
                            </td>
                        </tr>
                        <tr>
                            <td style='width: 100%;text-align:left;padding:10px 0px;vertical-align:middle;font-size:12px;font-weight:400;font-family: Outfit, sans-serif;'>
                                Thank you once again for choosing [Your Company Name]. We greatly value your business and look forward to serving you again soon.
                            </td>
                        </tr>
                        <tr>
                            <td style='width: 100%;text-align:left;padding:10px 0px;vertical-align:middle;font-size:12px;font-weight:400;font-family: Outfit, sans-serif;'>
                                Best regards,
                            </td>
                        </tr>
                        <tr>
                            <td style='width: 100%;text-align:left;padding:10px 0px;vertical-align:middle;font-size:12px;font-weight:400;font-family: Outfit, sans-serif;'>
                                [Your Name] [Your Position/Title] [Your Company Name] [Your Contact Information]
                            </td>
                        </tr>

                    </tbody>
                </table>
            </td>
        </tbody>

    </table>

</body>

</html>


";

  $mail->Body = $html_content2;
  $mail->AltBody = 'This is the plain text message body';

  // Send email and check if it sends successfully
  if ($mail->send()) {
    echo "Email sent successfully!";
  } else {
    echo "Failed to send email!";
  }