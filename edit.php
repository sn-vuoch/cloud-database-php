<?php
require_once "utility/db.php";

$id = (int)$_GET['id'];
$sql = "SELECT * FROM products WHERE id = $id";
$result = mysqli_query($conn, $sql);
$product = mysqli_fetch_assoc($result);

if (!$product) {
  die("Product not found!");
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Edit Product</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-gray-100 font-sans text-gray-800">
  <div class="max-w-md mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-xl font-bold mb-4 text-yellow-600">Edit Product</h2>
    <form action="update.php" method="POST">
      <input type="hidden" name="id" value="<?php echo $product['id']; ?>">

      <div class="mb-4">
        <label class="block text-sm font-medium">Product Name</label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($product['name']); ?>" required class="mt-1 p-2 w-full border rounded">
      </div>

      <div class="mb-4">
        <label class="block text-sm font-medium">Price</label>
        <input type="number" name="price" step="0.01" value="<?php echo $product['price']; ?>" required class="mt-1 p-2 w-full border rounded">
      </div>

      <div class="flex justify-between">
        <a href="../index.php" class="text-gray-600 hover:underline mt-2">Cancel</a>
        <button type="submit" class="bg-yellow-500 text-white font-bold py-2 px-4 rounded hover:bg-yellow-600">Update Product</button>
      </div>
    </form>
  </div>
</body>

</html>