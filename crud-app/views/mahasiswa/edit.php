<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Mahasiswa | Sistem Akademik</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gray-100 flex items-center justify-center p-6">
    <div class="bg-white shadow-xl rounded-xl p-8 w-full max-w-md">
        <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">Edit Data Mahasiswa</h1>
        <form method="POST" action="index.php?action=update" class="space-y-5">
            <input type="hidden" name="id" value="<?= $data['id'] ?>">
            
            <div>
                <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Mahasiswa</label>
                <input 
                    type="text" 
                    id="nama" 
                    name="nama" 
                    value="<?= $data['nama'] ?>" 
                    class="block w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition" 
                    required
                    placeholder="Masukkan nama lengkap"
                >
            </div>
            <div>
                <label for="nim" class="block text-sm font-medium text-gray-700 mb-1">NIM</label>
                <input 
                    type="text" 
                    id="nim" 
                    name="nim" 
                    value="<?= $data['nim'] ?>" 
                    class="block w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition" 
                    required
                    placeholder="Masukkan NIM"
                >
            </div>
            <button 
                type="submit" 
                class="w-full bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 rounded-lg transition duration-300"
            >
                Update
            </button>
        </form>
    </div>
</body>
</html>
