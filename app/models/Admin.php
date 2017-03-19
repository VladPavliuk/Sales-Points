<?php

class Admin extends Model
{
    public $categoryTitleOnEnglish = "";
    public $categoryTitleOnUkrainian = "";
    public $categoryTitleOnRussian = "";
    public $categoryParentCategoryId = 0;

    public $newProductProductTitle = "";
    public $newProductCategoryId = "";
    public $newProductCategoryTitle = "";
    public $newProductDescriptionOnEnglish = "";
    public $newProductDescriptionOnUkrainian = "";
    public $newProductDescriptionOnRussian = "";
    public $newProductPrice = 0;
    public $newProductPriceMainImage = "";
    public $newProductPriceOtherImages = [];

    public function addNewCategoryToDataBase()
    {
        $categoryParentCategoryId = intval($this->categoryParentCategoryId);
        $categoryTitleOnEnglish = strip_tags($this->categoryTitleOnEnglish);
        $categoryTitleOnUkrainian = strip_tags($this->categoryTitleOnUkrainian);
        $categoryTitleOnRussian = strip_tags($this->categoryTitleOnRussian);

        if ($categoryTitleOnEnglish && $categoryTitleOnUkrainian && $categoryTitleOnRussian) {

            $sqlQueryString = "
            INSERT INTO `categories` 
            (
            `parent_category_id`,
            `category_english`,
            `category_ukrainian`,
            `category_russian`
            )
            VALUES
            (
            {$categoryParentCategoryId},
            '{$categoryTitleOnEnglish}',
            '{$categoryTitleOnUkrainian}',
            '{$categoryTitleOnRussian}'
            )
          ";

            $queryResult = $this->dataBase->query($sqlQueryString);

            if ($queryResult) {
                return true;
            }

        }
        return false;
    }

    public function updateCategory($categoryId)
    {
        $sqlQueryString = "UPDATE `categories` SET 
                                `category_english` = '$this->categoryTitleOnEnglish', 
                                `category_ukrainian` = '$this->categoryTitleOnUkrainian',
                                `category_russian`= '$this->categoryTitleOnRussian'
                                WHERE `id` = {$categoryId}";

        $queryResult = $this->dataBase->query($sqlQueryString);

        if ($queryResult) {
            return true;
        } else {
            return false;
        }
    }

    public function getCategoryForEditor($categoryId)
    {
        $queryResult = $this->dataBase->query("SELECT * FROM `categories` WHERE id = {$categoryId}");
        $categoryFromDataBase = $queryResult->fetch();
        $categoryForEdit = [];

        $categoryForEdit["id"] = $categoryFromDataBase["id"];
        $categoryForEdit["parent_category_id"] = $categoryFromDataBase["parent_category_id"];
        $categoryForEdit["category_english"] = $categoryFromDataBase["category_english"];
        $categoryForEdit["category_ukrainian"] = $categoryFromDataBase["category_ukrainian"];
        $categoryForEdit["category_russian"] = $categoryFromDataBase["category_russian"];
        $categoryForEdit["created_time"] = $categoryFromDataBase["created_time"];

        return $categoryForEdit;
    }

