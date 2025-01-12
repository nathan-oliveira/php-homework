<div class="modal fade" id="modal<?= $user->getId(); ?>" tabindex="-1" aria-labelledby="modal<?= $user->getId(); ?>" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal<?= $user->getId(); ?>Label">Inserir Venda</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" id="formModal<?= $user->getId(); ?>" action="/sales/post">
          <input
            type="hidden"
            value="<?= $user->getId(); ?>"
            id="user_id"
            name="user_id"
            readonly
          />

          <v-row>
            <div class="input-group flex-nowrap">
              <span class="input-group-text">Valor da venda</span>
              <input
                required
                class="form-control"
                placeholder="157,90"
                id="sale_price"
                name="sale_price"
                maxlength="9"
              />
            </div>
          </v-row>
        </form>
      </div>
      <div class="modal-footer d-flex justify-content-between">
        <a href="/sales/view/<?= $user->getId(); ?>" target="_blank" class="btn btn-outline-primary">Visualizar vendas</a>
        <div>
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fechar</button>
          <button type="submit" form="formModal<?= $user->getId(); ?>" class="btn btn-outline-success">Salvar</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function(){
      $('#sale_price').mask("#.##0,00", {reverse: true});
    });
  </script>
</div>
