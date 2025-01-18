<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CommentController extends Controller
{
    public function addComment(Request $request, $id)
    {
        $validatedData = $request->validate([
            'comment' => 'required|string|max:255',
        ]);

        $comment = new Comments();
        $comment->uuid = Str::uuid(); 
        $comment->comment = $validatedData['comment'];
        $comment->book_id = $id; 
        $comment->save();

        return redirect()->route('detail', $id)
            ->with('message', 'Yorum başarıyla eklendi!')
            ->with('status', 'success');
    }

    public function detail($id)
    {
        $book = Books::findOrFail($id); // Kitap bilgilerini alıyoruz
        $comments = $book->comments()->latest()->get(); // Kitaba ait yorumları alıyoruz

        return view('book.detail', compact('book', 'comments'));
    }

    public function update(Request $request, $id){
        $update = Comments::find($id);

        $update->comment = $request->input('comment');
        $update->save();

        return redirect()->route('detail', $update->book_id)->with('status', 'success')->with('message', 'Yorum başarıyla güncellendi');

    }

    public function delete(Request $request, $id){
        $delete = Comments::where('id', $id)->delete();

        return Response()->json($delete ? true : false);

    }
}
