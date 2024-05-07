<?php

namespace App\Http\Controllers;

use App\Models\MMaHasiswa;
use Illuminate\Http\Request;

class Mahasiswa extends Controller
{
    // inisialisasi pengambilan model
    protected $model;

    //  konstruktor
    function __construct()
    {
        // isi nilai variabel "$model"
        $this->model = new MMahasiswa();
    }

    function viewData()
    {
        // buat array data
        // $data = [
        //     "hasil1" => "Hasil pertama",
        //     "hasil2" => "Hasil kedua",
        //     "hasil3" => "Hasil ketiga",
        // ];

        // $hasil = "Hello World!";

        // // hasil respons
        // // return response(["result" => $hasil],http_response_code());

        // jika data mahasiswa tidak ada
        if(count($this->model->viewData()) == 0)
        {
            $data = [];
            $error = 1;
            $message = "Data tidak ditemukan!";
        }

        // jika data mahasiswa tersedia
        else
        {
            // ambil method "viewData" model "MMahasiswa"
            $data = $this->model->viewData();
            $error = 0;
            $message = "Data ditemukan.";
        }

        // mengambil method "viewData" dari model "MMahasiswa"
        $data = $this->model->viewData();

        return response(["result" => $data, "error" => $error, "message" => $message],http_response_code());
    }

    // buat fungsi untuk Tambah data
    function saveData(Request $req)
    {
        // ambil data npm
        $npm = $req->npm;

        // jika npm sudah ada
        if (count($this->model->checkSaveData($npm)) != 0) {
            $error = 1;
            $message = "Data Gagal Disimpan (NPM Sudah Terpakai !)";
        }

        // jika npm belum ada
        else {

            // ambil request
            $nama = $req->nama;
            $telepon = $req->telepon;
            $jurusan = $req->jurusan;



            // proses simpan data
            $this->model->saveData($npm, $nama, $telepon, $jurusan);

            $error = 0;
            $message = "Data Berhasil Disimpan";
        }

        return response(["error" => $error, "message" => $message], http_response_code());
    }


    // buat fungsi hapus data
    function deleteData($npm)
    {
        // cek apakah data mahasiswa (NPM) tersedia atau tidak pada model checkData
        if (count($this->model->checkData($npm)) == 1) {

            // panggil model "deleteData"
            $this->model->deleteData($npm);

            $error = 0;
            $message = "Data Berhasil Dihapus";
        }
        // jika data tidak tersedia
        else {
            $error = 0;
            $message = "Data Gagal Dihapus";
        }
        return response(["error" => $error, "message" => $message],http_response_code());
    }

    //buat fungsi edit data
    function editData($npm_lama, Request $req){

        //ambil data npm
        $npm = $req->npm;

 // cek apakah data mahasiswa (NPM) tersedia atau tidak pada model checkData
        if (count($this->model->checkEditData($npm_lama, $npm)) == 1) {

            $nama = $req->nama;
            $telepon = $req->telepon;
            $jurusan = $req->jurusan;

            // panggil model "updateData"
            $this->model->updateData($npm);

            $error = 0;
            $message = "Data Berhasil Diubah";
        }
        // jika data tidak tersedia
        else {
            $error = 1;
            $message = "Data Gagal Diubah (NPM Sudah Terpakai!)";
        }
        return response(["error" => $error, "message" => $message],http_response_code());

        //buat fungsi edit data
        function editData ($npm, $nama, $telepon, $jurusan, $npm_lama)
    }
        $this->whereRaw("TO_BASE64(npm) = '$npm_lama")->update([
            "npm" => $npm
            "nama" => $nama
            "telepon" => $telepon
            "jurusan" => $jurusan
        ]);
}
