<?php include_once(HEADER); ?>

<section class="csm-section">
  <ol class="breadcrumb" style="margin-bottom: 29px;">
    <li class="breadcrumb-item"><a href="/" style="color: #575A5D;">Home</a></li>
    <li class="breadcrumb-item"><a href="/users" style="color: #575A5D;">Usuários</a></li>
    <li class="breadcrumb-item active" aria-current="page" style="color: #000;">Vendas de usuário</li>
  </ol>

  <fieldset>
    <legend>Vendas do usuário: <?php echo htmlspecialchars($user->getName()); ?></legend>
    <table class="table table-striped table-bordered mt-3">
      <thead class="table-thead">
        <tr>
          <th scope="col">Venda ID</th>
          <th scope="col">Nome</th>
          <th scope="col">E-mail</th>
          <th scope="col">Comissão</th>
          <th scope="col">Valor da venda</th>
          <th scope="col">Data da venda</th>
        </tr>
      </thead>
      <tbody class="table-tbody">
<?php foreach ($sales as $sale): ?>
        <tr>
          <td><?= htmlspecialchars($sale->getId()); ?></td>
          <td><?= htmlspecialchars($user->getName()); ?></td>
          <td><?= htmlspecialchars($user->getEmail()); ?></td>
          <td><?= htmlspecialchars($sale->getCommission()); ?></td>
          <td><?= htmlspecialchars($sale->getSalePrice()); ?></td>
          <td><?= htmlspecialchars($sale->getSaleDate()); ?></td>
        </tr>
<?php endforeach; ?>
      </tbody>
    </table>
  </fieldset>

  <div class="row">
    <div class="col-sm-12 mt-2" style="display: flex;justify-content: end;">
      <a class="btn btn-outline-primary" href="/users">Voltar</a>
    </div>
  </div>
</section>

<?php include_once(FOOTER); ?>
