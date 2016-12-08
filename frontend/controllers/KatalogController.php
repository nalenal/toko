<?php

namespace frontend\controllers;

use common\models\Category;
use common\models\Product;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;

class KatalogController extends \yii\web\Controller
{
    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            Url::remember();
            return true;
        } else {
            return false;
        }
    }

    public function actionList($kategori = null)
    {
        /** @var Category $category */
        $category = null;
        if ($kategori !== null) {
            $categoryFound = Category::find()->where([ 'slug' => $kategori])->one();
            $id = $categoryFound->id;
        }
        else {
            $id = null;
        }

        $categories = Category::find()->indexBy('id')->orderBy('id')->all();

        $productsQuery = Product::find();
        if ($id !== null && isset($categories[$id])) {
            $category = $categories[$id];

            ///////////
            $productsQuery->where(['category_id' => $this->getCategoryIds($categories, $id)]);
        }

        $productsDataProvider = new ActiveDataProvider([
            'query' => $productsQuery,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('list', [
            'category' => $category,
            'productsDataProvider' => $productsDataProvider,
        ]);
    }

    public function actionView()
    {
        return $this->render('view');
    }


    /**
     * Returns IDs of category and all its sub-categories
     *
     * @param Category[] $categories all categories
     * @param int $categoryId id of category to start search with
     * @param array $categoryIds
     * @return array $categoryIds
     */
    private function getCategoryIds($categories, $categoryId, &$categoryIds = [])
    {
        foreach ($categories as $category) {
            if ($category->id == $categoryId) {
                $categoryIds[] = $category->id;
            }
            elseif ($category->parent_id == $categoryId){
                $this->getCategoryIds($categories, $category->id, $categoryIds);
            }
        }
        return $categoryIds;
    }
}
