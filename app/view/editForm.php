<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/index.css">
    <title>Document</title>
</head>
<body>
<?php
require_once('./app/dao/BookDao.php');
$bookDao = new BookDao();
$book = $bookDao->getBookById();
?>

<form action="../controller/EditController.php?id=<?php echo $book['id']?>" method="POST">
        <div class="inputContainer"></div>
        <label for="name">Name</label>
        <input type="text"name="name" placeholder="Name of the book" value=<?php echo $book['name'];?>>

        <label for="author">Author</label>
        <input type="text"name="author" placeholder="author book name" value=<?php echo $book['book_author'] ?> >

        <label for="price">Price</label>
        <input type="text"name="price" placeholder="price" value = <?php echo $book['price'] ?>>

        <label for="numberCopiesAvailable">Stock</label>
        <input type="number"name="numberCopiesAvailable" placeholder="total Stock" value=<?php echo $book['number_copies_available'] ?>>
        
        <label for="numberPage">Number of pages</label>
        <input type="number"name="numberPage" step="1" placeholder="number of pages" value = <?php echo $book['number_pages'] ?>>

        <label for="releaseDate">Release Date</label>
        <input type="date" name="releaseDate"   value= <?php echo $book['release_date'] ?>>
        <button type="submit">Save</button>
        <a href="../../index.php" class="previous">&#8249; Back to index</a>
        
    </form>
</body>
</html>

