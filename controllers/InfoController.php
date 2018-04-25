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
use yii\behaviors\SluggableBehavior;
use yii\filters\AccessControl;

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

            //access_control
               'access' => [
                      'class' => AccessControl::className(),
                           'only' => ['create','createlostinfo','createfoundinfo','myinfo'],
                                'rules' => [
                                         [
                                                   'allow' => true,
                                                           'actions' => ['create','createlostinfo','createfoundinfo','myinfo'],
                                                                   'roles' => ['@'],
                                                        ],
                                                      ],
                                                    ],
			
			 //Sluggable
           [
            'class' => SluggableBehavior::className(),
            'attribute' => 'url',
            'slugAttribute' => 'slug',
          ],
        ];
    }

	   //Sluggable function
  public function actionSlug($slug) {
	
    $model = Info::find()->where(['url'=>$slug])->one();
      if (!is_null($model)) {
        return $this->render('view', [
           'model' => $model,
       ]);
      } else {
     return $this->render('404',['exception'=>Yii::$app->errorHandler->exception]);
   }
 }
    /**
     * Lists all Info models.
     * @return mixed
     */
    public function actionIndex()
    {
		$this->layout = 'home';
        $searchModel = new InfoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
	
	//My Info Module
	public function actionMyinfo()
	{
		
		$searchModel = new InfoSearch();
		$searchModel->created_by = Yii::$app->user->identity->username;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('myinfo', [
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

    //Create Lost Info
    public function actionCreatelostinfo()
    {
        $model = new Info();

        $model->created_at = date('Y-m-d H:i:s');
        $model->created_by = Yii::$app->user->identity->username;
        $model->status = 'published';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $model->image = UploadedFile::getInstance($model,'image');
            $model->image2 = UploadedFile::getInstance($model,'image2');
            $model->image3 = UploadedFile::getInstance($model,'image3');


            

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

        


            return $this->redirect(['index']);
        }

        return $this->render('createlostinfo', [
            'model' => $model,
        ]);
    }

    //Create Found Info
    public function actionCreatefoundinfo()
    {
        $model = new Info();

        $model->created_at = date('Y-m-d H:i:s');
        $model->created_by = Yii::$app->user->identity->username;
        $model->status = 'published';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $model->image = UploadedFile::getInstance($model,'image');
            $model->image2 = UploadedFile::getInstance($model,'image2');
            $model->image3 = UploadedFile::getInstance($model,'image3');



            if(!empty($model->image)) {
            

             $model->image->saveAs('public/uploads/info/'.sha1($model->id_info).'_1.jpg');


              //Create Thumbnail Image and Resize
            Image::thumbnail('public/uploads/info/'.sha1($model->id_info).'_1.jpg',400,300)->save('public/uploads/info/'.sha1($model->id_info).'_1.jpg');

            }

               if(!empty($model->image2)) {
            

             $model->image2->saveAs('public/uploads/info/'.sha1($model->id_info).'_2.jpg');


              //Create Thumbnail Image and Resize
            Image::thumbnail('public/uploads/info/'.sha1($model->id_info).'_2.jpg',400,300)->save('public/uploads/info/'.sha1($model->id_info).'_2.jpg');

            }

               if(!empty($model->image3)) {
            

             $model->image3->saveAs('public/uploads/info/'.sha1($model->id_info).'_3.jpg');


              //Create Thumbnail Image and Resize
            Image::thumbnail('public/uploads/info/'.sha1($model->id_info).'_3.jpg',400,300)->save('public/uploads/info/'.sha1($model->id_info).'_3.jpg');

            }

        


            return $this->redirect(['index']);
        }

        return $this->render('createfoundinfo', [
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

        return $this->redirect(['myinfo']);
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
