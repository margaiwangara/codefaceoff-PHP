<?php
//connect to db
require_once ('db/dbaccess.php');

?>
<!DOCTYPE html>
<head>
    <title>Image Test</title>
    <script type="text/javascript">
    </script>
</head>
<body>
    <fieldset style="width: 40%;">
        <form action="" method="" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Input image</td>
                </tr>
                <tr>
                    <td><input type="file" name="imageinput"/></td>
                </tr>
                <tr>
                    <td><button id="submitimage">Send Image</button> </td>
                </tr>
                <tr>
                    <td><div class="imagedisplay"></div></td>
                </tr>
            </table>
        </form>
    </fieldset>

</body>
</html>
