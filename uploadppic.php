<?php
//initialize session
session_start();
//call db
require_once ('db/dbaccess.php');

$uploaderror = $uploadsuccess = '';
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    //get data  from form
    $target_dir = 'profilepictures/';
    $target_file = $target_dir . basename($_FILES['propic_upload']['name']);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    $useremail = $_SESSION['emaildata'];

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES['propic_upload']['tmp_name']);
    if($check != false)
    {
        $uploadsuccess = "<font color='green'>File is an image - " . $check['mime'] . ".</font>";
        $uploadOk = 1;
    }
    else
    {
        $uploaderror = "<font color='red'>File is not an image</font>";
        $uploadOk = 0;
    }
    // Check if file already exists
    if(file_exists($target_file))
    {
        $uploaderror = "<font color='red'>Sorry, file already exists</font>";
        $uploadOk = 0;
    }
    // Check file size
    if($_FILES['propic_upload']['size'] > 500000)
    {
        $uploaderror = "<font color='red'>Sorry, your file is too large</font>";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg' && $imageFileType != 'gif')
    {
        $uploaderror = "<font color='red'>Sorry, only JPG, JPEG, PNG & GIF files are allowed</font>";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if($uploadOk == 0)
        $uploaderror = "<font color='red'>Sorry, your file was not uploaded</font>";
    else
    {
        // if everything is ok, try to upload file and send to database
        if(move_uploaded_file($_FILES['propic_upload']['tmp_name'], $target_file))
        {
            $uploadsuccess = "<font color='green'>Your profile picture has been uploaded successfully</font>";
            mysqli_query($conn,"UPDATE memberise SET profilepic = '$target_file' WHERE email = '$useremail'");
        }
        else
        {
            $uploaderror = "<font color='red'>Sorry, there was an error uploading your file</font>";
        }
    }
    $getpicture = mysqli_query($conn, "SELECT *,profilepic FROM memberise WHERE email = '$useremail'");
    if(mysqli_num_rows($getpicture)>0)
    {
        $fetchpicture = mysqli_fetch_assoc($getpicture);
        $userprofpic = $fetchpicture['profilepic'];
    }
    else
        $uploaderror = "<font color='red'>No profile picture was found</font>";

    if($uploaderror)
        echo json_encode(array('uploaderror'=>$uploaderror));
    else
        echo json_encode(array('uploadsuccess'=>$uploadsuccess,'userprofilepic'=>$userprofpic));

}


?>