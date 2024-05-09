<?php

namespace App\Http\Controllers;

use App\File; // Use correct case for the model name
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response; // Add this line for file download

class FileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $files = File::all(); // Use correct case for the model name
        return view("file.index")->with("files", $files);
    }

    public function create()
    {
        return view("file.create");
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            "title" => "required|min:3",
            "description" => "required|min:5",
            "fileInput" => "required|max:3124|mimes:pdf,txt,png,jpg", // Corrected validation rule
        ]);

        $file = new File();
        $file->title = $request->title;
        $file->description = $request->description;

        // Handle file upload
        if ($request->hasFile('fileInput')) {
            $allFileData = $request->file("fileInput");
            $fileName = $allFileData->getClientOriginalName();
            $allFileData->move(public_path() . "/files/", $fileName); // Corrected file path and variable name
            $file->file = $fileName; // Corrected variable name
        }

        $file->save();

        return redirect()->back()->with('success', 'File uploaded successfully.');
    }

    public function show($id) // Use correct case for the model name
    {
        $file = File::find($id); // Use correct case for the model name
        return view("file.show")->with("file", $file);
    }

    public function edit(File $file) // Use correct case for the model name
    {
        return view("file.show")->with("file", $file);
    }

    public function update(Request $request, File $file) // Use correct case for the model name
    {
        $fields = $request->validate([
            "title" => "required|min:3",
            "description" => "required|min:5",
            "fileInput" => "required|max:3124|mimes:pdf,txt,png,jpg", // Corrected validation rule
        ]);

        $file->title = $request->title;
        $file->description = $request->description;

        // Handle file upload
        if ($request->hasFile('fileInput')) {
            $allFileData = $request->file("fileInput");
            $fileName = $allFileData->getClientOriginalName();
            $allFileData->move(public_path() . "/files/", $fileName); // Corrected file path and variable name
            $file->file = $fileName; // Corrected variable name
        }

        $file->save();

        return redirect("/allFiles")->with('done', 'File Update successfully.');
    }

    public function destroy($id) // Use correct case for the model name
    {
        $file = File::find($id);
        $file->delete();
        return redirect("/allFiles")->with('success', 'Delete File Done');
    }

    public function download($id)
    {
        $file = File::findOrFail($id); // Use correct case for the model name
        $filepath = public_path() . "/files/" . $file->file;
        return Response()->download($filepath);
    }
}
