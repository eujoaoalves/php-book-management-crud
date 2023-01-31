<?php

require_once 'AuthorBookModel.php';
require_once 'ValidateBook.php';

class BookModel extends ValidateBook
{
    private float $price;
    private mixed $id = null;
    private int $numberPages;
    private int $numberCopiesAvailable;
    private AuthorBookModel $author;
    private string $name;
    private string $releaseDate;
    private string $registerDate;

    public function __construct()
    {
        $this->author = new AuthorBookModel();
    }

    public function getBookAuthorName(): string
    {
        return $this->author->getName();
    }

    public function setAuthorName(string $authorName): void
    {
        $this->author->setName($authorName);
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice($price): void
    {
        $price = $this->validatePrice($price);
        if ($price) {
            $this->price = $price;
        }
    }

    public function getNumberPages(): int
    {
        return $this->numberPages;
    }

    public function setNumberPages($numberPages): void
    {
        if ($this->validateNumberPages($numberPages)) {
            $this->numberPages = $numberPages;
        }
    }

    public function getNumberCopiesAvailable(): int
    {
        return $this->numberCopiesAvailable;
    }

    public function setNumberCopiesAvailable(int $numberCopiesAvailable): void
    {
        if ($this->validateNumberCopiesAvailable($numberCopiesAvailable)) {
            $this->numberCopiesAvailable = $numberCopiesAvailable;
        }
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        if ($this->validateName($name)) {
            $this->name = $name;
        }
    }

    public function getReleaseDate(): string
    {
        return $this->releaseDate;
    }

    public function setReleaseDate(string $releaseDate)
    {

        if ($this->validateReleaseDate($releaseDate)) {
            $this->releaseDate = $releaseDate;
        }
    }

    public function getRegisterDate(): string
    {
        return $this->registerDate;
    }

    public function setRegisterDate()
    {
        date_default_timezone_set('America/Sao_Paulo');
        $date = date('Y-m-d H:i');

        if ($this->validateRegisterDate($date)) {
            $this->registerDate = $date;
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $this->validateId($id);
    }
}