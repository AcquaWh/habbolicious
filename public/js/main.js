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
    function compruebaAceptaCookies() {
        if(localStorage.aceptaCookies == 'true'){
            $("#cajacookies").remove();
        }
    }
    $("#aceptargalletas").click(function(){
        localStorage.aceptaCookies = 'true';
        $("#cajacookies").fadeOut(300, function(){ $(this).remove();});
    });
    compruebaAceptaCookies();

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
    $('#fecha').datepicker({
        language: "es",
        format: 'yyyy/mm/dd'
    });
    function doClickActualizar(event) {
        if ($("#contra").val() == $("#confirmarcontra").val()) {
            $("#frmActualizarPerfil").submit();
        } else {
            $("#passwordError").html("<i class='fa fa-times-circle-o'></i> Las contraseÃ±as no coinciden");
            $(".grupo-password").addClass("has-error");
        }
    }
    $("#confirmarcontra").on("input",function () {
            if ($("#contra").val() == $("#confirmarcontra").val()) {
                $("#passwordError").html("");
                $(".grupo-password").removeClass("has-error");
            }
            else {
                $("#passwordError").html("<i class='fa fa-times-circle-o'></i> Las contraseÃ±as no coinciden");
                $(".grupo-password").addClass("has-error");
            }
    });
    $("#confirmarcontra").focus(function () {
            $("#passwordError").html("");
            $(".grupo-password").removeClass("has-error");
    });
    $(function () {
            $("#passwordError").html("");
            $("#btnActualizar").click(doClickActualizar);
    });
    $("#email").on("change",function(){
        var correo = $('#email').val();
        $.ajax({
            url: '/validar-usuario/'+correo,
            type: "GET",
            success: function(response){
                $("#email").css('border','1px solid green');
                $("#mensajeinicio").empty();
                $('#iniciarsesion').on('submit', function(){
                    this.submit();
                });
            },
            error: function(response){
                $("#email").css('border','1px solid red');
                $("#mensajeinicio").html("No existe este correo, intenta de nuevo");
                $('#iniciarsesion').on('submit', function(){
                    this.preventDefault();
                });
            }
        });
    });
    /* Audio */
    var radiohabbo = document.createElement('audio');
    $('#slider').append(radiohabbo);
    radiohabbo.id = "radiohabbo";
    iniciaraudio('https://radio.hostedred.com/radio/8050/jungle', 0);
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
        $.get("https://radio.hostedred.com/api/nowplaying/7",function(data){
        	var djname = (data.live.streamer_name) ? data.live.streamer_name : "AutoDJ";
        	var oyente = data.listeners.total;
			var titulo = data.now_playing.song.text;
			var artista = data.now_playing.song.artist;
			$(".oyentes").html("");
			$(".cancion-radio").html("");
            $(".titulo-radio").html("");
            if(djname == "Habbojungle"){
                $(".avatar").css("background-image","url('https://www.habbo.es/habbo-imaging/avatarimage?user=xCoositta&direction=3&head_direction=3&gesture=sml&action=none&size=l')");
            } else {
                $(".avatar").css("background-image","url('https://www.habbo.es/habbo-imaging/avatarimage?user="+djname+"&direction=3&head_direction=3&gesture=sml&action=none&size=l')");
            }
			$(".oyentes").html("Oyentes: "+oyente+" habbos");
			$(".cancion-radio").html("<span><i class='fas fa-music' aria-hidden='true'></i></span>"+artista+" - "+titulo);
			$(".titulo-radio").html("<span><i class='fas fa-user' aria-hidden='true'></i></span>"+djname);
        });
        
    }
    api();
    setInterval(api,15000);
});

