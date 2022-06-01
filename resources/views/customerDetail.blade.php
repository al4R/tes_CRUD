@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Table Customer') }}</div>
                <form  role="form" enctype="multipart/form-data">
                    
                    @csrf
                      <div class="modal-body">
                        <div class="form-group">
                        <input type="hidden" name="id" value="{{ $customer->id }}">
                          <label >Nama</label>
                          <input type="text" class="form-control"  value="{{ $customer->nama }}" placeholder="Nama"  name="nama" disabled>
                          </div>
                          <div class="form-group">
                          <label >Alamat</label>
                          <input type="text" class="form-control"  value="{{ $customer->alamat }}" placeholder="Alamat"  name="alamat" disabled>    
                          </div>   
                          <div class="form-group">
                          <label >Nomor telepon</label>
                          <input type="text" class="form-control"  value="{{ $customer->nomor_telepon}}" placeholder="Nomor telepon"  name="nomor_telepon" disabled>    
                          </div> 
                          <div class="form-group">
                          <label >Tanggal Registrasi</label>
                          <input type="text" class="form-control"  value="{{ $customer->tgl_regis}}" placeholder=""  name="tgl_regis" disabled>    
                          </div> 
                        <div class="modal-footer">
                        
                        <a href="/customer" type="button" class="btn btn btn-secondary">Tutup</a>
                        <!-- <button type="submit" class="btn btn-primary">Simpan</button> -->
                      </div>
                    </form>
              </div>     
        </div>
    </div>

</div>
@endsection