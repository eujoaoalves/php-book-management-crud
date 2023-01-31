<?php
require_once('./app/model/DataBaseConnection.php');
require_once('./app/model/BookModel.php');
class BookDao
{
    private $pdo;
    /**
     * Class constructor.
     */

    public function __construct()
    {
        $this->pdo = DataBaseConnection::getInstance();
    }

    /**
     * Get all bookies from database;
     *  @return array of bookies 
     */

    public function getAllBookies(): array
    {
        try {
            $sql = 'SELECT * FROM book';
            $statement = $this->pdo->prepare($sql);
            $statement->execute();
            $allBooks = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $allBooks;
        } catch (PDOException $error) {

        }
    }

    /**
     * Delete book by id 
     * @return bool return true if delete or false if fail
     */
    public function deleteBook(string $id): bool
    {
        try {
            $this->pdo->beginTransaction();
            $sql = 'DELETE FROM book where id = ?';
            $statement = $this->pdo->prepare($sql);
            $statement->execute([$id]);
            $this->pdo->commit();
            return true;
        } catch (PDOException $error) {
            $this->pdo->rollBack();
            return false;
        }

    }
    public function registerBook(BookModel $book)
    {
        try {
            $this->pdo->beginTransaction();
            $sql = 'INSERT INTO book(name,book_author, number_copies_available, number_pages, price, register_date, release_date)
            values(?,?,?,?,?,?,?)';
            $statement = $this->pdo->prepare($sql);
            $statement->execute([
                $book->getName(),
                $book->getBookAuthorName(),
                $book->getNumberCopiesAvailable(),
                $book->getNumberPages(),
                $book->getPrice(),
                $book->getRegisterDate(),
                $book->getReleaseDate()
            ]);
            $this->pdo->commit();
            return true;
        } catch (PDOException $error) {
            $this->pdo->rollBack();
            return false;
        }
    }

    public function getBookById()
    {
        $id = (int) $_REQUEST['id'];
        ;
        try {
            $this->pdo->beginTransaction();
            $sql = 'SELECT * FROM book where id = ?';
            $statement = $this->pdo->prepare($sql);
            $statement->execute([$id]);
            $this->pdo->commit();
            return $statement->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $error) {
            return false;
        }
    }

    public function updateBookById(BookModel $book)
    {
        try {
            $this->pdo->beginTransaction();
            $sql = 'UPDATE book SET name = ?, book_author = ?, number_copies_available = ?, number_pages = ?,price = ?, register_date = ?, release_date = ? where id = ?';
            $statement = $this->pdo->prepare($sql);
            $statement->execute([
                $book->getName(),
                $book->getBookAuthorName(),
                $book->getNumberCopiesAvailable(),
                $book->getNumberPages(),
                $book->getPrice(),
                $book->getRegisterDate(),
                $book->getReleaseDate(),
                $book->getId()
            ]);
            $this->pdo->commit();
            return true;
        } catch (PDOException $error) {
            $this->pdo->rollBack();
            return false;
        }
    }

}
?>