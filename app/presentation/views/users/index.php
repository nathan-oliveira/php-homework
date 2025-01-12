<?php include_once(HEADER); ?>

<section class="csm-section">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/" style="color: #575A5D;">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page" style="color: #000;">Usuários</li>
  </ol>

  <div class="row">
    <div class="col-sm-12" style="display: flex;justify-content: end; margin-top: -40px;">
      <a class="btn btn-outline-primary" href="/users/create">Novo Usuário</a>
    </div>
  </div>

  <table class="table table-striped table-bordered mt-3">
    <thead class="table-thead">
      <tr>
        <th scope="col">Nome</th>
        <th scope="col">E-mail</th>
        <th scope="col" style="width: 220px;"></th>
      </tr>
    </thead>
    <tbody class="table-tbody">
<?php foreach ($users as $user): ?>
      <tr>
        <td><?= $user->getName(); ?></td>
        <td><?= $user->getEmail(); ?></td>
        <td style="display: flex; justify-content: space-around;">
          <a class="btn btn-outline-secondary btn-action" href="/users/edit/<?= $user->getId(); ?>">Editar</a>
          <a class="btn btn-outline-danger btn-action" href="/users/delete/<?= $user->getId(); ?>" onclick="return confirm('Tem certeza?')">Excluir</a>
          <button class="btn btn-outline-primary btn-action" data-bs-toggle="modal" data-bs-target="#modal<?= $user->getId(); ?>">
            Venda
          </button>

<?php include(MODAL_SALE); ?>
        </td>
      </tr>
<?php endforeach; ?>
    </tbody>
  </table>
</section>

<?php include_once(FOOTER); ?>
