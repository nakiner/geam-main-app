<div class="modal fade" id="popup" tabindex="-1" role="dialog" aria-labelledby="popupLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="popupLabel">Welcome back, visitor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#login" role="tab">Log in</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#register" role="tab">Register</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#restore" role="tab">Restore</a></li>
                </ul>
                <br>
                <div class="tab-content">
                    <div class="tab-pane active" id="login" role="tabpanel">
                        <div class="container">
                            <form id="loginForm" method="POST">
                                <div class="form-group row">
                                    <label for="login-username" class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="login-username" name="login-username" placeholder="Your login" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="login-password" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="login-password" name="login-password" placeholder="Your password" required>
                                    </div>
                                </div>
                            </form>
                            <div id="responseResult-1"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hide</button>
                            <button type="button" form="loginForm" id="form-login" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                    <div class="tab-pane" id="register" role="tabpanel">
                        <div class="container">
                            <form id="registerForm" method="POST">
                                <div class="form-group row">
                                    <label for="register-username" class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="register-username" name="register-username" placeholder="Your exact username" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="register-name" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="register-name" name="register-name" placeholder="This name will be displayed" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="register-email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="register-email" name="register-email" placeholder="Email for password restore" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="register-password" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="register-password" name="register-password" placeholder="Password twice" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="register-password-1" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="register-password-1" name="register-password-1" placeholder="And again" required>
                                    </div>
                                </div>
                            </form>
                            <div id="responseResult-2"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hide</button>
                            <button type="button" form="registerForm" id="form-register" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                    <div class="tab-pane" id="restore" role="tabpanel">
                        <div class="container">
                            <form id="restoreForm" method="POST">
                                <div class="form-group row">
                                    <label for="restore-username" class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="restore-username" name="restore-username" placeholder="Your username" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="restore-email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="restore-email" name="restore-email" placeholder="Email, which belong to username" required>
                                    </div>
                                </div>
                            </form>
                            <div id="responseResult-3"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hide</button>
                            <button type="button" form="restoreForm" id="form-restore" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>