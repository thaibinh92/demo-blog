<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class UserListImport extends ExcelFile
{
    public function getFile()
    {
        // Import a user provided file
        $file = Input::file('report');
        $filename = $this->doSomethingLikeUpload($file);

        // Return it's location
        return $filename;
    }
}
