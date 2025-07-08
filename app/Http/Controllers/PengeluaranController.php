<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengeluaran;
use Illuminate\Support\Facades\Auth;
 use Barryvdh\DomPDF\Facade\Pdf;

class PengeluaranController extends Controller
{

        public function cetak(Request $request)
        {
            $query = Pengeluaran::query();
            $filters = [];

            if ($request->filled('pengeluaran')) {
                $query->where('pengeluaran', 'like', '%' . $request->pengeluaran . '%');
                $filters[] = 'Pengeluaran mengandung "' . $request->pengeluaran . '"';
            }

           if ($request->filled('bulan')) {
                $bulan = (int) $request->bulan; // Pastikan bentuk angka 1-12
                $query->whereMonth('tanggal', $bulan);

                // Konversi angka ke nama bulan (Indonesia)
                $namaBulan = \Carbon\Carbon::create()->month($bulan)->translatedFormat('F');

                $filters[] = 'Bulan ' . $namaBulan;
            }



            if ($request->filled('tahun')) {
                $query->whereYear('tanggal', $request->tahun);
                $filters[] = 'Tahun ' . $request->tahun;
            }

            $judulFilter = count($filters) ? implode(', ', $filters) : 'Semua Data';

            $pengeluarans = $query->orderBy('tanggal', 'desc')->get();

            if ($request->get('export') === 'pdf') {
                $pdf = Pdf::loadView('pages.pengeluaran.cetak', [
                    'pengeluarans' => $pengeluarans,
                    'judulFilter' => $judulFilter
                ]);
                return $pdf->download('Laporan Pengeluaran.pdf');
            }

            return view('pages.pengeluaran.cetak', compact('pengeluarans', 'judulFilter'));
        }

    // Tampilkan semua data pengeluaran
    public function index(Request $request)
    {
        $query = Pengeluaran::query();

        if ($request->filled('pengeluaran')) {
            $query->where('pengeluaran', 'like', '%' . $request->pengeluaran . '%');
        }

        if ($request->filled('bulan')) {
            $query->whereMonth('tanggal', $request->bulan);
        }

        if ($request->filled('tahun')) {
            $query->whereYear('tanggal', $request->tahun);
        }

        $jumlahPengeluaran = $query->sum('jml_dana');

        $pengeluarans = $query->orderBy('tanggal', 'desc')->paginate(10)->withQueryString();

        return view('pengeluaran', compact('pengeluarans', 'jumlahPengeluaran'),['title' => 'Pengeluaran']);

    }


    // Tampilkan form untuk tambah data
    public function create()
    {
        return view('pages.pengeluaran.create');
    }


    public function show($id)
    {
        $pengeluaran = Pengeluaran::with(['createdBy', 'updatedBy'])->findOrFail($id);
        return view('pages.pengeluaran.show', compact('pengeluaran'));
    }


    // Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'pengeluaran' => 'required|string|max:255',
            'jml_dana' => 'required|min:0',
            'keterangan' => 'nullable|string',
            'tanggal' => 'required|date',
        ]);

        // Hapus titik pada input jml_dana agar tersimpan sebagai angka
        $jml_dana = str_replace('.', '', $request->jml_dana);

        // Buat data array untuk disimpan
        $data = $request->all();
        $data = $request->all();
        $data['jml_dana'] = $jml_dana;
        $data['jml_pengeluaran'] = $jml_dana;
        $data['created_by'] = Auth::id();
        $data['updated_by'] = Auth::id();


        Pengeluaran::create($data);

        return redirect()->route('pengeluaran.index')->with('success', 'Data pengeluaran berhasil ditambahkan.');
    }



    // Tampilkan form edit
    public function edit($id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id);
        return view('pages.pengeluaran.edit', compact('pengeluaran'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $request->validate([
            'pengeluaran' => 'required|string|max:255',
            'jml_dana' => 'required|min:0',
            'keterangan' => 'nullable|string',
            'tanggal' => 'required|date',
        ]);

        $pengeluaran = Pengeluaran::findOrFail($id);

        // Hilangkan titik pada input jml_dana supaya disimpan sebagai angka
        $jml_dana = str_replace('.', '', $request->jml_dana);

        // Ambil data yang ingin diupdate dengan field yang diizinkan
        $data = [
            'pengeluaran' => $request->pengeluaran,
            'jml_dana' => $jml_dana,
            'jml_pengeluaran' => $jml_dana,
            'keterangan' => $request->keterangan,
            'tanggal' => $request->tanggal,
        ];
        $data['updated_by'] = Auth::id();


        // Update data pengeluaran
        $pengeluaran->update($data);

        return redirect()->route('pengeluaran.index')->with('success', 'Data pengeluaran berhasil diperbarui.');
    }


    // Hapus data
    public function destroy($id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id);
        $pengeluaran->delete();

        return redirect()->route('pengeluaran.index')->with('success', 'Data pengeluaran berhasil dihapus.');
    }
}
