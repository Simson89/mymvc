<?php


//print_r($this->book);
$book_info = $this->book;
$authors_info = $this->authors;

foreach ($book_info as $book) {
    echo "<h1>".$book['title']."</h1>";
    echo "Autorzy: ";
    foreach ($authors_info as $author) {
        echo "<h4>".$author['first_name']." ". $author['last_name']."</h4>";
    }
    echo "Opis: ";
    echo "<p>".$book['description']."</p>";
}
//print_r($book_info);
//print_r($authors_info);