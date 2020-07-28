
  <body>
    <link rel="stylesheet" href="/ibijus/assets/styles/index.css"/>
    <div>
    <div class="content">
      <h2>Locais que já visitei</h2>
      <table class="locais-table card-shadow">
        <thead>
          <tr>
            <td>Nome</td>
            <td>Data da visita</td>
            <td>Opções</td>
          </tr>
        </thead>
        <tbody>
          <?php foreach($locais as $local): ?>
          <tr class="local-row<?php echo $local->uf == "MG" ? " local-mg" : " " ?>">
            <td><?php echo $local->nome; ?></td>
            <td><?php echo $local->data; ?></td>
            <td>
              <div class="table-options">
                <div class="table-option delete-option" local="<?php echo $local->id?>">
                  <i class="fa fa-times"></i>
                </div>
                <div class="table-option edit-option" local="<?php echo $local->id?>">
                  <i class="fa fa-edit"></i>
                </div>
              </div>
            </td>
          </tr>
          <?php endforeach;?>
        </tbody>
      </table>
      <a href="/ibijus/novo-local">
        <button class="add-button"><i class="fa fa-add"></i>Adicionar</button>
      </a>
    </div>
  </body>
  <script src="/ibijus/assets/scripts/backend.js"></script>
  <script src="/ibijus/assets/scripts/index.js"></script>