<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadNewFolderRequest extends FormRequest
{

  public function authorize()
  {
    return true;
  }


  public function rules()
  {
    return [
      'folder' => 'required',
      'new_folder' => 'required',
    ];
  }
}