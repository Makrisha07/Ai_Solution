$conn = new mysqli('localhost', 'root', '', 'ai_solution');
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    $query = "UPDATE promotions SET title='$title', description='$description' WHERE id=$id";
    if ($conn->query($query)) header("Location: admin_panel.php");
    else echo "Error: " . $conn->error;
}

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM promotions WHERE id=$id");
$promo = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Promotion</title>
</head>
<body>
    <h1>Update Promotion</h1>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $promo['id']; ?>">
        <label>Title: <input type="text" name="title" value="<?php echo $promo['title']; ?>" required></label><br>
        <label>Description: <textarea name="description" required><?php echo $promo['description']; ?></textarea></label><br>
        <button type="submit">Update Promotion</button>
    </form>
</body>
</html>
