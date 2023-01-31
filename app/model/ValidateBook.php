<?php
class ValidateBook
{
    const MIN_NAME_LENGTH = 2;
    const MAX_NAME_LENGTH = 100;
    const MIN_NUMBER_PAGE = 1;
    const MIN_PRICE = 0.1;
    const MIN_COPIES_AVAILABLE = 0;
    const DATE_FORMAT = 'Y-m-d';

    /**
     * function to validate a name
     * @param string $bookName
     * @return string|void or redirect to register form if name is incorrect
     */

    public function validateName(string $bookName)
    {
        try {
            $bookName = trim(htmlspecialchars_decode($bookName));
            $this->isNonEmptyString($bookName);
            $this->checkNameLength($bookName);
            return $bookName;
        } catch (Exception $error) {
            $this->alertMessageError($error->getMessage());
        }
    }

    /**
     * Check if name is empty
     * @param string $stringPassed
     * @throws Exception if name is empty
     * @return void
     */
    
    private function isNonEmptyString(string $stringPassed): void
    {
        if (empty($stringPassed)) {
            throw new Exception('Inputs cannot be empty');
        }
    }

    /**
     *This function check if the given name within the range MIN_NAME_LENGTH AND MAX_NAME_LENGTH
     * @param string $bookName
     * @throws Exception if the name's length is not within in the range
     * @return void
     */
    
    private function checkNameLength(string $bookName)
    {
        $bookNameLength = strlen($bookName);
        if (
            !(
                $bookNameLength > self::MIN_NAME_LENGTH &&
                $bookNameLength < self::MAX_NAME_LENGTH
            )
        ) {
            throw new Exception(
                'Name must be more than ' .
                    self::MIN_NAME_LENGTH .
                ' and less than ' .
                    self::MAX_NAME_LENGTH
            );
        }
    }

    /**
     * Check if the parameter is numeric and positive number 
     * @param float|int $price
     * @return float|int
     */

    public function validatePrice(string $price): float|int
    {
        try {
            $this->isNumeric($price);
            $this->isPositiveNumber($price);
            return floatval($price);
        } catch (Exception $error) {
            $this->alertMessageError($error->getMessage());
        }
    }

    /**
     * check is parameter is numeric
     * @param mixed $number
     * @throws Exception if the passed parameter  is not a number
     * @return void
     */

    private function isNumeric(mixed $number): void
    {
        if (!is_numeric($number)) {
            throw new Exception('Number needs to a numeric digit');
        }
    }

    /**
     * Check if the number passes is a positive number
     * @param float|int $number
     * @throws Exception if number passed is negative
     * @return void
     */

    private function isPositiveNumber(float|int $number): void
    {
        if ($number < 0) {
            throw new Exception('Number cannot be negative');
        }
    }

    /**
     * Validate the number of pages 
     * @param float|int $numberPages
     * @return int
     */

    public function validateNumberPages(float|int $numberPages): int
    {
        try {
            $this->isNumeric($numberPages);
            $this->isNonFloatNumber($numberPages);
            $this->isNumberPagesMoreThanMin($numberPages);
            return $numberPages;
        } catch (Exception $error) {
            $this->alertMessageError($error->getMessage());
        }
    }

    /**
     * The function check if the number passes is a float point number
     * @throws Exception if number of pages or copies available aren't float point   
     * @return void
     */

    private function isNonFloatNumber(float|int $number): void
    {
        if (is_float($number)) {
            throw new Exception('Number of pages or copies available cannot be float points');
        }
    }

    /**
     * validate number of copies available
     * @param float|int $numberCopiesAvailable
     * @return int 
     */

    public function validateNumberCopiesAvailable(float|int $numberCopiesAvailable): int
    {
        try {
            $this->isNumeric($numberCopiesAvailable);
            $this->isNonFloatNumber($numberCopiesAvailable);
            $this->isPositiveNumber($numberCopiesAvailable);
            return $numberCopiesAvailable;
        } catch (Exception $error) {
            $this->alertMessageError($error->getMessage());
        }
    }

    /**
     * This function check if the $numberPages is more than minimum number of page 
     * @param mixed $numberPages
     * @throws Exception if the $numberPages is less than of MIN_NUMBER_PAGE
     * @return void
     */
    private function isNumberPagesMoreThanMin($numberPages): void
    {
        if ($numberPages < self::MIN_NUMBER_PAGE) {
            throw new Exception('number of pages cannot be less than ' . self::MIN_NUMBER_PAGE);
        }
    }

    /**
     * This function validate if the release date is in the DATE_FORMAT and isn't a empty string
     * @param string $date
     * @return void
     */

    public function validateReleaseDate(string $releaseDate):string
    {
        try {
            $this->isNonEmptyString($releaseDate);
            $this->checkDateFormat($releaseDate);
            return $releaseDate;
        } catch (Exception $error) {
            $this->alertMessageError($error->getMessage());
        }
    }

    /**
     * This function validate if the register date is in the DATE_FORMAT and isn't a empty string
     * @param string $registerDate
     * @return string
     */

    public function validateRegisterDate(string $registerDate): string
    {
        try {
            $this->isNonEmptyString($registerDate);
            $this->checkDateFormat($registerDate);
            return $registerDate;
        } catch (Exception $error) {
            $this->alertMessageError($error->getMessage());
        }
    }

    /**
     * This function checks if the date is in the DATE_FORMAT and isn't a empty string
     * @param string $date
     * @throws Exception if the date is not in DATE_FORMAT 
     * @return void
     */

    private function checkDateFormat(string $date): void
    {
        $dateTemporary = DateTime::createFromFormat($date, self::DATE_FORMAT);
        $isNonValidDate = $dateTemporary && $dateTemporary->format($date) === $date;
        if ($isNonValidDate) {
            throw new Exception('Invalid date');
        }
    }

    /**
     *Create an alert pop up with the error message and after call redirect page method
     * @param string $message
     * @return void
     */

    private function alertMessageError(string $message): void
    {
        echo "<script>alert('" . $message . "'); </script>";
        $this->redirectPage();
    }

    /**
     * This function validate the id 
     * @param string $id his passed as string but needs to be int
     * @return int return book id
     */

    public function validateId(string $id):int
    {
        $id = (int) $id;
        try{
            $this->isNumeric($id);
            $this->isPositiveNumber($id);
            return $id;
        }catch(PDOException $error){
            $this->alertMessageError($error->getMessage());
        }
    }

    /**
     * redirect page to register form page
     * @return void
     */

    private function redirectPage(): void
    {
        echo "<script>
        window.setTimeout(function(){
            window.location.href ='../view/register.html';
        }, 10);
        </script>";
    }
}

?>