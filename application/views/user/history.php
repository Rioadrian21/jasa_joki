<br>
<br>
<br>
<br>


<div class="container-fluid">
    <div class="row">
        <?= $this->session->flashdata('message'); ?>
        <div class="col-lg-12 mx-auto table-responsive p-2" style="border: 2px solid yellow; border-radius:15px;">
            <h4 class="text-center text-warning">History</h4>
            <table class="table table-fluid table-striped">
                <tr>
                    <th>No</th>
                    <th>Email</th>
                    <th>Login Via</th>
                    <th>Password</th>
                    <th>User ID</th>
                    <th>Req Hero</th>
                    <th>Paket Joki</th>
                    <th>Harga</th>
                    <th>Tgl Order</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                <?php
                $no = 1;
                foreach ($history as $h) {
                    if ($h->nama == $user['name']) {
                ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $h->email; ?></td>
                            <td><?= $h->loginVia; ?></td>
                            <td><?= $h->password; ?></td>
                            <td><?= $h->userId; ?></td>
                            <td><?= $h->reqHero; ?></td>
                            <td><?= $h->paketJoki; ?></td>
                            <td><?= $h->harga; ?></td>
                            <td><?= date('d F Y', $h->tglOrder); ?></td>
                            <td>
                                <?php if ($h->status == 'Sedang Diproses') { ?>
                                    <a href="#" class="badge badge-warning p-2" style="text-decoration: none;"><i class="fas fa-spinner"></i> <?= $h->status; ?></a>
                                <?php } elseif ($h->status == 'Sudah Bayar') { ?>
                                    <a href="#" class="badge badge-success p-2" style="text-decoration: none;"><i class="fas fa-check"></i> <?= $h->status; ?></a>
                                <?php } else { ?>
                                    <a href="#" class="badge badge-danger p-2" style="text-decoration: none;"><i class="fas fa-question"></i> <?= $h->status; ?></a>
                                <?php } ?>
                            </td>
                            <td>
                                <?php if ($h->status == 'Sedang Diproses') { ?>
                                    <a href="#" class="badge badge-secondary p-2 mb-1" style="text-decoration: none;">Edit</a>
                                    <a href="#" class="badge badge-secondary p-2 mb-1" style="text-decoration: none;">Delete</a>
                                <?php } elseif ($h->status == 'Sudah Bayar') { ?>
                                    <a href="#" class="badge badge-secondary p-2 mb-1" style="text-decoration: none;">Edit</a>
                                    <a href="<?= base_url('user/hapusHistory/') . $h->id; ?>" class="badge badge-danger p-2 mb-1" style="text-decoration: none;">Delete</a>
                                <?php } else { ?>
                                    <a href="<?= base_url('user/bayarPaket/') . $h->id; ?>" class="badge badge-primary p-2 mb-1" style="text-decoration: none;">Bayar Paket</a> <br>
                                    <a href="<?= base_url('user/editHistory/') . $h->id; ?>" class="badge badge-success p-2 mb-1" style="text-decoration: none;">Edit</a>
                                    <a href="<?= base_url('user/hapusHistory/') . $h->id; ?>" class="badge badge-danger p-2 mb-1" style="text-decoration: none;">Delete</a>
                                <?php } ?>
                            </td>
                        </tr>
                <?php }
                } ?>
            </table>
        </div>
    </div>
</div>

<br>
<br>
<br>



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