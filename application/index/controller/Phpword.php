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
class Phpword extends Controller
{
    public function _initialize()
    {

        parent::_initialize();
    }
    public function index()
    {
        echo "PHPword";
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection();
        // Adding Text element to the Section having font styled by default...
        $section->addText(
            '"Learn from yesterday, live for today, hope for tomorrow. '
            . 'The important thing is not to stop questioning." '
            . '(Albert Einstein)'
        );

        /*
         * Note: it's possible to customize font style of the Text element you add in three ways:
         * - inline;
         * - using named font style (new font style object will be implicitly created);
         * - using explicitly created font style object.
         */

// Adding Text element with font customized inline...
        $section->addText(
            '"Great achievement is usually born of great sacrifice, '
            . 'and is never the result of selfishness." '
            . '(Napoleon Hill)',
            array('name' => 'Tahoma', 'size' => 10)
        );

// Adding Text element with font customized using named font style...
        $fontStyleName = 'oneUserDefinedStyle';
        $phpWord->addFontStyle(
            $fontStyleName,
            array('name' => 'Tahoma', 'size' => 10, 'color' => '1B2232', 'bold' => true)
        );
        $section->addText(
            '"The greatest accomplishment is not in never falling, '
            . 'but in rising again after you fall." '
            . '(Vince Lombardi)',
            $fontStyleName
        );
            $wfilepath = "./test.doc";
            $word=new COM("Word.Application") or die("无法打开 MS Word");
            $word->visible = 1 ;
            $word->Documents->Open($wfilepath)or die("无法打开这个文件");
            $htmlpath=substr($wfilepath,0,-4);
            $word->ActiveDocument->SaveAs($htmlpath,8);
            $word->quit(0);



    }


}
