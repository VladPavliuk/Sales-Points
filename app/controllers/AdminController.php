<?php

class AdminController extends Controller
{
    /**
     * Render main admin page.
     *
     */
    public function viewAdminPageAction()
    {
        $this->smarty->display("admin/adminPage.tpl");
    }

    /**
     * Render different category editor.
     *
     * @param $action
     */
    public function viewCategoryEditorAction($action)
    {
        switch($action) {
            case "add":
                $this->smarty->display("admin/categoryEditorAddPage.tpl");
                break;
            case "select":
                $this->smarty->display("admin/categoryEditorSelectPage.tpl");
                break;
            case "edit":
                $categoryId = $_POST["category_id"];

                $categoryForEdit = $this->adminModel->getCategoryForEditor($categoryId);

                $this->smarty->assign("categoryForEdit", $categoryForEdit);

                $this->smarty->display("admin/categoryEditorEditPage.tpl");
                break;
            default:
                Router::redirectTo("admin");
        }
    }

    /**
     * Add new category.
     *
     */
    public function addCategoryAction()
    {
        $this->adminModel->categoryTitleOnEnglish = trim($_POST["category_english_title"]);
        $this->adminModel->categoryTitleOnUkrainian = trim($_POST["category_ukrainian_title"]);
        $this->adminModel->categoryTitleOnRussian = trim($_POST["category_russian_title"]);
        $this->adminModel->categoryParentCategoryId = intval($_POST["parent_category_id"]);

        $changeResult = $this->adminModel->addNewCategory();

        if ($changeResult) {
            Router::redirectTo("admin");
        } else {
            Debug::showErrorPage("Не вдалося додати категорію.");
        }
    }

    /**
     * Edit exists category.
     *
     */
    public function editCategoryAction()
    {
        $categoryId = $_POST["category_for_edit_id"];

        $this->adminModel->categoryTitleOnEnglish = $_POST["category_english_title"];
        $this->adminModel->categoryTitleOnUkrainian = $_POST["category_ukrainian_title"];
        $this->adminModel->categoryTitleOnRussian = $_POST["category_russian_title"];

        $changeResult = $this->adminModel->updateCategory($categoryId);

        if ($changeResult) {
            Router::redirectTo("admin");
        } else {
            Debug::showErrorPage("Не вдалося змінити категорію.");
        }
    }

    /**
     * Delete category
     *
     * @param $categoryId
     */
    public function deleteCategoryAction($categoryId)
    {
        $deletingResult = $this->adminModel->deleteCategory($categoryId);

        if ($deletingResult) {
            Router::redirectTo("admin");
        } else {
            Debug::showErrorPage("Не вдалося видалити категорію.");
        }
    }

    /**
     * Render different product editor.
     *
     * @param $action
     * @param $productId
     */
    public function viewProductEditorAction($action, $productId)
    {
        switch($action) {
            case "add":
                $listOfAllCategories = $this->categoryModel->getListOfAllCategories();

                $this->smarty->assign('listOfAllCategories', $listOfAllCategories);

                $this->smarty->display("admin/productEditorAddPage.tpl");
                break;
            case "select":
                $this->smarty->display("admin/productEditorSelectPage.tpl");
                break;
            case "edit":
                $productForEditing = $this->adminModel->getProductForEditing($productId);

                $this->smarty->assign('productForEditing', $productForEditing);

                $this->smarty->display("admin/productEditorEditPage.tpl");
                break;
            default:
                Router::redirectTo("admin");
        }
    }

    /**
     * Return JSON string of category products.
     *
     * @param $categoryId
     */
    public function getProductsFromCategoryAction($categoryId)
    {
        $listOfCategoriesProducts = $this->productModel->getCategoryProducts($categoryId);

        echo json_encode($listOfCategoriesProducts);
    }

    /**
     * Add new product.
     *
     */
    public function addProductAction()
    {
        $newProductCategory = $this->categoryModel->getSingleCategoryTitleOnEnglishById($_POST["category_id"]);
        $newProductProductTitle = str_replace("'", " ", $_POST["product_title"]);
        $newProductProductTitle = str_replace("\"", " ", $newProductProductTitle);
        $newProductProductTitle = trim($newProductProductTitle);

        $this->adminModel->newProductProductTitle = $newProductProductTitle;
        $this->adminModel->newProductCategoryId = $_POST["category_id"];
        $this->adminModel->newProductCategoryTitle = $newProductCategory;
        $this->adminModel->newProductDescriptionOnEnglish = addslashes($_POST["description_english"]);
        $this->adminModel->newProductDescriptionOnUkrainian = addslashes($_POST["description_ukrainian"]);
        $this->adminModel->newProductDescriptionOnRussian = addslashes($_POST["description_russian"]);
        $this->adminModel->newProductPrice = floatval($_POST["price"]) > 0 ? floatval($_POST["price"]) : 1;

        $this->adminModel->createMainImageInImagesFolder($_FILES["main_image"]);
        $this->adminModel->createOtherImageInImagesFolder($_FILES["other_images"]);

        $changeResult = $this->adminModel->addNewProduct();

        if ($changeResult) {
            Router::redirectTo("admin");
        } else {
            Debug::showErrorPage("Не вдалося додати товар.");
        }
    }

    /**
     * Edit product.
     *
     */
    public function editProductAction()
    {
        $productId = $_POST["product_for_edit_id"];

        $newProductProductTitle = str_replace("'", " ", $_POST["product_title"]);
        $newProductProductTitle = str_replace("\"", " ", $newProductProductTitle);
        $newProductProductTitle = trim($newProductProductTitle);

        $this->adminModel->newProductProductTitle = $newProductProductTitle;
        $this->adminModel->newProductDescriptionOnEnglish = addslashes($_POST["description_english"]);
        $this->adminModel->newProductDescriptionOnUkrainian = addslashes($_POST["description_ukrainian"]);
        $this->adminModel->newProductDescriptionOnRussian = addslashes($_POST["description_russian"]);
        $this->adminModel->newProductPrice = floatval($_POST["product_price"]) > 0 ? floatval($_POST["product_price"]) : 1;
        $this->adminModel->productStatus = intval($_POST["product_status"]);

        $changeResult = $this->adminModel->updateProduct($productId);

        if ($changeResult) {
            Router::redirectTo("admin");
        } else {
            Debug::showErrorPage("Не вдалося змінити товар.");
        }
    }

    /**
     * Delete product.
     *
     * @param $id
     */
    public function deleteProductAction($id)
    {
        $deletingResult = $this->adminModel->deleteProduct($id);

        if ($deletingResult) {
            Router::redirectTo("admin");
        } else {
            Debug::showErrorPage("Не вдалося видалити товар.");
        }
    }
}