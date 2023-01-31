<?php
require_once('ValidateBook.php');
class AuthorBookModel extends ValidateBook
{
    private string $name;   

	public function getName(): string
	{
		return $this->name;
	}
	
	public function setName(string $name)
	{
		if(self::validateName($name)){
			$this->name = $name;
		}

	}

}
?>