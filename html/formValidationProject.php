<?php
// $NameError = "";
// $EmailError = "";
// $GenderError = "";
// $WebsiteError = "";
if (isset($_POST["Submit"])) {
    function test_user_input($Data)
    {
        return $Data;
    }
    $values = [
        'Name' => [$_POST['Name'], $NameRegex],
        'Email' => [$_POST['Email'], $EmailRegex],
        'Gender' => [$_POST['Gender']],
        'Website' => [$_POST['Website'], $websiteRegex],
    ];
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
    $error;
    foreach ($values as $key => $value) {
        if (empty($value[0])) {
            $error .= "$key is required";
        } elseif (isset($value[1]) && empty($value[0])) {
            $key = test_user_input($value);
            $success = preg_match($value[1], $key);
            if ($success === false) {
                $error .= "Please enter a valid $key";
            }
        }
    }
    if (empty($error)) {
        $name = ucwords($_POST["Name"]);
        $email = $_POST['Email'];
        $website = $_POST['Website'];
        $comment = $_POST['Comment'];
        echo "
            <h2>Your Submit Information: </h2> <br />
            Name:  $name <br />
            Email: $email <br />
            Gender: $gender <br />
            Website: $website <br />
            Comments: $comment <br />
        ";
    }
    echo (isset($error)) ? "<span class=\"Error\">$error</span>" : '';
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
    <title>Document</title>
</head>

<body>

    <h2>Form Validation with PHP.</h2>

    <!-- This section returns an error -->
    <form action="#" method="post">
        <legend>* Please Fill Out the following Fields.</legend>
        <fieldset>
            Name:
            <br />
            <input class="input is-primary" type="text" placeholder="Your Name" Name="Name" value="">
            E-mail:
            <br />
            <input class="input is-primary" type="text" placeholder="Your Email" Name="Email" value="">
            <span class="icon is-small is-danger">*<?php echo $EmailError; ?></span>
            <br />
            Gender:
            <br />
            <input class="radio" type="radio" Name="Gender" value="Female">Female
            <input class="radio" type="radio" Name="Gender" value="Male">Male
            <br />
            Website:
            <br />
            <input class="input" type="text" Name="Website" value="">
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
