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
    <tbody>
    <tr id="tr_notes">
        <td>
            <label id="title" ></label>

        </td>
        <td>
            <label id="text" ></label>

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
            url: '/notes/createNote',
            data: {
                note_title: note_title,
                note_text:note_text
            },
            dataType: 'text',

            success: function(data) {
                var node = document.createElement("td");
                var node1 = document.createElement("td");
                var note_title = document.createTextNode(data['note_title']);
                var note_text = document.createTextNode(data['note_text']);
                // node.appendChild(note_text);
                document.getElementById("tr_notes").appendChild(note_title);
                document.getElementById("tr_notes").appendChild(note_text);

                console.log(data);
                // $(city).empty();
                // for (var i = 0; i < data.length; i++) {
                //     $(city).append('<option id=' + data[i].sysid + ' value=' + data[i].city_name + '>' + data[i].city_name + '</option>');

                }
            });

        });

</script>
</html>