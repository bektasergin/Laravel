<?php

namespace App\Http\Controllers;

use App\Models\Oyuncak;
use Illuminate\Http\Request;

class OyuncaklarController extends Controller
{


    public function oyuncakEkle(Request $request)
    {
        $isim = $request->input('isim');
        $fiyat = $request->input('fiyat');

        if (empty($isim) || empty($fiyat)) {
            return redirect('/oyuncakEkle')->with('warning', 'Oyuncak ismi ve fiyatı boş olamaz!');
        }

        $toy = new Oyuncak();
        $toy->isim = $isim;
        $toy->fiyat = $fiyat;

        if ($toy->save()) {
            return redirect('/oyuncakEkle')->with('success', 'Oyuncak başarıyla eklendi!');
        } else {
            return redirect('/oyuncakEkle')->with('error', 'Oyuncak eklenemedi!');
        }
    }


    public function tumOyuncaklar()
    {
        $oyuncaklar = Oyuncak::all();
        return view('welcome', ['oyuncaklar' => $oyuncaklar]);
    }

    public function tumOyuncaklar2()
    {
        // Verilerin doğru şekilde alındığından emin olun
        $oyuncaklar = Oyuncak::all();

        // Eğer veri varsa, view'e aktarıyoruz
        return view('oyuncakGuncelle', ['oyuncaklar' => $oyuncaklar]);
    }



    public function oyuncakSil(Request $request)
    {
        $id = $request->input('id');
        $toy = Oyuncak::find($id);

        if (empty($id)) {
            return redirect('/oyuncakEkle')->with('warning', 'ID boş olamaz!');
        }

        if ($toy) {
            $toy->delete();
            return redirect('/oyuncakSil')->with('success', 'Oyuncak Silindi');
        } else {
            return redirect('/oyuncakSil')->with('error', 'Oyuncak Bulunamadı');
        }
    }



    public function oyuncakGuncelle(Request $request)
    {
        $isim = $request->input('isim');
        $yeniIsim = $request->input('yeniIsim');
        $yeniFiyat = $request->input('fiyat');

        if (empty($isim) || empty($yeniIsim) || empty($yeniFiyat)) {
            return redirect('/oyuncakEkle')->with('warning', 'Oyuncağın Bilgileri Boş Olamaz!');
        }

        $toy = Oyuncak::where("isim", $isim)->first();

        if ($toy) {
            $toy->isim = $yeniIsim;
            $toy->fiyat = $yeniFiyat;
            $toy->save();
            return redirect('/oyuncakGuncelle')->with('success', 'Oyuncak Güncellendi');
        } else {
            return redirect('/oyuncakGuncelle')->with('error', 'Oyuncak Güncellenemedi!');
        }
    }

    public function oyuncakEkleYonlendir()
    {
        return view('oyuncakEkle');
    }

    public function oyuncakSilYonlendir()
    {
        return view('oyuncakSil');
    }

    public function oyuncakGuncelleYonlendir()
    {
        return view('oyuncakGuncelle');
    }
}
