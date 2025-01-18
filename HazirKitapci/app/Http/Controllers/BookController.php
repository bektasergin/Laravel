<?php
namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BookController extends Controller
{
    public function create(Request $request)
    {
        if ($request->isMethod('POST')) {

            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $image = time() . '.' . $request->file('image')->getClientOriginalExtension();


                $destinationPath = public_path('images');
                if (!File::exists($destinationPath)) {
                    File::makeDirectory($destinationPath, 0755, true, true);
                }


                $request->file('image')->move($destinationPath, $image);


                $new_book = new Books;
                $new_book->category_id = $request->category_id;
                $new_book->title = $request->title;
                $new_book->image = "/images/" . $image;
                $new_book->description = $request->description;
                $new_book->save();


                if ($new_book) {
                    $message = "Kitap başarıyla eklendi";
                    $status = "success";
                } else {
                    $message = "Kitap eklenirken hata oluştu";
                    $status = "error";
                }

                return redirect('book/create')
                    ->with('message', $message)
                    ->with('status', $status);
            } else {
                return redirect('book/create')
                    ->with('message', 'Lütfen geçerli bir resim dosyası yükleyin')
                    ->with('status', 'error');
            }
        }

        $categories = Categories::select('id', 'name')->where('is_active', '=', 'active')->get();
        $books = Books::with('Category:id,name,slug,is_active')->get();

        return view('book.create', compact('categories', 'books'));
    }

    public function update(Request $request, $id)
    {
        $update = Books::find($id);

        // if ($request->hasFile('image') && $request->file('image')->isValid()) {
        //     $image = time() . '.' . $request->file('image')->getClientOriginalExtension();
        //     $destinationPath = public_path('images');

        //     if ($update->image && file_exists(public_path($update->image))) {
        //         unlink(public_path($update->image));
        //     }

        //     $request->file('image')->move($destinationPath, $image);
        //     $update->image = "/images/" . $image;
        // }

        $update->title = $request->title;
        $update->category_id = $request->category_id;
        $update->description = $request->description;
        $update->save();

        return redirect('book/create')->with('status', 'success')->with('message', 'Kitap başarıyla güncellendi');
    }

    public function delete(Request $request, $id){
        $delete = Books::find($id);
        if ($delete->image && file_exists(public_path($delete->image))) {
            unlink(public_path($delete->image));
        }

        $delete->delete();
        
        return Response()->json($delete ? true : false);
    }

    public function detail($id){
        $book = Books::find($id);
        return view('book.detail', compact('book'));
    }
}
