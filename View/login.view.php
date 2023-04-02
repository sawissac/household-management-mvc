<form class="pb-4 px-3 mx-auto bg-white h-100 d-flex flex-column shadow-2 justify-content-center" method="post" action="/login" style="max-width: 400px !important;">
    <div class="d-flex justify-content-center py-4 align-items-center">
        <div class="rounded-circle bg-primary d-flex justify-content-center align-items-center" style="min-width: 70px;min-height: 70px;">
            <i class="fa-solid fa-rocket fa-2x text-light"></i>
        </div>
        <h3 class='fw-bold px-3'>Household Finance Management</h3>
    </div>
    <?php if (isset($error['auth'])) : ?>
        <div class="alert alert-danger alert-sm text-center">
            Wrong Email or Password!
        </div>
    <?php endif ?>
    <div class="mb-3">
        <div class="form-outline">
            <input type="text" id="email" class="form-control form-control-lg" name="email" value="<?= isset($request->email) ? $request->email : "" ?>" />
            <label class="form-label" for="email">Email address</label>
        </div>
        <?php if (isset($error['email'])) : ?>
            <div class="form-text text-danger">
                <?= $error['email'] ?>
            </div>
        <?php endif ?>
    </div>
    <div class="mb-3">
        <div class="form-outline">
            <input type="text" id="password" class="form-control form-control-lg" name="password" value="<?= isset($request->password) ? $request->password : "" ?>" />
            <label class="form-label" for="password">Password</label>
        </div>
        <?php if (isset($error['password'])) : ?>
            <div id="emailHelp" class="form-text text-danger">
                <?= $error['password'] ?>
            </div>
        <?php endif ?>
    </div>
    <div class="text-center pb-3">
        New to this website? <a class="" href="/signup">Signup</a>
    </div>
    <button type="submit" class="btn btn-primary btn-block btn-lg rounded-pill fw-bold">Login</button>
</form>