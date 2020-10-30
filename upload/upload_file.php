
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Upload file</title>
    </head>
    <body>
        <div id = "content">
            <h1>Upload ảnh lên server</h1>
            <form action="./upload.php" id = "form_upload" method="POST" enctype="multipart/form-data">
                <input type="file" name="upload_file"> <br/><br/>
                <input type="submit" name="submit" value="upload"><br/>
            </form>
        </div>
    </body>
</html>