<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class ImgController extends Controller
{
    public function show($id)
    {
        // Etkinliği al
        $etkinlik = DB::table('etkinlikler')->where('id', $id)->first();

        if ($etkinlik && $etkinlik->img) {
            // Resmi döndür ve Content-Type belirt
            return response($etkinlik->img)
                ->header('Content-Type', 'image/jpeg'); // Format JPEG ise, değiştirilebilir
        }

        return response('Resim bulunamadı.', 404);
    }
}
