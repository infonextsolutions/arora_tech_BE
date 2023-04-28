<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<?php
include_once 'dbconnect.php';
include_once "model.php";
include_once "include/head.php";

?>

<head>
    <title>File Insert</title>
</head>

<body>

    <h4>Please Choose a Map and click Submit</h4>
    <hr />
    <div id="form_container" class="container">
        <form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>" name="userfile" method="post" class="col-sm-6">

            <input name="userfile" class="btn btn-outline-info" type="file" />
            <br />
            <br />

            <label>Sector </label>
            <input class="form-control   required" type="text" id="sectorno" name="sectorno" placeholder="Input the sector" value="" />
            <br />
            <br />
            <input type="submit" value="Submit" class="btn btn-outline-primary" />
        </form>
    </div>
    <?php


    // check if a file was submitted
    if (!isset($_FILES['userfile'])) {
        echo '<br /><div class="alert alert-danger">Please select a file</div>';
    } else {
        try {
            $msg = upload();  //this will upload your image
            echo "<div class='alert'>" . $msg . "</div>";  //Message showing success or failure.
        } catch (Exception $e) {
            echo $e->getMessage();
            echo 'Sorry, could not upload file';
        }
    }

    // the upload function

    function upload()
    {

        $maxsize = 20000000; //set to approx 10 MB
        //$size = getimagesize($_FILES['userfile']['tmp_name']);
        //print_r ($size);
        //check associated error code
        if ($_FILES['userfile']['error'] == UPLOAD_ERR_OK) {

            //check whether file is uploaded with HTTP POST
            if (is_uploaded_file($_FILES['userfile']['tmp_name'])) {
                $path = "uploads/";
                $path = $path . str_replace(' ', '_', basename($_FILES['userfile']['name']));


                //checks size of uploaded image on server side
                if ($_FILES['userfile']['size'] < $maxsize) {
                    $uploaded =  move_uploaded_file($_FILES['userfile']['tmp_name'], $path);

                    // prepare the image for insertion
                    // $imgData = addslashes(file_get_contents($_FILES['userfile']['tmp_name']));

                    // put the image in the db...
                    // database connection
                    $conn = $GLOBALS['db'];
                    // select the db
                    // mysqli_select_db ($db) OR DIE ("Unable to select db".mysqli_error());

                    // our sql query
                    $sql = "INSERT INTO images
                    (image, sectorno)
                    VALUES
                    ('$path', '{$_POST['sectorno']}');";

                    // insert the image
                    mysqli_query($conn, $sql) or die("Error in Query: " . mysqli_error($conn));
                    $msg = "<div class='alert alert-success'>Image successfully saved in database </div>";
                    //sleep(3);
                    //header("Location: http://www.arorarealtech.in/index.php");

                } else {
                    // if the file is not less than the maximum allowed, print an error
                    $msg = '<div class="alert alert-danger">File exceeds the Maximum File limit</div>
                <div>Maximum File limit is ' . $maxsize . ' bytes</div>
                <div>File ' . $_POST['name'] . ' is ' . $_FILES['userfile']['size'] .
                        ' bytes</div><hr />';
                }
            } else
                $msg = "File not uploaded successfully.";
        } else {
            $msg = file_upload_error_message($_FILES['userfile']['error']);
        }
        return $msg;
    }

    // Function to return error message based on error code

    function file_upload_error_message($error_code)
    {
        switch ($error_code) {
            case UPLOAD_ERR_INI_SIZE:
                return 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
            case UPLOAD_ERR_FORM_SIZE:
                return 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
            case UPLOAD_ERR_PARTIAL:
                return 'The uploaded file was only partially uploaded';
            case UPLOAD_ERR_NO_FILE:
                return 'No file was uploaded';
            case UPLOAD_ERR_NO_TMP_DIR:
                return 'Missing a temporary folder';
            case UPLOAD_ERR_CANT_WRITE:
                return 'Failed to write file to disk';
            case UPLOAD_ERR_EXTENSION:
                return 'File upload stopped by extension';
            default:
                return 'Unknown upload error';
        }
    }
    ?>
</body>

</html>