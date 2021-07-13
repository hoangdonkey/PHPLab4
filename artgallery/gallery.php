<?php
$_SESSION['username'] = "Admin";
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>My Portfolio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900|Cormorant+Garamond:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <header>
        <a href="index.php" class="header-brand">mmtuts</a>
        <nav>
            <ul>
                <li><a href="gallery.php">Portfolio</a></li>
                <li><a href="about.php">About me</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
            <a href="cases.php" class="header-cases">Cases</a>
        </nav>
    </header>
    <main>
        <div class="gallery-container">
            <?php
            include_once 'includes/config.php';
            $sql = "SELECT * FROM `gallery` ORDER BY `orderGallery` DESC;";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                echo "SQL Statement Failed!";
            } else {
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<a href="#">
                    <div style="background-image: url(img/gallery/' . $row["imgFullNameGallery"] . ');" ></div>
                    <h3>' . $row["titleGallery"] . '</h3>
                    <p>' . $row["descGallery"] . '</p>
                    </a>';
                }
            }
            ?>
            <?php
            if (isset($_SESSION['username'])) {
                echo '<div class="gallery-upload">
                <h2>Upload</h2>
                <form action="includes/insert.php" method="post" enctype="multipart/form-data">
                <input type="text" name="filename" placeholder="File name...">
                <input type="text" name="filetitle" placeholder="Image title...">
                <input type="text" name="filedesc" placeholder="Image description...">
                <input type="file" name="file">
                <button type="submit" name"submit">UPLOAD</button>
                </form>
                </div>';
            }
            ?>
        </div>
        <div class="wrapper">
            <section class="index-links">
                <a href="cases.php">
                    <div class="index-boxlink-square">
                        <h3>Cases</h3>
                    </div>
                </a>
                <a href="#">
                    <div class="index-boxlink-rectangle">
                        <h3>Portfolio</h3>
                    </div>
                </a>
                <a href="#">
                    <div class="index-boxlink-square">
                        <h3>mmtuts</h3>
                    </div>
                </a>
                <a href="#">
                    <div class="index-boxlink-rectangle">
                        <h3>YouTube Channel</h3>
                    </div>
                </a>
                <a href="#">
                    <div class="index-boxlink-square">
                        <h3>About</h3>
                    </div>
                </a>
                <a href="#">
                    <div class="index-boxlink-square">
                        <h3>Contact</h3>
                    </div>
                </a>
            </section>
        </div>
    </main>
    <div class="wrapper">
        <footer>
            <ul class="footer-links-main">
                <li><a href="#">Home</a></li>
                <li><a href="#">Cases</a></li>
                <li><a href="#">Portfolio</a></li>
                <li><a href="#">About me</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
            <ul class="footer-links-cases">
                <li>
                    <p>Latest cases</p>
                </li>
                <li><a href="#">MALING SHAOLIN - WEB DEVELOPMENT</a></li>
                <li><a href="#">EXCELLENTO - WEB DEVELOPMENT, SEO</a></li>
                <li><a href="#">MMTUTS - YOUTUBE CHANNEL</a></li>
                <li><a href="#">WELTEC - VIDEO PRODUCTION</a></li>
            </ul>
            <div class="footer-sm">
                <a href="#">
                    <img src="img/youtube-symbol.png" alt="youtube icon">
                </a>
                <a href="#">
                    <img src="img/twitter-logo-button.png" alt="youtube icon">
                </a>
                <a href="#">
                    <img src="img/facebook-logo-button.png" alt="youtube icon">
                </a>
            </div>
        </footer>
    </div>
</body>

</html>