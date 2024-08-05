<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $sidebarItems = [
            ['name' => 'Dashboard', 'link' => '/dashboard', 'icon' => 'fa-home'],
            [
                'name' => 'Pegawai', 'link' => '/pegawai', 'icon' => 'fa-users',
                'children' => [
                    ['name' => 'Data Pegawai', 'link' => '/pegawai/data', 'icon' => 'fa-user'],
                    ['name' => 'Jabatan', 'link' => '/pegawai/jabatan', 'icon' => 'fa-briefcase'],
                    ['name' => 'Shift', 'link' => '/dashboard/pegawai/jam-kerja', 'icon' => 'fa-clock'],
                    ['name' => 'Absensi', 'link' => '/pegawai/absensi', 'icon' => 'fa-calendar-check'],
                    ['name' => 'Lembur', 'link' => '/pegawai/lembur', 'icon' => 'fa-business-time'],
                    ['name' => 'Cuti', 'link' => '/pegawai/cuti', 'icon' => 'fa-plane-departure'],
                    ['name' => 'Rekap Absensi', 'link' => '/pegawai/rekap', 'icon' => 'fa-file-alt'],
                    ['name' => 'Dokumen Pegawai', 'link' => '/pegawai/dokumen', 'icon' => 'fa-file'],
                ]
            ],
            [
                'name' => 'Keuangan', 'link' => '/keuangan', 'icon' => 'fa-money-bill-wave',
                'children' => [
                    ['name' => 'Gaji Pegawai', 'link' => '/keuangan/gaji', 'icon' => 'fa-money-check'],
                    ['name' => 'Kasbon', 'link' => '/keuangan/kasbon', 'icon' => 'fa-hand-holding-usd'],
                    ['name' => 'Pengeluaran', 'link' => '/keuangan/pengeluaran', 'icon' => 'fa-wallet'],
                    ['name' => 'Pemasukan', 'link' => '/keuangan/pemasukan', 'icon' => 'fa-piggy-bank'],
                ]
            ],
            ['name' => 'Pengaturan', 'link' => '/pengaturan', 'icon' => 'fa-cog'],
        ];

        $path = $request->path();
        $segments = explode('/', $path);
        $breadcrumbs = [];

        // Breadcrumb untuk root dashboard
        $breadcrumbs[] = [
            'name' => 'Dashboard',
            'url' => url('/dashboard')
        ];

        // Breadcrumb untuk segmentasi setelah dashboard
        foreach (array_slice($segments, 1) as $key => $segment) {
            $url = '/dashboard/' . implode('/', array_slice($segments, 1, $key + 1));
            $breadcrumbs[] = [
                'name' => ucfirst($segment),
                'url' => url($url)
            ];
        }

        if ($request->ajax()) {
            return response()->json([
                'breadcrumbs' => $breadcrumbs,
                'sidebarItems' => $sidebarItems
            ]);
        }

        return view('dashboard.index', [
            'sidebarItems' => $sidebarItems,
            'breadcrumbs' => $breadcrumbs
        ])->with('title', 'Dashboard');
    }
}

