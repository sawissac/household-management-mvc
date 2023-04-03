<header class="container d-flex justify-content-between align-items-center border-bottom bg-white px-3">
    <div class="py-4 d-flex align-items-center">
        <div class="rounded-circle bg-primary d-flex justify-content-center align-items-center" style="width: 50px;height: 50px;">
            <i class="fa fa-solid fa-user fa-1x text-light"></i>
        </div>
        <div class="">
            <h5 class="fw-bold pb-0 mb-0 px-2 d-block">#<?= strtolower($username) ?></h5>
            <div class="btn btn-secondary btn-rounded btn-sm py-1 px-2 mx-2">
                <script>
                    let totalBalanceFormat = BalanceFormatter.format(
                        <?= $totalBalance ?>
                    );
                    document.write(totalBalanceFormat);
                </script>
            </div>
        </div>
    </div>
    <div>
        <button type="button" class="btn btn-light btn-lg rounded-pill" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
            <i class="fa fa-plus mr-2"></i> Create Finance
        </button>
        <a class="btn btn-primary btn-lg rounded-pill" href="/logout" style="width:150px;">
            Logout
        </a>
    </div>
</header>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold text-uppercase" id="exampleModalLabel">Create Finance list</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/app">
                <div class="modal-body">
                    <input type="hidden" name="user" value="<?= $username ?>" />
                    <input type="hidden" name="view" value="<?= $view ?>" />
                    <input type="hidden" name="date" value="<?= $currentDate ?>" />
                    <div class="form-outline mb-3">
                        <input type="text" id="descriptionInput" class="form-control form-control-lg" name="description"  value="What on your mind!" minlength="1" maxlength="20"/>
                        <label class="form-label" for="descriptionInput">DESCRIPTION</label>
                    </div>
                    <div class="form-outline mb-3">
                        <input type="number" id="formControlLg" class="form-control form-control-lg" name="amount" value="1000" />
                        <label class="form-label" for="formControlLg">Finance Amount (MMK)</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" id="inlineRadio1" name="type" value="income" type="radio" checked />
                        <label class="form-check-label" for="inlineRadio1">Income</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" id="inlineRadio2" name="type" value="expense" type="radio" />
                        <label class="form-check-label" for="inlineRadio2">Expanse</label>
                    </div>
                    <hr>
                    <div class="form-outline my-3">
                        <input type="date" id="datePicker" class="form-control form-control-lg" name="date"/>
                        <label class="form-label" for="datePicker">DATE</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const today = new Date().toISOString().substr(0, 10);
    document.querySelector("#datePicker").value = today;
    document.querySelector('input[value="income"]').focus();
</script>