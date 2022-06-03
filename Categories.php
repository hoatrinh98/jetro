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
        echo '<script>alert("Create category new success !"); window.location="category_list.php";</script>';
        return [];
    }

    public function checkExistCategoryId(string $id):bool   
    {
        $query = " SELECT id FROM categories WHERE id = '" . $id . "';";
        return count($this->get_data($query)) ? true : false;
    }

    public function updateCategory($name, $description)
    {
        $isUpdate = $this->update(
            'categories', 
            [
                'name' => $name,
                'description' => $description
            ],
            'id = ' . $_GET['category-id']
        );
        if(!$isUpdate) {
            echo '<script>alert("Update category fail !")</script>';
            return [
                'name' => $name,
                'description' => $description
            ];
        }
        echo '<script>alert("Update category success !")</script>';
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
            echo '<script>alert("Category not exist !")</script>';
            return;
        }

        if($this->checkCategoryHasPost($_GET['category-id'])) {
            echo '<script>alert("You do not delete, have post in category !")</script>';
            return;
        }

        echo '<script>alert("Delete category success !")</script>';
        return;
    }


}