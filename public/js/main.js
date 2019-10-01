$( function() {
    /* Slider */
    $( "#slider" ).slider();
    $('[data-toggle="tooltip"]').tooltip();
    $('.owl-carousel').owlCarousel({
        autoplay:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    })
    /* Menu */
    $("#iniciarhabbo").click(function(){
        $("#iniciar-sesion").css("width","100%");
    });
    $("#cerrarhabbo").click(function(){
        $("#iniciar-sesion").css("width","0");
    });
    /* Volumen */
    $("#slider").slider({
        min: 0,
        max: 100,
        value: 70,
            range: "min",
        slide: function(event, ui) {
            iniciarvolumen(ui.value / 100);
        }
    });
    /* Audio */
    var radiohabbo = document.createElement('audio');
    $('#slider').append(radiohabbo);
    radiohabbo.id = "radiohabbo";
    iniciaraudio('//radio.hostedred.com:8077/stream', 0);
    function iniciaraudio(archivo, volumen) {
        radiohabbo.src = archivo;
        radiohabbo.setAttribute('loop', 'loop');
        radiohabbo.autoplay = true;
        $(".play").click(function() {
            radiohabbo.play();
        });
        $(".stop").click(function() {
            radiohabbo.pause();
        });
    }
    function iniciarvolumen(volumen) {
        var radiohabbo = document.getElementById('radiohabbo');
        radiohabbo.volume = volumen;
    }
    /* Api */
    function api(){
        $.ajax({
            url: "https://nap.casthost.net:2199/rpc/habbolicious/streaminfo.get",
            type: 'GET',
            success: function(json){
                json.data.forEach(function (item) {
                    var oyente = item.listenertotal;
                    var dj = item.title;
                    var titulo = item.track.title;
                    var artista = item.track.artist;
                    $(".oyentes").html("");
                    $(".cancion-radio").html("");
                    $(".titulo-radio").html("");
                    $(".oyentes").html("Oyentes: "+oyente+" habbos");
                    $(".cancion-radio").html("<span><i class='fas fa-music' aria-hidden='true'></i></span>"+artista+" - "+titulo);
                    $(".titulo-radio").html("<span><i class='fas fa-user' aria-hidden='true'></i></span>"+dj);
                });
            }
        });
    }
    api();
    setInterval(api,5000);
} );

