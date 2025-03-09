<script>
    // bulk delete
    document.addEventListener('DOMContentLoaded', function() {
        // Fungsi untuk memilih semua checkbox
        document.getElementById('selectAll').addEventListener('change', function() {
            let checkboxes = document.querySelectorAll('input[name="ids[]"]');
            checkboxes.forEach(checkbox => checkbox.checked = this.checked);
        });

        // Tambahkan event listener ke form bulk delete
        document.getElementById('bulkDeleteForm').addEventListener('submit', function(e) {
            e.preventDefault(); // Cegah submit langsung
            let selectedCheckboxes = document.querySelectorAll('input[name="ids[]"]:checked');
            let selectedIds = Array.from(selectedCheckboxes).map(cb => cb.value);
            let totalSelected = selectedIds.length;

            if (totalSelected === 0) {
                showAlert('warning', 'Oops...', 'Pilih setidaknya satu data untuk dihapus!');
                return;
            }

            confirmAction(
                `Apakah Anda yakin ingin menghapus ${totalSelected} data ini?`,
                "Data yang dipilih akan dihapus secara permanen!",
                () => {
                    document.getElementById('bulkDeleteForm').submit();
                },
                `Ya, hapus ${totalSelected} data!`
            );
        });
    });

    // Fungsi untuk menampilkan alert SweetAlert
    function showAlert(icon, title, text) {
        Swal.fire({
            icon: icon,
            title: title,
            text: text,
        });
    }

    // Fungsi untuk konfirmasi sebelum aksi dilakukan
    function confirmAction(title, text, onConfirm, confirmButtonText = "Ya, hapus!") {
        Swal.fire({
            title: title,
            text: text,
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: confirmButtonText,
            cancelButtonText: "Batal",
        }).then((result) => {
            if (result.isConfirmed && typeof onConfirm === "function") {
                onConfirm();
            }
        });
    }

    // Fungsi untuk menghapus satu item
    function confirmDelete(id) {
        confirmAction(
            'Apakah Anda yakin?',
            'Data ini akan dihapus secara permanen!',
            () => {
                document.getElementById(`delete-form-${id}`).submit();
            }
        );
    }


    function confirmLogout() {
        Swal.fire({
            title: "Apakah Anda yakin?",
            text: "Anda akan keluar dari akun ini.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Ya, keluar!",
            cancelButtonText: "Batal",
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit form logout
                document.getElementById('logout-form').submit();
            }
        });
    }

    function confirmLogin(event) {
        event.preventDefault(); // Mencegah navigasi langsung
        Swal.fire({
            title: 'Anda belum login',
            text: "Silakan login terlebih dahulu untuk mengakses halaman ini.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Login Sekarang',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Arahkan ke halaman login
                window.location.href = "{{ route('auth.login') }}";
            }
        });
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('assets/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('assets/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('assets/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="{{ asset('assets/dist/js/demo.js') }}"></script> --}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('assets/dist/js/pages/dashboard.js') }}"></script>
