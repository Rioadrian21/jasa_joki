<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-7 mt-5">

            <div class="card o-hidden border-0 shadow-lg my-5" style="background-color: #ffffff50;">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="pt-4 pl-5 pb-3 pr-5">
                                <div class="text-center">
                                    <h1 class="h4 text-white mb-4"> <strong> Do you forget your password ?</strong></h1>
                                </div>
                                <?= $this->session->flashdata('message'); ?>

                                <form class="user" method="post" action="<?= base_url('auth/forgotpassword'); ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Enter Email Address..." value="<?= set_value('email'); ?>">
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?> 
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                       <b> Reset Password </b>
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small text-white" href="<?= base_url('auth'); ?>">Back to login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>