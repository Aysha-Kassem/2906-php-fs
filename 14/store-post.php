<?php
session_start();

require_once 'functions.php';

// User ID from the session storage after login
$user_id = 104;

$errors = [];
$old = $_POST;

// Validate single image upload
if (empty($_FILES['image']['name'])) {
    $errors['image'] = 'Please upload an image';
} elseif (!empty($_FILES['image']['error'])) {
    $errors['image'] = 'Error uploading image: ' . $_FILES['image']['error'];
} else {
    $tmp_name = $_FILES['image']['tmp_name'];
    $name = $_FILES['image']['name'];
    $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION)); // Get and lowercase extension
    $file_info = getimagesize($tmp_name);

    // Validate file size (5MB limit)
    if ($_FILES['image']['size'] > 5 * 1024 * 1024) {
        $errors['image'] = 'Image size should not exceed 5MB';
    }
    // Validate file name
    elseif (!preg_match('/^[a-z\d\.\-_]+$/i', $name)) {
        $errors['image'] = 'Invalid file name. Only alphanumeric characters, dots, underscores, and hyphens are allowed.';
    }
    // Validate file extension
    elseif (!in_array($ext, ['jpg', 'jpeg', 'png'])) {
        $errors['image'] = 'Invalid image format. Only jpg, jpeg, and png are allowed.';
    }
    // Validate MIME type
    elseif (!in_array($file_info['mime'], ['image/jpeg', 'image/png'])) {
        $errors['image'] = 'Invalid image format. Only jpg, jpeg, and png are allowed!';
    }
    // Upload the file
    else {
        $file_name = $user_id . date('ymdhis') . mt_rand(11111, 99999) . '.' . $ext;
        if (move_uploaded_file($tmp_name, "public/uploads/$file_name")) {
            $_POST['image'] = $file_name;
        } else {
            $errors['image'] = 'Failed to upload image';
        }
    }
}

// Validate multiple images upload
if (empty($_FILES['images']['name'][0])) {
    $errors['images'] = 'Please upload at least one image';
} else {
    $images = $_FILES['images'];
    $images_errors = false;
    $images_names = [];

    // Loop through each image
    foreach ($images['name'] as $index => $name) {
        $tmp_name = $images['tmp_name'][$index];
        $error = $images['error'][$index];
        $size = $images['size'][$index];
        $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION)); // Get and lowercase extension
        $file_info = getimagesize($tmp_name);

        // Validate file upload error
        if ($error !== UPLOAD_ERR_OK) {
            $errors['images'][$name] = 'Error uploading image: ' . $error;
            $images_errors = true;
            continue;
        }

        // Validate file size (5MB limit)
        elseif ($size > 5 * 1024 * 1024) {
            $errors['images'][$name] = 'Image size should not exceed 5MB';
            $images_errors = true;
        }

        // Validate file name
        elseif (!preg_match('/^[a-z\d\.\-_]+$/i', $name)) {
            $errors['images'][$name] = 'Invalid file name. Only alphanumeric characters, dots, underscores, and hyphens are allowed.';
            $images_errors = true;
        }

        // Validate file extension
        elseif (!in_array($ext, ['jpg', 'jpeg', 'png'])) {
            $errors['images'][$name] = 'Invalid image format. Only jpg, jpeg, and png are allowed.';
            $images_errors = true;
        }

        // Validate MIME type
        elseif (!in_array($file_info['mime'], ['image/jpeg', 'image/png'])) {
            $errors['images'][$name] = 'Invalid image format. Only jpg, jpeg, and png are allowed!';
            $images_errors = true;
        }

        // If no errors, prepare to upload
        elseif (!$images_errors) {
            $file_name = $user_id . date('ymdhis') . mt_rand(11111, 99999) . '.' . $ext;
            if (move_uploaded_file($tmp_name, "public/uploads/$file_name")) {
                $images_names[] = $file_name; // Store uploaded file name
            } else {
                $errors['images'][$name] = 'Failed to upload image';
                $images_errors = true;
            }
        }
    }

    // If no errors, display success message
    if (!$images_errors) {
        echo 'All images uploaded successfully: ' . implode(', ', $images_names);
    }
}

// dd($errors['images']);


// Validate form inputs
extract($_POST);

// Validate title
if ($title === '') {
    $errors['title'] = 'Title is required';
} elseif (strlen($title) < 3 || strlen($title) > 30) {
    $errors['title'] = 'Title should be between 3 and 30 characters';
}

// Validate body
if ($body === '') {
    $errors['body'] = 'Body is required';
} elseif (strlen($body) < 10 || strlen($body) > 300) {
    $errors['body'] = 'Body should be between 10 and 300 characters';
}

// Validate post_status_id
if (!isset($post_status_id)) {
    $errors['post_status_id'] = 'Post Status is required';
} elseif (!in_array($post_status_id, [1, 2, 3, 4])) {
    $errors['post_status_id'] = 'Post Status not accepted';
}

// Validate tags
if (!isset($tags)) {
    $errors['tags'] = 'Select at least one tag';
} else {
    $match = array_intersect(['important', 'social', 'public', 'kids'], $tags);
    if (empty($match)) {
        $errors['tags'] = 'Selected tag is not in our database!!!';
    }
}

// Validate type
if ($type === '') {
    $errors['type'] = 'Select post type';
} elseif (!in_array($type, [1, 2, 3, 4])) {
    $errors['type'] = 'Selected post type is not valid!!!';
}

// Handle errors and redirection
if (count($errors) > 0) {
    $_SESSION['errors'] = $errors;
    $_SESSION['old'] = $old;
    header('location: add-post.php');
    exit();
} else {
    header('location: /');
    exit();
}
