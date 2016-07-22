<!DOCTYPE html>
<html>
  <head>
    <meta charset=utf-8 />
    <title></title>
    <!--<link rel="stylesheet" type="text/css" media="screen" href="main.css" />-->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

    <script type="text/javascript">
		var playlistId = 'PLx1tUfSuJjy0g3j_KK3APmn3W7SP68TJc';
      function makeRequest(q) {
        var request = gapi.client.youtube.playlistItems.list({
          playlistId: playlistId,
          part: 'snippet',
          maxResults: 3
        });

        request.execute(function(response) {
          $('#results').empty();
          var resultItems = response.result.items;
          $.each(resultItems, function(index, item) {
            vidTitle = item.snippet.title;
            vidThumburl =  item.snippet.thumbnails.default.url;
            vidThumbimg = '<pre><img id="thumb" src="'+vidThumburl+'" alt="No  Image Available." style="width:204px;height:128px"></pre>';
            $('#results').append('<pre>' + vidTitle + vidThumbimg +  '</pre>');
          });
        });
      }

      function init() {
        gapi.client.setApiKey('AIzaSyCWzGO9Vo1eYOW4R4ooPdoFLmNk6zkc0Jw');
        gapi.client.load('youtube', 'v3', function() {
          data = jQuery.parseJSON( '{ "data": [{"name":"orsons"}] }' );
          $.each(data["data"], function(index, value) {
            makeRequest(value["name"]);
          });
        });
      }

    </script>

    <script type="text/javascript" src="https://apis.google.com/js/client.js?onload=init"></script>

  </head>

  <body>

    <h1>YouTube API 3.0 Test</h1>
    <ul id="results"></ul>

  </body>

</html>