<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends StudentController
{
public function showSearchForm(){
return view('studentsearch');
}
public function search(Request $request)
{
      $request->validate([
              'sid' => 'required|alpha_num|max:8',
          ], [
              'sid.required' => 'ID-г оруулна уу.',
              'sid.alpha_num' => 'ID нь зөвхөн үсэг, тоо байна.',
              'sid.max' => 'ID нь хамгийн ихдээ 8 оронтой байна.',
          ]);

    $aStudent = null;

    foreach ($this->students as $student) {
        if ($student[0] == $request->sid) {
            $aStudent = $student;
            break;
        }
    }

    return view('studentsearch', compact('aStudent'));
}


}


