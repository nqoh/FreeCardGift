
function  _(x) { return document.getElementById(x)}
var seekto, dura;
var canvas,ctx,source,context,analyser,fbc_array,bars,bar_x,bar_x,bar_width,bar_height;
function  loadtrack(track) {
    var audio = new Audio();
    audio.src = "musicfile/" + track;
    audio.volume=_('volume_slider').value/100;
    _("ply").addEventListener('click', play_track);_('volume_slider').addEventListener('change',setvolume);
    _('mute').addEventListener('click',mutes);_('seekbar').addEventListener("change",seek);
    _('stop').addEventListener('click',stop_track);
    audio.addEventListener('timeupdate',autseek,false);
  iniMp3();


    function stop_track(){
        audio.pause();
        audio.currentTime=0;
    }
    function play_track() {
            if (audio.paused) {
               audio.play();
              
        } else {
            audio.pause();
            _("play_pause").src = "thumbnails/play-button-1.png"
            _("speaker1").src = "thumbnails/spk.gif"
            _("speake2").src = "thumbnails/spk1.gif"
        }
    }
    function mutes() {

        if(audio.muted){
            audio.muted=false;
            if(_('volume_slider').value <= 0){
                _('volum').src="thumbnails/mute.png"
            } else if(_('volume_slider').value <= 30 && _('volume_slider').value > 1 ){
                _('volum').src="thumbnails/spk.png"
            }else if(_('volume_slider').value >= 31 && _('volume_slider').value < 65){
                _('volum').src="thumbnails/spk1.png"
            }else if(_('volume_slider').value >= 65 && _('volume_slider').value < 100){
                _('volum').src="thumbnails/spk2.png"
            }
        }else{
            audio.muted=true;
            _("speaker1").src = "thumbnails/spk1.gif"
            _("speake2").src = "thumbnails/spk1.gif"
            _('volum').src="thumbnails/mute.png"

        }
    }
    function setvolume() {
        audio.volume = _('volume_slider').value / 100;
        if(_('volume_slider').value <= 0){
            _('volum').src="thumbnails/mute.png"
            audio.muted=true;
         } else if(_('volume_slider').value <= 30 && _('volume_slider').value > 1 ){
            _('volum').src="thumbnails/spk.png"
            audio.muted=false;
        }else if(_('volume_slider').value >= 31 && _('volume_slider').value < 65){
            _('volum').src="thumbnails/spk1.png"
            audio.muted=false;
        }else if(_('volume_slider').value >= 65 && _('volume_slider').value < 100){
            _('volum').src="thumbnails/spk2.png"
            audio.muted=false;
        }

    }
    function seek() {audio.currentTime=audio.duration *  (_('seekbar').value / 100);}

    function autseek() {
            _('seekbar').value=audio.currentTime * (100 / audio.duration);
            _("speaker1").src = "thumbnails/spk.gif";
            _("speake2").src = "thumbnails/spk.gif";
            _('play_pause').src = "thumbnails/pause-1.png";
      
        var curnmin=Math.floor(audio.currentTime / 60);
        var cursec=Math.floor(audio.currentTime - curnmin * 60);
        var durmin=Math.floor(audio.duration / 60);
        var dursec=Math.floor(audio.duration - durmin * 60);
        if(cursec < 10 ){ cursec ="0"+cursec}
        if(dursec < 10 ){dursec ="0"+dursec}
        _("ctime").innerHTML=curnmin+":"+cursec;
        _("dtime").innerHTML=durmin+":"+dursec;
                if(audio.paused){
            _("play_pause").src = "thumbnails/play-button-1.png"
            _("speaker1").src = "thumbnails/spk1.gif"
            _("speake2").src = "thumbnails/spk1.gif"
        }
        if(audio.muted) {
            _("speaker1").src = "thumbnails/spk1.gif"
            _("speake2").src = "thumbnails/spk1.gif"
            _('volum').src = "thumbnails/mute.png"
        }
    }


function iniMp3(){
     context = new AudioContext();
    analyser=context.createAnalyser();
    canvas= document.getElementById("analyser");
    ctx=canvas.getContext('2d');
    source=context.createMediaElementSource(audio);
    source.connect(analyser);
    analyser.connect(context.destination);
    framelooper();
}
function framelooper() {
    window.requestAnimationFrame(framelooper);
    fbc_array = new Uint8Array(analyser.frequencyBinCount);
    analyser.getByteFrequencyData(fbc_array);
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    ctx.fillStyle = '#b05f3c';
    bars = 100;
    for (var i = 0; i < bars; i++) {
        bar_x = i * 3;
        bar_width = 2;
        bar_height = -(fbc_array[i] / 2);
        ctx.fillRect(bar_x, canvas.height, bar_width, bar_height);
    }
}

}

