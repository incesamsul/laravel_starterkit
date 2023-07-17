@extends('layouts.v_template')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex  justify-content-between">
                    <h4>Data Pengguna</h4>
                    <div class="table-tools d-flex justify-content-around ">
                        <input type="text" class="form-control card-form-header mr-3"
                            placeholder="Cari Data Pengguna ..." id="cari-data-pengguna">
                        <select class="custom-select form-control mr-3" id="filter-data-pengguna">
                            <option value="" selected>Filter</option>
                            <option value=""></option>
                        </select>
                        <button type="button" class="btn bg-main text-white float-right" data-toggle="modal"
                            id="addUserBtn" data-target="#modalPengguna"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-bordered table-striped table-hover table-user table-action-hover">
                        <thead>
                            <tr>
                                <th width="5%" class="sorting" data-sorting_type="asc" data-column_name="id"
                                    style="cursor: pointer">ID <span id="id_icon"></span></th>
                                <td>Nama</td>
                                <td>Email</td>
                                <td>Tipe Pengguna</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengguna as $p)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->email }}</td>
                                <td>{{ $p->role->name }}</td>
                                <td class="option">
                                    <div class="btn-group dropleft btn-option">
                                        <i type="button" class="dropdown-toggle" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </i>
                                        <div class="dropdown-menu">
                                            {{-- <a data-pengguna='@json($p)' data-toggle="modal" data-target="#modalPengguna" class="dropdown-item kaitkan" href="#"><i class="fas fa-link"> Kaitkan data</i></a> --}}
                                            <a data-pengguna='@json($p)' data-toggle="modal"
                                                data-target="#modalPengguna" class="dropdown-item edit" href="#"><i
                                                    class="fas fa-pen"> Edit</i></a>
                                            <a data-id_pengguna="{{ $p->id }}" class="dropdown-item hapus" href="#"><i
                                                    class="fas fa-trash">
                                                    Hapus</i></a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</section>


<!-- Modal -->
{{-- MODAL TAMBAH PENGGUNA --}}
<div class="modal fade" id="modalPengguna" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Tambah Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body" id="main-body">
                {{-- @if (session('message'))
                {{ sweetAlert(session('message'), 'success') }}
                @endif --}}
                <form id="formPengguna" action="{{ URL::to('/admin/create_pengguna') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="hidden" class="form-control" name="id" id="id">
                        <input type="text" class="form-control" name="nama" id="nama">
                    </div>
                    <div class="form-group">
                        <label for="email">email</label>
                        <input type="text" class="form-control" name="email" id="email">
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select class="form-control" name="tipe_pengguna" id="tipe-pengguna">
                            <!-- <option value="1">Administrator</option> -->
                            @foreach($role as $row)
                            <option value="{{$row->id}}">{{ $row->name}} </option>
                            @endforeach
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn bg-main text-white" id="modalBtn">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
$(document).ready(function() {





    // TOMBOL EDIT USER
    $('.table-user tbody').on('click', 'tr td a.edit', function() {
        let dataPengguna = $(this).data('pengguna');
        $('#nama').val(dataPengguna.name);
        $('#email').val(dataPengguna.email);
        $('#tipe-pengguna').val(dataPengguna.role);
        $('#id').val(dataPengguna.id);
        $('#ModalLabel').html('Ubah Pengguna');
        $('#modalBtn').html('Ubah');
        $('.modal-footer').show();
        $('#main-body').show();
        $('#kaitkan-body').hide();
        $('#batal-kaitkan-body').hide();
        $('#formPengguna').attr('action', '/admin/update_pengguna');
    })

    // TOMBOL TAMBAH USER
    $('#addUserBtn').on('click', function() {
        $('#ModalLabel').html('Tambah Pengguna');
        $('#modalBtn').html('Tambah');
        $('.modal-footer').show();
        $('#main-body').show();
        $('#kaitkan-body').hide();
        $('#batal-kaitkan-body').hide();
        $('#formPengguna').attr('action', '/admin/create_pengguna');
    });

    // TOMBOL HAPUS USER
    $('.table-user tbody').on('click', 'tr td a.hapus', function() {
        let idPengguna = $(this).data('id_pengguna');
        Swal.fire({
            title: 'Apakah yakin?',
            text: "Data tidak bisa kembali lagi!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Konfirmasi'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '/admin/delete_pengguna',
                    method: 'post',
                    dataType: 'json',
                    data: {
                        user_id: idPengguna
                    },
                    success: function(data) {
                        if (data == 1) {
                            Swal.fire('Berhasil', 'Data telah terhapus', 'success')
                                .then((result) => {
                                    location.reload();
                                });
                        }
                    }
                })
            }
        })
    });





});

$('#liPengguna').addClass('active');
$('#liManajemenPengguna').addClass('active');
</script>
@endsection