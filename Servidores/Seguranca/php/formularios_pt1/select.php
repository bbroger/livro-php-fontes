<?php
echo "Seu processador �: " . $_POST["processador"] . "<BR>";

// Verifica se usu�rio escolheu algum livro
if(isset($_POST["livros"]))
{
    echo "O(s) livro(s) que voc� deseja comprar:<br>";
    // Faz loop para os livros
    foreach($_POST["livros"] as $livro)
    {
        echo "- " . $livro . "<br>";
    }
}
else
{
    echo "Voc� n�o escolheu nenhum livro!";
}
?>