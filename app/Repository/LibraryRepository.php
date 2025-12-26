<?php

namespace App\Repository;

use App\Http\Traits\AttachFileTrait;
use App\Models\Grade;
use App\Models\Library;
use App\Models\Teacher;

class LibraryRepository implements LibraryRepositoryInterface{

    use AttachFileTrait;

    public function index(){

        $books = Library::all();
        return view('Dashboard.library.index',compact('books'));
    }

    public function create(){
        $Grades = Grade::all();
        $Teachers = Teacher::all();
        return view('Dashboard.library.add',compact('Grades','Teachers'));

    }
     public function store($request){
        try{

            $books = new Library();
            $books->title = $request->title;
            $books->file_name = $request->file('file_name')->getClientOriginalName();
            $books->Grade_id = $request->Grade_id;
            $books->class_id = $request->class_id;
            $books->section_id = $request->section_id;
            $books->teacher_id = $request->teacher_id;
            $books->save();
            $this->uploadFile($request,'file_name','Library');

            toastr()->success(trans('messages.success'));
            return redirect()->route('Library.index');

        }catch(\Exception $e){

            return redirect()->back()->with(['error' => $e->getMessage()]);

        }
     }
     public function edit($id){
        $book = Library::findorfail($id);
        $grades = Grade::all();
        $Teachers = Teacher::all();
        return view('Dashboard.library.edit',compact('book','grades','Teachers'));
     }
     public function update($request){
        try{

            $book = library::findorFail($request->id);
            $book->title = $request->title;
            if($request->hasfile('file_name')){

                $this->deleteFile($book->file_name);

                $this->uploadFile($request,'file_name','Library');

                $file_name_new = $request->file('file_name')->getClientOriginalName();
                $book->file_name = $book->file_name !== $file_name_new ? $file_name_new : $book->file_name;

            }

            $book->Grade_id = $request->Grade_id;
            $book->class_id = $request->class_id;
            $book->section_id = $request->section_id;
            $book->teacher_id = $request->teacher_id;
            $book->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('Library.index');

        }catch(\Exception $e){
            return redirect()->back()->with(['error' => $e->getMessage()]);

        }
     }

     public function destroy($request){


        $this->deleteFile($request->file_name);
        library::destroy($request->id);
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('Library.index');
     }

     public function download($filename)
     {
        return response()->download(public_path('attachments/Library/'.$filename));
     }
}

?>