<?php

class databaseQ
{
    private $server = "localhost";
    private $username = "root";
    private $pass = "";
    private $db = "multivendor";

    private $con = false;
    private $errorMessage = "unfortunately you are not connected to database";

    public function __construct()
    {
        if (!$this->con) {
            $this->con = mysqli_connect($this->server, $this->username, $this->pass, $this->db);
        }
    }

    public function selectAll($table)
    {
        if ($this->con) {
            $selectQry = "SELECT * FROM `$table`";
            $selectQryP =  mysqli_prepare($this->con, $selectQry);
            mysqli_stmt_execute($selectQryP);
            $result = mysqli_stmt_get_result($selectQryP);
            return $result;
        } else {
            echo  $this->errorMessage;
        }
    }

    public function selectConditionalData($table, $condition_associative_Array)
    {
        if (!$this->con) {
            throw new Exception($this->errorMessage);
        }
    
        if ($condition_associative_Array) {
            $condition = [];
            $prepared_parameters = [];
            $dataT = '';
            $paramValues = [];
    
            foreach ($condition_associative_Array as $key => $value) {
                $condition[] = "`$key` = ?";
                $paramValues[] = $value;
                $dataT .= is_string($value) ? 's' : 'i';
            }
    
            $selectCdata = "SELECT * FROM `$table` WHERE " . implode(' AND ', $condition);
            $selectCdataP = mysqli_prepare($this->con, $selectCdata);
    
            if (!$selectCdataP) {
                throw new Exception("Failed to prepare SELECT query with condition");
            }
    
            // Bind parameters individually
            $bindParams = array_merge([$selectCdataP, $dataT], $paramValues);
            $bindParamsRefs = [];
            foreach ($bindParams as $key => &$value) {
                $bindParamsRefs[$key] = &$value;
            }
    
            call_user_func_array('mysqli_stmt_bind_param', $bindParamsRefs);
    
            mysqli_stmt_execute($selectCdataP);
            $result = mysqli_stmt_get_result($selectCdataP);
    
            return $result;
        }
    
        // Handle the case where no condition is provided
        return null;
    }
    

    public function insertData($table, $column_value_associative_array)
    {
        //some neccessary action before starting
        if ($this->con) {
            $qry_columns = array_keys($column_value_associative_array);
            $qry_column_values = array_values($column_value_associative_array);
            $dataType = '';
            $questionMark = [];

            foreach ($column_value_associative_array as $key => $value) {
                $dataType .= is_string($value) ? 's' : 'i';
                $questionMark[] = '?';
            }

            $qry = "INSERT INTO `$table`(`" . implode('`,`', $qry_columns) . "`) VALUES(" . implode(',', $questionMark) . ")";
            $prepare_qry = mysqli_prepare($this->con, $qry);
            $params = array_merge([$prepare_qry, $dataType], $qry_column_values);

            // Pass parameters by reference
            foreach ($params as $key => &$value) {
                $params[$key] = &$value;
            }

            call_user_func_array('mysqli_stmt_bind_param', $params);
            if (mysqli_stmt_execute($prepare_qry)) {
                $res = mysqli_stmt_get_result($prepare_qry);
                if (mysqli_num_rows($res) > 0) {
                    return array('status' => 'success', 'message' => "successfully enter the data");
                } else {
                    return array('status' => 'error', 'message' => "failed to enter the data");
                }
            } else {
                echo "unfortunately query failed";
            }
        } else {
            echo $this->errorMessage;
        }
    }

    function __destruct()
    {
        if ($this->con) {
            mysqli_close($this->con);
        }
    }
}

$dataOperations = new databaseQ();




//tomorrow we will make

// user table column

//name
//surname
//gender
//email
//phone
//country code
//zip
//city foriegn key reference table city
//country foriegn key reference table city country
//password
//date

//vendor table
//name
//surname
//email
//phone
//Cnic
//business
//business url
//country code // reference country
//address
//zipcode
//city foriegn key reference table city
//country foriegn key reference table city country
//password
//date

//country table
//country name
//country code

// tables
//ad
// 

// city table
//city name
//country id column

//product table

//name
//description
// regular price
// sale price
//quantity
//sku
//brand
//vendor id
//product-type
// featured image
//gallery images
//dimensions

//attribute table
//attribute name array
// attribute value name array

//variations table
// id
// product id
//variations

//orders table
//name firstname
//company name
//country
//region
//street address
//city
//zipcode
//email
//phone number
//product id tables
//product quantity table
//user id
//vendor id
//date

//catgeory table
// name
//parent category-id

// public function selectConditionalData($table, $condition_associative_Array)
// {
//     if ($this->con) {
//         if ($condition_associative_Array) {
//             $prepared_condition = [];
//             $prepared_parameters = [];
//             $dataT = '';
//             foreach ($condition_associative_Array as $key => $value) {
//                 $condition[] = "`$key` = ?";
//                 $prepared_parameters[] = $value;
//                 $dataT .= is_string($value) ? 's' : 'i';
//             }
//             $selectCdata = "SELECT * FROM `$table` WHERE " . implode(', ', $condition);
//             $selectCdataP = mysqli_prepare($this->con, $selectCdata);
//             mysqli_stmt_bind_param($selectCdataP, $dataT, implode(',', $prepared_parameters));
//             mysqli_stmt_execute($selectCdataP);
//             $result = mysqli_stmt_get_result($selectCdataP);

//             return $result;
//         }
//     } else {
//         echo  $this->errorMessage;
//     }
// }