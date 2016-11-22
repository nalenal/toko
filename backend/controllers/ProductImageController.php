<?php

namespace backend\controllers;

use Yii;
use common\models\ProductImage;
use backend\models\ProductImageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use backend\models\UploadForm;
use common\models\Product;

/**
 * ProductImageController implements the CRUD actions for ProductImage model.
 */
class ProductImageController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all ProductImage models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductImageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProductImage model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ProductImage model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProductImage();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ProductImage model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ProductImage model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProductImage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProductImage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProductImage::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

            //// coba save
    public function actionUpload($id = null)
    {
        if ($id == null || !Product::find()->where(['id' => $id])->exists()) {
            throw new NotFoundHttpException();
        }

        $modelProductImage = new ProductImage();
        $form = new UploadForm();

        $searchModel = new ProductImageSearch();
        $searchModel->product_id = $id;
//
       $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if (Yii::$app->request->isPost) {

            $form->imageFile = UploadedFile::getInstance($form, 'imageFile');
            
            if($form->upload($id)) {
                //upload sukses
                $modelProductImage->product_id = $id;
                $modelProductImage->link = $form->imageFile->baseName.'.'.$form->imageFile->extension;
                $modelProductImage->is_main = 0;
                $modelProductImage->save();
            }
        }

        return $this->render('uploadForm',
            [   'modelForm' => $form,
                'modelProductImage' => $modelProductImage,
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
             ]);
    }


}

