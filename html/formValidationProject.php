<?php
$NameError = "";
$EmailError = "";
$GenderError = "";
$WebsiteError = "";
if(isset($_POST["Submit"])){
    function test_user_input($Data){
        return $Data;
    
    }
    $NameIsEmpty = empty($_POST["Name"]);
    $EmailIsEmpty = empty($_POST["Email"]);
    $GenderIsEmpty = empty($_POST["Gender"]);
    $WebsiteIsEmpty = empty($_POST["Website"]);

    $NameRegex = "/^[A-Za-z. ]*$/";
    $EmailRegex = "/[a-zA-Z0-9._-]{3,}@[a-zA-Z0-9._-]{3,}[.]{1}[a-zA-Z0.9._-]{2}/";
    $WebsiteRegex = "/(https:|ftp:)\/\/+[a-zA-Z0-9.\-_\/?\$=&\#\~`!]+\.[a-zA-Z0-9.\-_\/?\$=&\#\~`!]*/";

    
    // $NameIsEmpty ? $NameError = "Name is Required" : $Name = test_user_input($_POST["Name"])
    // && !preg_match($NameRegex, $Name = test_user_input($_POST["Name"])) 
    // ? $NameError = "Only Letters and White Space are allowed" : "";
    // $EmailIsEmpty ? $EmailError = "Email is Required" : $Email = test_user_input($_POST["Email"])
    // && !preg_match($EmailRegex, $Email = test_user_input($_POST["Email"])) 
    // ? $EmailError = "Is not a valid email" : "";

    // function validatorRegex($EmailRegex, $Email){
    //     if(preg_match($EmailRegex, $Email)){
    //         return true;
    //     }
        
    // }

    
    
    if($NameIsEmpty){
        $NameError = "Name is Required";
    }else{
        $Name = test_user_input($_POST["Name"]);
        $NameSuccess = preg_match($NameRegex, $Name);
        if($NameSuccess == false){
            $NameError = "Only letters and white space are permitted";

        }
    }

    if($EmailIsEmpty){
        $EmailError = "Name is Required";
    }else{
        $Email = test_user_input($_POST["Email"]);
        $EmailSuccess = preg_match($EmailRegex, $Email);
        if($EmailSuccess == false){
            $EmailError = "Is not a valid email";
        }
        
    }
    if($GenderIsEmpty){
        $GenderError = "Gender is Required";
    }

    if($WebsiteIsEmpty){
        $WebsiteError = "Name is Required";
    }else{
        $Website = test_user_input($_POST["Website"]);
        $WebsiteSuccess = preg_match($WebsiteRegex, $Website);
        if($WebsiteSuccess == false){
            $WebsiteError = "Is not a valid Website";

        }
    }

    if(!$NameIsEmpty && !$EmailIsEmpty && !$WebsiteIsEmpty && !$GenderIsEmpty){
        if($NameSuccess && $EmailSuccess && $WebsiteSuccess){
            echo "<h2>Your Submit Information: </h2> <br />";
            echo "Name:  {$_POST["Name"]} <br />";
            echo "Email:  {$_POST["Email"]} <br />";
            echo "Gender:  {$_POST["Gender"]} <br />";
            echo "Website:  {$_POST["Website"]} <br />";
            echo "Comments:  {$_POST["Comment"]} <br />";

        }else{
            echo "Please complete the form again!";
        }
    }
    
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h2>Form Validation with PHP.</h2>

    <form  action="formValidationProject.php" method="post"> 
        <legend>* Please Fill Out the following Fields.</legend>			
        <fieldset>
            Name:
            <br />
            <input class="input" type="text" Name="Name" value="">
            <span class="Error">*<?php echo $NameError;  ?></span><br />	 
            E-mail:
            <br />
            <input class="input" type="text" Name="Email" value="">
            <span class="Error">*<?php echo $EmailError; ?></span>
            <br />
            Gender:
            <br />
            <input class="radio" type="radio" Name="Gender" value="Female">Female
            <input class="radio" type="radio" Name="Gender" value="Male">Male
            <span class="Error">*<?php echo $GenderError; ?></span>
            <br />		   
            Website:
            <br />
            <input class="input" type="text" Name="Website" value="">
            <span class="Error">*<?php echo $WebsiteError; ?></span>
            <br />
            Comment:
            <br />
            <textarea Name="Comment" rows="5" cols="25"></textarea>
            <br />
            <br />
            <input type="Submit" Name="Submit" value="Submit Your Information">
        </fieldset>
</form>
    
</body>
</html>