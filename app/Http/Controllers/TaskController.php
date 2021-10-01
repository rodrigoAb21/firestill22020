<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class TaskController extends Controller
{
    /**
     * @return mixed
     */
    public function index()
    {
        return view('vistas.datata.index');
    }

    /**
     * @return mixed
     */
    public function getTasks()
    {
       // echo "okkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk";
        $tasks = Task::select(['id','name','category','state']);
        dd($tasks);
        return Datatables::of($tasks)

            ->make(true);
    }

}
