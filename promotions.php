<?php
// Start output buffering to prevent headers already sent error
ob_start();

// Load products from the file (or database)
$products = [];
if (file_exists('products.json')) {
    $products = json_decode(file_get_contents('products.json'), true);
}

// Handle form submission for adding or editing a product
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if we are adding a new product or editing an existing one
    if (isset($_POST['action']) && $_POST['action'] == 'edit') {
        $productId = $_POST['productId']; // Get product ID
        $productName = $_POST['productName'];
        $productDescription = $_POST['productDescription'];
        $productLink = $_POST['productLink'];

        // Update the product details
        $products[$productId] = [
            'name' => $productName,
            'description' => $productDescription,
            'link' => $productLink
        ];

        // Save the updated products array back to the JSON file
        file_put_contents('products.json', json_encode($products, JSON_PRETTY_PRINT));

        // Redirect to avoid form resubmission on refresh
        header('Location: promotions.php');
        exit;
    } else if (isset($_POST['action']) && $_POST['action'] == 'delete') {
        $productId = $_POST['productId']; // Get product ID to delete

        // Delete the product
        unset($products[$productId]);

        // Save the updated products array back to the JSON file
        file_put_contents('products.json', json_encode($products, JSON_PRETTY_PRINT));

        // Redirect to avoid form resubmission on refresh
        header('Location: promotions.php');
        exit;
    } else {
        $productName = $_POST['productName'];
        $productDescription = $_POST['productDescription'];
        $productLink = $_POST['productLink'];

        // Example: Save data to a file (products.json)
        $products[] = [
            'name' => $productName,
            'description' => $productDescription,
            'link' => $productLink
        ];

        // Save the updated products array back to the JSON file
        file_put_contents('products.json', json_encode($products, JSON_PRETTY_PRINT));

        // Redirect to avoid form resubmission on refresh
        header('Location: promotions.php');
        exit;
    }
}

// Check if there's an edit request
$editProduct = null;
if (isset($_GET['edit'])) {
    $editProductId = $_GET['edit'];
    if (isset($products[$editProductId])) {
        $editProduct = $products[$editProductId];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our AI Solutions - Promotions</title>
    <style>
        
    /* Basic styles for layout */
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        line-height: 1.6;
        margin: 0;
        padding: 0;
        background-color: #f7f7f7;
        color: #333;
    }

    .container {
        width: 90%;
        max-width: 1200px;
        margin: 0 auto;
        padding: 40px 20px;
    }

    header {
    background-color: #2c3e50;
    color: #fff;
    padding: 15px 0;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.nav-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 90%;
    margin: 0 auto;
}

nav ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
    display: flex;
}

nav ul li {
    margin-right: 30px;
}

nav ul li a {
    color: #fff;
    text-decoration: none;
    font-size: 16px;
    font-weight: 600;
    transition: color 0.3s;
}

nav ul li a:hover {
    color: #3498db;
}

/* Align auth buttons (Admin Login) */
.auth-buttons {
    display: flex;
    gap: 20px;
}

.admin-login-btn {
    color: #fff;
    background-color: #3498db;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 5px;
    font-size: 16px;
    font-weight: 600;
}

.admin-login-btn:hover {
    background-color: #2980b9;
}

    footer {
        background-color: #2c3e50;
        color: #fff;
        text-align: center;
        padding: 20px;
        font-size: 14px;
        margin-top: 40px;
    }

    /* Modal Styles */
    #addProductModal, #editProductModal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.5);
        padding-top: 60px;
    }

    .modal-content {
        background-color: white;
        margin: 5% auto;
        padding: 30px;
        border-radius: 8px;
        width: 80%;
        max-width: 600px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 30px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #333;
        text-decoration: none;
        cursor: pointer;
    }

    input[type="text"], textarea, input[type="url"] {
        width: 100%;
        padding: 12px;
        margin: 10px 0;
        border-radius: 5px;
        border: 1px solid #ccc;
        font-size: 16px;
    }

    input[type="submit"] {
        background-color: #3498db;
        color: white;
        padding: 12px 25px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        font-weight: 600;
    }

    input[type="submit"]:hover {
        background-color: #2980b9;
    }

    /* Position the Admin Login button at the top left corner */
.admin-login-btn {
    position: absolute;
    top: 5px; /* Adjust the top value to move the button down */
    left: 1000px; /* Adjust the left value to move the button to the left */
    color: #fff;
    background-color: #3498db;
    padding: 10px 20px;
    text-decoration: none;
    border-left: 5px solid #fff; /* Add border-left for styling */
    font-size: 16px;
    font-weight: 600;
}

.admin-login-btn:hover {
    background-color: #2980b9;
}

</style>

</head>
<body>

<header>
    <div>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="promotions.php">Promotions</a></li>
                <li><a href="feedback.php">Customer Feedback</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <li><a href="demo.php">Request Demo</a></li>
            </ul>
        </nav>
    </div>
    <div>
        <a href="admin_login.php" class="admin-login-btn">Admin Login</a>
    </div>
</header>

