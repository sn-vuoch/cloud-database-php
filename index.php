<?php
require_once "utility/db.php";
$sql = "SELECT * FROM products ORDER BY created_at ASC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>

<head>
  <title>Cloud Database Demo</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-gray-100 font-sans text-gray-800">
  <div class="max-w-4xl mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-6 text-center text-blue-600">Cloud Product Management</h2>

    <div class="bg-gray-50 p-6 rounded border border-gray-200 mb-8">
      <form action="insert.php" method="POST" class="flex gap-4 items-end">
        <div class="flex-1">
          <label class="block text-sm font-medium text-gray-700">Product Name</label>
          <input type="text" name="name" required class="mt-1 p-2 w-full border rounded">
        </div>
        <div class="flex-1">
          <label class="block text-sm font-medium text-gray-700">Price</label>
          <input type="number" name="price" step="0.01" required class="mt-1 p-2 w-full border rounded">
        </div>
        <button type="submit" class="bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">Add</button>
      </form>
    </div>

    <div class="overflow-x-auto">
      <table class="w-full border-collapse border border-gray-300 text-left">
        <thead>
          <tr class="bg-gray-200">
            <th class="border px-4 py-2">ID</th>
            <th class="border px-4 py-2">Name</th>
            <th class="border px-4 py-2">Price</th>
            <th class="border px-4 py-2">Date</th>
            <th class="border px-4 py-2 text-center">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (mysqli_num_rows($result) > 0) {
            $display_number = 1;

            while ($row = mysqli_fetch_assoc($result)) {
          ?>
              <tr class="hover:bg-gray-50">
                <td class="border px-4 py-2"><?php echo $display_number++; ?></td>

                <td class="border px-4 py-2"><?php echo htmlspecialchars($row["name"]); ?></td>
                <td class="border px-4 py-2">$<?php echo number_format($row["price"], 2); ?></td>
                <td class="border px-4 py-2"><?php echo $row["created_at"]; ?></td>
                <td class="border px-4 py-2 text-center">
                  <a href="edit.php?id=<?php echo $row["id"]; ?>" class="text-yellow-600 hover:underline mr-3">Edit</a>
                  <a href="delete.php?id=<?php echo $row["id"]; ?>" class="text-red-600 hover:underline" onclick="return confirm('Delete this product?');">Delete</a>
                </td>
              </tr>
          <?php
            }
          } else {
            echo "<tr><td colspan='5' class='border px-4 py-2 text-center'>No products found</td></tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</body>

</html>