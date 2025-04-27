<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa | Sistem Akademik</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
</head>

<body class="bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4 py-8 max-w-6xl">
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Data Mahasiswa</h1>
                <p class="text-gray-600 mt-1">Daftar mahasiswa yang terdaftar dalam sistem</p>
            </div>
            <div class="flex items-center space-x-3 mt-4 md:mt-0">
                <a href="index.php?action=create" class="bg-primary-600 hover:bg-primary-700 text-white px-6 py-2 rounded-lg shadow-md transition duration-300 flex items-center">
                    <i class="fas fa-plus mr-2"></i> Tambah Mahasiswa
                </a>
            </div>
        </div>


        <!-- Table Section -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full" id="studentTable">
                    <thead class="bg-primary-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-700 uppercase tracking-wider cursor-pointer sortable">
                                <div class="flex items-center">
                                    NO
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-700 uppercase tracking-wider cursor-pointer sortable">
                                <div class="flex items-center">
                                    Nama Mahasiswa

                                </div>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-700 uppercase tracking-wider cursor-pointer sortable">
                                <div class="flex items-center">
                                    NIM

                                </div>
                            </th>
                            <th class="px-6 py-4 text-right text-xs font-medium text-gray-700 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php
                        $no = 1;
                        foreach ($mahasiswa as $m): ?>
                            <tr class="hover:bg-gray-50 transition duration-150 student-row" data-id="<?= $m['id'] ?>">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 student-id"><?= $no++ ?></td> <!-- Pakai $no -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10 rounded-full bg-primary-100 flex items-center justify-center text-primary-600 font-medium">
                                            <?= substr($m['nama'], 0, 1) ?>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900 student-name"><?= $m['nama'] ?></div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 student-nim"><?= $m['nim'] ?></td>

                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex justify-end space-x-2">
                                        <a href="index.php?action=edit&id=<?= $m['id'] ?>" class="text-yellow-600 hover:text-yellow-900 p-2 rounded-full hover:bg-yellow-50 transition duration-200" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button onclick="confirmDelete(<?= $m['id'] ?>)" class="text-red-600 hover:text-red-900 p-2 rounded-full hover:bg-red-50 transition duration-200" title="Hapus">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>

                </table>
            </div>

        </div>

        <!-- Empty State -->
        <?php if (empty($mahasiswa)): ?>
            <div class="bg-white rounded-xl shadow-md p-8 text-center">
                <div class="mx-auto w-24 h-24 rounded-full bg-primary-50 flex items-center justify-center mb-4">
                    <i class="fas fa-user-graduate text-3xl text-primary-400"></i>
                </div>
                <h3 class="text-lg font-medium text-gray-700">Belum ada data mahasiswa</h3>
                <p class="mt-1 text-gray-500">Mulai dengan menambahkan data mahasiswa baru</p>
                <a href="index.php?action=create" class="mt-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-primary-600 hover:bg-primary-700 transition duration-200">
                    <i class="fas fa-plus mr-2"></i> Tambah Mahasiswa
                </a>
            </div>
        <?php endif ?>

    </div>

    <script>
        // Enhanced hover effects
        document.querySelectorAll('.student-row').forEach(row => {
            row.addEventListener('mouseenter', () => {
                row.classList.add('bg-gray-50');
                row.querySelectorAll('a, button').forEach(el => {
                    el.classList.remove('opacity-70');
                });
            });
            row.addEventListener('mouseleave', () => {
                row.classList.remove('bg-gray-50');
            });
        });

        // Search functionality
        document.getElementById('searchInput').addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const rows = document.querySelectorAll('.student-row');

            rows.forEach(row => {
                const name = row.querySelector('.student-name').textContent.toLowerCase();
                const nim = row.querySelector('.student-nim').textContent.toLowerCase();
                const id = row.querySelector('.student-id').textContent.toLowerCase();

                if (name.includes(searchTerm) || nim.includes(searchTerm) || id.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        // Sorting functionality
        document.querySelectorAll('.sortable').forEach(header => {
            header.addEventListener('click', function() {
                const sortBy = this.getAttribute('data-sort');
                const icon = this.querySelector('i');
                const isAsc = icon.classList.contains('fa-sort-up');

                // Reset all icons
                document.querySelectorAll('.sortable i').forEach(i => {
                    i.className = 'fas fa-sort ml-2 text-gray-400';
                });

                // Set new icon
                if (isAsc) {
                    icon.className = 'fas fa-sort-down ml-2 text-primary-600';
                    sortTable(sortBy, 'desc');
                } else {
                    icon.className = 'fas fa-sort-up ml-2 text-primary-600';
                    sortTable(sortBy, 'asc');
                }
            });
        });

        function sortTable(sortBy, direction) {
            // In a real application, you would make an AJAX call to sort server-side
            // This is a client-side demo only
            const rows = Array.from(document.querySelectorAll('.student-row'));

            rows.sort((a, b) => {
                // const aValue = a.querySelector(.student-${sortBy}).textContent;
                // const bValue = b.querySelector(.student-${sortBy}).textContent;

                if (sortBy === 'id') {
                    return direction === 'asc' ?
                        parseInt(aValue) - parseInt(bValue) :
                        parseInt(bValue) - parseInt(aValue);
                } else {
                    return direction === 'asc' ?
                        aValue.localeCompare(bValue) :
                        bValue.localeCompare(aValue);
                }
            });

            const tbody = document.querySelector('tbody');
            tbody.innerHTML = '';
            rows.forEach(row => tbody.appendChild(row));
        }

        // SweetAlert confirmation for delete
        function confirmDelete(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data mahasiswa akan dihapus secara permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#0ea5e9',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `index.php?action=delete&id=${id}`;
                }
            });
        }


        // Toast notification for success actions
        <?php if (isset($_GET['status'])): ?>
            <?php if ($_GET['status'] === 'created'): ?>
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Data mahasiswa berhasil ditambahkan',
                    showConfirmButton: false,
                    timer: 3000,
                    toast: true
                });
            <?php elseif ($_GET['status'] === 'updated'): ?>
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Data mahasiswa berhasil diperbarui',
                    showConfirmButton: false,
                    timer: 3000,
                    toast: true
                });
            <?php elseif ($_GET['status'] === 'deleted'): ?>
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Data mahasiswa berhasil dihapus',
                    showConfirmButton: false,
                    timer: 3000,
                    toast: true
                });
            <?php endif ?>
        <?php endif ?>
    </script>
</body>

</html>