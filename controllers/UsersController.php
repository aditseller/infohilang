<?php

namespace app\controllers;

use Yii;
use app\models\Users;
use app\models\UsersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\imagine\Image;
use yii\behaviors\SluggableBehavior;
use yii\filters\AccessControl;

/**
 * UsersController implements the CRUD actions for Users model.
 */
class UsersController extends Controller
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

           //Sluggable
           [
            'class' => SluggableBehavior::className(),
            'attribute' => 'username',
            'slugAttribute' => 'slug',
          ],

            //access_control
               'access' => [
                      'class' => AccessControl::className(),
                           'only' => ['setting','changepassword','changeemail','changefullname','changegender','changelocation','changephone','changeprofilepicture'],
                                'rules' => [
                                         [
                                                   'allow' => true,
                                                           'actions' => ['setting','changepassword','changeemail','changefullname','changegender','changelocation','changephone','changeprofilepicture'],
                                                                   'roles' => ['@'],
                                                        ],
                                                      ],
                                                    ],
        ];
    }

 

       //Sluggable function
  public function actionSlug($slug) {
    $model = Users::find()->where(['username'=>$slug])->one();
      if (!is_null($model)) {
        return $this->render('view', [
           'model' => $model,
       ]);
      } else {
     return $this->render('404',['exception'=>Yii::$app->errorHandler->exception]);
   }
 }

  

    /**
     * Creates a new Users model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionSignup()
    {
        $this->layout = 'box';
        $model = new Users();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['site/login']);
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

   

    //Profile Setting Module
    public function actionSetting() {

        $idlogin = Yii::$app->user->identity->id;
        $model = $this->findModel($idlogin);
        $model->password = pack("H*",$model->password);
           
          if ($model->load(Yii::$app->request->post()) && $model->save()) {

            Yii::$app->session->setFlash('verified');

        return $this->refresh();
      } else {
        return $this->render('setting', [
            'model' => $model,
        ]);
      }

    }

     //Profile Change Fullname
    public function actionChangefullname() {

        $idlogin = Yii::$app->user->identity->id;
        $model = $this->findModel($idlogin);
        $model->password = pack("H*",$model->password);
           
          if ($model->load(Yii::$app->request->post()) && $model->save()) {

        return $this->redirect(['setting']);
      } else {
        return $this->render('changefullname', [
            'model' => $model,
        ]);
      }

    }

    //Profile Change Email
    public function actionChangeemail() {

        $idlogin = Yii::$app->user->identity->id;
        $model = $this->findModel($idlogin);
        $model->password = pack("H*",$model->password);
           
          if ($model->load(Yii::$app->request->post()) && $model->save()) {

        return $this->redirect(['setting']);
      } else {
        return $this->render('changeemail', [
            'model' => $model,
        ]);
      }

    }

    //Profile Change Phone
    public function actionChangephone() {

        $idlogin = Yii::$app->user->identity->id;
        $model = $this->findModel($idlogin);
        $model->password = pack("H*",$model->password);
           
          if ($model->load(Yii::$app->request->post()) && $model->save()) {

        return $this->redirect(['setting']);
      } else {
        return $this->render('changephone', [
            'model' => $model,
        ]);
      }

    }

     //Profile Change Location
    public function actionChangelocation() {

        $idlogin = Yii::$app->user->identity->id;
        $model = $this->findModel($idlogin);
        $model->password = pack("H*",$model->password);
           
          if ($model->load(Yii::$app->request->post()) && $model->save()) {

        return $this->redirect(['setting']);
      } else {
        return $this->render('changelocation', [
            'model' => $model,
        ]);
      }

    }

      //Profile Change Gender
    public function actionChangegender() {

        $idlogin = Yii::$app->user->identity->id;
        $model = $this->findModel($idlogin);
        $model->password = pack("H*",$model->password);
           
          if ($model->load(Yii::$app->request->post()) && $model->save()) {

        return $this->redirect(['setting']);
      } else {
        return $this->render('changegender', [
            'model' => $model,
        ]);
      }

    }

     //Profile Change Profile Picture
    public function actionChangeprofilepicture() {

        $idlogin = Yii::$app->user->identity->id;
        $model = $this->findModel($idlogin);
        
        if ($model->load(Yii::$app->request->post())) {

          $model->image = UploadedFile::getInstance($model,'image');
          $model->image->saveAs('public/uploads/profile/'.sha1(Yii::$app->user->identity->id).'.jpg');


              //Create Thumbnail Image and Resize
       Image::thumbnail('public/uploads/profile/'.sha1(Yii::$app->user->identity->id).'.jpg',100,100)->save('public/uploads/profile/'.sha1(Yii::$app->user->identity->id).'.jpg');
            
           
        return $this->redirect(['setting']);
      } else {
        return $this->render('changeprofilepicture', [
            'model' => $model,
        ]);
      }

    }
  


    //Profile Change Password
    public function actionChangepassword() {

        $idlogin = Yii::$app->user->identity->id;
        $model = $this->findModel($idlogin);
           
          if ($model->load(Yii::$app->request->post()) && $model->save()) {

        return $this->redirect(['setting']);
      } else {
        return $this->render('changepassword', [
            'model' => $model,
        ]);
      }

    }

    /**
     * Deletes an existing Users model.
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
     * Finds the Users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Users the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Users::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
