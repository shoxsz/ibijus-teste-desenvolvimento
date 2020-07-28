
<?php
  require_once("scripts/helpers/DateFormater.php");
?>
  <body>
    <link rel="stylesheet" href="/ibijus/assets/styles/index.css"/>
    <div class="content">
      <div class="backimage"></div>
      <div class="locais-table card-shadow">
        <h1 class="table-header-text">Meus Locais</h1>
        <?php if(!isset($locais) || count($locais) == 0):?>
          <div class="sem-locais-box">
            <h2>Você ainda não adicionou um local! :(</h2>
            <h2>Clique no botão abaixo para adicionar um novo local!</h2>
          </div>
        <?php else:?>
        <table>
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
              <td><?php echo DateFormater::FromMySQL($local->data); ?></td>
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
        <?php endif;?>
      </div>
      <a href="/ibijus/novo-local">
        <button><i class="fa fa-add"></i>Adicionar</button>
      </a>
    </div>
  </body>
  <script src="/ibijus/assets/scripts/backend.js"></script>
  <script src="/ibijus/assets/scripts/index.js"></script>