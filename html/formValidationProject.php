<?php
$NameError = "";
$EmailError = "";
$GenderError = "";
$WebsiteError = "";
if(isset($_POST["Submit"])){
    $NameIsEmpty = empty($_POST["Name"]);
    $EmailIsEmpty = empty($_POST["Email"]);
    $GenderIsEmpty = empty($_POST["Gender"]);
    $WebsiteIsEmpty = empty($_POST["Website"]);

    $NameRegex = "/^[A-Za-z. ]*$/";
    $EmailRegex = "/[a-zA-Z0-9._-]{3,}@[a-zA-Z0-9._-]{3,}[.]{1}[a-zA-Z0.9._-]{2}/";
    $WebsiteRegex = "/(https:|ftp:)\/\/+[a-zA-Z0-9.\-_\/?\$=&\#\~`!]+\.[a-zA-Z0-9.\-_\/?\$=&\#\~`!]*/";

    
    // $NameIsEmpty ? $NameError = "Name is Required" : $Name = Test_User_Input($_POST["Name"])
    // && !preg_match($NameRegex, $Name = Test_User_Input($_POST["Name"])) 
    // ? $NameError = "Only Letters and White Space are allowed" : "";
    // $EmailIsEmpty ? $EmailError = "Email is Required" : $Email = Test_User_Input($_POST["Email"])
    // && !preg_match($EmailRegex, $Email = Test_User_Input($_POST["Email"])) 
    // ? $EmailError = "Is not a valid email" : "";

    if($NameIsEmpty){
        $NameError = "Name is Required";
    }else{
        $Name = Test_User_Input($_POST["Name"]);
        if(!preg_match($NameRegex, $Name)){
            $NameError = "Only Letters And White Space";
            
        }
    }

    if($EmailIsEmpty){
        $EmailError = "Name is Required";
    }else{
        $Email = Test_User_Input($_POST["Email"]);
        if(!preg_match($EmailRegex, $Email)){
            $EmailError = "Is not a valid email";
            
        }
    }

    if($WebsiteIsEmpty){
        $WebsiteError = "Name is Required";
    }else{
        $Website = Test_User_Input($_POST["Website"]);
        if(!preg_match($WebsiteRegex, $Website)){
            $WebsiteError = "Is not a valid Website";
            
        }
    }

    $EmailIsEmpty ? $EmailError = "Name is Required" : $Email = Test_User_Input(["Email"]); 
    $GenderIsEmpty ? $GenderError = "Gender is Required" : $Gender = Test_User_Input(["Gender"]); 
    $WebsiteIsEmpty ? $WebsiteError = "Website is Required" : $Website = Test_User_Input(["Website"]); 

    
}

function Test_User_Input($Data){
    return $Data;

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