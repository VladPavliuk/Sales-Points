<?php

class AdminController extends Controller
{
    public function viewAdminPageAction()
    {
        $this->smarty->display("admin/adminPage.tpl");
    }

    public function viewCategoryEditorAddPageAction()
    {
        $this->smarty->display("admin/categoryEditorAddPage.tpl");
    }

    public function viewCategoryEditorSelectPageAction()
    {
        $this->smarty->display("admin/categoryEditorSelectPage.tpl");
    }

    public function viewCategoryEditorPageAction($categoryId)
    {
        $adminModelObject = new Admin();

        $categoryForEdit = $adminModelObject->getCategoryForEditor($categoryId);

        $this->smarty->assign("categoryForEdit", $categoryForEdit);

        $this->smarty->display("admin/categoryEditorPage.tpl");
    }

    public function addCategoryAction()
    {
        $adminModelObject = new Admin();

        $adminModelObject->categoryTitleOnEnglish = $_POST["category_english_title"];
        $adminModelObject->categoryTitleOnUkrainian = $_POST["category_ukrainian_title"];
        $adminModelObject->categoryTitleOnRussian = $_POST["category_russian_title"];
        $adminModelObject->categoryParentCategoryId = $_POST["parent_category_id"];

        $changeResult = $adminModelObject->addNewCategoryToDataBase();

        if ($changeResult) {
            header('Location: http://vladdev.com/admin/');
        } else {
            Debug::showErrorPage("Не вдалося додати категорію.");
        }
    }

    public function updateCategoryAction($categoryId)
    {
        $adminModelObject = new Admin();

        $adminModelObject->categoryTitleOnEnglish = $_POST["category_english_title"];
        $adminModelObject->categoryTitleOnUkrainian = $_POST["category_ukrainian_title"];
        $adminModelObject->categoryTitleOnRussian = $_POST["category_russian_title"];

        $changeResult = $adminModelObject->updateCategory($categoryId);

        if ($changeResult) {
            header('Location: http://vladdev.com/admin/');
        } else {
            Debug::showErrorPage("Не вдалося змінити категорію.");
        }
    }

    public function viewProductAddPageAction()
    {
        $categoryModelObject = new Category();
        $listOfAllCategories = $categoryModelObject->getListOfAllCategories();

        $this->smarty->assign('listOfAllCategories', $listOfAllCategories);

        $this->smarty->display("admin/productEditorAddPage.tpl");
    }

    public function addProductAction()
    {
        $adminModelObject = new Admin();
        $categoryModelObject = new Category();
        $newProductCategory = $categoryModelObject->getSingleCategoryTitleById($_POST["category_id"]);
        $newProductProductTitle = str_replace("'", " ", $_POST["product_title"]);
        $newProductProductTitle = str_replace("\"", " ", $newProductProductTitle);
        $newProductProductTitle = trim($newProductProductTitle);

        $adminModelObject->newProductProductTitle = $newProductProductTitle;
        $adminModelObject->newProductCategoryId = $_POST["category_id"];
        $adminModelObject->newProductCategoryTitle = $newProductCategory;
        $adminModelObject->newProductDescriptionOnEnglish = addslashes($_POST["description_english"]);
        $adminModelObject->newProductDescriptionOnUkrainian = addslashes($_POST["description_ukrainian"]);
        $adminModelObject->newProductDescriptionOnRussian = addslashes($_POST["description_russian"]);
        $adminModelObject->newProductPrice = $_POST["price"];

        $adminModelObject->createMainImageInImagesFolder($_FILES["main_image"]);
        $adminModelObject->createOtherImageInImagesFolder($_FILES["other_images"]);

        $changeResult = $adminModelObject->addNewProduct();

        if ($changeResult) {
            header('Location: http://vladdev.com/admin/');
        } else {
            Debug::showErrorPage("Не вдалося додати товар.");
        }
    }

}