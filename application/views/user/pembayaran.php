<br>
<br>
<br>
<br>
<form action="<?= base_url('user/bayarPaket/' . $data_lawas->id); ?>" method="post" enctype="multipart/form-data">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mx-auto">
                <div class="card bg-warning shadow  pb-3">
                    <div class="card-header bg-dark">
                        <h5 class="card-title text-warning">Pilih Metode Pembayaran</h5>
                    </div>
                    <div class="card-body bg-warning">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="row mx-auto mb-3">
                                    <div class="col-sm-5 bg-dark mx-auto text-center pt-2 my-1" style="border: 8px solid white; border-radius: 15px;">
                                        <h3>Paket Joki</h3>
                                        <p><?= $data_lawas->paketJoki; ?></p>
                                    </div>
                                    <div class="col-sm-5 bg-dark mx-auto text-center pt-2 my-1" style="border: 8px solid white; border-radius: 15px;">
                                        <h3>Harga</h3>
                                        <p><?= $data_lawas->harga; ?></p>
                                    </div>
                                </div>
                                <select id="namaBank" class="form-select text-dark" name="namaBank" style="border:none;">
                                    <option selected disabled>Pilih Bank </option>
                                    <?php foreach ($bank as $b) { ?>
                                        <option data-atasNama="<?= $b->atasNama; ?>" data-noRekening="<?= $b->noRekening; ?>" value="<?= $b->namaBank; ?>"><?= $b->namaBank; ?></option>
                                    <?php } ?>
                                    <option data-atasNama="----" data-noRekening="----" value="Bayar Nanti">Bayar Nanti</option>
                                </select>
                                <?= form_error('namaBank', '<small class="text-danger pl-3 ml-auto">', '</small>'); ?>
                                <input type="text" class="form-control text-dark mb-3 mt-3" id="atasNama" placeholder="Atas Nama (otomatis)" style="border: none;" readonly>
                                <input type="text" class="form-control text-dark mb-3" id="noRekening" placeholder="No. Rekening / No. Hp (otomatis)" style="border: none;" readonly>
                            </div>
                            <div class="col-sm-12">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input text-dark" id="image" name="buktiTf">
                                    <label class="custom-file-label text-start" for="image">Upload Bukti TF</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <center>
        <button type="submit" class="btn btn-warning mb-5">Bayar Sekarang</button>
    </center>
</form>

<br>
<br>

<script>
    document.querySelector('#namaBank').addEventListener('change', function() {
        const atasNama = document.querySelector('#namaBank option:checked').getAttribute('data-atasNama');
        const noRekening = document.querySelector('#namaBank option:checked').getAttribute('data-noRekening');
        document.querySelector('#atasNama').value = atasNama;
        document.querySelector('#noRekening').value = noRekening;

    });
</script>



<!-- Footer -->
<footer class="bg-dark py-3 fixed-bottom" style="border-top: 1px solid black;">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Jasa Joki Game Online <?= date('Y'); ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded-5 text-white" href="#page-top" style="z-index: 10000;">
    <i class="fas fa-arrow-up"></i>
</a>


<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets'); ?>/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets'); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets'); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets'); ?>/js/sb-admin-2.min.js"></script>

</body>

</html>