<table>
    <thead>
    <tr>
        <th>NO</th>
        <th>Nama</th>
        <th>Email</th>
        <th>L/P</th>
        <th>Hafalan</th>
        <th>No HP/WA</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th>Alamat</th>
        <th>Keterangan</th>
    </tr>
    </thead>
    <tbody>
    @foreach($guru as $data)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $data->user->name }}</td>
            <td>{{ $data->user->email }}</td>
            <td>{{ $data->guru_jk }}</td>
            <td>{{ $data->suratakhir->surat_nama }}</td>
            <td>{{ $data->guru_no }}</td>
            <td>{{ $data->guru_lahir }}</td>
            <td>{{ $data->guru_tgl }}</td>
            <td>{{ $data->guru_alamat }}</td>
            <td>{{ $data->guru_ket }}</td>
        </tr>
    @endforeach
    </tbody>
</table>