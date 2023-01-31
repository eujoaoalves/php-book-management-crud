<?php
require_once('./app/dao/BookDao.php');
class ListController
{
   
    public function __construct()
    {
        $this->displayTable();
    }

    /**
     * This function show the book data in a HTML table
     * @return void
     */
    
    public function displayTable()
    {
        $bookDao = new BookDao();
        $allBookies = $bookDao->getAllBookies();
        foreach($allBookies as $book){
            echo '<tr>';
            echo '<td>' . $book['name'] . '</td>';
            echo '<td>' . $book['book_author'] . '</td>';
            echo '<td>' . $book['number_pages'] . '</td>';
            echo '<td>' . $book['price'] . '</td>';
            echo '<td>' . $book['number_copies_available'] . '</td>';
            echo '<td>' . $book['release_date'] . '</td>';
            echo '<td>' . $book['register_date'] . '</td>';
            echo '</td>';
            echo'<td> <a href="./app/view/editForm.php?id='.$book['id'] . '"class="edit" data-toggle="modal"><i class="material-icons"  title="Edit"></i></a></td>';
            echo '<td> <a href="./app/controller/DeleteController.php?id=' . $book['id'] . '" class="delete" data-toggle="modal"><i class="material-icons"  title="Delete"></i></a>';
        echo '</tr>';
        }
    }
}
