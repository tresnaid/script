<html>
<head>
    <title>Space Clicker</title>
</head>

<body>
    <script type="text/javascript">
    var clicks = 0;
    function onClick() {
        clicks += 1;
        document.getElementById("clicks").innerHTML = clicks;
    };
    </script>
    <button type="button" onClick="onClick()">Click me</button>
    <p>Clicks: <a id="clicks">0</a></p>

</body></html>