<html>

<head>
    <title>Contact To Admin - Kanha Result System</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   
    <style type="text/css">
        body{
            background-color: #75e2e9;
        }
        .myForm{
            margin-top: 8%;
            padding-top: 15px;
            background-color: white;
            border:1px solid red;
            height: 79%;
        }
    </style>
</head>
<body>
<?php
include '../config.php';
$success = false;
$error = false;
if(isset( $_POST['SendMsg']))
{

//take user input
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$phone = $_POST['phone'];
$message = $_POST['message'];

//send data to my database
$sql = "INSERT INTO contact_us (name,email,subject,phone,message) VALUES ('$name','$email','$subject','$phone','$message')";
$result = mysqli_query($conn, $sql);
    if ($result) 
        {
        $success = true;
        }
    else
        {
            $error = true;
        }

$content="From: $name \n Email: $email \n Phone: $phone \n Subject: $subject \n Message: $message";
$recipient = "djkanha044@gmail.com"; //admin gmail
$mailheader = "From: $email \r\n";

    if (mail($recipient, $subject, $content, $mailheader)) 
        {
            $success = true;    
        }
    else
        {
            //$error = true;
        }
}

?>


<div class="col-xl-8 offset-xl-2">
    <div class="col-lg-12">
        <div class="card " style="margin-top:5%">
            <center><img src="contact-us.png" height="50px" ></center>
                <?php
                    if ($success) {
                        echo '<div class="alert alert-success fade show" role="alert" style="background-color:#3b4;color:white">
                                                    <strong>Thank You For Contacting Us. </strong>We Will Contact You As Soon As Possible</div>';}
                        //show error
                    if ($error) {
                        echo '<div class="alert alert-warning  fade show" role="alert"style="background-color:red;color:white">
                                                 <strong>Sorry! </strong>Your Message Is Not Sent </div>';}
                ?>
                <div class="card-header text-center">Contact Admin</div>
                    <div class="card-body card-block">

                        <form action="" method="POST">
                            <div class="form-row">
                                <div class="form-group col-md-6 mt-3">
                                    <input type="text" class="form-control" name="name" placeholder="Name*" required="">
                                </div>

                                <div class="form-group col-md-6 mt-3">
                                    <input type="email" class="form-control" name="email" placeholder="Email*" required="">
                                </div>
                            </div>


                            <div class="form-row">
                                <div class="form-group col-md-6 mt-3" >
                                    <input type="text" class="form-control" name="subject" placeholder="Subject*" required="">
                                </div>

                                <div class="form-group col-md-6 mt-3">
                                    <input type="text" class="form-control" name="phone" maxlength="10" placeholder="Mobile Number">
                                </div>
                            </div>

                            <div class="form-group mt-3">
                                <textarea class="form-control" name="message" placeholder="Enter your Message*" rows="4" cols="50" required=""></textarea>
                            </div>                                          
                            <button type="submit" name="SendMsg" class="btn btn-primary ">Send Message</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>