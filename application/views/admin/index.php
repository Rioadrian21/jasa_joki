<br>
<br>
<br>
<br>


<div class="container-fluid mb-5">
    <div class="row mb-5">
    <?= $this->session->flashdata('message'); ?>
        <div class="col-lg-12 mx-auto table-responsive p-2 bg-dark mb-5" style="border: 2px solid yellow; border-radius:15px;">
            <h4 class="text-center text-warning py-2">List Order User</h4>
            <table class="table table-fluid table-striped">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>No. WA</th>
                    <th>Email</th>
                    <th>Login</th>
                    <th>Password</th>
                    <th>Request</th>
                    <th>Paket</th>
                    <th>Harga</th>
                    <th>TF Bank</th>
                    <th>Bukti</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                <?php
                $no = 1;
                foreach ($list_order as $order) { ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $order->nama; ?> </td>
                        <td><?= $order->noHp; ?></td>
                        <td><?= $order->email; ?></td>
                        <td><?= $order->loginVia; ?></td>
                        <td><?= $order->password; ?></td>
                        <td><?= $order->reqHero; ?></td>
                        <td><?= $order->paketJoki; ?></td>
                        <td><?= $order->harga; ?></td>
                        <td><?= $order->bank; ?></td>
                        <td><img data-bs-toggle="modal" data-bs-target="#staticBackdrop<?= $order->id; ?>" src="<?= base_url('assets/img/') . $order->buktiTf; ?>" width='80' height='80' class="img-thumbnail">
                        <td><?= date('d F Y', $order->tglOrder); ?></td>
                        <td>
                            <?php if ($order->status == 'Sedang Diproses') { ?>
                                <a href="#" class="badge badge-warning p-2" style="text-decoration: none;"><i class="fas fa-spinner mr-2"></i><?= $order->status; ?></a>
                            <?php } elseif ($order->status == 'Sudah Bayar') { ?>
                                <a href="#" class="badge badge-success p-2" style="text-decoration: none;"><i class="fas fa-check mr-2"></i><?= $order->status; ?></a>
                            <?php } else { ?>
                                <a href="#" class="badge badge-danger p-2" style="text-decoration: none;"><i class="fas fa-question mr-2"></i><?= $order->status; ?></a>
                            <?php } ?>
                        </td>
                        <td>
                            <?php if ($order->status == 'Sedang Diproses') { ?>
                                <a href="<?= base_url('Admin/terima/') . $order->id; ?>" class="badge badge-success p-2 mb-1" style="text-decoration: none;">Terima</a> <br>
                                <a href="<?= base_url('Admin/batalkan/') . $order->id; ?>" class="badge badge-danger p-2 mb-1" style="text-decoration: none;">Batalkan</a> <br>
                                <a href="#" class="badge badge-secondary p-2" style="text-decoration: none;">Hapus Order</a>
                            <?php } elseif ($order->status == 'Sudah Bayar') {  ?>
                                <a href="<?= base_url('Admin/hapusList/') . $order->id; ?>" class="badge badge-danger p-2" style="text-decoration: none;">Hapus Order</a>
                            <?php } else { ?>
                                <a href="#" class="badge badge-secondary p-2" style="text-decoration: none;">Hapus Order</a>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->



<!-- Modal -->
<?php
foreach ($list_order as $order) { ?>
    <div class="modal fade" id="staticBackdrop<?= $order->id; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Proses Validasi Transfer</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <center>
                        <img src="<?= base_url('assets/img/') . $order->buktiTf; ?>" alt="" class="img-thumbnail">
                    </center>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger mx-auto px-5" data-bs-dismiss="modal">Keluar</button>
                </div>
            </div>
        </div>
    </div>

<?php } ?>



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

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets'); ?>/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets'); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets'); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets'); ?>/js/sb-admin-2.min.js"></script>

</body>

</html>