
$(() => {

    $(".desgen li").click(function(){
        $(".desgen li").not(this).removeClass("activ");
        $(this).addClass("activ");
    });

    $(".tab-gen").not(".tab1").slideUp();
    
    //post: al momento de utilizar this, no se permite una arrow function ya que no es conocida como el que disparo el evento

    $(".info-adicional ul li").click(function(){
        let contenedor = $(this).data("tab");
        $(".tab-gen").not("."+contenedor).slideUp();
        $("."+contenedor).slideDown();

    });

})