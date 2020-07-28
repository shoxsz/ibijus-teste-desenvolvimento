const get = function(url, data, success){
  $.ajax({
    url: url,
    data: data,
    dataType: 'JSON',
    success: ajaxSuccess,
    error: error
  });
}

//Essa classe fornece acesso à API rest dos locais e do CEP
class BackendClient{
  fetchCEP(cep, callback){
    $.ajax({
      url: "/ibijus/fetch-cep", 
      data: { cep: cep }, 
      dataType: 'JSON',
      success: function(response){
        if(!!response.error){
          //silently
          console.log("Erro " + response);
        }

        if(!response.result){
          return;
        }

        if(!!callback){
          callback(response.result);
        }
      },
      error: function(){
        alert("Falha ao acessar o servidor!");
      }
    });
  }

  sendLocal(data, id){
    const updating = !!id;
    var sendUrl;

    if(updating){
      data.id = id;
      sendUrl = "/ibijus/atualizar-local";
    }else{
      sendUrl = "/ibijus/cadastrar-novo-local";
    }

    $.ajax({
      url: sendUrl, 
      type: "POST",
      data: data, 
      dataType: 'JSON',
      success: function(result){
        if(!!result.error){
          swal(result.error);
        }

        if(result.success){
          swal("Localidade salva!").then(function(){ location.reload(); });
        }
      },
      error: function(){
        swal("Falha ao acessar o servidor!");
      }
    });
  }

  deleteLocal(id){
    $.ajax({
      url: "/ibijus/deletar-local",
      type: "POST",
      data: { id : id },
      dataType: "JSON",
      success: function(result){
        if(!!result.error){
          swal(result.error);
        }

        if(result.success){
          swal("Removido!").then(function(){
            location.reload();
          });
        }
      },
      error: function(){
        swal("Falha ao acessar o servidor!");
      }
    })
  }
};