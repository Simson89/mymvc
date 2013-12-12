<?php

class BookModel extends MainModel {

    function __construct() {
        parent::__construct();
        $this->db->query('SET NAMES utf8');
        $this->db->query('SET CHARACTER_SET utf8_unicode_ci');
    }

    public function getBook($id) {
        $sth = $this->db->prepare("Select * from books where book_id =:id");
        $sth->execute(array(
            ':id' => $id
        ));
        $sth->execute();
        $data = $sth->fetchAll();
        return $data;
    }

    public function getAuthors($book_id) {
        $sth = $this->db->prepare("Select first_name, last_name
                                    from authors
                                    left join authorships on (authors.author_id = authorships.author_id)
                                    left join books on (books.book_id = authorships.book_id)
                                    where books.book_id =:book_id");

        $sth->execute(array(
            ':book_id' => $book_id
        ));
        $sth->execute();
        $data = $sth->fetchAll();
        $count = $sth->rowCount();

        return $data;
    }

    public function showAll() {
        //$login = $_POST['login'];
        //$password = $_POST['password'];
        $sth = $this->db->prepare("SELECT * from books");
        $sth->execute();

        $data = $sth->fetchAll();
        $count = $sth->rowCount();
        if ($count > 0) {

            return $data;
        } else {
            header('location:' . URL . 'login');
        }
    }

    public function borrowBook($book_id, $current_user_id) {
        
        
        $sth = $this->db->prepare('INSERT INTO `borrowings` ( `book_id`, `user_id`, `borrow_date`, `return_date`)    VALUES(
                                :book_id,
                                :user_id,
                                :borrow_date,
                                :return_date)');     // 1
                        //$sth->bindValue(':borrowing_id', $this->db->lastInsertId()+3);
                        $sth -> bindValue(':book_id', $book_id); // 2
                        $sth -> bindValue(':user_id', $current_user_id);
                        $sth -> bindValue(':borrow_date', date('Y-m-d'));
                        $sth -> bindValue(':return_date', date("Y-m-d", strtotime("+1 month", date('Y-m-d') )));
 
                        $ilosc = $sth->execute(); // 3
 
                        if($ilosc > 0)
                        {
                                echo 'Dodano: '.$ilosc.' rekordow';
                        }
                        else
                        {
                                echo 'Wystapil blad podczas dodawania rekordow!';
                                echo "\nPDO::errorInfo():\n";
                                print_r($sth->errorInfo());
                        }
                        $sth = $this->db->prepare('update books set borrowed = 1');
                        $db = $sth->execute();
    
    }
    
    public function addBook($title, $desc) {
        
        
        $sth = $this->db->prepare('INSERT INTO `books` (`title`, `description`, `borrowed`)    VALUES(
                                :title,
                                :description,
                                :borrowed)');     // 1
                        //$sth->bindValue(':borrowing_id', $this->db->lastInsertId()+3);
                        $sth -> bindValue(':title', $title); // 2
                        $sth -> bindValue(':description', $desc);
                        $sth -> bindValue(':borrowed', 0);
                        
                        $ilosc = $sth->execute(); // 3
 
                        if($ilosc > 0)
                        {
                                echo 'Dodano: '.$ilosc.' rekordow';
                        }
                        else
                        {
                                echo 'Wystapil blad podczas dodawania rekordow!';
                                echo "\nPDO::errorInfo():\n";
                                print_r($sth->errorInfo());
                        }
        
    }
}

