<?php

namespace App\Http\Controllers\Students;

use App\Models\Grade;
use App\Models\Image;
use App\Models\Gender;
use App\Models\Section;
use App\Models\Student;
use App\Models\ClassRoom;
use App\Models\My_Parent;
use App\Models\blood_type;
use App\Models\Nationalitie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Psy\VersionUpdater\Downloader;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Repository\StudentRepositoryInterface;

class StudnetController extends Controller
{

    protected $Students;

    public function __construct(StudentRepositoryInterface $Students)
    {
        $this->Students = $Students;
    }
    
    public function index()
    {
       
        return $this->Students->Get_Student();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->Students->Create_Student();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->Students->Store_Student($request);
    }

    public function Get_Sections($id)
    {
        return $this->Students->Get_Sections($id);
    }
    public function show($id)
    {
        return $this->Students->Show_Student($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        return $this->Students->Edit_Student($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        return $this->Students->Update_Student($request);
}

    
    public function destroy(Request $request)
    {
        return $this->Students->Delete_Student($request);
    }
    public function Get_classrooms($id)
    {
       return $this->Students->Get_classrooms($id);
    }

    public function upload_Attachment(Request $request){
        
             return $this->Students->Upload_attachment($request);
    }


    public function Download_attachment($studentsname, $filename)
    {
        return $this->Students->Download_attachment($studentsname,$filename);
   
    }
    public function Delete_attachment(Request $request)
    {
        return $this->Students->Delete_attachment($request);

    }
}
