<?php


function fetchAllData($connection, $Tablename)
{
    $data_sql = "SELECT * FROM `$Tablename`";
    $data_sql_p = mysqli_prepare($connection, $data_sql);
    mysqli_stmt_execute($data_sql_p);
    $dataResults = mysqli_stmt_get_result($data_sql_p);

    if ($dataResults) {
        return $dataResults;
    } else {
        echo mysqli_error($connection);
    }
}
function fetchLimitedData($connection, $Tablename, $col, $limit)
{
    // Prepare the SQL query with placeholders
    $data_sql = "SELECT * FROM `$Tablename` ORDER BY `$col` DESC LIMIT $limit";
    $data_sql_p = mysqli_prepare($connection, $data_sql);

    // Bind parameters and execute the statement
    mysqli_stmt_execute($data_sql_p);

    // Get the result set
    $dataResults = mysqli_stmt_get_result($data_sql_p);

    if ($dataResults) {
        return $dataResults;
    } else {
        // Handle errors gracefully (log or display an error message)
        error_log("Error executing query: " . mysqli_error($connection));
        return false;
    }
}
function fetchLimitedDataWithOffset($connection, $Tablename, $col, $limit, $offset)
{
    // Prepare the SQL query with placeholders
    $data_sql = "SELECT * FROM `$Tablename` ORDER BY `$col` DESC LIMIT $limit OFFSET $offset";
    $data_sql_p = mysqli_prepare($connection, $data_sql);

    // Bind parameters and execute the statement
    mysqli_stmt_execute($data_sql_p);

    // Get the result set
    $dataResults = mysqli_stmt_get_result($data_sql_p);

    if ($dataResults) {
        return $dataResults;
    } else {
        // Handle errors gracefully (log or display an error message)
        error_log("Error executing query: " . mysqli_error($connection));
        return false;
    }
}


function fetchOtherdetails($connection, $table, $column, $id)
{
    $otherData = mysqli_prepare($connection, "SELECT * FROM `$table` WHERE `$column` = ?");
    mysqli_stmt_bind_param($otherData, 's', $id);
    mysqli_stmt_execute($otherData);

    $Result = mysqli_stmt_get_result($otherData);
    if ($Result) {
        return $Result;
    } else {
        mysqli_error($connection);
    }
}
function fetchOtherdetailsCol2($connection, $table, $column1, $col1Val, $column2, $col2Val)
{
    $otherData = mysqli_prepare($connection, "SELECT * FROM `$table` WHERE `$column1` = ? AND `$column2` = ? ");
    mysqli_stmt_bind_param($otherData, 'ss', $col1Val, $col2Val);
    mysqli_stmt_execute($otherData);
    $Result = mysqli_stmt_get_result($otherData);
    if ($Result) {
        return $Result;
    } else {
        mysqli_error($connection);
    }
}
function fetchCol2DetailsWithNot($connection, $table, $column1, $col1Val, $column2, $col2Val)
{
    $otherData = mysqli_prepare($connection, "SELECT * FROM `$table` WHERE `$column1` = ? AND `$column2` != ? ");
    mysqli_stmt_bind_param($otherData, 'ss', $col1Val, $col2Val);
    mysqli_stmt_execute($otherData);
    $Result = mysqli_stmt_get_result($otherData);
    if ($Result) {
        return $Result;
    } else {
        mysqli_error($connection);
    }
}
function fetchOtherdetailsCol3($connection, $table, $column1, $col1Val, $column2, $col2Val, $column3, $col3Val)
{
    $otherData = mysqli_prepare($connection, "SELECT * FROM `$table` WHERE `$column1` = ? AND `$column2` = ? AND `$column3` = ? ");
    mysqli_stmt_bind_param($otherData, 'sss', $col1Val, $col2Val, $col3Val);
    mysqli_stmt_execute($otherData);
    $Result = mysqli_stmt_get_result($otherData);
    if ($Result) {
        return $Result;
    } else {
        mysqli_error($connection);
    }
}
function fetchCol3DetailsWithNot($connection, $table, $column1, $col1Val, $column2, $col2Val, $column3, $col3Val)
{
    $otherData = mysqli_prepare($connection, "SELECT * FROM `$table` WHERE `$column1` = ? AND `$column2` = ? AND `$column3` != ? ");
    mysqli_stmt_bind_param($otherData, 'sss', $col1Val, $col2Val, $col3Val);
    mysqli_stmt_execute($otherData);
    $Result = mysqli_stmt_get_result($otherData);
    if ($Result) {
        return $Result;
    } else {
        mysqli_error($connection);
    }
}
function fetchOrdetailsCol3($connection, $table, $column1, $col1Val, $column2, $col2Val, $column3, $col3Val)
{
    $otherData = mysqli_prepare($connection, "SELECT * FROM `$table` WHERE `$column1` = ? OR `$column2` = ? OR `$column3` = ? ");
    mysqli_stmt_bind_param($otherData, 'sss', $col1Val, $col2Val, $col3Val);
    mysqli_stmt_execute($otherData);
    $Result = mysqli_stmt_get_result($otherData);
    if ($Result) {
        return $Result;
    } else {
        mysqli_error($connection);
    }
}

