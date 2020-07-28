$(function(){
  const backendClient = new BackendClient();

  const gotoEditPage = function(){
    const button = $(this);
    location.href = "/ibijus/editar-local/?id=" + button.attr("local");
  }

  const deleteOption = function(){
    const button = $(this);
    swal({
      title: "Tem certeza?",
      text: "Você quer mesmo remover essa localidade?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then(function(confirmDelete){
      if(confirmDelete){
        backendClient.deleteLocal(button.attr("local"));
      }
    });
  }

  $(".edit-option").click(gotoEditPage);
  $(".delete-option").click(deleteOption);
});