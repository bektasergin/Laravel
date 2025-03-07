<?php
// Controller (CategoryController.php)
namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
   
    public function detail($id)
    {
        $category = Categories::with('Books')
            ->where('id', $id)
            ->where('is_active', 'active')
            ->first();
        if (!$category) {
            abort(404);
        }

        return view('category.detail', compact('category'));
    }

    public function create(Request $request)
    {
        if ($request->isMethod('POST')) {
            $request->validate(
                [
                    'name' => 'required|max:255',
                    'is_active' => 'required|in:active,passive'
                ],
                [
                    'name.required' => 'Kategori adı zorunludur',
                    'name.max' => 'Kategori adı en fazla 255 karakter olabilir',
                    'is_active.required' => 'Aktiflik durumu zorunludur',
                    'is_active.in' => 'Aktiflik durumu sadece Active veya Passive olabilir'
                ]
            );

            if ($this->checkCategory($request->input('name')) > 0) {
                return redirect('category/create')
                    ->with('message', 'Bu kategori mevcuttur')
                    ->with('status', 'error');
            }

            $category = new Categories();
            $category->name = $request->input('name');
            $category->is_active = $request->is_active;
            $category->save();

            if ($category) {
                $message = "Kategori başarıyla eklendi";
                $status = "success";
            } else {
                $message = "Kategori eklenirken hata oluştu";
                $status = "error";
            }

            return redirect('category/create')
                ->with('message', $message)
                ->with('status', $status);
        }

        $categories = Categories::orderBy('created_at', 'desc')
            ->get();

        return view('category.create', compact('categories'));
    }

    public function update($uuid, Request $request)
    {
        $request->validate(
            [
                'name' => 'required|max:255',
                'is_active' => 'required|in:active,passive'
            ],
            [
                'name.required' => 'Kategori adı zorunludur',
                'name.max' => 'Kategori adı en fazla 255 karakter olabilir',
                'is_active.required' => 'Aktiflik durumu zorunludur',
                'is_active.in' => 'Aktiflik durumu sadece Active veya Passive olabilir'
            ]
        );

        if ($this->checkCategory($request->input('name'), $uuid) > 0) {
            return redirect('category/create')
                ->with('message', 'Bu kategori mevcuttur güncelleme yapamazssınız')
                ->with('status', 'error');
        }

        $update = Categories::where('uuid', $uuid)->first();
        $update->name = $request->name;
        $update->is_active = $request->is_active;
        $update->save();

        if ($update) {
            $message = "Kategori başarıyla güncellendi";
            $status = "success";
        } else {
            $message = "Kategori güncellenirken hata oluştu";
            $status = "error";
        }

        return redirect('category/create')
            ->with('message', $message)
            ->with('status', $status);
    }

    public function delete($uuid)
    {
        $delete = Categories::where('uuid', $uuid)->delete();

        return Response()->json($delete ? true : false);
    }

    private function checkCategory($name, $uuid = null)
    {
        $count = Categories::where('name', $name);
        if ($uuid) {
            $count = $count->where('uuid', '!=', $uuid);
        }
        return $count->count();
    }
}
