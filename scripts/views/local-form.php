<body>
  <link rel="stylesheet" href="/ibijus/assets/styles/local-form.css"/>
  <div class="content">
    <div class="backimage"></div>
    <form class="card-shadow" id="cadastro_form" method="post">
      <h1 class="backimage-text"><?php echo isset($local) ? "Editar local" : "Novo local" ?></h1>
      <div class="form-content">
        <?php if(isset($local)):?>
        <input id="local-id" type="hidden" value="<?php echo $local->id?>" />
        <?php endif;?>

        <div class="input-element">
          Nome:<br/>
          <input type="text" value="<?php echo isset($local) ? $local->nome : ""?>" id="nome" name="nome" placeholder="Nome"/><br/>
        </div>
        
        <div class="input-element">
          CEP:<br/>
          <input type="text" value="<?php echo isset($local) ? $local->cep : ""?>" id="cep" name="cep" placeholder="CEP"/><br/>
        </div>
        <div class="input-element">
          Logradouro:<br/>
          <input type="text" value="<?php echo isset($local) ? $local->logradouro : ""?>" id="logradouro" name="logradouro" placeholder="Logradouro"/><br/>
        </div>

        <div class="input-element">
          Complemento:<br/>
          <input type="text" value="<?php echo isset($local) ? $local->complemento : ""?>" id="complemento" name="complemento" placeholder="Complemento"/><br/>
        </div>

        <div class="input-element">
          Numero:<br/>
          <input type="text" value="<?php echo isset($local) ? $local->numero : ""?>" id="numero" name="numero" placeholder="Número"/><br/>
        </div>
        
        <div class="input-element">
          Bairro:<br/>
          <input type="text" value="<?php echo isset($local) ? $local->bairro : ""?>" id="bairro" name="bairro" placeholder="Bairro"/><br/>
        </div>

        <div class="input-element">
          UF:<br/>
          <input type="text" value="<?php echo isset($local) ? $local->uf : ""?>" id="uf" name="uf" placeholder="UF"/><br/>
        </div>

        <div class="input-element">
          Cidade:<br/>
          <input type="text" value="<?php echo isset($local) ? $local->cidade : ""?>" id="cidade" name="cidade" placeholder="Cidade"/><br/>
        </div>

        <div class="input-element">
          Data:<br/>
          <input type="text" value="<?php echo isset($local) ? $local->data : ""?>" id="data" name="data" placeholder="Data"/><br/>
        </div>
        <div class="input-element">
          <input class="form-input-button" type="submit" value="Confirmar"/>
          <a href="/ibijus/"><button type="button">Cancelar</button></a>
        </div>
      </div>
    </form>
  </div>
</body>
<script src="/ibijus/assets/scripts/backend.js"></script>
<script src="/ibijus/assets/scripts/local_form.js"></script>