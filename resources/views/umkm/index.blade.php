{{-- resources/views/umkm/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Peta UMKM Banjarmasin')

@section('content')
    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h5 class="card-title mb-0">Data UMKM</h5>
                        <a href="{{ route('umkm.create') }}" class="btn btn-sm btn-primary">Create</a>
                    </div>
                    <p class="text-muted small mb-3">Klik marker di peta untuk detail UMKM.</p>

                    <table class="table table-sm table-hover align-middle">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th style="width:140px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($umkms as $u)
                                <tr>
                                    <td>{{ $u->nama_umkm }}</td>
                                    <td>{{ $u->kategori }}</td>
                                    <td>
                                        <a href="{{ route('umkm.edit', $u->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('umkm.destroy', $u->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Hapus data ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-muted">Belum ada data.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div id="map" class="rounded border" style="height: 600px;"></div>
        </div>
    </div>
@endsection

@push('styles')
    {{-- Leaflet CSS (CDN) --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
@endpush

@push('scripts')
    {{-- Leaflet JS (CDN) --}}
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const map = L.map('map').setView([-3.3166, 114.5900], 13); // Banjarmasin
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);

            const umkms = @json($umkms);

            umkms.forEach(u => {
                if (u.latitude && u.longitude) {
                    const marker = L.marker([u.latitude, u.longitude]).addTo(map);
                    const img = u.foto_url ?
                        `<img src="${u.foto_url}" width="120" style="margin-top:6px;border-radius:6px;">` :
                        '';
                    const popup = `
            <strong>${u.nama_umkm}</strong><br>
            Kategori: ${u.kategori ?? '-'}<br>
            Kontak: ${u.kontak ?? '-'}<br>
            <small>${u.alamat ?? ''}</small><br>
            ${img}
          `;
                    marker.bindPopup(popup);
                }
            });
        });
    </script>
@endpush