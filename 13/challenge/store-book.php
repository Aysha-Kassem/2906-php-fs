<pre>
<?php
session_start();

$errors = [];

$old = $_POST;

extract($_POST);

var_dump($_POST);
var_dump($_FILES);

// validation title
if (empty($title)) {
    $errors['title'] = 'Title is required';
}else{
    if(!preg_match('/^[a-z\d\s]+$/i', $title)){
        $errors['title'] = 'Title can only contain letters and numbers';
    }
}

// validation author
if (empty($author)) {
    $errors['author'] = 'Author is required';
}else{
    if(!preg_match('/^[a-z\s]+$/i', $author)){
        $errors['author'] = 'Author can only contain letters';
    }
}

// validation publication_year
if (empty($publication_year)) {
    $errors['publication_year'] = 'Publication year is required';
}elseif($publication_year < 0){
    $errors['publication_year'] = 'Publication year is required and must be a positive number';
}else{
    if(!is_numeric($publication_year)){ // positive number
        $errors['publication_year'] = 'Publication year must be a number';
    }elseif(!preg_match('/^(16|17|18|19|20)\d{2}$/', $publication_year)){
        $errors['publication_year'] = 'Publication year must be a 4-digit number (e.g. 2021, 1956)';
    }
}

// validation genres
if (empty($genres)) {
    $errors['genres'] = 'At least one genre must be selected';
}else{
    $genres = array_map('strtolower', $genres);
    if(count($genres) > 10){
        $errors['genres'] = 'You can only select up to 10 genres';
    }
}

// validation languages just one
if (empty($languages)) {
    $errors['languages'] = 'You must select exactly one language';
}

// validation description
if (empty($description)) {
    $errors['description'] = 'Description is required';
}else{
    if(strlen($description) > 500){
        $errors['description'] = 'Description should not exceed 500 characters';
    }
}

// validation file image
if (empty($image)) {
    $errors['image'] = 'Image is required';
}


// validation rating
if (empty($rating)) {
    $errors['rating'] = 'Rating is required';
}else{
    if(!is_numeric($rating)){
        $errors['rating'] = 'Rating must be a number';
    }elseif($rating < 0 || $rating > 10){
        $errors['rating'] = 'Rating must be a number between 0 and 10';
    }
}

// validation reviews
if (empty($reviews)) {
    $errors['reviews'] = 'Reviews are required';
}else{
    if(strlen($reviews) > 500){
        $errors['reviews'] = 'Reviews should not exceed 500 characters';
    }
}


if(!empty($errors)){
    $_SESSION['errors'] = $errors;
    $_SESSION['old'] = $old;
    header('Location: add-book.php');
}else{
    $_SESSION['The Book'] = $old;
    header('Location: book.php');
    exit(); 
}

var_dump($errors);