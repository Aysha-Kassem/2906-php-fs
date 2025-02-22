<?php
session_start();
// var_dump($_SESSION);
$error = $_SESSION['errors'] ?? [];
$old = $_SESSION['old'] ?? [];

// var_dump($old);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book</title>
    <style>
        html,
        body {
            font-family: 'Times New Roman', Times, serif;
            background-image: url('../challenge/openbooks.jpg');
            /* background-image: url('openbooks.jpg'); */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            padding: 0;
            margin: 0;
            /* height: 100%; */
            /* width: 100%; */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        form {
            background-color: rgba(255, 255, 255, 0.6);
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(500px, 1fr));
            margin: 20px;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 10%;
        }

        .Genre {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
            gap: 7px;
        }

        .Languages {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
            gap: 7px;
        }

        .Languages div:last-child {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .Languages_box {
            display: grid;
            gap: 10px;
        }

        .box {
            display: flex;
            align-items: end;
            gap: 10px;
        }

        .submit {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        input[type="submit"] {
            padding: 10px 20px;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 10px;
            background-color: rgb(91, 82, 54);
        }

        label {
            font-weight: bold;
        }

        .languages {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        input[type="text"],
        input[type="number"],
        input[type="url"],
        textarea {
            width: 50%;
            padding: 5px 5px 0 5px;
            border: 0;
            border-bottom: 1.3px dotted black;
            background-color: unset;
        }
        .error{
            margin: 5px 0 0 10px;
            color:rgb(114, 11, 11);
            font-size: 13px;
            font-style: italic;
        }
    </style>
</head>

<body>
    <!-- 
     ✔️ title, 
     ✔️ author_name, 
     ✔️ year, 
     ✔️ languages (may be many), 
     ✔️ description, 
     ✔️ cover_image_url, 
     ✔️ genre (may be many), 
    -->
    <form method="post" action="store-book.php">
        <div class="box">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="<?= @$old['title'] ?>" required><br><br>
        </div>
        <div class="error"><?= @$error['title']?? ''?></div>

        <div class="box">
            <label for="author">Author:</label>
            <input type="text" id="author" name="author" value="<?= @$old['author'] ?>" required><br><br>
        </div>
        <div class="error"><?= @$error['author']?? ''?></div>

        <div class="box">
            <label for="publication_year">Publication Year:</label>
            <input type="number" id="publication_year" name="publication_year" min="0" value="<?= @$old['publication_year'] ?>" required><br><br>
        </div>
        <div class="error"><?= @$error['publication_year']?? ''?></div>

        <fieldset class="Genre">
            <legend>Genre</legend>
            <div>
                <input value="art" type="checkbox" name="genres[]" id="art">
                <label for="art">Art</label>
            </div>

            <div>
                <input value="horror" type="checkbox" name="genres[]" id="horror">
                <label for="horror">Horror</label>
            </div>

            <div>
                <input value="science" type="checkbox" name="genres[]" id="science">
                <label for="science">Science</label>
            </div>

            <div>
                <input value="fantasy" type="checkbox" name="genres[]" id="fantasy">
                <label for="fantasy">Fantasy</label>
            </div>

            <div>
                <input value="mystery" type="checkbox" name="genres[]" id="mystery">
                <label for="mystery">Mystery</label>
            </div>

            <div>
                <input value="adventure" type="checkbox" name="genres[]" id="adventure">
                <label for="adventure">Adventure</label>
            </div>

            <div>
                <input value="romance" type="checkbox" name="genres[]" id="romance">
                <label for="romance">Romance</label>
            </div>

            <div>
                <input value="history" type="checkbox" name="genres[]" id="history">
                <label for="history">History</label>
            </div>

            <div>
                <input value="crime" type="checkbox" name="genres[]" id="crime">
                <label for="crime">Crime</label>
            </div>

            <div>
                <input value="biography" type="checkbox" name="genres[]" id="biography">
                <label for="biography">Biography</label>
            </div>

            <div>
                <input value="other" type="checkbox" name="genres[]" id="other">
                <label for="other">Other</label>
            </div>

        </fieldset>
        <div class="error"><?= @$error['genres']?? ''?></div>

        <fieldset class="Languages_box">
            <legend nd>Languages</legend>
            <div class="Languages">
                <div>
                    <input type="radio" id="english" name="languages" value="english" required>
                    <label for="english">English</label>
                </div>
                <div>
                    <input type="radio" id="spanish" name="languages" value="spanish">
                    <label for="spanish">Spanish</label>
                </div>
                <div>
                    <input type="radio" id="french" name="languages" value="french">
                    <label for="french">French</label>
                </div>
                <div>
                    <input type="radio" id="italian" name="languages" value="italian">
                    <label for="italian">Italian</label>
                </div>
                <div>
                    <input type="radio" id="german" name="languages" value="german">
                    <label for="german">German</label>
                </div>
                <div>
                    <input type="radio" id="other_language" name="languages" value="other_language">
                    <label for="other_language">Other</label>
                </div>
            </div>
            <div>
                <label for="other_language_input">Other Language:</label>
                <input type="text" id="other_language_input" name="other_language_input">
            </div>
        </fieldset>
        <div class="error"><?= @$error['languages']?? ''?></div>

        <div class="box">
            <label for="description">Description:</label>
            <textarea id="description" name="description" required><?= @$old['description'] ?></textarea><br><br>
        </div>
        <div class="error"><?= @$error['description']?? ''?></div>

        <div class="box">
            <label for="image">Image</label>
            <input type="file" id="image" name="image"  required><br><br>
        </div>
        <div class="error"><?= @$error['image']?? ''?></div>

        <div class="box">
            <label for="rating">Rating:</label>
            <input type="number" id="rating" name="rating" min="0" max="10" value="<?= @$old['rating'] ?>" required><br><br>
        </div>
        <div class="error"><?= @$error['rating']?? ''?></div>

        <div class="box">
            <label for="reviews">Reviews:</label>
            <textarea id="reviews" name="reviews" required><?= @$old['reviews'] ?></textarea><br><br>
        </div>
        <div class="error"><?= @$error['reviews']?? ''?></div>

        <div class="submit">
            <input type="submit" value="Add Book">
        </div>
    </form>


</body>

</html>