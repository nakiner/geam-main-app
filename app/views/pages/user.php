<div id="result"></div>
<div id="accordion" role="tablist" aria-multiselectable="true">
    <div class="card">
        <div class="card-header" role="tab" id="headingOne">
            <h5 class="mb-0">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    Change password
                </a>
            </h5>
        </div>
        <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne">
            <div class="card-block">
                <form id="pwdForm" method="POST">
                    <div class="form-group row">
                        <label for="old-pwd" class="col-sm-3 col-form-label">Old Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="old-pwd" name="old-pwd" placeholder="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="new-pwd-1" class="col-sm-3 col-form-label">New Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="new-pwd-1" name="new-pwd-1" placeholder="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="new-pwd-2" class="col-sm-3 col-form-label">Again</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="new-pwd-2" name="new-pwd-2" placeholder="" required>
                        </div>
                    </div>
                </form>
                <button type="button" form="registerForm" id="pwdchange" class="btn btn-primary">Change</button>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" role="tab" id="headingTwo">
            <h5 class="mb-0">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Change E-Mail
                </a>
            </h5>
        </div>
        <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
            <div class="card-block">
                <form id="emailForm" method="POST">
                    <div class="form-group row">
                        <label for="password" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="password" name="password" placeholder="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label">New Email</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="email" name="email" placeholder="" required>
                        </div>
                    </div>
                </form>
                <button type="button" form="registerForm" id="emailchange" class="btn btn-primary">Change</button>
            </div>
        </div>
    </div>
</div>