<!DOCTYPE html>
<html>
<head>
    <title>Edit Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6 bg-gray-100">
    <h1 class="text-2xl font-bold mb-4">Edit Mahasiswa</h1>
    <form method="POST" action="index.php?action=update" class="space-y-4">
        <input type="hidden" name="id" value="<?= $data['id'] ?>">
        <div>
            <label>Nama:</label>
            <input type="text" name="nama" value="<?= $data['nama'] ?>" class="border px-3 py-2 w-full" required>
        </div>
        <div>
            <label>NIM:</label>
            <input type="text" name="nim" value="<?= $data['nim'] ?>" class="border px-3 py-2 w-full" required>
        </div>
        <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">Update</button>
    </form>
</body>
</html>
