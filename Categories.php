<?php

class Categories extends Database
{

    /**
     * checkExistCategoryName
     *
     * @param string $name
     * @return bool
     */
    public function checkExistCategoryName(string $name):bool
    {
        $query = " SELECT id FROM categories WHERE name = '" . $name . "';";
        return count($this->get_data($query)) ? true : false;
    }

    public function checkExistCategoryNameInUpdate(string $name):bool
    {
        $query = " SELECT id FROM categories WHERE name = '" . $name . "';";
        return count($this->get_data($query)) > 1 ? true : false;
    }

    /**
     * createCategory
     *
     * @param string $name
     * @param string $description
     * @return array
     */
    public function createCategory(
        string $name,
        string $description
    ):array
    {
        if($this->checkExistCategoryName($name)) {
            echo '<script>alert("Category name was exist !!!")</script>';
            return [
                'name' => $name,
                'description' => $description
            ];
        }

        $isInsert = $this->insert('categories', [
            'name' => $name,
            'description' => $description
        ]);

        if(!$isInsert) {
            echo '<script>alert("Create category new fail !")</script>';
            return [
                'name' => $name,
                'description' => $description
            ];
        }
        echo '<script>alert("Create category new success !"); window.location="categoryList.php";</script>';
        return [];
    }

    public function checkExistCategoryId(string $id):bool   
    {
        $query = " SELECT id FROM categories WHERE id = '" . $id . "';";
        return count($this->get_data($query)) ? true : false;
    }

    public function updateCategory($description)
    {
        $isUpdate = $this->update(
            'categories', 
            [
                'description' => $description
            ],
            'id = ' . $_GET['category-id']
        );
        if(!$isUpdate) {
            echo '<script>alert("Update category fail !")</script>';
            return [
                'description' => $description
            ];
        }
        echo '<script>alert("Update category success !"); window.location="./categoryList.php"</script>';
        return [];
    }

    public function checkCategoryHasPost($id):bool
    {
        $query = "SELECT C.id FROM categories C, posts P WHERE P.category_id = C.id AND C.id = " . $id;
        return count($this->get_data($query)) ? true : false;
    }

    public function deleteCategoryById()
    {
        if(!$this->checkExistCategoryId($_GET['category-id'])) {
            echo '<script>alert("Category not exist !"); window.location="./categoryList.php"</script>';
            return;
        }

        if($this->checkCategoryHasPost($_GET['category-id'])) {
            echo '<script>alert("You do not delete, have post in category !"); window.location="./categoryList.php"</script>';
            return;
        }
        $this->delete('categories', 'id = '. $_GET['category-id']);
        echo '<script>alert("Delete category success !"); window.location="./categoryList.php"</script>';
        return;
    }

    public function getCategoryList()
    {
        return $this->get_data("SELECT * FROM categories");
    }

    public function getInfoCategoryById($id)
    {
        return $this->get_data("SELECT * FROM categories WHERE id = " . $id);

    }


}