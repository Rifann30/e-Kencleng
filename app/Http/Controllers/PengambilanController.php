<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengambilan;
use App\Models\Jamaah;
use App\Models\PengambilanTemp;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use Carbon\Carbon;

class PengambilanController extends Controller
{



        public function toggleTemp(Request $request)
        {
            $userId = Auth::id();
            $jamaahId = $request->jamaah_id;

            $existing = PengambilanTemp::where('user_id', $userId)
                ->where('jamaah_id', $jamaahId)
                ->first();

            if ($existing) {
                $existing->delete();
            } else {
                PengambilanTemp::create([
                    'user_id' => $userId,
                    'jamaah_id' => $jamaahId,
                ]);
            }

            return response()->json(['status' => 'ok']);
        }

        public function clearKelompokTemp(Request $request)
        {
            $userId = Auth::id();
            $jamaahIds = $request->jamaah_ids ?? [];

            PengambilanTemp::where('user_id', $userId)
                ->whereIn('jamaah_id', $jamaahIds)
                ->delete();

            return response()->json(['status' => 'cleared']);
        }



    public function index()
    {
        // Ambil data dan urutkan berdasarkan periode terkini (format "Bulan Tahun")
        $bulanMap = daftarBulan(); // dari helper
        $bulanMap = array_flip($bulanMap); // ubah jadi ['Januari' => 1, dst]

        $all = Pengambilan::all()->sortByDesc(function ($item) use ($bulanMap) {
            try {
                [$namaBulan, $tahun] = explode(' ', $item->periode);
                $bulanAngka = $bulanMap[$namaBulan] ?? 1;
                return Carbon::createFromDate($tahun, $bulanAngka, 1);
            } catch (\Exception $e) {
                return now()->subYears(10); // fallback agar error tidak crash
            }
        })->values();

        // Pagination manual dari collection
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 10;
        $currentItems = $all->slice(($currentPage - 1) * $perPage, $perPage);
        $pengambilans = new LengthAwarePaginator($currentItems, $all->count(), $perPage, $currentPage, [
            'path' => request()->url(),
            'query' => request()->query(),
        ]);

        // Data kelompok jamaah
        $kelompoks = Jamaah::all()
            ->groupBy('kelompok')
            ->map(function ($group) {
                return $group->map(function ($jamaah) {
                    return [
                        'id' => $jamaah->id,
                        'nama' => $jamaah->nama,
                        'alamat' => $jamaah->alamat,
                    ];
                });
            });

        $jumlahPengambilan = Pengambilan::sum('jml_dana');
        $dataBulan = daftarBulan();

        return view('pengambilan', compact(
            'pengambilans',
            'kelompoks',
            'jumlahPengambilan',
            'dataBulan'
        ), ['title' => 'Pengambilan']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'jml_dana' => 'required|min:0',
            'jml_jamaah' => 'required|integer|min:0',
            'periode' => 'required|string|max:255',
            'jamaah_id' => 'array',
            'jamaah_id.*' => 'exists:jamaahs,id',
        ]);

        $jml_dana = (int) str_replace('.', '', $request->jml_dana);
        $totalPengambilanSebelumnya = Pengambilan::sum('jml_dana');
        $totalBaru = $totalPengambilanSebelumnya + $jml_dana;

        $pengambilan = Pengambilan::create([
            'jml_dana' => $jml_dana,
            'jml_pengambilan' => $totalBaru,
            'jml_jamaah' => $request->jml_jamaah,
            'periode' => $request->periode,
            'tanggal' => now(),
            'created_by' => Auth::id(),
            'updated_by' => Auth::id(),
        ]);

        if ($request->has('jamaah_id')) {
            $pengambilan->jamaah()->attach($request->jamaah_id);
        }

        return redirect()->route('pengambilan.index')->with('success', 'Data pengambilan berhasil ditambahkan.');
    }

    public function show($id)
    {
        $pengambilan = Pengambilan::findOrFail($id);
        return view('pages.pengambilan.show', compact('pengambilan'));
    }

    public function edit($id)
    {
        $pengambilan = Pengambilan::findOrFail($id);
        $jamaahs = Jamaah::all();
        $kelompoks = $jamaahs->groupBy('kelompok');

        return view('pages.pengambilan.edit', compact('pengambilan', 'kelompoks'), ['title' => 'Edit Data Pengambilan']);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jml_dana' => 'required|min:0',
            'jml_jamaah' => 'required|integer|min:0',
            'periode' => 'required|string|max:255',
            'jamaah_id' => 'array',
            'jamaah_id.*' => 'exists:jamaahs,id',
        ]);

        $pengambilan = Pengambilan::findOrFail($id);
        $jml_dana_baru = (int) str_replace('.', '', $request->jml_dana);
        $jml_dana_lama = $pengambilan->jml_dana;

        $totalPengambilanSebelumnya = Pengambilan::sum('jml_dana');
        $totalBaru = $totalPengambilanSebelumnya - $jml_dana_lama + $jml_dana_baru;

        $pengambilan->update([
            'jml_dana' => $jml_dana_baru,
            'jml_pengambilan' => $totalBaru,
            'jml_jamaah' => $request->jml_jamaah,
            'periode' => $request->periode,
            'tanggal' => now(),
            'updated_by' => Auth::id()
        ]);

        $pengambilan->jamaah()->sync($request->jamaah_id);

        return redirect()->route('pengambilan.index')->with('success', 'Data pengambilan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pengambilan = Pengambilan::findOrFail($id);
        $pengambilan->delete();

        return redirect()->route('pengambilan.index')->with('success', 'Data pengambilan berhasil dihapus.');
    }
}






