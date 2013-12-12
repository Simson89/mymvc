<?php
echo "<h1>Dodaj nową książkę</h1>";
  echo "<form action=".URL."book/addNew method='post'>";
       echo "Tytul: <input  type='text' placeholder='Tytul' name='title'>";
       echo "Opis: <input type='text' placeholder='description' name='description'>";
       echo "<button type='submit' class='btn'>Dodaj!</button>";
       echo '</form>';