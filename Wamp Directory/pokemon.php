<!DOCTYPE html>
    
<html>
<head>
    <title>Pokedex</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        .container {
            left: 0px;
            top: 0px;
            width: 50%;
            height: 100%;
            overflow: scroll;
            position: fixed;
        }
        .info {
            padding: 20px;
            position: fixed;
            right: 5%;
            top: 10%;
            width: 40%;
            height: 80%;
            border: solid thick red;
        }
        .image:hover {
            cursor: pointer;
        }
    </style>
</head>

<body>
<div class="container">
    <?php
    for ($i = 1; $i <= 151; $i++){
        echo "<img class='image' src='http://pokeapi.co/media/img/$i.png' id='$i'>";
    } ?>
</div>
<div class="info"></div>
<script>
    $('img').click(function(){
        var id = $(this).attr('id');
        var url = "http://pokeapi.co/api/v1/pokemon/"+id;
        console.log (url);
        $.get(url, function(output){
            var html_str = "<h2>"+output.name+"</h2>";
            html_str += "<img src='http://pokeapi.co/media/img/"+id+".png'>";
            html_str += "<h4>Types</h4><ul>";
            for (var i=0; i<output.types.length; i++){
                html_str += "<li>"+output.types[i].name+"</li>";
            }
            html_str += "<h4>Height</h4><p>"+output.height+"</p>";
            html_str += "<h4>Weight</h4><p>"+output.weight+"</p>";
            $('.info').html(html_str);
        });
    });
    
</script>
</body>
</html>