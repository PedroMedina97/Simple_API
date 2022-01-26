$(document).ready(function(){    
    $("#formulario").submit(function(e){
        e.preventDefault();
        let cat = $('input[name=nombre]').val();
        var categoria = {
            nombre: cat
        };
        category = JSON.stringify(categoria);
        console.log(categoria);
        showLoading();
        $.ajax({
            type:'POST',
            url: "controllers/category.php?action=create",
            data: category,
            success: function(response){
                showLoading();
                Swal.fire({
                    icon: 'success',
                    title: 'Fila insertada correctamente',
                    showConfirmButton: false,
                    timer: 1500
                  }).then(function () {
                    location.href = 'http://localhost/api_vials';
                });
            },
            timeout: 2000,
            error: function(){
                Swal.fire({
                    icon: 'error',
                    title: 'Error al insertar fila',
                    showConfirmButton: false,
                    timer: 1500
                  })
            },
            
        });
        return false;
    });

    $('.borrar_categoria').click(function(){
        let id_categoria = $(this).data('id-categoria');
        let nombre_categoria = $(this).data('nombre-categoria');
        console.log(id_categoria);
        var categoria = {
            id: id_categoria
        };

        idCategoria = JSON.stringify(categoria);
        Swal.fire({
            title: 'Borrar Categoría',
            html: '¿Desea borrar la categoria '+ '"'+nombre_categoria+'"'+'?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Si, borrar',
            cancelButtonText: 'No Cancelar'
        }).then((result)=>{
            if(result.isConfirmed){
                showLoading();
                $.ajax({
                    type: "POST",
                    url: "controllers/category.php?action=delete",
                    data: idCategoria,
                    success: function(response){
                        showLoading();
                        Swal.fire({
                            icon: 'success',
                            title: 'Fila borrada correctamente',
                            showConfirmButton: false,
                            timer: 1500
                          }).then(function () {
                            location.href = 'http://localhost/api_vials';
                        });
                    },
                    timeout: 2000,
                    error: function(){
                        Swal.fire({
                            icon: 'error',
                            title: 'Error al borrar la fila',
                            showConfirmButton: false,
                            timer: 1500
                          })
                    }
                })
            }
        })
    });

    function showLoading() {
        Swal.fire({
            title: 'Espere un momento',
            allowOutsideClick: false,
            onBeforeOpen: () => {
                Swal.showLoading()
            },
        });
    }
});