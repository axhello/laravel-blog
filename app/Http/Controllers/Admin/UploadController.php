<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
    public function imgUpload(Request $request)
    {
        $data = EndaEditor::uploadImgFile('endaEdit');
        return json_encode($data);
    }
}
