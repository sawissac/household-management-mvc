<section class="container bg-white w-100 px-3">
  <div class="row">
    <div class="col-12 py-3">
      <div class="mb-3">
        <div class="btn-group">
          <button type="button" class="btn btn-primary btn-lg dropdown-toggle" data-mdb-toggle="dropdown" aria-expanded="false" style="width:150px;">
            <?= $currentDate ?>
          </button>
          <ul class="dropdown-menu">
            <?php foreach ($databaseDate as $dates) : ?>
              <li><a class="dropdown-item" href="<?= '/app?user=' . $username . '&view=' . $view . '&date=' . $dates['DATE'] ?>"><?= $dates['DATE'] ?></a></li>
            <?php endforeach ?>
          </ul>
        </div>
        <div class="btn-group">
          <a class="btn <?= $view === 'overall' ? 'btn-primary btn-lg' : 'btn-outline-primary btn-lg' ?> " href="/app?user=<?= $username ?>&view=overall&date=<?= $currentDate ?>">Overall</a>
          <a class="btn <?= $view === 'reverse' ? 'btn-primary btn-lg' : 'btn-outline-primary btn-lg' ?>" href=" /app?user=<?= $username ?>&view=reverse&date=<?= $currentDate ?>">Reverse</a>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-hover rounded border">
          <thead>
            <tr class="fw-bold">
              <th scope="col">ID</th>
              <th scope="col">DESCRIPTION</th>
              <th scope="col">INCOME</th>
              <th scope="col">EXPENSE</th>
              <th scope="col">DATE</th>
              <th scope="col">BALANCE</th>
              <th scope="col">ACTION</th>
            </tr>
          </thead>
          <tbody>
            <?php if (count($dataSet) === 0) : ?>
              <tr>
                <th class="text-center" scope="row" colspan="7">No List Created!</th>
              </tr>
            <?php endif ?>
            <?php
            $counter = 0;
            ?>
            <?php foreach ($dataSet as $data) : ?>
              <tr>
                <th scope="row"><?= $view === 'overall' ? ++$counter : count($dataSet) + $counter-- ?></th>
                <td style="min-width:200px;">
                  <div class="form-outline">
                    <input id="tableDesc<?= $data['ID'] ?>" class="form-control form-control-md" type="text" value="<?= $data['DESCRIPTION'] ?>">
                  </div>
                </td>
                <td style="min-width:200px;">
                  <div class="form-outline">
                    <input id="tableIncome<?= $data['ID'] ?>" class="form-control form-control-md" type="number" value="<?= $data['INCOME'] ?>">
                  </div>
                </td>
                <td style="min-width:200px;">
                  <div class="form-outline">
                    <input id="tableExpense<?= $data['ID'] ?>" class="form-control form-control-md" type="number" value="<?= $data['EXPENSE'] ?>">
                  </div>
                </td>
                <td style="min-width:200px;">
                  <div class="form-outline">
                    <input class="form-control form-control-md" type="text" value="<?= $data['DATE'] ?>" readonly>
                  </div>
                </td>
                <td style="min-width:200px;">
                  <div class="form-outline">
                    <input class="form-control form-control-md" type="text" value="<?= $data['BALANCE'] ?>" readonly>
                  </div>
                </td>
                <td style="min-width:200px;">
                  <a id="tableEdit<?= $data['ID'] ?>" href="/app?user=<?= $username ?>" class="btn btn-primary btn-lg">
                    <i class="fa-solid fa-pen"></i>
                  </a>
                  <a href="/app?user=<?= $username ?>&view=overall&date=<?= $currentDate ?>&delete=<?= $data['ID'] ?>" class="btn btn-danger btn-lg">
                    <i class="fa fa-trash"></i>
                  </a>
                </td>
              </tr>
              <script>

                //? this function auto generate update query url for edit link 
                function bindToEditLink() {
                  let view = '<?= $view ?>';
                  let listId = <?= $data['ID'] ?>;
                  let userName = '<?= $username ?>';
                  let date = '<?= $currentDate ?>';
                  let descInput = document.getElementById(`tableDesc<?= $data['ID'] ?>`);
                  let incomeInput = document.getElementById(`tableIncome<?= $data['ID'] ?>`);
                  let expenseInput = document.getElementById(`tableExpense<?= $data['ID'] ?>`);
                  let editLink = document.getElementById(`tableEdit<?= $data['ID'] ?>`);
                  let urlSearch = new URL('/app', window.location.origin);
                  let params = new URLSearchParams(urlSearch.search);
                  params.set('user', userName);
                  params.set('view', view);
                  params.set('date', date);
                  params.set('id', listId);
                  params.set('description', descInput.value);
                  params.set('income', incomeInput.value);
                  params.set('expense', expenseInput.value);
                  urlSearch.search = params;
                  editLink.setAttribute('href', urlSearch.href);

                  descInput.addEventListener('keyup', (ev) => {
                    params.set('description', ev.target.value);
                    urlSearch.search = params;
                    editLink.setAttribute('href', urlSearch.href);
                  })

                  incomeInput.addEventListener('keyup', (ev) => {
                    params.set('income', ev.target.value);
                    urlSearch.search = params;
                    editLink.setAttribute('href', urlSearch.href);
                  })

                  expenseInput.addEventListener('keyup', (ev) => {
                    params.set('expense', ev.target.value);
                    urlSearch.search = params;
                    editLink.setAttribute('href', urlSearch.href);
                  })
                }

                bindToEditLink();
              </script>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>