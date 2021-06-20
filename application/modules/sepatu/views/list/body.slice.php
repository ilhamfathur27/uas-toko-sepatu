<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>LIST SEPATU</h2>
    </div>
    <div class="card-body">
        <table id="tableList" class="table table-striped" master-url="{{ base_url('sepatu/edit') }}" api-delete="{{ $api_delete }}" api-list="{{ $api_list }}">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col" onclick="getList()">Nama</th>
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
                            <button type="button" onclick="deleteData(this)" class="btn btn-sm btn-danger" primary-key="{{ $sepatu['id_sepatu'] }}">DELETE</button>
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
<script>
function deleteData(myNode){
    myNode = $(myNode);
    const primaryKey = myNode.attr("primary-key");
    const apiDelete = $("#tableList").attr("api-delete");

    $.ajax({
        type          : "GET",
        url           : apiDelete+"/"+primaryKey,
        dataType      : "JSON",
        success       : function(response){
            if (response.status) {
                toastr.info("DATA BERHASIL DIREFRESH");
                getList();
            } else {
                toastr.warning(response.message);
            }
        },
        error         : function(response){
            toastr.error('Maaf, terjadi kesalhan, silahkan cek konsol anda');
        }
    });
}

function getList(){
    const myTable = $("#tableList");
    const apiList = myTable.attr("api-list");
    const masterUrl = myTable.attr("master-url");

    let formData = {
        limit: 20,
        offset: 0,
    };

    $.ajax({
        type        : "GET",
        url         : apiList,
        data        : formData,
        dataType    : "JSON",
        success     : function(response){
            if (response.status) {
                const listData = response.result.datas;
                toastr.info(response.message);
                myTable.find("tbody").html("");
                listData.forEach((item, index) => {
                    myTable.find("tbody").append(`
                        <tr>
                            <td scope="row">${index + 1}</td>
                            <td>${ item.nama }</td>
                            <td>${ item.harga }</td>
                            <td>${ item.stok }</td>
                            <td>
                                <a href="${masterUrl}/${item.id_sepatu}.html" class="btn btn-sm btn-primary">EDIT</a>
                                <button type="button" onclick="deleteData(this)" class="btn btn-sm btn-danger" primary-key="${ item.id_sepatu }">DELETE</button>
                            </td>
                        </tr>
                    `);
                })
            } else {
                toastr.warning(response.message);
            }
        },
        error       : function(response){
            toastr.error('Maaf, terjadi kesalhan, silahkan cek konsol anda');
        }
    });
}
</script>