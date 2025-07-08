<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Jamaah;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class JamaahController extends Controller
{

    public function cetak(Request $request)
    {
        $query = Jamaah::query();
        $filter = [];

        if ($request->filled('search')) {
            $filter[] = 'Nama mengandung "' . $request->search . '"';
        }
        if ($request->filled('kelompok')) {
            $filter[] = ' ' . $request->kelompok;
        }
        if ($request->filled('alamat')) {
            $filter[] = 'Alamat ' . $request->alamat;
        }

        $judulFilter = count($filter) > 0 ? implode(', ', $filter) : 'Keseluruhan';


        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('alamat', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('kelompok')) {
            $query->where('kelompok', $request->kelompok);
        }

        if ($request->filled('alamat')) {
            $query->where('alamat', $request->alamat);
        }

        $jamaahs = $query->orderBy('nama')->get();
        $jumlahJamaah = $jamaahs->count();

        if ($request->get('export') === 'pdf') {
            $pdf = Pdf::loadView('pages.jamaah.cetak', [
                'jamaahs' => $jamaahs,
                'jumlahJamaah' => $jumlahJamaah,
                'request' => $request,
                'judulFilter' => $judulFilter
            ]);
            return $pdf->download('Laporan Data Jamaah.pdf');
        }

        return view('pages.jamaah.cetak', compact('jamaahs', 'jumlahJamaah', 'judulFilter'));

    }

    public function index(Request $request)
    {
        $query = Jamaah::query();

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('alamat', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('kelompok')) {
            $query->where('kelompok', $request->kelompok);
        }

        if ($request->filled('alamat')) {
            $query->where('alamat', $request->alamat);
        }

        $jamaahs = $query->orderBy('nama')->paginate(10)->withQueryString();
        $jumlahJamaah = $query->count();

        return view('jamaah', compact('jamaahs', 'jumlahJamaah'), ['title'=> 'Data Jamaah']);
    }

    public function create()
    {
        return view('pages.jamaah.create',['title'=> 'Tambah Data Jamaah']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255|unique:jamaahs,nama',
            'alamat' => 'required|string|max:255',
            'kelompok' => 'required|in:Kelompok 1,Kelompok 2,Kelompok 3,Kelompok 4',
        ]);

        $tanggal = Carbon::now();

        $jumlahPerBulan = Jamaah::whereYear('tanggal', $tanggal->year)
            ->whereMonth('tanggal', $tanggal->month)
            ->count() + 1;

        Jamaah::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'kelompok' => $request->kelompok,
            'jml_jamaah' => $jumlahPerBulan,
            'tanggal' => $tanggal->toDateString(),
        ]);

        return redirect()->route('jamaah.index')->with('success', 'Data jamaah berhasil ditambahkan.');
    }

    public function show(Jamaah $jamaah)
    {
        return view('jamaah.show', compact('jamaah'));
    }

    public function edit(Jamaah $jamaah)
    {
        return view('pages.jamaah.edit', compact('jamaah'),['title'=> 'Edit Data Jamaah']);
    }

    public function update(Request $request, Jamaah $jamaah)
    {
        $request->validate([
            'nama' => 'required|string|max:255|unique:jamaahs,nama,' . $jamaah->id,
            'alamat' => 'required|string|max:255',
            'kelompok' => 'required|in:Kelompok 1,Kelompok 2,Kelompok 3,Kelompok 4',
        ]);

        $jamaah->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'kelompok' => $request->kelompok,
            'tanggal' => Carbon::now()->toDateString(),
        ]);

        return redirect()->route('jamaah.index')->with('success', 'Data jamaah berhasil diupdate.');
    }

    public function destroy(Jamaah $jamaah)
    {
        $jamaah->delete();

        return redirect()->route('jamaah.index')->with('success', 'Data jamaah berhasil dihapus.');
    }


}