    public function addNewProduct()
    {
        $otherImages = json_encode($this->newProductPriceOtherImages);

        $newProductProductTitle = addslashes($this->newProductProductTitle);
        $newProductProductMainImage = addslashes($this->newProductPriceMainImage);
        $newProductDescriptionOnEnglish = $this->newProductDescriptionOnEnglish;
        $newProductDescriptionOnUkrainian = $this->newProductDescriptionOnUkrainian;
        $ewProductDescriptionOnRussian = $this->newProductDescriptionOnRussian;

        $sqlQuery = ("INSERT INTO `products` 
                        (
                        `category_id`, 
                        `product_title`, 
                        `description_english`, 
                        `description_ukrainian`, 
                        `description_russian`, 
                        `main_image`, 
                        `other_images`, 
                        `price` 
                        )
                        VALUES 
                        (
                        '$this->newProductCategoryId', 
                        '$newProductProductTitle', 
                        '$newProductDescriptionOnEnglish', 
                        '$newProductDescriptionOnUkrainian', 
                        '$ewProductDescriptionOnRussian', 
                        '$newProductProductMainImage', 
                        '$otherImages', 
                        $this->newProductPrice
                        )");
        //Debug::viewArray($sqlQuery, true);
        $queryResult = $this->dataBase->query($sqlQuery);

        if ($queryResult) {
            return true;
        } else {
            return false;
        }
    }

    public function createOtherImageInImagesFolder($listOfOtherImages)
    {
        $imagesDirForCategoryProducts = $this->validImageDirectory($this->newProductCategoryTitle);
        $dirWhereProductImagesAreLocated = "src/images/products/{$imagesDirForCategoryProducts}/";

        $listOfOtherImages = $this->reArrayFiles($listOfOtherImages);
        $i = 2;

        foreach ($listOfOtherImages as $otherImage) {
            $loadedFileName = $dirWhereProductImagesAreLocated . basename($otherImage["name"]);

            $tmpImage = $otherImage["tmp_name"];
            $imageSize = $otherImage["size"];

            $imageFileType = pathinfo($loadedFileName, PATHINFO_EXTENSION);

            $saveImageAsPath = $dirWhereProductImagesAreLocated . $this->newProductProductTitle . "_$i." . $imageFileType;

            $this->checkIfDirectoryExists($dirWhereProductImagesAreLocated);
            $this->saveImageInDirectory($tmpImage, $imageSize, $imageFileType, $saveImageAsPath);

            $this->newProductPriceOtherImages[] = $this->newProductProductTitle . "_$i." . $imageFileType;

            $i++;
        }

    }

    public function createMainImageInImagesFolder($imageNameFromClient)
    {
        $imagesDirForCategoryProducts = $this->validImageDirectory($this->newProductCategoryTitle);
        $dirWhereProductImagesAreLocated = "src/images/products/{$imagesDirForCategoryProducts}/";

        $loadedFileName = $dirWhereProductImagesAreLocated . basename($imageNameFromClient["name"]);

        $tmpImage = $imageNameFromClient["tmp_name"];
        $imageSize = $imageNameFromClient["size"];

        $imageFileType = pathinfo($loadedFileName, PATHINFO_EXTENSION);

        $saveImageAsPath = $dirWhereProductImagesAreLocated . $this->newProductProductTitle . '.' . $imageFileType;

        $this->checkIfDirectoryExists($dirWhereProductImagesAreLocated);
        $this->saveImageInDirectory($tmpImage, $imageSize, $imageFileType, $saveImageAsPath);

        $this->newProductPriceMainImage = $this->newProductProductTitle . '.' . $imageFileType;

        //Debug::showErrorPage($this->newProductPriceMainImage);
    }

    /**
     * Fix wrong order of array keys of list of uploaded files.
     *
     * @param $attachFile
     * @return array
     */
    private function reArrayFiles(&$attachFile)
    {
        $file_ary = array();
        $file_count = count($attachFile['name']);
        $file_keys = array_keys($attachFile);
        for ($i = 0; $i < $file_count; $i++) {
            foreach ($file_keys as $key) {
                $file_ary[$i][$key] = $attachFile[$key][$i];
            }
        }
        return $file_ary;
    }

    private function checkIfDirectoryExists($dirPath)
    {
        if (is_dir($dirPath)) {
            return true;
        }

        mkdir($dirPath, 0777, true);
    }

    private function validImageDirectory($dirWhereProductImagesAreLocated)
    {
        $dirWhereProductImagesAreLocated = trim($dirWhereProductImagesAreLocated);
        $dirWhereProductImagesAreLocated = strtolower($dirWhereProductImagesAreLocated);
        $dirWhereProductImagesAreLocated = str_replace(" ", "_", $dirWhereProductImagesAreLocated);

        return $dirWhereProductImagesAreLocated;
    }

    private function saveImageInDirectory($tmpImage, $imageSize, $imageFileType, $saveImageAsPath)
    {
        // Check if image file is a actual image or fake image
        if (!getimagesize($tmpImage)) {
            Debug::showErrorPage("Завентажений файл - не зображення");
        }

        // Check if file already exists
        if (file_exists($saveImageAsPath)) {
            unlink($saveImageAsPath);
            //Debug::showErrorPage("Зображення із такою назвою вже існує");
        }

        // Check file size
        if ($imageSize > 5000000) {
            Debug::showErrorPage("Зображення завеликого розміру");
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            Debug::showErrorPage("Недозволений формат зображення. Дозволені формати: jpg, jpeg, png, gif");
        }

        if (!move_uploaded_file($tmpImage, $saveImageAsPath)) {
            Debug::showErrorPage("Сталася помилка, зображення не було завантажено.");
        }
    }
}