<?php
echo '<div class="profile">';
echo '<center>';
$row = mysqli_fetch_assoc($profilequery);
// Name and Nickname
if (!empty($row['user_nickname']))
    echo $row['user_firstname'] . ' ' . $row['user_lastname'] . ' (' . $row['user_nickname'] . ')';
else
    echo $row['user_firstname'] . ' ' . $row['user_lastname'];
echo '<br>';
// Profile Info & View
$width = '168px';
$height = '168px';
include 'includes/profile_picture.php';
echo '<br>';
// Gender
if ($row['user_gender'] == "M")
    echo 'Male';
else if ($row['user_gender'] == "F")
    echo 'Female';
echo '<br>';
// Status
if (!empty($row['user_status'])) {
    if ($row['user_status'] == "S")
        echo 'Single';
    else if ($row['user_status'] == "E")
        echo 'Engaged';
    else if ($row['user_status'] == "M")
        echo 'Married';
    echo '<br>';
}
// Birthdate
$date = $row['user_birthdate'];
$textualDateOfBirth = date("F j, Y", strtotime($date));
echo $textualDateOfBirth;
if (!empty($row['user_hometown'])) {
    echo '<br>';
    echo $row['user_hometown'];
}
if (!empty($row['user_about'])) {
    echo '<br>';
    echo $row['user_about'];
}
// Friendship Status
if ($flag == 1) {
    echo '<br>';
    if (isset($row['friendship_status'])) {
        if ($row['friendship_status'] == 1) {
            echo '<form method="post">';
            echo '<input type="submit" value="Friends" disabled="disabled" id="special">';
            echo '</form>';
        } else if ($row['friendship_status'] == 0) {
            echo '<form method="post">';
            echo '<input type="submit" value="Request Pending" disabled="disabled" id="special">';
            echo '</form>';
        }
    } else {
        echo '<form method="post">';
        echo '<input type="submit" value="Send Friend Request" name="request">';
        echo '</form>';
    }
}

echo '<center>';
echo '</div>';
