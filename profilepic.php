<?php
require_once('header.php');

?>
<!DOCTYPE html>
<head>
    <title>User Profile</title>
</head>
<body>
<div id="picturechooser" style="border: solid black 2px;position: absolute;top: 25%;height: 60%;width: 60%;left: 20%;">
    <div class="picdisplay" style="border: solid black 2px;position: absolute;top: 10%;height: 60%;width: 30%;left: 10%;">
        <img src="images/avatar.png" style="width: 100%;height: 100%;" alt="Profile Picture"/>
    </div>
    <div class="picselect" style="position: absolute;top: 75%;height: 10%;width: 30%;left: 10%;">
        <form id="propicform" method="post" action="uploadppic.php" enctype="multipart/form-data">
            <input type="file" name="propic_upload" id="upload_ppic"/>
            <input type="submit" name="myppic" id="uploadpic" value="Upload Picture"/>
        </form>

    </div>
    <div class="detailsdisplay" style="border: solid black 2px;position: absolute;top: 10%;height: 75%;width: 50%;left: 42%;">

    </div>
    <div class="skippage" style="position: absolute;top: 90%;height: 5%;width: 4%;right:7%;">
        <a href="" style="text-decoration: none;font-family: calibri;color: brown;float: left;font-size: 17px;">Skip</a>
    </div>
    <div class="errortexts" style="border: solid black 2px;position: absolute;top: 89%;height: 7%;width: 50%;font-family: calibri;left: 10%;text-align: center;padding-top: 5px;">
        errors go here
    </div>
</div>
</body>

</html>