//delete
function deleteData($connection, $table, $column, $id)
{
    $delete_qry = mysqli_prepare($connection, "DELETE FROM `$table` WHERE `$column` = ?");
    if ($delete_qry === false) {
        die("Failed to prepare statement: " . mysqli_error($connection));
    }

    mysqli_stmt_bind_param($delete_qry, 's', $id);
    $executed = mysqli_stmt_execute($delete_qry);

    if ($executed) {
        return mysqli_affected_rows($connection);
    } else {
        return false;
    }
}

function deleteProductWithId($con, $id, $type)
{
    if ($type == 'attribute' || $type == 'variation') {

        $del_attr = deleteData($con, 'product_attributes', 'product_id', $id);

        if ($type == 'variation') {
            $del_variation = deleteData($con, 'product_variations', 'product_id', $id);
        }
    }
    $del_qry = deleteData($con, 'product', 'id', $id);

    return $del_qry;
}

function MailFunc($mail, $email, $username, $subject, $content, $html = true)
{


    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'incredibleinfo333@gmail.com';
    $mail->Password = 'jvza qobx oqyu uehp';
    $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587; // TCP port to connect to

    //==========================

    $mail->setFrom('incredibleinfo333@gmail.com', 'Multivendor');
    $mail->addAddress($email, $email);
    $mail->Subject = $subject;
    $mail->isHTML($html);

    $mail->Body = $content;
    $mail->AltBody = 'This is the plain text message body';
}


// increase 10 days in date ok?
function IncreaseDate($expectedFormat, $dateString)
{
    $timestamp = strtotime(DateTime::createFromFormat($expectedFormat, $dateString)->format('Y-m-d'));

    if ($timestamp !== false && $timestamp != -1) {
        // Add 10 days to the timestamp
        $newTimestamp = $timestamp + (10 * 24 * 60 * 60);

        // Format the new timestamp to the desired date format
        $formattedDate = date($expectedFormat, $newTimestamp);

        return $formattedDate;
    }
}
//validating function


function modify__date($validity = 1)
{

    $currentDate = new DateTime();

    // Create a string representation of the interval to add (e.g., '+1 days')
    $validity_date = '+' . $validity . ' days';

    // Modify the date to add the specified number of days
    $currentDate->modify($validity_date);

    // Format the new date as a string in 'Y-m-d' format
    $futureDate = $currentDate->format('d-m-Y');

    // Return the formatted future date
    return $futureDate;
}


//validating function

function mine_sanitize_string($string, $purified = false)
{
    if (!$purified) {

        $string = strip_tags($string);
    }

    $string = preg_replace('/\s{2,}/', ' ', $string);

    $string = addslashes($string);

    $string = htmlspecialchars($string);

    $string = trim($string);

    return $string;
}

function dec_function($string)
{
    $string = stripcslashes($string);
    $string = html_entity_decode($string);
    return $string;
}

function alerting($message, $url)
{
?>
    <script>
        alert("<?php echo $message; ?>");
        window.location.href = "<?php echo $url; ?>";
    </script>
<?php
}

//again yy-mm-dd to d-m-y

function convertDateFormat($date)
{
    $current_date_secs = strtotime($date);
    $new__date = date('d-m-Y', $current_date_secs);
    return $new__date;
}
//function remove space 

function remove__space($string)
{
    $modified_Strings =  preg_replace('/\s+/', '', $string);
    return $modified_Strings;
}

function generateRandomAlphabets($length)
{
    // Generate an array of alphabets from 'a' to 'z'
    $alphabets = range('a', 'z');

    // Shuffle the array to randomize the order of alphabets
    shuffle($alphabets);

    // Take the first $length elements from the shuffled array and join them into a string
    return implode('', array_slice($alphabets, 0, $length));
}
