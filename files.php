<!DOCTYPE html>
<html>

<head>
    <title>File Upload</title>
    <!-- Include your CSS and other scripts here -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }

        h1 {
            font-size: 32px;
            font-weight: bold;
            text-align: center;
            margin-top: 0;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th {
            background-color: #333;
            color: #fff;
            text-align: left;
            padding: 10px;
        }

        td {
            border: 1px solid #ccc;
            padding: 10px;
        }

        .btn {
            display: inline-block;
            padding: 10px;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn:hover {
            background-color: #555;
        }

        .success {
            color: green;
        }

        .error {
            color: red;
        }

        a.button {
            display: inline-block;
            padding: 10px;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        .upload-btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            background-color: #4CAF50;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .upload-btn:hover {
            background-color: #3e8e41;
        }

        .upload-btn:active {
            background-color: #367c39;
            box-shadow: none;
            transform: translateY(1px);
        }

        .file-upload {
            display: inline-block;
            padding: 10px;
            background-color: #f0f0f0;
            color: #444;
            font-size: 14px;
            font-weight: bold;
            text-transform: uppercase;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }

        .file-upload:hover {
            background-color: #e0e0e0;
        }

        .file-upload:active {
            background-color: #d0d0d0;
            box-shadow: none;
            transform: translateY(1px);
        }

        .file-upload input[type="file"] {
            display: none;
        }
    </style>
</head>

<body>
    <!-- Your HTML code for the file upload form and file list here -->
    <h1>File Upload</h1>
    <div class="container">
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <label class="file-upload">Choose File<input type="file" name="file" id="fileInput"></label>
            <p>After choosing your file, Click on upload!</p>
            <div id="uploadMessage"></div><br>
            <button class="upload-btn" value="upload" type="submit">Upload</button>

            <a href="dashboard.php" class="button">Back to dashboard</a>

        </form>
        <br\><br>
    </div>
    <br><br>
    <script>
        const fileInput = document.getElementById('fileInput');
        const uploadMessage = document.getElementById('uploadMessage');

        fileInput.addEventListener('change', () => {
            const file = fileInput.files[0];
            if (file) {
                uploadMessage.textContent = `${file.name} ready to be uploaded`;
            }
        });
    </script>
    <?php
    // Display a table of uploaded files
    if (!is_dir('uploads')) {
        mkdir('uploads');
    }

    if ($handle = opendir('uploads')) {
        echo '<table>';
        echo '<tr><th>Filename</th><th>Size</th></tr>';
        while (false !== ($entry = readdir($handle))) {
            if ($entry != '.' && $entry != '..') {
                $path = 'uploads/' . $entry;
                echo '<tr>';
                echo '<td><a href="' . $path . '">' . $entry . '</a></td>';
                echo '<td>' . filesize($path) . ' bytes</td>';
                echo '</tr>';
            }
        }
        echo '</table>';
        closedir($handle);
    }
    ?>
</body>

</html>