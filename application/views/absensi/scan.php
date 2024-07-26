<div class="container-fluid">
    <div class="row">
        <div class="col-lg-9">
            <?= $this->session->flashdata('pesan'); ?>
        </div>
    </div>

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div id="reader" style="width : 700px ; height: 800px ;"></div>



    <script>
        function onScanSuccess(decodedText, decodedResult) {
            console.log(`Code matched = ${decodedText}`);

            // Kirim data QR ke server menggunakan AJAX
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "<?= base_url('absensi/proccess'); ?>", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById("reader").style.display = "none";
                    console.log("Response from server: " + xhr.responseText);
                    window.location.href = "<?= base_url('absen'); ?>";
                    swal({
                        title: "Selamat",
                        text: "Anda telah berhasil melakukan absensi",
                        icon: "success",
                    });

                }
            };
            xhr.send("absen=" + decodedText);
        }

        // Pastikan Anda telah memuat library Html5QrcodeScanner
        let html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", {
                fps: 10,
                qrbox: 250
            });

        // Render scanner setelah dokumen selesai dimuat
        document.addEventListener("DOMContentLoaded", function(event) {
            html5QrcodeScanner.render(onScanSuccess);
        });
    </script>



</div>

</div>