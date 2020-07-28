$(function(){
  const backendClient = new BackendClient();

  const validateCEP = function(){
    const cep = $("#cep").val();
    if(cep.length != 8){
      return false;
    }
    return true;
  }

  const fetchCEP = function(){
    if(validateCEP()){
      backendClient.fetchCEP($("#cep").val(), function(response){
        $("#logradouro").val(response.logradouro);
        $("#complemento").val(response.complemento);
        $("#bairro").val(response.bairro);
        $("#uf").val(response.uf);
        $("#cidade").val(response.localidade);
      });
    }else{
      swal("Favor informar o CEP para a consulta");
    }
  }

  const buildFormObj = function(){
    return {
      nome: $("#nome").val(),
      cep: $("#cep").val(),
      logradouro: $("#logradouro").val(),
      complemento: $("#complemento").val(),
      numero: $("#numero").val(),
      bairro: $("#bairro").val(),
      uf: $("#uf").val(),
      cidade: $("#cidade").val(),
      data: $("#data").val()
    }
  }

  const submitForm = function(e){
    e.preventDefault();
        
    if(!validateCEP()){
      swal("Favor informar o CEP para a consulta");
      return false;
    }

    const id = $("#local-id").val();
    backendClient.sendLocal(buildFormObj(), id);
  }

  $("#cep").blur(fetchCEP);
  $("#cadastro_form").submit(submitForm);
});