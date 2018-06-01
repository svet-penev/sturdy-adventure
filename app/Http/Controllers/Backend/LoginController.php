<?php

namespace App\Http\Controllers\Backend;


class LoginController extends BackendController
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('backend.page.login');
    }
}
