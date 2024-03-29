<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    // SHOW DATA TO TABLE
    public function table()
    {
        $files = File::all();
        return view('table', compact('files'));
    }

    // DASHBOARD WITH DUMMY CHARTS AND DATA
    public function dashboard()
    {
        return view('dashboard');
    }

    // UPLOAD DATA
    public function upload()
    {
        return view('upload');
    }

    // SAVE DATA TO DB
    public function store(Request $r)
    {
        $id = $r->FileId;
        $message = [
            'result' => false,
            'message' => 'please contact admin'
        ];
        // update
        if (isset($r->$id)) {
            //diri ang update/edit na code
            $file = $r->Filename;
            $path = $r->FilePath;
            $folder = $r->FileFolder;
            $files =    [
                'FileId' => $id,
                'FileFolder' => $folder,
                'Filename' => $file,
                'FilePath' => $path,
                'FileDescription' =>  trim($r->FileDescription),
            ];
            $update = File::where('FileId', $r->$id)->update($files);
            if ($update) {
                $message['result'] = true;
                $message['message'] = 'Successfully updated.';
            } else {
                $message['message'] = 'Update failed.';
            }
            return json_encode($message);
        } else {
            // SAVE
            $file = $r->Filename;
            $path = $r->FilePath;
            $folder = $r->FileFolder;
            $fileInfo = [
                'Filename' => $file,
                'FileFolder' => $folder,
                'FilePath' => $path,
                'FileDescription' => trim($r->FileDescription),
            ];
            if (empty($r->Filename)) {
                return view('upload')->with('Error', 'File is required.');
            }
            if (empty($r->FileDescription)) {
                return view('upload')->with('Error', 'Description is required.');
            }
            // filteron ang fields for empty data
            $Filter = File::where('Filename', $r->Filename)
                ->where('FileFolder', $r->FileFolder)
                ->where('FilePath', $r->FilePath)
                ->where('FileDescription', $r->FileDescription)->first();

            if ($Filter) {
                return view('upload')->with('Error', 'File already exist.');
            } else {
                $save = File::insert($fileInfo);
                if ($save) {
                    return view('upload')->with('Success', 'Successfully save');
                } else {
                    return view('upload')->with('Error', 'Invalid');
                }
            }
        }
    }

    // DELETE DATA FROM DB
    public function delete(Request $r)
    {
        $id = $r->FileId;
        $message = [
            'result' => false,
            'message' => 'please contact admin'
        ];
        $delete = File::where('FileId', $id)->delete();
        if ($delete) {
            $message = [
                'result' => true,
                'message' => 'Successfully deleted'
            ];
        } else {
            $message = [
                'result' => false,
            ];
        }
        return json_encode($message);
    }

    public function table2()
    {
        return view('table');
    }

    public function fetchFiles()
    {
        $files = File::all();

        return response()->json([
            'files' => $files,
        ]);
    }

    public function edit($id)
    {
        $file = File::find($id);

        if ($file) {
            return response()->json([
                'status' => 200,
                'file' => $file
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Not Found.'
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        // $request->validate([
        // ...research validation
        // ]);

        $file = File::find($id);

        if ($file) {
            $file->Filename = $request->file_name;
            $file->FileFolder = $request->folder;
            $file->FilePath = $request->path;
            $file->FileDescription = $request->description;

            $file->update();
            return response()->json([
                'status' => 200,
                'message' => 'Updated Successfully.'
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Not Found.'
            ]);
        }
    }

    public function destroy($id)
    {
        $file = File::find($id);

        if ($file) {
            $file->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Deleted Successfully.'
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Not Found.'
            ]);
        }
    }
}
