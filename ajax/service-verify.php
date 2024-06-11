<?php
///====================================================================


// Recipient's email address
require __DIR__ . '/../vendor/autoload.php';;
include('../connect.php');
include('../customFunc.php');

use PHPMailer\PHPMailer\PHPMailer;

$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->Host = 'mail.sindhfurniture.com';
$mail->SMTPAuth = true;
$mail->Username = 'multivendor@sindhfurniture.com';
$mail->Password = '@anus1925';
$mail->SMTPSecure = 'ssl'; // Enable TLS encryption, ssl also accepted
$mail->Port = 465; // TCP port to connect to

//==========================


header('Content-Type:application/json');


$item_id = $_POST['id'];
$coupon_no = $_POST['coupon_no'];
$status = $_POST['item_status'];
$statusname = '';
$date = date('d-m-Y');

if ($status == '2') {
    $statusname = 'active';
} elseif ($status == '1') {
    $statusname = 'complete';
}

if (!empty($item_id) && !empty($coupon_no) && !empty($status)) {
    $order_item_check = fetchOtherdetailsCol2($con, 'order_items', 'Id', $item_id, 'order_code', $coupon_no);


    if (mysqli_num_rows($order_item_check) > 0) {

        //================
        while ($sh = mysqli_fetch_assoc($order_item_check)) {
            $order__id = $sh['order_id'];
            $itemname = $sh['item_name'];
            $itemprice = $sh['item_price'];
        }
        $order__details = fetchOtherdetails($con, 'order', 'Id', $order__id);

        while ($od = mysqli_fetch_assoc($order__details)) {
            $firstname = $od['name'];
            $lastname = $od['lastname'];
            $u__email = $od['email'];
        }
        //================
        $upd_qry = mysqli_prepare($con, "UPDATE `order_items` SET `status`=?,`date`=? WHERE `Id` = ?");
        mysqli_stmt_bind_param($upd_qry, 'sss', $status, $date, $item_id);
        if (mysqli_stmt_execute($upd_qry)) {
            $sts_arr = [];
            $select_all_items = fetchOtherdetails($con, 'order_items', 'order_id', $order__id);
            while ($sts_check = mysqli_fetch_assoc($select_all_items)) {
                $sts_arr[] = $sts_check['status'];
            }
            $unique_sts = array_unique($sts_arr);
            $unique_sts_val = implode(',', $unique_sts);
            if (count($unique_sts) == 1 && $unique_sts_val == '1') {
                $upd_sts_qry = mysqli_prepare($con, "UPDATE `order` SET `status`=?,`date`=? WHERE `Id` = ?");
                mysqli_stmt_bind_param($upd_sts_qry, 'sss', $unique_sts_val, $date, $order__id);
                mysqli_stmt_execute($upd_sts_qry);
            }
            //=============================sending email to users
            $actual_name = $firstname . $lastname;
            $subjct = "Your $itemname Status Update: $statusname Confirmation";
            $mail->setFrom('multivendor@sindhfurniture.com', 'Multivendor');
            $mail->addAddress($u__email, $actual_name);
            $mail->Subject = $subjct;
            $mail->isHTML(true);

            //====content here


            $confirmation_email_content =  "
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


            $mail->Body = $confirmation_email_content;
            $mail->AltBody = 'This is the plain text message body';

            // Send email and check if it sends successfully
            if ($mail->send()) {
                echo json_encode(array('i_status' => 'success', 'message' => 'sucessfully updated the status', 'status' => $status));
            } else {
                echo json_encode(array('i_status' => 'error', 'message' => 'status is updated but something went wrong'));
            }


            //==============================sending user email ends here
            // $order__details = fetchOtherdetails()



        } else {
            echo json_encode(array('i_status' => 'error', 'message' => 'something went wrong'));
        }
    } else {
        echo json_encode(array('i_status' => 'error', 'message' => 'that data u enter is invalid'));
    }
} else {
    echo json_encode(array('i_status' => 'error', 'message' => 'enetr complete data'));
}

///====================================================================
