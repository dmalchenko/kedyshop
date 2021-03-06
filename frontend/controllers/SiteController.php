<?php

namespace frontend\controllers;

use Yii;
use yii\base\InvalidConfigException;
use yii\base\InvalidParamException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\Response;
use backend\models\Purchase;
use common\models\Category;
use common\models\Item;
use common\models\LoginForm;
use frontend\models\ContactForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;

/**
 * Site controller
 */
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
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
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
     * @param $action
     * @return bool
     * @throws BadRequestHttpException
     */
    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }
    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Displays homepage.
     *
     * @param null $category
     * @param null $min_price
     * @param null $max_price
     * @param null $sex
     * @return mixed
     */
    public function actionIndex($category = null, $min_price = null, $max_price = null, $sex = null)
    {
        if ($category) {
            $category = Category::getAllCategories($category);
        }
        $items = Item::find()
            ->andFilterWhere(['category_id' => $category])
            ->andFilterWhere(['>=', 'new_price', $min_price])
            ->andFilterWhere(['<=', 'new_price', $max_price])
            ->andFilterWhere(['sex' => $sex])
            ->all();

        $categories = Category::getCategoryMenu();

        return $this->render('index', [
            'items' => $items,
            'categories' => $categories,
        ]);
    }

    public function actionContacts()
    {
        return $this->render('contacts');
    }

    public function actionReviews()
    {
        return $this->render('reviews');
    }

    public function actionCatalogue($category = null, $min_price = null, $max_price = null)
    {
        return null;
    }

    public function actionDelivery()
    {
        return $this->render('delivery');
    }

    public function actionPurchase()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        try {
            $data = Yii::$app->request->post();
        } catch (InvalidConfigException $e) {
            $data = [];
        }

        if (isset($data['products']) && is_array($data['products'])) {
            foreach ($data['products'] as $item) {
                $purchase = new Purchase();
                $purchase->name = ArrayHelper::getValue($data, 'name');
                $purchase->address = ArrayHelper::getValue($data, 'address');
                $purchase->phone = ArrayHelper::getValue($data, 'phone');
                $purchase->title = ArrayHelper::getValue($item, 'title')
                    . ', размер ' . ArrayHelper::getValue($item, 'size')
                    . ', количество ' . ArrayHelper::getValue($item, 'count');
                $purchase->price = ArrayHelper::getValue($item, 'price');
                $purchase->save();
            }
        }


        return ['status' => 'OK', 'code' => 200, 'data' => []];
    }

    public function actionItem($id = 0)
    {
        $item = Item::findOne($id);
        return $this->render('item', ['item' => $item]);
    }
}
