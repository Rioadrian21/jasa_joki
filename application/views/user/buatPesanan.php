<div class="bg-dark container">
    <br><br><br><br>
    <div class="container">
        <div class="row">
            <di class="col-lg-4 mt-2 mb-2">
                <div class="row">
                    <div class="col-12">
                        <div class="card-body shadow bg-dark pt-3 pb-4 pl-2 pr-2">
                            <img src="<?= base_url("assets/img/templat.webp"); ?>" alt="" class="shadow rounded bg-dark mx-auto mb-2 d-lg-block d-none " width="150">
                            <h5 class="card-title text-center bg-warning card-header text-dark py-3 mb-3"> PROSES ORDERAN</h5>
                            <p class="card-text text-center text-warning">Berikut adalah langkah-langkah yang harus di lakukan :</p>
                            <ol class="text-warning">
                                <li>Lengkapi data joki dengan teliti</li>
                                <li>Pilih jenis paket joki</li>
                                <li>Pilih proses pembayaran</li>
                                <li>Masukan nomber whatsapp yang aktif </li>
                                <li>Klik order </li>
                                <li>Orderan akan segera di proses setelah pembayaran berhasil </li>
                            </ol>
                            <div class="ml-3 mb-5 mt-3">
                                <small class="text-warning">
                                    CATATAN : <br>
                                    * Akun kalian akan aman tidak usah khawatir. <br>
                                    * Ketika kita sedang melakukan penjokian kalian tidak boleh masuk kedalam akun kalian supaya tidak terjadi kendala.<br>
                                    * Setiap orang yang akan melakukan orderan joki, Minimal akun rank Grandmaster-mythic di bawah itu kami tidak sediakan !!<br>
                                    * Bisa bayar paket sekarang atau pesan terlebih dahulu lalu bayar nanti <br>
                                    * Apa bila terjadi Kendala bisa hubungi kami <br>
                                </small>
                            </div>

                            <div class="p-2 mx-2 bg-warning" style="border-radius: 15px; border: 4px solid white;">
                                <h6 class="text-dark text-center">JIKA TERJADI KENDALA HUBUNGI NOMBER INI 085223028599</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </di>


            <div class="col-lg-8 mt-2 mb-2">
                <form action="<?= base_url('user/buatPesanan'); ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" value="<?= $user['name']; ?>" name="nama">
                    <div class="row">
                        <div class="col">
                            <div class="card bg-warning">
                                <div class="card-header bg-dark shadow-lg">
                                    <h5 class="card-title text-warning">Lengkapi Data</h5>
                                </div>
                                <div class="card-body">
                                    <div id="userData">
                                        <div class="row row-cols row-cols-md">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input class="form-control text-dark" placeholder="Masukkan No HP Whatsapp Aktif" type="text" name="noHp" style="border:none;">
                                                    <?= form_error('noHp', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input class="form-control text-dark" placeholder="Masukkan Email Login ML" type="text" name="email" style="border:none;">
                                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input class="form-control text-dark" placeholder="Minimal Request 3 Hero" type="text" name="reqHero" style="border:none;">
                                                    <?= form_error('reqHero', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input class="form-control text-dark" placeholder="Password Akun ML" type="text" name="password" style="border:none;">
                                                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input class="form-control text-dark" placeholder="User ID" type="text" name="userId" style="border:none;">
                                                    <?= form_error('userId', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <select class="form-control custom-select mr-sm-2 text-dark" name="loginVia" style="border:none;">
                                                    <option selected disabled>Login Via:</option>
                                                    <?php foreach ($login_via as $login) { ?>
                                                        <option value="<?= $login->loginVia; ?>"><?= $login->loginVia; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <?= form_error('loginVia', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br>
                    <br>

                    <div class="card bg-dark shadow border-warning pb-3">
                        <div class="card-header bg-warning">
                            <h5 class="card-title text-dark">
                                Pilih Paket Joki
                            </h5>
                        </div>
                        <div class="card-body">
                            <select class="form-select text-dark" id="paketJoki" name="paketJoki" style="border:none;">
                                <option selected disabled> Pilih Paket Joki </option>
                                <?php foreach ($paket_joki as $paket) { ?>
                                    <option data-price="<?= $paket->harga; ?>" value="<?= $paket->paket; ?>"><?= $paket->paket; ?></option>
                                <?php } ?>
                            </select>
                            <?= form_error('paketJoki', '<small class="text-white pl-3">', '</small>'); ?>
                            <input type="text" class="form-control text-dark mt-3" name="harga" placeholder="Harga Paket (otomatis)" readonly>
                            <?= form_error('harga', '<small class="text-white pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <br>
                    <br>

                    <div class="row">
                        <div class="col">
                            <div class="card bg-warning shadow  pb-3">
                                <div class="card-header bg-dark">
                                    <h5 class="card-title text-warning">Pilih Metode Pembayaran</h5>
                                </div>
                                    <div class="card-body bg-warning">
                                        <div class="form-row">
                                            <div class="col-md-12">
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
                    <br>

                    <center>
                        <button type="submit" class="btn btn-warning mb-5"><i class="fa-solid fa-cart-shopping"></i> Order Now</button>
                    </center>

                </form>
            </div>
        </div>



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