<pre>
<?php
session_start();
$Book = $_SESSION['The Book'] ?? [];

// var_dump($_SESSION);
// var_dump($Book);
?>
</pre>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Book</title>
    <style>
        html,
        body {
            font-family: 'Times New Roman', Times, serif;
            background-color: bisque;
            padding: 0;
            margin: 0;
        }

        nav {
            display: flex;
            justify-content: space-around;
            align-items: center;
            background-color: #0145;
            padding: 10px;
            color: white;
            font-size: 13px;
        }

        nav a {
            text-decoration: none;
            color: inherit;
        }

        .img {
            padding: 10px;
        }

        .about {
            padding: 20px;
            display: grid;
            gap: 10px;
        }
        .about div{
            font-size: large;
        }

    </style>
</head>

<body>
    <nav>
        <a href="index.php">Back to Home</a>
        <a href="edit-book.php">Edit Book</a>
        <a href="delete-book.php">Delete Book</a>
        <a href="logout.php">Logout</a> <!-- Add logout functionality -->
        <a href="logout.php">Log Out</a> <!-- Add logout functionality -->
    </nav>
    <div>
        <div class="img">
            <img src="<?= @$Book['image'] ?>" alt="Cover Image" style=" max-width: 100%; height: auto; border-radius: 10%;">
        </div>
        <div class="about">
            <div><strong>Title:</strong>  <?= @$Book['title'] ?></div>
            <div><strong>Author:</strong>  <?= @$Book['author'] ?></div>
            <div><strong>Publication Year:</strong>  <?= @$Book['publication_year'] ?></div>
            <div><strong>Genre:</strong>  
                <?php foreach (@$Book['genres'] as $review) {
                    echo "$review. ";
                } ?>
            </div>
            <div><strong>Languages:</strong>  <?= @$Book['languages'] ?></div>
            <div><strong>Rating:</strong>  <?= @$Book['rating'] ?>/10</div>
            <div><strong>Description:</strong>  <?= @$Book['description'] ?></div>
            <div><strong>Reviews:</strong>  <?= @$Book['reviews'] ?></div>

          
        </div>
    </div>

</body>

</html>