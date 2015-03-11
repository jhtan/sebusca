<?php
/**
 * Created by PhpStorm.
 * User: jhtan
 * Date: 11/30/14
 * Time: 8:58 PM
 */

class PagesController extends BaseController {
  public function home() {
    $name = 'jhtan!!... :P :D';
    return View::make('hello')->with('name', $name);
  }

  public function about() {
    return View::make('about');
  }
}