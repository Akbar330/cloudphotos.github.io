<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photo Gallery</title>
    <link rel="stylesheet" href="styles2.css">
</head>
<body>
    <h1>Photo Gallery</h1>

    <div class="gallery">
        <?php
        // Path to the directory containing uploaded images
        $uploadDir = "uploads/";

        // Get list of all files in the directory
        $files = scandir($uploadDir);

        // Loop through each file in the directory
        foreach ($files as $file) {
            // Skip '.' and '..' directories
            if ($file != '.' && $file != '..') {
                // Display each image file as an <img> element inside a container
                echo '<div class="image-container">';
                echo '<img src="' . $uploadDir . $file . '" alt="' . $file . '">';
                echo '<div class="image-name">' . $file . '</div>';
                echo '</div>';
            }
        }
        ?>
    </div>

    <a href="index.html" class="button">Back to Upload Page</a>

    <script src="script.js"></script>
</body>
</html>
