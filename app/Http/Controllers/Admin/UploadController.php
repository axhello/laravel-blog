<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use YuanChao\Editor\EndaEditor;

class UploadController extends Controller
{
    public function imgUpload(Request $request)
    {
        $data = EndaEditor::uploadImgFile('endaEdit');
        return json_encode($data);
    }
}
