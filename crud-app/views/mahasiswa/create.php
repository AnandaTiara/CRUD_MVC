<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Mahasiswa | Sistem Akademik</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gray-100 flex items-center justify-center p-6">
    <div class="bg-white shadow-xl rounded-xl p-8 w-full max-w-md">
        <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">Tambah Mahasiswa</h1>
        <form method="POST" action="index.php?action=store" class="space-y-5">
            <div>
                <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Mahasiswa</label>
                <input 
                    type="text" 
                    id="nama" 
                    name="nama" 
                    class="block w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition" 
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
                    class="block w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition" 
                    required
                    placeholder="Masukkan NIM"
                >
            </div>
            <button 
                type="submit" 
                class="w-full bg-primary-600 hover:bg-primary-700 text-white font-semibold py-2 rounded-lg transition duration-300"
            >
                Simpan
            </button>
        </form>
    </div>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            200: '#bae6fd',
                            300: '#7dd3fc',
                            400: '#38bdf8',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            800: '#075985',
                            900: '#0c4a6e',
                        }
                    }
                }
            }
        }
    </script>
</body>
</html>