<!-- Header Section -->
    <!-- FAQ Item 1 -->

    </section>
</div>

    
</header>

<div class="container">
    <!-- Company Introduction Section -->
    <section id="intro">
    <h1>Welcome to AI-Solutions</h1>
    <p>AI-Solutions is at the forefront of technological innovation, offering AI-powered software solutions designed to enhance design, engineering, and innovation processes in businesses. Our virtual assistants use the power of AI to streamline workflows, boost productivity, and provide affordable prototyping solutions.</p>
    
    <!-- Embed YouTube Video with iframe -->
    <iframe width="560" height="315" src="https://www.youtube.com/embed/D5VN56jQMWM?si=qIwSabplQh25Uv91" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

<section id="intro">
    <h1>Demo to AI-Solutions</h1>
    <p>AI-Solutions is at the forefront of technological innovation, offering AI-powered software solutions designed to enhance design, engineering, and innovation processes in businesses. Our virtual assistants use the power of AI to streamline workflows, boost productivity, and provide affordable prototyping solutions.</p>
    
    <!-- Embed YouTube Video with iframe -->
    <iframe width="560" height="315" src="https://www.youtube.com/embed/TXhr_RrZQBQ?si=lpKAI3WMaVZ-csj4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
</section>

<!-- Main Content Section -->
<div class="container">
    <h2>Our AI Solutions</h2>
    <p>Explore our AI-powered tools designed to boost productivity, enhance innovation, and streamline processes for businesses.</p>

   <!-- Display Products -->
<?php foreach ($products as $index => $product): ?>
    <div class="product">
        <h3><?php echo htmlspecialchars($product['name']); ?></h3>
        <p><?php echo htmlspecialchars($product['description']); ?></p>
        
        <!-- Show Product Details Directly -->
        <div class="product-details">
            <p><strong>Link:</strong> <a href="<?php echo htmlspecialchars($product['link']); ?>" target="_blank">Visit Product</a></p>
        </div>

        <button onclick="editProduct(<?php echo $index; ?>, '<?php echo htmlspecialchars($product['name']); ?>', '<?php echo htmlspecialchars($product['description']); ?>', '<?php echo htmlspecialchars($product['link']); ?>')">Edit</button>
        <button onclick="deleteProduct(<?php echo $index; ?>)">Delete</button>
    </div>
<?php endforeach; ?>


    <!-- Add Product Button -->
    <button onclick="document.getElementById('addProductModal').style.display='block'">Add Product</button>

    <!-- Modal for Adding Product -->
    <div id="addProductModal">
        <div class="modal-content">
            <span onclick="document.getElementById('addProductModal').style.display='none'" class="close">&times;</span>
            <h2>Add New Product</h2>
            <form action="promotions.php" method="POST">
                <label for="productName">Product Name:</label>
                <input type="text" id="productName" name="productName" required><br>

                <label for="productDescription">Description:</label>
                <textarea id="productDescription" name="productDescription" required></textarea><br>

                <label for="productLink">Link:</label>
                <input type="url" id="productLink" name="productLink" required><br>

                <input type="submit" value="Add Product">
            </form>
        </div>
    </div>

    <!-- Modal for Editing Product -->
    <div id="editProductModal">
        <div class="modal-content">
            <span onclick="document.getElementById('editProductModal').style.display='none'" class="close">&times;</span>
            <h2>Edit Product</h2>
            <form action="promotions.php" method="POST">
                <input type="hidden" name="action" value="edit">
                <input type="hidden" name="productId" id="editProductId">
                <label for="editProductName">Product Name:</label>
                <input type="text" id="editProductName" name="productName" required><br>

                <label for="editProductDescription">Description:</label>
                <textarea id="editProductDescription" name="productDescription" required></textarea><br>

                <label for="editProductLink">Link:</label>
                <input type="url" id="editProductLink" name="productLink" required><br>

                <input type="submit" value="Update Product">
            </form>
        </div>
    </div>
</div>

<!-- Footer Section -->
<footer>
    <p>&copy; 2024 AI-Solutions. All Rights Reserved.</p>
</footer>

<script>
    function editProduct(id, name, description, link) {
        // Set the values in the modal fields
        document.getElementById('editProductName').value = name;
        document.getElementById('editProductDescription').value = description;
        document.getElementById('editProductLink').value = link;
        document.getElementById('editProductId').value = id;

        // Show the edit product modal
        document.getElementById('editProductModal').style.display = 'block';
    }

    function deleteProduct(id) {
        if (confirm("Are you sure you want to delete this product?")) {
            var form = document.createElement('form');
            form.method = 'POST';
            form.action = 'promotions.php';

            var input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'action';
            input.value = 'delete';

            var productIdInput = document.createElement('input');
            productIdInput.type = 'hidden';
            productIdInput.name = 'productId';
            productIdInput.value = id;

            form.appendChild(input);
            form.appendChild(productIdInput);

            document.body.appendChild(form);
            form.submit();
        }
    }
</script>

</body>
</html>

<?php
// End output buffering and send output to browser
ob_end_flush();
?>
