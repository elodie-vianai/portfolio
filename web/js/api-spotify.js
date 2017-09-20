/******************************* GET AND DISPLAY THE LIST OF TRACKS IN A PLAYLIST ***************************************/
$(document).ready(function () {
    $('#pausebtn').hide();

    // Get HTML element "playlist.link" when we click
    $('.playlist-link').on('click', function(e) {
        // Remove the action to go on a new page
        e.preventDefault();

        // Get the id of the playlist
        var idPlaylist = $(this).data('id');
        // Get the url of the current page
        var session = document.location.href;

        // Send everything back to the road
       $.get(session + 'playlist/' + idPlaylist, function (data) {
           $('#titrePlaylist').html(data.namePlaylist);

           // Get the HTML element "titrePlaylist" by its id to set an attribute
           document.getElementById('titrePlaylist').setAttribute('data-idplaylist', idPlaylist);

           // ListTracks is empty from all its content (name of playlists)
           $('#listTracks').empty();

           // title, artist and album of the track is appending to ListTracks
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
        // Remove the action to go on a new page
        e.preventDefault();

        // Get the id of the selected track
        var trackId = $(this).data('id');
        // Get the id of the playlist
        var idPlaylist = $(this).data('playlist-id');
        // Get the url of the current page
        var session = document.location.href;

        // Send everything back to the road
        $.get(session + 'playlist/' + idPlaylist + '/' + trackId, function (data) {
            // Get data of the track
            var track = data.track;

            // Get the HTML element "titrePlaylist" by its id to set an attribute
            document.getElementById('track').setAttribute('data-idTrack', trackId);

            // Get and display data of a track (name, artist, image album)
            $('#trackName').empty();
            $('#trackName').text(track.nameTrack);
            $('#trackArtist').empty();
            $('#trackArtist').text(track.artistTrack);
            $('#albumImg').empty();
            $('#albumImg').append(
                $('<img/>', { 'src': track.albumImgTrack, 'id': 'imagealbum'})
            );

            if (track.previewUrl !== null) {
                // If the player is not playing the music is played then the button pause is shown and the button play hidden
                $('#audioPlayer').prop('src', track.previewUrl);
                $('#audioPlayer')[0].play();
                $('#playbtn').hide();
                $('#pausebtn').on('click', play).show();
            }
            else {
                // if the player is playing the music is stopped then the button play is shown and the button pause hidden
                $('#audioPlayer')[0].pause();
                $('#playbtn').on('click', play).show();
                $('#pausebtn').hide();
            }

        });
    };

    /******************************* DISPLAY OR HIDE PLAY/PAUSE BUTTON **************************************************/
    var play = function (e) {
        // Remove the action to go on a new page
        e.preventDefault();

        // Get the HTML element "audioPlayer" by its id
        var player = document.querySelector('#audioPlayer');

        if (player.paused) {
            // If the player is not playing the music is played then the button pause is shown and the button play hidden
            player.play();
            $('#playbtn').hide();
            $('#pausebtn').on('click', play).show();
        }
        else {
            // if the player is playing the music is stopped then the button play is shown and the button pause hidden
            player.pause();
            $('#playbtn').on('click', play).show();
            $('#pausebtn').hide();
        }
    };

    /******************************* BUTTON NEXT ************************************************************************/
    $('.nextlink').on('click', function (e) {
        // Remove the action to go on a new page
        e.preventDefault();

        // Get HTML elements by their id
        var idPlaylist = document.getElementById('titrePlaylist').getAttribute('data-idplaylist');
        var currentTrack = document.getElementById('track').getAttribute('data-idTrack');
        // Get HTML elements by their class name
        var listTracks = document.getElementsByClassName('track-link');
        // Get the url of the current page
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

        // Send everything back to the road
        $.get(session + 'playlist/' + idPlaylist + '/' + nextTrack, function (data) {
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
                // If the player is not playing the music is played then the button pause is shown and the button play hidden
                $('#audioPlayer').prop('src', track.previewUrl);
                $('#audioPlayer')[0].play();
                $('#playbtn').hide();
                $('#pausebtn').on('click', play).show();
            }
            else {
                // if the player is playing the music is stopped then the button play is shown and the button pause hidden
                $('#audioPlayer')[0].pause();
                $('#playbtn').on('click', play).show();
                $('#pausebtn').hide();
            }

        });
    });

    /******************************* BUTTON PREVIOUS ********************************************************************/
    $('.prevlink').on('click', function (e) {
        // Remove the action to go on a new page
        e.preventDefault();

        // Get HTML elements by their id
        var idPlaylist = document.getElementById('titrePlaylist').getAttribute('data-idplaylist');
        var currentTrack = document.getElementById('track').getAttribute('data-idTrack');
        // Get HTML elements by their class name
        var listTracks = document.getElementsByClassName('track-link');
        // Get the url of the current page
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

        // Send everything back to the road
        $.get(session + 'playlist/' + idPlaylist + '/' + prevTrack, function (data) {
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
                // If there is a preview url, the preview of the track is played (then the button play is hidden and the button pause shown)
                $('#audioPlayer').prop('src', track.previewUrl);
                $('#audioPlayer')[0].play();
                $('#playbtn').hide();
                $('#pausebtn').on('click', play).show();
            }
            else {
                // If there is not a preview url, nothing is played so the button play is shown and the button pause is hidden
                $('#audioPlayer')[0].pause();
                $('#playbtn').on('click', play).show();
                $('#pausebtn').hide();
            }

        });
    });

    /******************************* TIMER ******************************************************************************/
    $('#audioPlayer').on('timeupdate', function () {
        // Get the HTML element "audioPlayer" by its id
        var player = document.querySelector('#audioPlayer');

        // Get the total song duration
        var duration = player.duration.toFixed(2);
        // Get the elapsed time of the song
        var time = player.currentTime.toFixed(2);
        // Calculation
        var fraction = time / duration;
        var percent = Math.round(fraction * 100);

        // Get the HTML element "nowBar" and add some CSS attributes
        var progress = document.querySelector('#nowBar');
        progress.setAttribute('aria-valuenow', percent);
        progress.style.width = percent + '%';
        progress.textContent = time;

        if (time !== duration) {
            // If the progress bar is moving, the striped animation is active
            progress.setAttribute('class', 'progress-bar progress-bar-striped active');
        }
        else {
            // If the progress bar is not moving, the striped animation is stopped
            progress.setAttribute('class', 'progress-bar progress-bar-striped');
        }

        // Time duration in the progress bar is changed
        document.querySelector('#duration').textContent = duration;
    });

});
