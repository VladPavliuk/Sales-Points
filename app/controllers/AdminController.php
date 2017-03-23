<?php

class AdminController extends Controller
{
    public function loginAction()
    {
        $adminModelObject = new Admin();

        $login = isset($_REQUEST["login"]) ? $_REQUEST["login"] : 'null';
        $login = trim($login);

        $password = isset($_REQUEST["password"]) ? $_REQUEST["password"] : 'null';
        $password = trim($password);

        $loginData = $adminModelObject->loginUser($login, $password);
    }

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

    public function viewCategoryEditorEditPageAction()
    {
        $categoryId = $_POST["category_id"];
        $adminModelObject = new Admin();

        $categoryForEdit = $adminModelObject->getCategoryForEditor($categoryId);

        $this->smarty->assign("categoryForEdit", $categoryForEdit);

        $this->smarty->display("admin/categoryEditorEditPage.tpl");
    }

    public function addCategoryAction()
    {
        $adminModelObject = new Admin();

        $adminModelObject->categoryTitleOnEnglish = trim($_POST["category_english_title"]);
        $adminModelObject->categoryTitleOnUkrainian = trim($_POST["category_ukrainian_title"]);
        $adminModelObject->categoryTitleOnRussian = trim($_POST["category_russian_title"]);
        $adminModelObject->categoryParentCategoryId = intval($_POST["parent_category_id"]);

        $changeResult = $adminModelObject->addNewCategory();

        if ($changeResult) {
            header('Location: http://vladdev.com/admin/');
        } else {
            Debug::showErrorPage("Не вдалося додати категорію.");
        }
    }

    public function editCategoryAction()
    {
        $categoryId = $_POST["category_for_edit_id"];

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

    public function deleteCategoryAction($categoryId)
    {
        $adminModelObject = new Admin();
        $deletingResult = $adminModelObject->deleteCategory($categoryId);

        if ($deletingResult) {
            header('Location: http://vladdev.com/admin/');
        } else {
            Debug::showErrorPage("Не вдалося видалити категорію.");
        }
    }

    public function viewProductAddPageAction()
    {
        $categoryModelObject = new Category();
        $listOfAllCategories = $categoryModelObject->getListOfAllCategories();

        $this->smarty->assign('listOfAllCategories', $listOfAllCategories);

        $this->smarty->display("admin/productEditorAddPage.tpl");
    }

    public function viewProductEditorSelectPageAction()
    {
        $this->smarty->display("admin/productEditorSelectPage.tpl");
    }

    public function getProductsFromCategoryAction($categoryId)
    {
        $productModelObject = new Product();
        $categoryModelObject = new Category();

        $listOfSubCategoriesList = $categoryModelObject->getSubCategoriesIdOfParentCategory($categoryId);
        $listOfSubCategoriesList[] = $categoryId;

        $listOfCategoriesProducts = $productModelObject->getCategoryAndSubCategoriesProducts($listOfSubCategoriesList);

        echo json_encode($listOfCategoriesProducts);
    }

    public function viewProductEditorEditPageAction($productId)
    {
        $adminModelObject = new Admin();
        $productForEditing = $adminModelObject->getProductForEditing($productId);

        $this->smarty->assign('productForEditing', $productForEditing);

        $this->smarty->display("admin/productEditorEditPage.tpl");

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

    public function editProductAction()
    {
        $productId = $_POST["product_for_edit_id"];

        $adminModelObject = new Admin();

        $newProductProductTitle = str_replace("'", " ", $_POST["product_title"]);
        $newProductProductTitle = str_replace("\"", " ", $newProductProductTitle);
        $newProductProductTitle = trim($newProductProductTitle);

        $adminModelObject->newProductProductTitle = $newProductProductTitle;
        $adminModelObject->newProductDescriptionOnEnglish = addslashes($_POST["description_english"]);
        $adminModelObject->newProductDescriptionOnUkrainian = addslashes($_POST["description_ukrainian"]);
        $adminModelObject->newProductDescriptionOnRussian = addslashes($_POST["description_russian"]);
        $adminModelObject->newProductPrice = $_POST["product_price"];
        $adminModelObject->productStatus = intval($_POST["product_status"]);

        $changeResult = $adminModelObject->updateProduct($productId);

        if ($changeResult) {
            header('Location: http://vladdev.com/admin/');
        } else {
            Debug::showErrorPage("Не вдалося змінити товар.");
        }
    }

    public function deleteProductAction($id)
    {
        $adminModelObject = new Admin();
        $deletingResult = $adminModelObject->deleteProduct($id);

        if ($deletingResult) {
            header('Location: http://vladdev.com/admin/');
        } else {
            Debug::showErrorPage("Не вдалося видалити категорію.");
        }
    }
}