<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\KeywordRequest;
use App\Models\Keyword;
use Illuminate\Http\Request;

class KeywordController extends Controller
{
    public function index()
    {
        $keywords = Keyword::paginate(10);
        return view('admin.keywords.index', compact('keywords'));
    }

    public function store(KeywordRequest $request)
    {
        
        if($request->id == 0){
            Keyword::create($request->only('keyword'));
            return redirect()->route('admin.keywords.index')->with('success', 'Tạo từ khóa thành công.');
        }else{
            $keyword = Keyword::find($request->id);
            if ($keyword) {
                $keyword->update($request->only('keyword'));
                return redirect()->route('admin.keywords.index')->with('success', 'Câp nhật từ khóa thành công.');
            } else {
                return redirect()->back()->with('error', 'Keyword not found.');
            }
        }
        

       
    }

    public function destroy($id)
    {
        // Handle the request to delete a keyword
        // Delete the keyword from the database
        // Return a response or redirect
    }
}
