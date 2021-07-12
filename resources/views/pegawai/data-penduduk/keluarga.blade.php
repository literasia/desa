@extends('layouts.pegawai')

{{-- config 1 --}}
@section('title', 'Data Penduduk | Keluarga')
@section('title-2', 'Keluarga')
@section('title-3', 'Keluarga')

@section('describ')
Ini adalah halaman Keluarga untuk pegawai
@endsection

@section('icon-l', 'fa fa-users')
@section('icon-r', 'icon-home')

@section('link')
    {{ route('pegawai.data-penduduk.keluarga') }}
@endsection

{{-- main content --}}
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card glass-card d-flex justify-content-center align-items-center p-2">
                <div class=" col-xl-12 card shadow mb-0 p-0">
                    <div class="card-body">
                        <div class="card-block p-2">
                            <div class="dt-responsive table-responsive">
                                <table id="order-table" class="table table-striped nowrap shadow-sm">
                                    <thead class="text-left">
                                        <tr>
                                            <th>No</th>
                                            <th>No. KK</th>
                                            <th>Kepala Keluarga</th>
                                            <th>Alamat</th> 
                                            <th>Provinsi</th>
                                            <th>Kabupaten</th>
                                            <th>Kecamatan</th>
                                            <th>Desa/Kelurahan</th>
                                            {{-- <th>Aplikasi</th> --}}
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-left">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal --}}
    <div id="confirmModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Konfirmasi</h4>
                </div>
                <div class="modal-body">
                    <h5 align="center" id="confirm">Apakah anda yakin ingin menghapus data ini?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" name="ok_button" id="ok_button" class="btn btn-sm btn-outline-danger">Hapus</button>
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>

    @include('pegawai.data-penduduk.modals._keluarga')
    @include('pegawai.data-penduduk.modals._view-keluarga')
@endsection

{{-- addons css --}}
@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/pages/data-table/css/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}">
    <!-- Select 2 css -->
    <link rel="stylesheet" href="{{ asset('bower_components/select2/css/select2.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/datedropper/css/datedropper.min.css') }}" />
    <style>
        .btn i {
            margin-right: 0px;
        }
        .select2-container {
            width: 100% !important;
            padding: 0;
        }
    </style>
@endpush

