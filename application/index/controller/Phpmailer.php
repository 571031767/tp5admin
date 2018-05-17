<?php
namespace app\index\controller;
use app\myclass\Curl;
use think\Controller;
use think\Cookie;
use think\Db;
use think\Request;
use think\Session;

/**
 * Created by PhpStorm.
 * 邮件发送demo
 * User: 微博@沙坪坝韩宇，qq571031767
 * Date: 2017/6/20
 * Time: 14:27
 */
class Phpmailer extends Controller
{
    public function _initialize()
    {

        parent::_initialize();
    }
    public function index()
    {
        if(Request::instance()->isPost()){
            $d = Request::instance()->post();

            try {

                $mail = new \PHPMailer\PHPMailer\PHPMailer();
                $mail->CharSet = 'UTF-8'; //设置邮件的字符编码，这很重要，不然中文乱码
                $mail->SMTPAuth = true; //开启认证
                $mail->Port = 25;
                $mail->Host = "smtp.163.com";
                $mail->Username = "kezengli@qudong.com";
                $mail->Password = "hanyu121???";
                $mail->AddReplyTo("kezengli@qudong.com", "mckee");//回复地址
                $mail->From = "kezengli@qudong.com";
                $mail->FromName = "www.micuer.com";
                $to = $d['mail'];
                $mail->AddAddress($to);
                $mail->Subject = "phpmailer测试标题";
                $mail->Body = "<h1>phpmail演示</h1>这是php点点通（<font color=red>www.micuer.com</font>）对phpmailer的测试内容";
                $mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; //当邮件不支持html时备用显示，可以省略
                $mail->WordWrap = 80; // 设置每行字符串的长度
                //$mail->AddAttachment("f:/test.png"); //可以添加附件
                $mail->IsHTML(true);
                $mail->Send();
                echo '邮件已发送';
            }catch (phpmailerException $e) {
                echo '邮件发送失败';
            }
        }else{
            return $this->fetch();
        }

    }


}
