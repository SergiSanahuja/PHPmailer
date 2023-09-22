<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../vista/style2.css">
</head>


<body class="body">
    <div class="formulari">

        <form action="../controlador/index.php" method="POST">
            <table class="taula">
                <tr>
                    <td>
                        <label for="text">Nom</label>

                    </td>
                    <td>
                        <input type="text" name="nom" value="<?php if (isset($_POST['nom'])) { echo htmlentities($_POST['nom']); } ?>">  <!-- Amb la lina de php si poses un camp malament quedara en pantalla fins que estigui bé  -->

                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="email">Email</label>

                    </td>
                    <td>
                        <input type="email" name="email" id="email" value="<?php if (isset($_POST['email'])) { echo htmlentities($_POST['email']); } ?>" >

                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="textarea">
                            Text
                        </label>

                    </td>
                    <td>
                        <textarea name="AreaText" id="ta" cols="30" rows="10"  value="<?php if (isset($_POST['AreaText'])) { echo htmlentities($_POST['AreaText']); } ?>" >></textarea>

                    </td>
                </tr>
                <tr>
                    <td colspan="2">                       
                        <button class="button button1"  name="submite">hola</button>

                    </td>

                </tr>

            </table>
        </form>

        <?php             
       
        if(!validarTexto($name)){
            echo "<p class='error'>El nom no es correcte</p>";

        }
        if(!validarEmaul($email)){
            echo "<p class='error'>El email no es correcte</p>";
        }
        if(!validarTexto($text)){
            echo "<p class='error'>El text no es correcte</p>";
        }

        if(validarTexto($name) && validarEmaul($email) && validarTexto($text)){
            echo "<p class='correcte'>El formulari es correcte</p>";
            $mensaje = "El nom es: ".$name."\n"."El email es: ".$email."\n"."El text es: ".$text;

            $mensaje = wordwrap($mensaje, 70, "\r\n");

            //Redireccionar a la pagina de enviar email
            header("Location: ../Vista/send_email.php/nom=?". $name);
            
            //enviar email
            sendEmail($name,$email,$mensaje);
           
            
        }
        
        ?>
    </div>



</body>

</html>