<?php
require_once('./app/dao/BookDao.php');
class DeleteController
{
    private int $id;
    public function __construct()
    {
        $this->deleteBook();
    }

    private function deleteBook()
    {
        if ($this->validateId()) {
            $bookDao = new BookDao();
            $bookDao->deleteBook($this->id);

            header('location: /index.php');
        } else {
            echo 'error';
        }
    }

    private function validateId()
    {

        $id = htmlspecialchars_decode($_REQUEST['id']);

        if (!isset($id) || empty($id)) {
            $this->alertMessage('Need id number');
        }
        if (!is_numeric($id)) {
            $this->alertMessage('The id needs to be numeric');
        }

        $this->id = $id;
        return true;
    }
    
    public function alertMessage(string $message)
    {
        echo "<script>alert('$message');</script>";

    }

}
new DeleteController();
?>