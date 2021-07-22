<table>
    <thead>
    <tr>
        <th>NO</th>
        <th>Nama</th>
        <th>Email</th>
        <th>L/P</th>
        <th>Panggilan</th>
        <th>Hafalan Terakhir</th>
        <th>NIK</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th>No HP</th>
        <th>Alamat</th>
        <th>Keterangan</th>
        <th>Orangtua / WAli</th>
        <th>Hubungan</th>
        <th>No HP Ortu</th>
        <th>Alamat Ortu</th>
    </tr>
    </thead>
    <tbody>
    @foreach($santri as $data)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $data->user->name }}</td>
            <td>{{ $data->user->email }}</td>
            <td>{{ $data->santri_jk }}</td>
            <td>{{ $data->santri_panggil }}</td>
            <td>{{ $data->suratakhir->surat_nama }}</td>
            <td>'{{ $data->santri_nik }}</td>
            <td>{{ $data->santri_lahir }}</td>
            <td>{{ $data->santri_tgl }}</td>
            <td>{{ $data->santri_no }}</td>
            <td>{{ $data->santri_alamat }}</td>
            <td>{{ $data->santri_ket }}</td>
            <td>{{ $data->santri_ortu }}</td>
            <td>{{ $data->santri_ortu_hubungan }}</td>
            <td>{{ $data->santri_ortu_no }}</td>
            <td>{{ $data->santri_ortu_alamat }}</td>
        </tr>
    @endforeach
    </tbody>
</table>