console.log("js");

$("button.btn-report").on("click", function(){
    // id du rapport
    id = $(this)[0].id.substr( 3);

    // Le rapport à afficher
    reportToShow = "report_"+id;

    // On cache tous les rapports puis on affiche le rapport sur lequel on a cliqué
    $(".report").addClass("hide");

    $("#displayed-report").html( $("#"+reportToShow).html() );

    // On limite les requete ajax au message qui ne sont pas vu
    if( $(this).parent().hasClass("bg-warning") ){
        // Marque le message comme vu dans la bdd
        $.ajax({url: "/report/seen/" + id,});
    }

    // Marque le message comme vu sur la page
    $(this).parent().removeClass("bg-warning");
});
