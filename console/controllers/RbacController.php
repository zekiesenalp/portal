<?php
namespace console\controllers;
use Yii;
use yii\console\Controller;
class RbacController extends Controller
{
public function actionInit()
{
$auth = \Yii::$app->authManager;
// Create the user permissions
$user = $auth->createPermission('createIssue');
$user->description = 'A permission to create a new issue
within our incident management system';
$auth->add($user);
// Create the supporter permissions
$supporter = $auth->createPermission('supportIssue');
$supporter->description = 'A permission to apply supporter
specific actions to an issue';
$auth->add($supporter);
// A supporter should have all the permissions of a user
$auth->addChild($supporter, $user);
// Create a permission to manage issues
$supervisor = $auth->createPermission('manageIssue');
$supervisor->description = 'A permission to apply
management specific actions to an issue';
$auth->add($supervisor);
// A supervisor should have all the permissions of
//a supporter and a end user
$auth->addChild($supervisor, $supporter);
$auth->addChild($supervisor, $user);
$admin = $auth->createRole('admin');
$admin->description = 'A permission to perform
admin actions on an issue';
$auth->add($admin);
// Allow an admin to perform all related tasks.
$auth->addChild($admin, $supervisor);
$auth->addChild($admin, $supporter);
$auth->addChild($admin, $user);


$role = $auth->getRole('admin');

$auth->assign($role, 1);


}
}