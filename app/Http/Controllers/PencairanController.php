<?php

namespace App\Http\Controllers;

use App\Models\KantorCabang;
use App\Models\Pencairan;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Exception;

class PencairanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pencairans = Pencairan::with('kantor_cabang', 'rekening')->get();
        // Mengambil semua data kantor cabang dengan relasi staff, rekening kantor cabang, transaksi, dan detail transaksi
        $kantorcabangs = KantorCabang::with('staff', 'staff.rekening', 'transaction', 'transaction.detailtransaction')->get();

        // Inisialisasi variabel untuk menyimpan total pendapatan dari semua kantor cabang pada hari ini
        $total_pendapatan_hari_ini = 0;

        // Melakukan perulangan untuk setiap kantor cabang
        foreach ($kantorcabangs as $kantorcabang) {
            // Menghitung total pendapatan kantor cabang hanya untuk hari ini
            $pendapatan_kantorcabang_hari_ini = Transaction::where('kantor_cabang_id', $kantorcabang->id)
                ->where('transaction_status', 'lunas')
                ->whereDate('created_at', Carbon::today())
                ->sum('total_price') - Transaction::where('kantor_cabang_id', $kantorcabang->id)
                ->where('transaction_status', 'lunas')
                ->whereDate('created_at', Carbon::today())
                ->sum('total_price');

            // Menambahkan total pendapatan kantor cabang ke total pendapatan dari semua kantor cabang pada hari ini
            $total_pendapatan_hari_ini += $pendapatan_kantorcabang_hari_ini;

            // Menambahkan total pendapatan kantor cabang pada hari ini ke dalam objek kantor cabang
            $kantorcabangs->total_pendapatan_hari_ini = $pendapatan_kantorcabang_hari_ini;
        }

        // Mengirimkan data ke view
        return view('admin.pencairan.index', compact('kantorcabangs', 'total_pendapatan_hari_ini', 'pencairans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $now = Carbon::now()->format('H:i');

        $kantorcabang = KantorCabang::with('staff', 'staff.rekening', 'transaction', 'transaction.detailtransaction')->findOrFail($id);

        // inisialisasi variabel untuk menyimpan total pendapatan kantor cabang pada hari ini
        $total_pendapatan_hari_ini = 0;

        // menghitung total pendapatan kantor cabang hanya untuk hari ini
        $pendapatan_kantorcabang_hari_ini = Transaction::where("kantor_cabang_id", $id)
            ->where('transaction_status', 'lunas')
            ->whereDate('created_at', Carbon::today())
            ->sum('total_price') - Transaction::where('kantor_cabang_id', $kantorcabang->id)
            ->where('transaction_status', 'lunas')
            ->whereDate('created_at', Carbon::today())
            ->sum('total_price');

        // menambahkan total pendapatan kantor cabang ke total pendapatan dari semua kantor cabang pada hari ini
        $total_pendapatan_hari_ini += $pendapatan_kantorcabang_hari_ini;

        // menambahkan total pendapatan kantor cabang pada hari ini ke dalam objek kantor cabang
        $kantorcabang->total_pendapatan_hari_ini = $pendapatan_kantorcabang_hari_ini;

        return view('admin.pencairan.add', compact('kantorcabang', 'total_pendapatan_hari_ini', 'now'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            // "staff_id" => "required",
            "kantor_cabang_id" => "string",
            "rekening_id" => "required",
            "status" => "required",
            "total" => "required",
            "image" => "required|mimes:jpg,jpeg,png|max:5120",
        ]);

        // menyimpan file image ke dalam storage
        $saveImage['image'] = Storage::putFile('public/image', $request->file('image'));

        try {
            // membuat pencairan baru
            Pencairan::create([
                // 'staff_id' => $validated['staff_id'],
                'kantor_cabang_id' => $validated['kantor_cabang_id'],
                'rekening_id' => $validated['rekening_id'],
                'status' => $validated['status'],
                'total' => $validated['total'],
                'image' => $saveImage['image'],
            ]);

            return redirect('/admin/pencairan')->with('success', 'Pencairan pendapatan berhasil dibuat!');
        } catch (\Exception $e) {
            // Tangani error dan tampilkan pesan kesalahan pada halaman yang sama
            return back()->withInput()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data. Periksa kembali data yang dimasukkan.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pencairan = Pencairan::with('kantor_cabang', 'rekening')->findOrFail($id);
        return view('admin.pencairan.show', compact('pencairan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pencairan = Pencairan::with('kantor_cabang', 'rekening')->findOrFail($id);
        return view('admin.pencairan.show', compact('pencairan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pencairan = Pencairan::with('kantor_cabang', 'rekening')->findOrFail($id);
        // validasi form
        $validated = $request->validate([
            "status" => "required",
            "image" => "required|mimes:jpg,jpeg,png|max:5120",
        ]);

        // Cek apakah ada unggahan gambar baru
        if ($request->hasFile('image')) {
            // Hapus foto yang lama
            Storage::delete($pencairan->image);

            // Simpan foto yang baru
            $newImage = ['image' => Storage::putFile('public/image', $request->file('image'))];
        } else {
            // Jika tidak ada gambar baru, gunakan gambar yang sudah ada
            $newImage = ['image' => $pencairan->image];
        }

        // Update data di database
        try {
            $pencairan->update([
                'status' => $validated['status'],
                'image' => $newImage['image'],
            ]);

            return redirect('/admin/pencairan')->with('success', 'Pencairan pendapatan berhasil diperbarui!');
        } catch (Exception $e) {
            // Tangani error dan tampilkan pesan kesalahan pada halaman yang sama
            return back()->withInput()->withErrors(['error' => 'Terjadi kesalahan saat memperbarui data. Periksa kembali data yang dimasukkan']);
        }
    }
}
