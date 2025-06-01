<?php  
include 'connection.php';

session_start();
if (!isset($_SESSION['id_user'])) {
    header('Location: login.php');
    exit();
}

$id_user = $_SESSION['id_user'];

$sql = "SELECT p.id_post, p.post, p.created_at, u.username, u.fullname, u.photo, p.id_user as post_owner_id,
        COUNT(l.id_like) as like_count,
        EXISTS(SELECT 1 FROM likes WHERE id_post = p.id_post AND id_user = '$id_user') as user_liked
        FROM posts p 
        LEFT JOIN users u ON p.id_user = u.id_user 
        LEFT JOIN likes l ON p.id_post = l.id_post
        GROUP BY p.id_post
        ORDER BY p.created_at DESC";

$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    $postContent = htmlspecialchars($row['post'], ENT_QUOTES, 'UTF-8');
    $postId = $row['id_post'];
    $fullname = htmlspecialchars($row['fullname'], ENT_QUOTES, 'UTF-8');
    $createdAt = $row['created_at'];
    $postOwnerId = $row['post_owner_id'];
    $likeCount = $row['like_count'];
    $userLiked = $row['user_liked'];

    // cek apakah current user = pemilik postingan?
    $allowDelete = ($postOwnerId == $id_user);

    echo "
    <div class='box' id='content-container'>
        <div class='row'>
            <div class='col-md-1'></div>
            <div class='col-md-11' style='padding-left:5px;'>
                <p class='text-muted' id='post-text'>$postContent</p>
                <p class='text-muted'>Posted by: $fullname, $createdAt</p>
                <p class ='text-muted'>Likes: $likeCount</p>
                <button onclick='likePost($postId)' class='btn btn-sm btn-primary'>Like</button>
                <button onclick='unlikePost($postId)' class='btn btn-sm btn-secondary'>Unlike</button>
                ";
    // Display the delete button only if the current user is the owner of the post
    if($allowDelete) {
        echo "<button onclick='hapusPost($postId)' class='btn btn-sm btn-danger'>Delete</button>";
    }

    echo "
                </div>
            </div>
        </div>
    </div>";
}
?>
