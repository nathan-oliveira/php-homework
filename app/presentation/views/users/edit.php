<?php include_once(HEADER); ?>

<section class="csm-section">
  <ol class="breadcrumb" style="margin-bottom: 29px;">
    <li class="breadcrumb-item"><a href="/" style="color: #575A5D;">Home</a></li>
    <li class="breadcrumb-item"><a href="/users" style="color: #575A5D;">Usuários</a></li>
    <li class="breadcrumb-item active" aria-current="page" style="color: #000;">Edição</li>
  </ol>

  <fieldset>
    <legend>Editar Usuário</legend>

    <form action="/users/update/<?php echo $user->getId(); ?>" method="POST">
      <v-row>
        <div class="col-sm-12" style="margin-top: 29px;">
          <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Nome</span>
            <input
              required
              type="text"
              class="form-control"
              placeholder="nome completo"
              id="name"
              name="name"
              value="<?php echo htmlspecialchars($user->getName()); ?>"
              maxlength="255"
            />
          </div>
        </div>
      </v-row>

      <v-row>
        <div class="col-sm-12" style="margin-top: 10px;">
          <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">E-mail</span>
            <input
              required
              type="email"
              class="form-control"
              placeholder="seuemail@exemplo.com"
              id="email"
              name="email"
              value="<?php echo htmlspecialchars($user->getEmail()); ?>"
              maxlength="255"
            />
          </div>
        </div>
      </v-row>

      <br>

      <div class="row">
        <div class="col-sm-12" style="display: flex;justify-content: end;">
          <a class="btn btn-outline-primary" href="/users" style="margin-right: 10px">Voltar</a>
          <button type="submit" class="btn btn-outline-success">Salvar</button>
        </div>
      </div>
    </form>
  </fieldset>
</section>

<?php include_once(FOOTER); ?>
