// loads top bot image for assembly
function load_top_image(elem)
{
    var image = document.getElementById("bot_top");
    image.src = "/data/" + elem.value + "0.jpeg";
}

// loads middle bot image for assembly
function load_mid_image(elem)
{
    var image = document.getElementById("bot_mid");
    image.src = "/data/" + elem.value + "1.jpeg";
}

// loads bottom bot image for assembly
function load_bot_image(elem)
{
    var image = document.getElementById("bot_bot");
    image.src = "/data/" + elem.value + "2.jpeg";
}

// loads player activities for portfolio
function select_player(elem)
{
    window.location = "/portfolio/" + elem.value;
}
