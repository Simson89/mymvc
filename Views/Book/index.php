<?php
echo "<h1>$this->msg</h1>";

$books = $this->books;
foreach ($books as $book) {
    echo "<h1>".$book['title']."</h1>";
    echo "<p>". $book['description']."</p>";
    if ($book['borrowed'] == 0) {
    echo "<a href=".URL."book/borrow/{$book['book_id']}".">Pozycz</a>";
    }
    else {
        echo 'Ksiązka wypozyczona : (';
    }
}
print_r($books);
?>
