<br>
<br>
<br>


<div class="container-fluid mt-2 pt-1">
    <div class="row">
        <div class="col-lg-8 pt-2 mx-auto position-relative" style="border: 4px solid white; border-radius: 15px;">
            <form action="<?= base_url('user/editHistory/' . $data_lawas->id); ?>" method="post" enctype="multipart/form-data">
            <h2 class="text-center text-warning h2i pt-1">Edit List History</h2>
            <h2 class="text-dark h2o pt-1">.</h2>
            <a href="<?= base_url('user/history'); ?>" class="bg-danger py-2 px-3 position-absolute text-white" style="top: 8px; left: 40px; text-decoration: none; border: 4px solid white; border-radius: 100%; font-size: 18px;"><i class="fas fa-times"></i></a>
            <button type="submit" class="btn btn-warning px-5 position-absolute" style="top: 10px; right: 40px; border: 4px solid white; border-radius: 15px;"><i class="fa-solid fa-cart-shopping"></i> Simpan</button>
            <input type="hidden" value="<?= $data_lawas->nama; ?>" name="nama">
            <!-- dr sini -->

            <div class="row mx-auto my-4">
                <div class="col-md-5 bg-warning mx-auto p-3 text-dark mb-3" style="border: 4px solid white; border-radius: 15px;">
                    <label class="pl-1">No. WA Aktif</label>
                    <input class="form-control text-dark mb-2" value="<?= $data_lawas->noHp; ?>" type="text" name="noHp" id="No hp" style="border:none;">
                    <?= form_error('noHp', '<small class="text-danger pl-1">', '</small>'); ?>                
                    <label class="pl-1">Email Login ML</label>
                    <input class="form-control text-dark mb-2" value="<?= $data_lawas->email; ?>" type="text" name="email" id="Email" style="border:none;">
                    <?= form_error('email', '<small class="text-danger pl-1">', '</small>'); ?>                   
                    <label class="pl-1">Request Hero</label>
                    <input class="form-control text-dark mb-2" value="<?= $data_lawas->reqHero; ?>" type="text" name="reqHero" id="Request Hero" style="border:none;">
                    <?= form_error('reqHero', '<small class="text-danger pl-1">', '</small>'); ?>                   
                    <label class="pl-1">Password Login ML</label>
                    <input class="form-control text-dark mb-2" value="<?= $data_lawas->password; ?>" type="text" name="password" id="Password" style="border:none;">
                    <?= form_error('password', '<small class="text-danger pl-1">', '</small>'); ?>                   
                    <label class="pl-1">User ID</label>
                    <input class="form-control text-dark mb-2" value="<?= $data_lawas->userId; ?>" type="text" name="userId" id="Nick Name" style="border:none;">
                    <?= form_error('userId', '<small class="text-danger pl-1">', '</small>'); ?>                   
                    <label class="pl-1">Login Via</label>
                    <select class="form-control custom-select text-dark mb-2" name="loginVia" style="border:none;">
                        <?php foreach ($login_via as $login) { ?>
                            <?php if ($data_lawas->loginVia == $login->loginVia) { ?>
                                <option value="<?= $data_lawas->loginVia; ?>" selected><?= $data_lawas->loginVia; ?></option>
                            <?php } else { ?>
                                <option value="<?= $login->loginVia; ?>"><?= $login->loginVia; ?></option>
                        <?php }
                        } ?>
                    </select>
                    <?= form_error('loginVia', '<small class="text-danger pl-1">', '</small>'); ?>                   
                </div>
                <div class="col-md-6 bg-dark mx-auto p-3 text-white mb-3" style="border: 4px solid white; border-radius: 15px;">
                    <label class="pl-1">Pilih Paket Joki</label>
                    <select id="paketJoki" class="form-control custom-select text-dark mb-2" name="paketJoki" style="border:none;">
                        <?php foreach ($paket_joki as $paket) { ?>
                            <?php if ($data_lawas->paketJoki == $paket->paket) { ?>
                                <option data-price="<?= $data_lawas->harga; ?>" value="<?= $data_lawas->paketJoki; ?>" selected><?= $data_lawas->paketJoki; ?></option>
                            <?php } else { ?>
                                <option data-price="<?= $paket->harga; ?>" value="<?= $paket->paket; ?>"><?= $paket->paket; ?></option>
                        <?php }
                        } ?>
                    </select>
                    <?= form_error('paketJoki', '<small class="text-danger pl-1">', '</small>'); ?>                   
                    <label class="pl-1">Harga Paket Joki</label>
                    <input class="form-control text-dark mb-2" value="<?= $data_lawas->harga; ?>" type="text" name="harga" style="border:none;" readonly>
                    <?= form_error('harga', '<small class="text-danger pl-1">', '</small>'); ?>                   
                    <label class="pl-1">Nama Bank</label>
                    <select id="namaBank" class="form-select text-dark mb-2" name="namaBank" style="border:none;">
                        <option selected disabled>Pilih Bank</option>
                        <?php foreach ($bank as $b) { ?>
                            <option data-atasNama="<?= $b->atasNama; ?>" data-noRekening="<?= $b->noRekening; ?>" value="<?= $b->namaBank; ?>"><?= $b->namaBank; ?></option>
                        <?php } ?>
                        <option data-atasNama="----" data-noRekening="----" value="<?= $data_lawas->bank; ?>">Bayar Nanti</option>
                    </select>
                    <?= form_error('namaBank', '<small class="text-danger pl-1">', '</small>'); ?>                   
                    <label class="pl-1">Atas Nama</label>
                    <input type="text" id="atasNama" class="form-control text-dark mb-2" placeholder="Atas Nama (otomatis)" style="border: none;" readonly>
                    <label class="pl-1">No. Rekening</label>
                    <input type="text" id="noRekening" class="form-control text-dark mb-2" placeholder="No. Rekening / No. Pengiriman (otomatis)" style="border: none;" readonly>
                    <label class="pl-1">Upload Bukti TF</label>
                    <div class="custom-file mb-2">               
                        <input type="file" class="custom-file-input text-dark" id="image" name="buktiTf">
                        <label class="custom-file-label" for="image">Upload Bukti TF</label>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>

<br>
<br>
<br>
<br>
<br>


<script>
            document.querySelector('#paketJoki').addEventListener('change', function() {
                const harga = document.querySelector('#paketJoki option:checked').getAttribute('data-price');
                document.querySelector('[name=harga]').value = harga;
            });

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