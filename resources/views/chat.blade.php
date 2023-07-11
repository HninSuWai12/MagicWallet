<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <iframe
            style="border: none;"
            height="600px"
            width="400px"
            src="https://widget.kommunicate.io/chat?appId=YOUR_APP_ID"
            allow="microphone; geolocation;"
        >
</iframe>
</body>
<script>
    export default {
        methods: {
        },
        mounted (){
          (function(d, m){
            var kommunicateSettings = {"appId":"YOUR_APP_ID","popupWidget":true,"automaticChatOpenOnNavigation":true};
            var s = document.createElement("script"); s.type = "text/javascript"; s.async = true;
            s.src = "https://widget.kommunicate.io/v2/kommunicate.app";
            var h = document.getElementsByTagName("head")[0]; h.appendChild(s);
            window.kommunicate = m; m._globals = kommunicateSettings;
          })(document, window.kommunicate || {});
        },
        data: function(){
        }
    }
    </script>
</html>