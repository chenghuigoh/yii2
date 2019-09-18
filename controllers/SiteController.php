<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Movie;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use app\models\Wishlist;
use app\models\People;
use app\widgets\Alert;
use yii\data\SqlDataProvider;


class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => [''],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Movie::find(),
            'pagination' => [
                'pageSize' => 12,
            ],
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Displays movie detail.
     *
     * 
     */
    public function actionMoviedetail()
    {
        $id = Yii::$app->request->get('id', 0);
        $model = Movie::findOne($id);

        if (!$model) {
            return $this->redirect(['site/index']);
        }


        return $this->render('moviedetail', [
            'model' => $model,
        ]);
    }

    public function actionAddwishlist($id)
    {
        $id = Yii::$app->request->get('id');
        $userId = Yii::$app->user->identity->id;
        $model = new Wishlist();
        $model->setWishlist($id, $userId);
        if ($model->save(false)) {
            return $this->redirect(['index']);
        }
    }

    /**
     * Displays wishlist page.
     *
     * @return string
     */
    public function actionWishlist()
    {
        // get wishlist 
        //assign to model
        $userId = Yii::$app->user->identity->id;
        $id = (int) $userId;
        $sql = 'SELECT wishlist.id, wishlist.user_id, wishlist.movie_id, user.username, movie.name AS movie_name, movie.image FROM `wishlist` INNER JOIN user ON wishlist.user_id = user.id INNER JOIN movie ON wishlist.movie_id = movie.id WHERE user_id=:user_id';

        $dataProvider = new SqlDataProvider([
            'sql' => $sql,
            'pagination' => [
                'pageSize' => 3,
            ],
            'params' => [
                ':user_id' => $id,
            ],
        ]);

        return $this->render(
            'wishlist',
            [
                'dataProvider' => $dataProvider,
            ]
        );
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionDeletewishlist()
    {

        $id = Yii::$app->request->get('id');

        $wishlist = Wishlist::findOne($id);
        if (!$wishlist) {
            return $this->actionWishlist();
        }
        if ($wishlist->delete()) {
            return $this->actionWishlist();
        } else {
            echo "<script>alert('Could not remove')>;</script>";
        };
    }
}
