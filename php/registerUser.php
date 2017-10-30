<?php
/**
 * Created by PhpStorm.
 * User: Ngoc Quy
 * Date: 10/25/2017
 * Time: 11:55 PM
 */
include 'header.php';?>


<?php
$yourEmail = NULL;
$yourPassword = NULL;
$yourPhone = NULL;
$falsePassword = NULL;
$falseEmail= NULL;
$falsePhone = NULL;

if ($_SERVER["REQUEST_METHOD"]=="POST") {
    $yourEmail = $_POST["email"];
    $yourPassword = $_POST["password"];
    $yourPhone = $_POST["phone"];
//    returnValidationInput($yourEmail,$yourPassword,$yourPhone);


    if (!checkPhoneValidation($yourPhone)){
        $falsePhone = "YourPhone don't blank";
    }
    if (!checkPasswordValidation($yourPassword)){
        $falsePassword = "YourPassword don't blank";
    }
    if (!checkEmailValidation($yourEmail)){
        $falseEmail = "YourEmail don't blank or true syntax:xxx@xxx.xxx.xxx";
    }
    else{
        try{
            $getArrayFromForm = array(
                'email' => $yourEmail,
                'password' => $yourPassword,
                'phone' => $yourPhone
            );
            writeFileJson($getArrayFromForm);
        }
        catch (Exception $exception){
            echo "ERROR", $exception->getMessage();
        }

    }


    // print_r($_POST['dateFrom']);die;

}
function readFileJson(){
    $linkFileJson = "data.json";
    $getJson = json_decode(file_get_contents($linkFileJson), true);

    return $getJson;
}

function writeFileJson($arrayToJson){
    $linkFileJson = 'data.json';
    $getJson = json_decode(file_get_contents($linkFileJson), true);
    array_push($getJson,$arrayToJson);

    $addDataFileJson = json_encode($getJson, JSON_PRETTY_PRINT);
    file_put_contents($linkFileJson, $addDataFileJson);
    echo "Add User success!";
}
function getJsonToArray($getJson = array()){
    foreach ($getJson as  $value) {
        echo "<tr>";
        echo "<td>".$value['email']."</td>";
        echo "<td>".$value['phone']."</td>";
        echo "</tr>";
    }
}
function checkEmailValidation($email){
    if ((empty($email))){
        return false;
    }
    elseif (!(filter_var($email, FILTER_VALIDATE_EMAIL))){
        return false;
    }
    return true;
}
function checkPasswordValidation($password){
    if ((empty($password))){
        return false;
    }
    return true;
}
function checkPhoneValidation($phone){
    if ((empty($phone))){
        return false;
    }
    return true;
}

?>

    <div class="container">
        <div class="myform">

            <form action="" method="POST" role="form">
                <legend><h3 class=""><strong>Register for Us</strong></h3></legend>

                <div class="form-group">
                    <!--                <label for="">Register User:</label>-->
                    <input type="text" class="form-control" name="email" id="" placeholder="Your Name">

                    <span class="errorMessage"><?php echo $falseEmail;?></span>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" id="" placeholder="Your password">

                    <span class="errorMessage"><?php echo $falsePassword;?></span>
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" name="phone" id="" placeholder="Your Number">

                    <span class="errorMessage"><?php echo $falsePhone;?></span>
                </div>
                <button type="submit" class="btn btn-primary" id="formHello">Submit</button>
            </form>

        </div>
    </div>

    <hr>

    <table class="table ">

        <thead>
        <tr>

            <th class="email">Email</th>
            <th class="phone">Phone</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $getarrayJson = array();
        $getarrayJson = readFileJson();
        getJsonToArray($getarrayJson);
        ?>
        </tbody>
    </table>
<?php