

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


</head>

<body>
<table>
    <tbody>
    <tr>
        <td>
            <input type="text" id="note_title" >

        </td>
        <td>
            <input type="text" id="note_text" >

        </td>
        <td>
            <button  type="button" id="boton">Agregar Nota</button>

        </td>
    </tr>
    </tbody>
</table>

<table>
    <tbody id="tbody">
    <tr id="tr_notes">
        <td>
            <label id="title" >Título</label>

        </td>
        <td>
            Texto</label>

        </td>

    </tr>
    </tbody>
</table>


<ul>
<!--    <li><a  id="boton" href=""><strong>Create</strong></a> - add a user</li>-->

</ul>

</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
<script>

    $("#boton").click(function() {
        var note_title=document.getElementById("note_title").value;
        var note_text=document.getElementById("note_text").value;
        $.ajax({
            type: 'POST',
            url: 'bootstrap.php',
            data: {
                note_title: note_title,
                note_text:note_text
            },
            encode: true,
            dataType: 'json',
            success: function(response) {
                var node = document.createElement("td");
                var note_title = document.createTextNode(response['note_title'] );
                var note_text = document.createTextNode(response['note_text']);
                var br = document.createElement("br");
                var node = document.createElement("td");
                document.getElementById("tbody").appendChild(note_title);
                document.getElementById("tbody").appendChild(node);
                document.getElementById("tbody").appendChild(br);
                document.getElementById("tbody").appendChild(note_text);
                document.getElementById("tbody").appendChild(node);


                }
            });

        });

</script>
<script>

    $(document).ready(function() {
        $.ajax({
            type: 'GET',
            url: 'bootstrap.php',
            encode: true,
            dataType: 'json',
            success: function(response) {
                response.forEach(function (element) {
                var node1 = document.createElement("td");
                var note_title = document.createTextNode(element[0]);
                var note_text = document.createTextNode(element[1]);
                var br = document.createElement("br");
                var tr = document.createElement("tr");
                var node = document.createElement("td");
                    document.getElementById("tbody").appendChild(note_title);
                    document.getElementById("tbody").appendChild(node);
                    document.getElementById("tbody").appendChild(br);
                    document.getElementById("tbody").appendChild(note_text);
                    document.getElementById("tbody").appendChild(node);


                });
            }
        });

    });

</script>

<?php
error_reporting(E_ALL);

//require '../bootstrap.php';


//?>
</html>