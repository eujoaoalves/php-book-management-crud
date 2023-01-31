<?php
require_once('./app/model/BookModel.php');
require_once('./app/dao/BookDao.php');
class RegisterController
{
    private BookModel $book;
    
    public function __construct()
    {
        $this->setBook();
    }
    private function setBook()
    {
        $this->book = new BookModel();
        $this->book->setName($_POST['name']);
        $this->book->setAuthorName($_POST['author']);
        $this->book->setPrice($_POST['price']);
        $this->book->setNumberCopiesAvailable($_POST['numberCopiesAvailable']);
        $this->book->setNumberPages($_POST['numberPage']);
        $this->book->setReleaseDate((string)$_POST['releaseDate']);
        $this->book->setRegisterDate();

        $bookDao = new BookDao();
        $bookDao->registerBook($this->book);
        header('location: /index.php');
    }
}
new RegisterController();
?>