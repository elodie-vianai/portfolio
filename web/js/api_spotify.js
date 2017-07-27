/******************************* GET AND DISPLAY THE LIST OF TRACKS IN A PLAYLIST ***************************************/
$(document).ready(function () {
    $('#pausebtn').hide();
    $('.playlist-link').on('click', function(e) { /*récupération de l'élément HTML playlist.link quand on clique*/
       e.preventDefault(); /*on enlève l'action d'aller sur une nouvelle page*/

        var idPlaylist = $(this).data('id'); // on récupère l'id de la playlist
        var session = document.location.href;   // on récupère l'url de la page courante
       $.get(session + '/playlist/' + idPlaylist, function (data) { // on renvoie tout vers la route
           $('#titrePlaylist').html(data.namePlaylist);
           document.getElementById('titrePlaylist').setAttribute('data-idplaylist', idPlaylist);
           $('#listTracks').empty();
           $('#listTracks').append(
               $('<tr/>').append(
                   $('<th/>', { 'class': 'titres', 'text': 'Titre'}),
                   $('<th/>', { 'class': 'artistes', 'text': 'Artiste(s)'}),
                   $('<th/>', { 'class': 'albums', 'text': 'Album'})
               )
           );

           data.tracks.forEach(function (track) {
               $('#listTracks').append(
                   $('<tr/>').append(
                       $('<td/>', { 'class': 'titres'})
                           .append(
                               $('<a/>', {
                                   'href': '#', /*track.previewUrl,*/
                                   'class': 'track-link',
                                   'data-id': track.idTrack,
                                   'data-playlist-id': idPlaylist,
                                   'text': track.nameTrack
                               }).on('click', getTrack)
                           ),
                       $('<td/>', { 'class': 'artistes', 'text': track.artist }),
                       $('<td/>', { 'class': 'albums', 'text': track.album })
                   )
               );
           });
       });
   });

    /******************************* GET AND DISPLAY INFO OF A TRACK (name, artist, album) ******************************/
    $('.track-link').on('click');

    var getTrack = function (e) {
        e.preventDefault();
        var trackId = $(this).data('id');
        var idPlaylist = $(this).data('playlist-id');
        var session = document.location.href;

        // GET AND DISPLAY INFO OF A TRACK (name, artist, album)
        $.get(session + '/playlist/' + idPlaylist + '/' + trackId, function (data) {
            var track = data.track;
            document.getElementById('track').setAttribute('data-idTrack', trackId);
            //document.getElementById('track').setAttribute('data_idPlaylist', idPlaylist);
            $('#trackName').empty();
            $('#trackName').text(track.nameTrack);
            $('#trackArtist').empty();
            $('#trackArtist').text(track.artistTrack);
            $('#albumImg').empty();
            $('#albumImg').append(
                $('<img/>', { 'src': track.albumImgTrack, 'id': 'imagealbum'})
            );
            if (track.previewUrl !== null) {
                $('#audioPlayer').prop('src', track.previewUrl);
                $('#audioPlayer')[0].play();
                $('#playbtn').hide();
                $('#pausebtn').on('click', play).show();
            }
            else {
                $('#audioPlayer')[0].pause();
                $('#playbtn').on('click', play).show();
                $('#pausebtn').hide();
            }

        });
    };

    /******************************* DISPLAY OR HIDE PLAY/PAUSE BUTTON **************************************************/
    /*$('.control').on('click');*/

    var play = function (e) {
        e.preventDefault();
        var player = document.querySelector('#audioPlayer');
        if (player.paused) {
            player.play();
            $('#playbtn').hide();
            $('#pausebtn').on('click', play).show();
        }
        else {
            player.pause();
            $('#playbtn').on('click', play).show();
            $('#pausebtn').hide();
        }
    };

    /******************************* BUTTON NEXT ************************************************************************/
    $('.nextlink').on('click', function (e) {
        e.preventDefault();
        var idPlaylist = document.getElementById('titrePlaylist').getAttribute('data-idplaylist');
        var currentTrack = document.getElementById('track').getAttribute('data-idTrack');
        var listTracks = document.getElementsByClassName('track-link');
        var session = document.location.href;
        var tracks = [];

        for (var i = 0; i < listTracks.length; i++) {
            tracks[i] = listTracks[i].getAttribute('data-id');
        }
        var nextTrack = null;
        for (var t = 0; t < tracks.length; t++) {
            if (tracks[t] === currentTrack) {
                nextTrack = tracks[t + 1];
            }
        }
        $.get(session + '/playlist/' + idPlaylist + '/' + nextTrack, function (data) {
            var track = data.track;
            document.getElementById('track').setAttribute('data-idTrack', nextTrack);
            $('#trackName').empty();
            $('#trackName').text(track.nameTrack);
            $('#trackArtist').empty();
            $('#trackArtist').text(track.artistTrack);
            $('#albumImg').empty();
            $('#albumImg').append(
                $('<img/>', { 'src': track.albumImgTrack, 'id': 'imagealbum'})
            );
            if (track.previewUrl !== null) {
                $('#audioPlayer').prop('src', track.previewUrl);
                $('#audioPlayer')[0].play();
                $('#playbtn').hide();
                $('#pausebtn').on('click', play).show();
            }
            else {
                $('#audioPlayer')[0].pause();
                $('#playbtn').on('click', play).show();
                $('#pausebtn').hide();
            }

        });
    });

    /******************************* BUTTON PREVIOUS ********************************************************************/
    $('.prevlink').on('click', function (e) {
        e.preventDefault();
        var idPlaylist = document.getElementById('titrePlaylist').getAttribute('data-idplaylist');
        var currentTrack = document.getElementById('track').getAttribute('data-idTrack');
        var listTracks = document.getElementsByClassName('track-link');
        var session = document.location.href;
        var tracks = [];

        for (var i = 0; i < listTracks.length; i++) {
            tracks[i] = listTracks[i].getAttribute('data-id');
        }
        var prevTrack = null;
        for (var t = 0; t < tracks.length; t++) {
            if (tracks[t] === currentTrack) {
                prevTrack = tracks[t - 1];
            }
        }
        $.get(session + '/playlist/' + idPlaylist + '/' + prevTrack, function (data) {
            var track = data.track;
            document.getElementById('track').setAttribute('data-idTrack', prevTrack);
            $('#trackName').empty();
            $('#trackName').text(track.nameTrack);
            $('#trackArtist').empty();
            $('#trackArtist').text(track.artistTrack);
            $('#albumImg').empty();
            $('#albumImg').append(
                $('<img/>', { 'src': track.albumImgTrack, 'id': 'imagealbum'})
            );
            if (track.previewUrl !== null) {
                $('#audioPlayer').prop('src', track.previewUrl);
                $('#audioPlayer')[0].play();
                $('#playbtn').hide();
                $('#pausebtn').on('click', play).show();
            }
            else {
                $('#audioPlayer')[0].pause();
                $('#playbtn').on('click', play).show();
                $('#pausebtn').hide();
            }

        });
    });

    /******************************* TIMER ******************************************************************************/
    $('#audioPlayer').on('timeupdate', function () {
        var player = document.querySelector('#audioPlayer');
        var duration = player.duration.toFixed(2);     // récupération de la durée totale du morceau
        var time = player.currentTime.toFixed(2);      //récupération du temps écoulé du morceau
        var fraction = time / duration;
        var percent = Math.round(fraction * 100);

        var progress = document.querySelector('#nowBar');
        progress.setAttribute('aria-valuenow', percent);
        progress.style.width = percent + '%';
        progress.textContent = time;

        if (time !== duration) {
            progress.setAttribute('class', 'progress-bar progress-bar-striped active');
        }
        else {
            progress.setAttribute('class', 'progress-bar progress-bar-striped');
        }
        document.querySelector('#duration').textContent = duration;
    });

    /******************************* CONTROL OF SOUND *******************************************************************/
    /*$('#vol').on('change', function (e) {
        console.log('toto');
        e.preventDefault();
        var player = document.querySelector('#audioPlayer');
    });*/

});
