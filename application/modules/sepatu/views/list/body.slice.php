<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>LIST SEPATU</h2>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Stok</th>
                    <th scope="col" width="200px">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $urutan = 1;
                @endphp
                @foreach($data_sepatu as $sepatu)
                    <tr>
                        <td scope="row">{{ $urutan }}</td>
                        <td>{{ $sepatu['nama'] }}</td>
                        <td>{{ $sepatu['harga'] }}</td>
                        <td>{{ $sepatu['stok'] }}</td>
                        <td>
                            <a href="{{ site_url("sepatu/edit/".$sepatu['id_sepatu']) }}" class="btn btn-sm btn-primary">EDIT</a>
                            <button type="button" class="btn btn-sm btn-danger" primary-key="{{ $sepatu['id_sepatu'] }}">DELETE</button>
                        </td>
                    </tr>
                    @php
                        $urutan++;
                    @endphp
                @endforeach
            </tbody>
        </table>
    </div>
</div>