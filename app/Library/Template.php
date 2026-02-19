<?php
/**
 * Created by PhpStorm.
 * User: jahid
 * Date: 19/02/2020
 * Time: 4:58 PM
 */
namespace App\Library;
use View;

class Template
{
    /**
     * @author Jahid Hasan <jahid0209@gmail.com>
     * @param string $pageName defining page name
     * @param array $data defining dynamic values passed to view
     * @return custom view
     */
    public static function loadView($pageName, $data = array())
    {
        //$data['pageTitle'] = View::make("layouts.breadcrumb", $data)->render();

        if (\Request::ajax()) {
           
            return view($pageName, $data);
        } else {
            // dd($data);
             return view("layouts.master", $data);
            // return view($pageName, $data);
        }
    }
}