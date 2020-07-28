$(function(){
  const backendClient = new BackendClient();

  const CEP_REGEX = /^\d\d\d\d\d\d\d\d$/;

  const formatCEPField = function(){
    const cep = $("#cep").val().replace("-", "");
    $("#cep").val(cep);
  }

  const validateCEP = function(){
    const cep = $("#cep").val();

    if(!CEP_REGEX.test(cep)){
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
    backendClient.sendLocal(buildFormObj(), id, function(id){
      location.href = '/ibijus/editar-local/?id=' + id;
    });
  }

  $("#cep").blur(fetchCEP);
  $("#cep").change(formatCEPField);
  $("#cadastro_form").submit(submitForm);
});