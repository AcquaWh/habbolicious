/**
* ------------------------------------------------------------------------
* Libreria de Radio
* Creado por @AcquaWh (https://github.com/acquawh)
* ------------------------------------------------------------------------
*/

/**
* ------------------------------------------------------------------------
* Conseguir los datos del Dj actual, keko, nombre de canción y oyentes
* api: Url del json de la radio
* id_titulo: Selector ID del titulo
* id_dj: Selector ID del DJ
* id_oyentes: Selector ID de los oyentes
* id_kekodj: Selector ID de la imagen del keko
* direction: Dirección del personaje
* head_direction: Posicion de la cabeza
* gesture: Gesto de la cara
* size: Tamaño del personaje
* ------------------------------------------------------------------------
*/
var getDjData = (function(api, id_titulo, id_dj, id_oyentes, id_kekodj, direction, head_direction, gesture, size){
    var init = function(){
        $.get(api,function(data){
        	var djname = (data.live.streamer_name) ? data.live.streamer_name : "AutoDJ";
        	$(id_titulo).text(data.now_playing.song.text);
        	$(id_dj).text(djname);
        	$(id_oyentes).text(data.listeners.unique);
        	$(id_kekodj).css("background-image","url('https://www.habbo.es/habbo-imaging/avatarimage?user="+djname+"&action=std&direction="+direction+"&head_direction="+head_direction+"&gesture="+gesture+"&size="+size+"')");
        });
    }
    init();
    return {
        init: init
    }
});
/**
* ------------------------------------------------------------------------
* Conseguir el volumen de la radio (Solo para HabboSecurity)
* d: Selector ID del slider del volumen
* b: Valor actual del slider
* * (Editado por HabboSecurity)
* ------------------------------------------------------------------------
*/
var volumenRadio = (function(d,b){
	var init = function(){
	    var playerPaused = false
	    /**
        * ------------------------------------------------------------------------
        * Conseguir la posición del slider de volumen
        * a: posicion en X de la barra
        * (Editado por HabboSecurity)
        * ------------------------------------------------------------------------
        */
	    function offset_X(a){
        	snd_barre=$("#sound_barre");
        	player=$(".cont_stats");
        	playerLeft=player.offset().left;
        	barreLeft=snd_barre.position().left;
        	return a.clientX-playerLeft-barreLeft;
        }
        // Final de funcion offset_X
	    var a;
	    if(playerPaused===false){
    		var c = (offset_X(b)/126)*1;
    		if(c>1){
    			a = 1;
    		}else{
    			if(c < 0){
    				a = 0;
    			}else{
    				a = c;
    			}
    		}
    		console.log(a);
    		myaudio.volume = a;
    	}
	}
	init();
	return {
	    init:init
	}
});
/**
* ------------------------------------------------------------------------
* Slider
* selector: Selector ID del #slider
* id_audio: Selector ID de la etiqueta <audio> del HTML que se generará
* id_play: Selector ID del boton play
* id_stor: Selector ID del boton stop
* radio_autoplay: False o true
* url: Enlace del reproductor de tu radio
* ------------------------------------------------------------------------
*/
var getRadioSound = (function(selector, id_audio, id_play, id_stop, radio_autoplay, url){
    var init = function(){
        // Se crea la etiqueta audio HTML
        var radiohabbo = document.createElement('audio');
        $(selector).append(radiohabbo);
        radiohabbo.id = "radiohabbo";
        iniciaraudio(url, 0);

        // Iniciar audio de la radio
        function iniciaraudio(archivo, volumen) {
            radiohabbo.src = archivo;
            radiohabbo.setAttribute('loop', 'loop');
            radiohabbo.autoplay = radio_autoplay;
            $(id_play).click(function() {
                radiohabbo.play();
            });
            $(id_stop).click(function() {
                radiohabbo.pause();
            });
        }
        // Iniciar volumen
        function iniciarvolumen(volumen) {
            var radiohabbo = document.getElementById(id_audio);
            radiohabbo.volume = volumen;
        }
        
        $(selector).slider();
        $(selector).slider({
            min: 0,
            max: 100,
            value: 70,
                range: "min",
            slide: function(event, ui) {
                iniciarvolumen(ui.value / 100);
            }
        });
    }
    init();
    return{
        init:init
    }
});

