<?php

namespace App\Http\Controllers;

use App\Models\IdmDesa;
use Illuminate\Http\Request;

class IdmPublicController extends Controller
{
    public function index()
    {
        $latestIdm = IdmDesa::published()->orderBy('tahun', 'desc')->first();
        $allIdmData = IdmDesa::published()->orderBy('tahun', 'desc')->get();
        
        $years = $allIdmData->pluck('tahun')->toArray();
        $scores = $allIdmData->pluck('skor_idm')->map(function($score) {
            return number_format($score, 3);
        })->toArray();

        // Progress calculation
        $progress = null;
        if ($allIdmData->count() >= 2) {
            $current = $allIdmData->first();
            $previous = $allIdmData->skip(1)->first();
            $progress = $current->skor_idm - $previous->skor_idm;
        }

        return view('public.idm.index', compact('latestIdm', 'allIdmData', 'years', 'scores', 'progress'));
    }

    public function indexByYear($tahun)
    {
        $selectedIdm = IdmDesa::published()->where('tahun', $tahun)->firstOrFail();
        $allIdmData = IdmDesa::published()->orderBy('tahun', 'desc')->get();
        
        $years = $allIdmData->pluck('tahun')->toArray();
        $scores = $allIdmData->pluck('skor_idm')->map(function($score) {
            return number_format($score, 3);
        })->toArray();

        // Progress calculation for selected year
        $progress = null;
        $previousIdm = IdmDesa::published()
            ->where('tahun', '<', $tahun)
            ->orderBy('tahun', 'desc')
            ->first();
            
        if ($previousIdm) {
            $progress = $selectedIdm->skor_idm - $previousIdm->skor_idm;
        }

        return view('public.idm.index', [
            'latestIdm' => $selectedIdm,
            'allIdmData' => $allIdmData,
            'years' => $years,
            'scores' => $scores,
            'progress' => $progress,
            'selectedYear' => $tahun
        ]);
    }

    public function detail($tahun)
    {
        $idm = IdmDesa::published()->where('tahun', $tahun)->firstOrFail();
        
        // Get previous year data
        $previousYear = IdmDesa::published()
            ->where('tahun', '<', $tahun)
            ->orderBy('tahun', 'desc')
            ->first();
            
        // Get next year data
        $nextYear = IdmDesa::published()
            ->where('tahun', '>', $tahun)
            ->orderBy('tahun', 'asc')
            ->first();
        
        // Get all data for comparison chart
        $comparisionData = IdmDesa::published()->orderBy('tahun', 'asc')->get();

        return view('public.idm.detail', compact('idm', 'previousYear', 'nextYear', 'comparisionData'));
    }

    public function api()
    {
        $latestIdm = IdmDesa::published()->latest()->first();
        
        if (!$latestIdm) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data IDM tidak tersedia'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => [
                'tahun' => $latestIdm->tahun,
                'skor_idm' => number_format($latestIdm->skor_idm, 3),
                'status_idm' => $latestIdm->status_idm,
                'status_color' => $latestIdm->status_color,
                'progress_percentage' => $latestIdm->progress_percentage,
                'komponen' => [
                    'iks' => [
                        'skor' => number_format($latestIdm->skor_iks, 3),
                        'nama' => 'Indeks Ketahanan Sosial'
                    ],
                    'ike' => [
                        'skor' => number_format($latestIdm->skor_ike, 3),
                        'nama' => 'Indeks Ketahanan Ekonomi'
                    ],
                    'ikl' => [
                        'skor' => number_format($latestIdm->skor_ikl, 3),
                        'nama' => 'Indeks Ketahanan Lingkungan'
                    ]
                ],
                'updated_at' => $latestIdm->updated_at->format('d/m/Y H:i')
            ]
        ]);
    }
}
