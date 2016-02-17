<?php namespace App\Http\Composer;
use Session;
use App\Company;
use Illuminate\Support\Facades\Auth;
class MainTemplateComposer{

  public function __construct()
  {
    # code...
  }
  public function compose($view){

    if (Auth::check())
    {
      $view->with('user', Auth::user());

      if (!Session::has('company'))
      {
        $company = Company::find(Auth::user()->companyID);
        Session::put('company', $company);
      }
      $view->with('company', Session::get('company'));

      //var_dump( Session::get('company'));

    }

  }



}

?>
