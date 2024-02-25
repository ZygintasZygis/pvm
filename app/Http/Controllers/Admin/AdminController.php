<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

/**
 * Class AdminController
 * @package App\Http\Controllers\Admin
 */
class AdminController extends Controller
{
    /**
     * Return admin index page
     *
     * @return View
     */
    public function index(): View
    {
        return view('admin.index');
    }
}
