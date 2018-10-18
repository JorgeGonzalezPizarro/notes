<?php
error_reporting(E_ALL);

require '../bootstrap.php';


//?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Simple Database App</title>

</head>

<body>
<h1>Simple Database App</h1>

<ul>
    <li><a  id="boton" href=""><strong>Create</strong></a> - add a user</li>

</ul>

</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
<script>

    $("#boton").click(function() {
        $.ajax({
            type: 'POST',
            url: '/notes/createNote',
            data: {
                Country: "Japan"
            },
            dataType: 'text',

            success: function(data) {
                console.log(data);
                // $(city).empty();
                // for (var i = 0; i < data.length; i++) {
                //     $(city).append('<option id=' + data[i].sysid + ' value=' + data[i].city_name + '>' + data[i].city_name + '</option>');

                }
            });

        });

</script>
</html>