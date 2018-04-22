<?php

namespace app\controllers;

use Yii;
use app\models\Info;
use app\models\InfoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\imagine\Image;

/**
 * InfoController implements the CRUD actions for Info model.
 */
class InfoController extends Controller
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
     * Lists all Info models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InfoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    //Choice
    public function actionCreate() {

        return $this->render('choice');
    }

    /**
     * Displays a single Info model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Info model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreatelostinfo()
    {
        $model = new Info();

        $model->created_at = date('Y-m-d H:i:s');
        $model->created_by = Yii::$app->user->identity->username;
        $model->status = 'published';

        if ($model->load(Yii::$app->request->post())) {

            $model->image = UploadedFile::getInstance($model,'image');
            $model->image2 = UploadedFile::getInstance($model,'image2');
            $model->image3 = UploadedFile::getInstance($model,'image3');


            if($model->save()) {

            if(!empty($model->image)) {
            

             $model->image->saveAs('public/uploads/info/'.sha1($model->id_info).'_1.jpg');


              //Create Thumbnail Image and Resize
            Image::thumbnail('public/uploads/info/'.sha1($model->id_info).'_1.jpg',500,500)->save('public/uploads/info/'.sha1($model->id_info).'_1.jpg');

            }

               if(!empty($model->image2)) {
            

             $model->image2->saveAs('public/uploads/info/'.sha1($model->id_info).'_2.jpg');


              //Create Thumbnail Image and Resize
            Image::thumbnail('public/uploads/info/'.sha1($model->id_info).'_2.jpg',500,500)->save('public/uploads/info/'.sha1($model->id_info).'_2.jpg');

            }

               if(!empty($model->image3)) {
            

             $model->image3->saveAs('public/uploads/info/'.sha1($model->id_info).'_3.jpg');


              //Create Thumbnail Image and Resize
            Image::thumbnail('public/uploads/info/'.sha1($model->id_info).'_3.jpg',500,500)->save('public/uploads/info/'.sha1($model->id_info).'_3.jpg');

            }

        }


            return $this->redirect(['index']);
        }

        return $this->render('createlostinfo', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Info model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_info]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Info model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Info model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Info the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Info::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
