<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-2">
                <?= $konten['nama_kantor'] ?>
            </h5>
            <p class="mb-3">
                Alamat:
                <?= $konten['alamat_kantor'] ?> |
                No Telephone:
                <?= $konten['no_hp'] ?> |
                Fax:
                <?= $konten['fax'] ?>
            </p>
            <hr>
            <?= $this->session->flashdata('message'); ?>
            <div class="row">
                <div class="col">
                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                        <button type="button" class="btn btn-primary" onclick="printBukutamu()"><i
                                class="ti ti-printer me-2"></i>Print</button>
                        <!-- Tambahkan tombol untuk ekspor sebagai CSV -->
                        <button type="button" class="btn btn-primary" onclick="exportToCSV()"><i
                                class="ti ti-download me-2"></i>CSV</button>
                        <button type="button" class="btn btn-primary" onclick="exportToExcel()"><i
                                class="ti ti-download me-2"></i>Excel</button>
                    </div>

                </div>
            </div>
            <div class="table-responsive mt-3">
                <table class="table text-nowrap mb-3 align-middle" id="bukutamu">
                    <thead class="text-dark fs-4">
                        <tr>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">#</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Nama Pengunjung</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Instansi</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Alamat</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Keperluan</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Paraf</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Diisi</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Aksi</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($harian as $us): ?>
                            <tr>
                                <td>
                                    <?= $i; ?>.
                                </td>
                                <td>
                                    <?= $us['nama_pengunjung']; ?>
                                </td>
                                <td>
                                    <?= $us['instansi']; ?>
                                </td>
                                <td>
                                    <?= $us['alamat']; ?>
                                </td>
                                <td>
                                    <?= $us['keperluan']; ?>
                                </td>
                                <td>
                                    <img src="<?= base_url('paraf/') . $us['paraf']; ?>" alt="Gambar Paraf"
                                        class="img-thumbnail" style="width:100px;">
                                </td>
                                <td>
                                    <?= $us['date_created'] ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('admin/deleteBuku/') . $us['id']; ?>" class="btn btn-danger"><i
                                            class="ti ti-trash"></i></a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<script>
    function printBukutamu() {
        // Mengeksekusi fungsi print dari window
        window.print();
    };
    function exportToPDF() {
        // Buat instance jsPDF
        const pdf = new jsPDF();

        // Contoh menambahkan teks ke PDF
        pdf.text("Hello, this is a PDF!", 10, 10);

        // Membuat unduhan otomatis
        pdf.save('example.pdf');
    };
    function exportToExcel() {
        const table = document.getElementById('bukutamu');
        const ws = XLSX.utils.table_to_sheet(table);

        // Membuat workBook
        const wb = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(wb, ws, 'Buku Tamu');

        // Membuat file Excel dan mengunduhnya
        XLSX.writeFile(wb, 'bukutamu.xlsx');
    };
</script>
<script>
    function exportToCSV() {
        // Ambil elemen tabel berdasarkan ID
        const table = document.getElementById('bukutamu');

        // Siapkan variabel untuk menyimpan data CSV
        let csvContent = '';

        // Loop melalui baris dan kolom tabel
        for (let i = 0; i < table.rows.length; i++) {
            const row = table.rows[i];

            for (let j = 0; j < row.cells.length; j++) {
                const cell = row.cells[j].innerText.replace(/"/g, '""'); // Ganti karakter " dengan ""
                csvContent += `"${cell}",`; // Tambahkan cell ke dalam baris CSV
            }

            csvContent += '\n'; // Pindah ke baris baru setelah setiap baris tabel
        }

        // Buat elemen <a> untuk mengunduh file CSV
        const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
        const link = document.createElement('a');
        link.href = URL.createObjectURL(blob);
        link.download = 'bukutamu.csv';

        // Simulasikan klik pada elemen <a>
        link.click();
    }
</script>