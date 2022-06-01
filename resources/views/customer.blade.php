@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Table Customer') }}</div>
                <div class="card-body">
                <button type="button" class="btn btn-info float-right btn-xs" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus blue"></i> Tambah</button>
                <a href="/customer/cari" type="button" class="btn btn-info float-right btn-xs"><i class="fa fa-plus blue"></i> Cari</a>
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Nomor telepon</th>
                        <th scope="col">Tanggal Registrasi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($listCustomer as $data)
                        <tr>
                        <td>{{ $data->id}}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->alamat }}</td>
                        <td>{{ $data->nomor_telepon}}</td>
                        <td>{{ $data->tgl_regis}}</td>
                        <td>
                        <a href="/customerUpdate/{{$data->id}}" class="btn btn-primary btn-xs">Update </a>
                        </td>
                        <td>
                        <a href="/customerDetail/{{$data->id}}" class="btn btn-primary btn-xs">detail </a>
                        </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <br/>
                Halaman : {{ $listCustomer->links()}}<br/>
                </div>
            </div>
            <!-- modal add -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah data customer</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    
                    <form method="POST" action="{{ route('add') }}" role="form" enctype="multipart/form-data">
                    
                    @csrf
                      <div class="modal-body">
                        <div class="form-group">
                          <label >Nama</label>
                          <input type="text" class="form-control"  placeholder="Nama"  name="nama">
                          <span class="text-danger">{{ $errors->first('nama') }}</span>
                          </div>
                          <div class="form-group">
                          <label >Alamat</label>
                          <input type="text" class="form-control"  placeholder="Alamat"  name="alamat">    
                          </div>   
                          <div class="form-group">
                          <label >Nomor telepon</label>
                          <input type="text" class="form-control"  placeholder="Nomor telepon"  name="nomor_telepon">    
                          </div> 
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>     
        </div>
    </div>

</div>
@endsection