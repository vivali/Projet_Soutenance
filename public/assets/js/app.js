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


function loadBar(){
    var bar = new ProgressBar.Line('.loadBar', {
    strokeWidth: 1,
    easing: 'linear',
    duration: 300000,
    color: 'red',
    trailColor: '#eee',
    trailWidth: 15,
    svgStyle: {width: '100%', height: '100%'},
    text: {
        style: {
        color: 'black',
        position: 'absolute',
        right: '550',
        top: '-10',
        padding: 5,
        margin: 5,
        transform: null
        },
        autoStyleContainer: false
    },
    from: {color: '#FFEA82'},
    to: {color: '#ED6A5A'},
    step: (state, bar) => {
        bar.setText(Math.round(bar.value() * 100) + ' %');
        console.log(bar.value());
    }
    });

    bar.animate(1.0);
}

