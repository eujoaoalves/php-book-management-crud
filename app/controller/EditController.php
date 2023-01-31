<?php
require_once('./app/dao/BookDao.php');
require_once('./app/model/BookModel.php');
class EditController
{
    private BookModel $book;
    public function __construct()
    {
        $this->createBookModel();
        $this->editBook();
    }

    /**
     * This function call updateBookById function in BookModel and passed as a parameter a book model class
     * @return void
     */
    
    private function editBook()
    {
        $bookDao = new BookDao();
        if ($bookDao->updateBookById($this->book)) {
            echo "<script>
            alert('the book has been edited successfully');
            window.setTimeout(function(){
                window.location.href ='../../index.php';
            }, 10);
            </script>";
        }
    }
   
    private function createBookModel(): void
    {
        $id = $_REQUEST['id'];
        $this->book = new BookModel();
        $this->book->setId($id);
        $this->book->setName($_POST['name']);
        $this->book->setAuthorName($_POST['author']);
        $this->book->setPrice($_POST['price']);
        $this->book->setNumberCopiesAvailable($_POST['numberCopiesAvailable']);
        $this->book->setNumberPages($_POST['numberPage']);
        $this->book->setReleaseDate((string) $_POST['releaseDate']);
        $this->book->setRegisterDate();
    }
}
new EditController();
?>