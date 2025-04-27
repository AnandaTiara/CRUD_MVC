<!DOCTYPE html>
<html>
<head>
    <title>Tambah Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6 bg-gray-100">
    <h1 class="text-2xl font-bold mb-4">Tambah Mahasiswa</h1>
    <form method="POST" action="index.php?action=store" class="space-y-4">
        <div>
            <label>Nama:</label>
            <input type="text" name="nama" class="border px-3 py-2 w-full" required>
        </div>
        <div>
            <label>NIM:</label>
            <input type="text" name="nim" class="border px-3 py-2 w-full" required>
        </div>
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</body>
</html>
