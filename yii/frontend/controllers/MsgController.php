<?php
namespace frontend\controllers;

use Yii;
use common\models\Msg;
use yii\web\Controller;

class MsgController extends Controller
{
    //声明去掉当前控制器加载视图的头部底部公共部分，否则yii2会自动加载
    public $layout = false;
    //关闭csrf攻击
    public $enableCsrfValidation = false;

    public function actionIndex()
    {
        $msgs = Msg::find()->all();
        return $this->render('index',compact('msgs'));

    }

    public function actionAdd()
    {
        if(Yii::$app->request->isPost){
            $uname = Yii::$app->request->post('uname');
            $content = Yii::$app->request->post('content');
            $msg = new Msg;
            $msg->uname = $uname;
            $msg->content = $content;
            $msg->created_at = $msg->updated_at = time();
            $rs = $msg->save();
            if($rs)
            {
                return $this->redirect(['/msg']);
            }
        }


    }



}
