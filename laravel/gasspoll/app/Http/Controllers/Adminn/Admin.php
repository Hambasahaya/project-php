<?php

namespace App\Http\Controllers\Adminn;

use Illuminate\Http\Request;
use App\Models\Produks;
use App\Models\kategoriProduk;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Detail_transaksi;
use App\Models\Galeri_Produk;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Storage;

class Admin extends Controller
{
    public function Product()
    {
        $data = [
            "prd_data" =>  Produks::with('kategori')->get(),
            "kategori" => kategoriProduk::all()
        ];
        return view('pages.Admin.produk', $data);
    }
    public function Kategori()
    {
        $data = [
            "kategori" => kategoriProduk::all()
        ];
        return view('pages.Admin.Kategori', $data);
    }
    public function Pembelian()
    {
        $transactions = Detail_transaksi::get();

        $data = [
            'detail_transaksi' => $transactions
        ];
        return view('pages.Admin.Penjualan', $data);
    }
    public function Dtran(Request $request)
    {
        $transactions = Transaksi::with("Produk", "User")->where("no_transaksi", $request->no_transaksi)->get();

        $data = [
            'detail_transaksi' => $transactions
        ];
        return view('pages.Admin.Detail_penjualan', $data);
    }
    // produk Crud

    public function Updtprd(Request $request)
    {
        $data = [
            "data_update" =>  Produks::with('kategori')->where("id_produk", $request->id_produk)->get(),
            "kategori" => kategoriProduk::all()
        ];
        return view('pages.Admin.UpdatePrd', $data);
    }
    public function AddUpdteproduk(Request $request)
    {
        $produk = '';
        if (isset($request->id_produk)) {
            $produk = Produks::findorFail($request->id_produk);
            $galeri = Galeri_Produk::where("id_produk", $request->id_produk)->get();
            if ($galeri) {
                foreach ($galeri as $url_foto) {
                    Storage::delete('public/imgPrd/' . $url_foto->nama_foto);
                    Galeri_Produk::where("nama_foto", $url_foto->nama_foto)->delete();
                }
            }
        } else {
            $produk = new Produks();
        }
        $request->validate([
            'nama_produk' => 'required|string|max:255|min:5',
            'stock' => 'required|integer|min:1',
            'berat' => 'required|integer|min:1',
            'harga' => 'required|integer|min:1',
            'deskripsi' => 'required|string|max:255|min:5',
            'kategori' => 'required|integer',
            'foto' => 'required',
            'foto.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4048'
        ]);
        $namaGambarUtama = '';
        if ($request->hasFile('foto_utama')) {
            $file = $request->file('foto_utama');
            $namaGambarUtama = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/imgPrd', $namaGambarUtama);
        }
        $produk->nama_produk = $request->nama_produk;
        $produk->stok = $request->stock;
        $produk->berat = $request->berat;
        $produk->harga = $request->harga;
        $produk->deskirpsi = $request->deskripsi;
        $produk->kategori_produk = $request->kategori;
        $produk->foto = $namaGambarUtama;
        if ($produk->save()) {
            if ($request->hasFile('foto')) {
                foreach ($request->file('foto') as $file) {
                    $namaGambar = time() . '_' . $file->getClientOriginalName();
                    $file->storeAs('public/imgPrd', $namaGambar);

                    Galeri_Produk::create([
                        'id_produk' => $produk->id_produk,
                        'nama_foto' => $namaGambar,
                    ]);
                }
            }
            return back()->with('success', 'Produk dan gambar berhasil diunggah');
        } else {
            return back()->with('error', 'Produk gagal diunggah');
        }
    }




    public function Deleteproduk(Request $request)
    {
        $galeriDeleted = Galeri_Produk::where('id_produk', $request->id_produk)->delete();
        if ($galeriDeleted !== false) {
            $produkDeleted = Produks::where('id_produk', $request->id_produk)->delete();
            if ($produkDeleted) {
                return back()->with('success', 'Berhasil hapus data produk');
            } else {
                return back()->with('error', 'Gagal hapus data produk');
            }
        } else {
            return back()->with('error', 'Gagal hapus gambar produk terkait');
        }
    }


    //kategori crud
    public function addKategori(Request $request)
    {
        $kategori = new KategoriProduk();
        $request->validate([
            'kategori' => 'required|string|max:255|min:5',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4048',
        ]);

        $namaGambar = '';
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $namaGambar = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/imgKate', $namaGambar);
        }

        $kategori->kategori = $request->kategori;
        $kategori->foto = $namaGambar;

        if ($kategori->save()) {
            return back()->with('success', 'Kategori dan gambar berhasil diunggah');
        } else {
            return back()->with('error', 'Kategori gagal diunggah');
        }
    }
    public function Updttk(Request $request)
    {
        $kategori = KategoriProduk::findorFail($request->id_kategori);
        $request->validate([
            'kategori' => 'required|string|max:255|min:5',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4048',
        ]);

        $namaGambar = '';
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $namaGambar = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/imgKate', $namaGambar);
        }

        $kategori->kategori = $request->kategori;
        $kategori->foto = $namaGambar;

        if ($kategori->save()) {
            return back()->with('success', 'Kategori dan gambar berhasil diunggah');
        } else {
            return back()->with('error', 'Kategori gagal diunggah');
        }
    }

    public function Updtkate(Request $request)
    {
        $data = [
            "data_update" =>  kategoriProduk::where("id_kategori", $request->id_kategori)->get(),
        ];
        return view('pages.Admin.Updkate', $data);
    }

    public function Deletekategori(Request $request)
    {
        $kategori = kategoriProduk::where('id_kategori', $request->id_kategori)->delete();
        if ($kategori) {
            return back()->with('success', 'Berhasil hapus data produk');
        } else {
            return back()->with('error', 'Gagal hapus data produk');
        }
    }
}
