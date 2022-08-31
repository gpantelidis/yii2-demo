<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Users;
use app\models\Usergroups;
use app\models\Lessons;
use yii\base\ErrorException;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
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
            ]
        ];
    }

    /**
     * Displays Homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('homepage');
    }

    /*Users Actions*/

    /**
     * Displays Users page.
     *
     * @return string
     */
    public function actionUsers()
    {
        $users = Users::find()->all();
        return $this->render('users/users', ['users' => $users]);
    }

    /**
     * Displays Teachers page.
     *
     * @return string
     */
    public function actionTeachers()
    {
        $users = Users::find()->where(['usergroups_id' => 1])->all();
        return $this->render('users/teachers', ['users' => $users]);
    }

    /**
     * Displays Students page.
     *
     * @return string
     */
    public function actionStudents()
    {
        $users = Users::find()->where(['usergroups_id' => 2])->all();
        return $this->render('users/students', ['users' => $users]);
    }

    /**
     * Displays User Create page.
     *
     * @return string|Response
     */
    public function actionUserscreate()
    {
        $user = new Users();
        $formData = Yii::$app->request->post();

        if ($user->load($formData)) {
            if ($user->save()) {
                Yii::$app->getSession()->setFlash('message', 'New user created!');
                return $this->redirect(['users']);
            } else {
                Yii::$app->getSession()->setFlash('message', 'Failed to create new user');
            }
        }
        return $this->render('users/create', ['user' => $user]);
    }

    /**
     * Displays User View page.
     *
     * @return string
     */
    public function actionUsersview($id)
    {
        $user = Users::findOne($id);
        return $this->render('users/view', ['user' => $user]);
    }

    /**
     * Displays User Edit page.
     *
     * @return string|Response
     */
    public function actionUsersedit($id)
    {
        $user = Users::findOne($id);
        $formData = Yii::$app->request->post();
        if ($user->load($formData)) {

            //Fix because return 
            $user->inactive = $formData['Users']['inactive'];

            if ($user->save()) {
                Yii::$app->getSession()->setFlash('message', 'User updated!');
                return $this->redirect(['users']);
            } else {
                Yii::$app->getSession()->setFlash('message', 'Failed to update user');
            }
        }
        return $this->render('users/edit', ['user' => $user]);
    }

    /**
     * Displays User Delete page.
     *
     * @return Response
     */
    public function actionUsersdelete($id)
    {
        $user = Users::findOne($id);
        try {
            $user->delete();
            Yii::$app->getSession()->setFlash('message', 'User deleted!');
        } catch (\Exception $exception) {
            Yii::$app->getSession()->setFlash('warning', 'User cannot be deleted!');
        }
        return $this->redirect(['users']);
    }


    /*Usergroups Actions*/

    /**
     * Displays Usergroups page.
     *
     * @return string
     */
    public function actionUsergroups()
    {
        $usergroups = Usergroups::find()->all();
        return $this->render('usergroups/usergroups', ['usergroups' => $usergroups]);
    }

    /**
     * Displays Usergroup Create page.
     *
     * @return string|Response
     */
    public function actionUsergroupscreate()
    {
        $usergroup = new Usergroups();
        $formData = Yii::$app->request->post();

        if ($usergroup->load($formData)) {
            if ($usergroup->save()) {
                Yii::$app->getSession()->setFlash('message', 'New usergroup created!');
                return $this->redirect(['usergroups']);
            } else {
                Yii::$app->getSession()->setFlash('message', 'Failed to create new usergroup');
            }
        }
        return $this->render('usergroups/create', ['usergroup' => $usergroup]);
    }

    /**
     * Displays Usergroup View page.
     *
     * @return string
     */
    public function actionUsergroupsview($id)
    {
        $usergroup = Usergroups::findOne($id);
        return $this->render('usergroups/view', ['usergroup' => $usergroup]);
    }

    /**
     * Displays Usergroup Edit page.
     *
     * @return string|Response
     */
    public function actionUsergroupsedit($id)
    {
        $usergroup = Usergroups::findOne($id);
        $formData = Yii::$app->request->post();
        if ($usergroup->load($formData)) {

            //Fix because return 
            $usergroup->inactive = $formData['Usergroups']['inactive'];

            if ($usergroup->save()) {
                Yii::$app->getSession()->setFlash('message', 'Usergroup updated!');
                return $this->redirect(['usergroups']);
            } else {
                Yii::$app->getSession()->setFlash('message', 'Failed to update usergroup');
            }
        }
        return $this->render('usergroups/edit', ['usergroup' => $usergroup]);
    }

    /**
     * Displays Usergroup delete page.
     *
     * @return Response
     */
    public function actionUsergroupsdelete($id)
    {
        $usergroup = Usergroups::findOne($id);
        try {
            $usergroup->delete();
            Yii::$app->getSession()->setFlash('message', 'Usergroup deleted!');
        } catch (\Exception $exception) {
            Yii::$app->getSession()->setFlash('warning', 'Usergroup cannot be deleted!');
        }
        return $this->redirect(['usergroups']);
    }

    /*Lessons Actions*/

    /**
     * Displays Leassons page.
     *
     * @return string
     */
    public function actionLessons()
    {
        $lessons = Lessons::find()->andWhere(['not', ['inactive' => -1]])->all();
        return $this->render('lessons/lessons', ['lessons' => $lessons]);
    }


    /**
     * Displays Leasson Create page.
     *
     * @return string|Response
     */
    public function actionLessonscreate()
    {
        $lesson = new Lessons();
        $formData = Yii::$app->request->post();

        if ($lesson->load($formData)) {
            if ($lesson->save()) {
                Yii::$app->getSession()->setFlash('message', 'New lesson created!');
                return $this->redirect(['lessons']);
            } else {
                Yii::$app->getSession()->setFlash('message', 'Failed to create new lesson');
            }
        }
        return $this->render('lessons/create', ['lesson' => $lesson]);
    }

    /**
     * Displays Lesson View page.
     *
     * @return string
     */
    public function actionLessonsview($id)
    {
        $lesson = Lessons::findOne($id);
        return $this->render('lessons/view', ['lesson' => $lesson]);
    }

    /**
     * Displays Lesson Edit page.
     *
     * @return string|Response
     */
    public function actionLessonsedit($id)
    {
        $lesson = Lessons::findOne($id);
        $formData = Yii::$app->request->post();
        if ($lesson->load($formData)) {

            //Fix because return 
            $lesson->inactive = $formData['Lessons']['inactive'];

            if ($lesson->save()) {
                Yii::$app->getSession()->setFlash('message', 'Lesson updated!');
                return $this->redirect(['lessons']);
            } else {
                Yii::$app->getSession()->setFlash('message', 'Failed to update lesson');
            }
        }
        return $this->render('lessons/edit', ['lesson' => $lesson]);
    }

    /**
     * Displays Lesson delete page.
     *
     * @return Response
     */
    public function actionLessonsdelete($id)
    {
        $lesson = Lessons::findOne($id);
        $lesson->inactive = -1;
        if ($lesson->save()) {
            Yii::$app->getSession()->setFlash('message', 'Lesson deleted!');
            return $this->redirect(['lessons']);
        }
    }

    /**
     * Displays Lesson delete page.
     *
     * @return Response
     */
    public function actionImport()
    {
        $users = $this->userData();
        foreach ($users as $user) {
            $new_user = new Users();
            $new_user->name = $user['name'];
            $new_user->mobile = $user['mobile'];
            $new_user->email = $user['email'];
            $new_user->usergroups_id = $user['user_group_id'];
            $new_user->save();
        }
        Yii::$app->getSession()->setFlash('message', 'Import completed!');
        return $this->redirect(['users']);
    }

    private function userData()
    {
        $users = array(
            array(
                'name' => 'John Smith',
                'mobile' => '6765675609',
                'email' => 'test@me.gr',
                'user_group_id' => '1'
            ),
            array(
                'name' => 'Helga Steiner',
                'mobile' => '6765675603',
                'email' => 'test2@me.com',
                'user_group_id' => '2'
            ),
            array(
                'name' => 'Dan Ellis',
                'mobile' => '6765675602',
                'email' => 'test3@me.gr',
                'user_group_id' => '2'
            ),
            array(
                'name' => 'Christina Salma',
                'mobile' => '6762755602',
                'email' => 'test4@me.gr',
                'user_group_id' => '2'
            ),
            array(
                'name' => 'Ethan Bale',
                'mobile' => '6762755602',
                'email' => 'test5@me.gr',
                'user_group_id' => '1'
            ),
            array(
                'name' => 'Wan Ju',
                'mobile' => '6765335602',
                'email' => 'test6@me.gr',
                'user_group_id' => '2'
            ),
            array(
                'name' => 'Bill Smith',
                'mobile' => '6765675604',
                'email' => 'test7@me.gr',
                'user_group_id' => '1'
            ),
            array(
                'name' => 'Evie Stones',
                'mobile' => '6765675687',
                'email' => 'test8@me.com',
                'user_group_id' => '1'
            ),
            array(
                'name' => 'Penelope Steward',
                'mobile' => '6865675602',
                'email' => 'test9@me.gr',
                'user_group_id' => '2'
            ),
            array(
                'name' => 'Tina Kye',
                'mobile' => '6962755602',
                'email' => 'test10@me.gr',
                'user_group_id' => '2'
            ),
            array(
                'name' => 'Tinar Kyle',
                'mobile' => '6962755602',
                'email' => 'test11@me.gr',
                'user_group_id' => '2'
            )
        );
        return $users;
    }
}