{{-- addons js --}}
@push('js')
    <script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('bower_components/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <!-- Select 2 js --> <!-- abc -->
    <script type="text/javascript" src="{{ asset('bower_components/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('bower_components/datedropper/js/datedropper.min.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            let citizens = [];
            
            // get citizen 
            function getCitizenData() {
                citizens = [];
                $.ajax({
                    url: '/pegawai/data-penduduk/keluarga/get-citizen',
                    dataType: 'JSON',
                    success: function (data) {
                        data.forEach(citizen => {  
                            // push citizens
                            citizens.push(citizen);
                        });
                        // add item to input select
                        addItemToCitizenInput();
                    }
                });
            }
            // add item to input select 
            function addItemToCitizenInput(){
                citizens.forEach(citizen => {
                    $("#citizen_id").append(new Option(`${citizen.name} - ${citizen.no_kk}`, `${citizen.id}`));
                });
            }

            getCitizenData();

            $('#order-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('pegawai.data-penduduk.keluarga') }}",
                },
                columns: [
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'no_kk',
                        name: 'no_kk'
                    },
                    {
                        data: 'citizen_id',
                        name: 'citizen_id'
                    },
                    {
                        data: 'alamat',
                        name: 'alamat'
                    },
                    {
                        data: 'provinsi',
                        name: 'provinsi'
                    },
                    {
                        data: 'kabupaten',
                        name: 'kabupaten'
                    },
                    {
                        data: 'kecamatan',
                        name: 'kecamatan'
                    },
                    {
                        data: 'desa_kelurahan',
                        name: 'desa_kelurahan'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },
                ]
            });
            $('#add').on('click', function () {
                $('.modal-title').html('Tambah Keluarga');
                $('#action').val('add');
                $('#citizen_id').val('');
                $('#btn')
                    .removeClass('btn-info')
                    .addClass('btn-success')
                    .val('Simpan');
                $('#modal-keluarga').modal('show');
            });
           // Event Submit
           $('#form-keluarga').on('submit', function (event) {
                event.preventDefault();
                let url = '';
                if ($('#action').val() == 'add') {
                    url = "{{ route('pegawai.data-penduduk.keluarga.store') }}";
                }
                if ($('#action').val() == 'edit') {
                    url = "{{ route('pegawai.data-penduduk.keluarga.update') }}";
                }
                let formData = new FormData($('#form-keluarga')[0]);
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
                        var html = ''

                        let selectobject = document.getElementById("citizen_id");

                        for (var i=0; i<selectobject.length; i++) {
                            if (selectobject.options[i].value == data.citizen_id_delete){
                                selectobject.remove(i);
                            }
                        }

                        // If has Errors
                        if (data.errors) {
                            data.errors.citizen_id ? $('#citizen_id').addClass('is-invalid') : $('#citizen_id').removeClass('is-invalid')
                            toastr.error(data.error);
                        }
            
                        // if passed
                        if (data.success) {
                            Swal.fire('Sukses!', 'Data berhasil ditambahkan!', 'success');
                            $('#modal-keluarga').modal('hide');
                            $('#citizen_id').removeClass('is-invalid');
                            $('#form-keluarga')[0].reset();
                            $('#action').val('add');
                            $('#btn')
                                .val('Simpan');
                            $('#order-table').DataTable().ajax.reload();
                        }
                        
                        $('#form_result').html(html);
                    }
                });
            });
            // Get datas show on inputs
            $(document).on('click', '.edit', function () {
                let id = $(this).attr('id');
                $.ajax({
                    url: '/pegawai/data-penduduk/keluarga/'+id,
                    dataType: 'JSON',
                    success: function (data) {
                        $('.modal-title').html('Edit keluarga');
                        $('#action').val('edit');
                        $('#citizen_id').val(data.citizen_id);
                        $('#hidden_id').val(data.id);
                        $('#btn')
                            .removeClass('btn-success')
                            .addClass('btn-info')
                            .val('Update');
                        $('#modal-keluarga').modal('show');
                    }
                });
            });

            // Get data keluarga show on inputs
            $(document).on('click', '.view-keluarga', function () {
                let id = $(this).attr('id');
                $.ajax({
                    url: '/pegawai/data-penduduk/keluarga/get-family/'+id,
                    dataType: 'JSON',
                    success: function (data) {
                        let familyGroup = document.getElementById('family_group');
                        let provinsi = document.getElementById('provinsi');
                        let kabupaten = document.getElementById('kabupaten');
                        let kecamatan = document.getElementById('kecamatan');
                        let desa = document.getElementById('desa');
                        let alamat = document.getElementById('alamat');
                        let noKK = document.getElementById('no_kk');

                        familyGroup.innerHTML = "";
                        noKK.innerHTML = "";
                        provinsi.innerHTML = "";
                        kabupaten.innerHTML = "";
                        kecamatan.innerHTML = "";
                        desa.innerHTML = "";
                        alamat.innerHTML = "";


                        noKK.innerHTML = `${data.no_kk}`;
                        provinsi.innerHTML = `${data.provinsi}`;
                        kabupaten.innerHTML = `${data.kabupaten}`;
                        kecamatan.innerHTML = `${data.kecamatan}`;
                        desa.innerHTML = `${data.desa}`;
                        alamat.innerHTML = `${data.alamat}`;

                        for (let index = 0; index < data.family_group.length; index++) {
                            let familyGroupContent = ``;
                            let familyStatus = "";
                            switch (data.family_group[index].family_status) {
                                case 'father':
                                    familyStatus = "Ayah";
                                    break;
                                case 'mother':
                                    familyStatus = "Ibu";
                                    break;
                                case 'son_in_law':
                                    familyStatus = "Menantu";
                                    break;
                                case 'child':
                                    familyStatus = "Anak";
                                    break;
                                case 'grandchild':
                                    familyStatus = "Cucu";
                                    break;
                                case 'in_laws':
                                    familyStatus = "Mertua";
                                    break;
                                case 'other family':
                                    familyStatus = "Famili Lain";
                                    break;
                                case 'etc':
                                    familyStatus = "Lainnya";
                                    break;
                                default:
                                    break;
                            }

                            familyGroup.innerHTML += `
                                <tr>
                                    <td>${data.family_group[index].name}</td>
                                    <td>${data.family_group[index].nik}</td>
                                    <td>${familyStatus}</td>
                                </tr>
                            `;
                        }      

                        $('#modal-view-keluarga').modal('show');                  
                        
                    }
                });
            });
            // Even Delete
            let user_id;
            $(document).on('click', '.delete', function () {
                user_id = $(this).attr('id');
                $('#ok_button').text('Hapus');
                $('#confirmModal').modal('show');
            });
            $('#ok_button').click(function () {
                $.ajax({
                    url: '/pegawai/data-penduduk/keluarga/hapus/'+user_id,
                    beforeSend: function () {
                        $('#ok_button').text('Menghapus...');
                    }, success: function (data) {
                        $("#citizen_id").append(new Option(`${data.name} - ${data.no_kk}`, `${data.id}`));
                        setTimeout(function () {
                            $('#confirmModal').modal('hide');
                            $('#order-table').DataTable().ajax.reload();
                            Swal.fire('Sukses!', 'Data berhasil dihapus!', 'success');
                        }, 1000);
                    }
                });
            });
        });
    </script>
@endpush