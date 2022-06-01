@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Table Customer') }}</div>
                <form method="POST" action="/customerUpdateSimpan/{{$customer->id}}" role="form" enctype="multipart/form-data">
                    
                    @csrf
                    {{method_field('PUT')}}
                      <div class="modal-body">
                        <div class="form-group">
                        <input type="hidden" name="id" value="{{ $customer->id }}">
                          <label >Nama</label>
                          <input type="text" class="form-control"  value="{{ $customer->nama }}" placeholder="Nama"  name="nama" >
                          <span class="text-danger">{{ $errors->first('nama') }}</span>
                          </div>
                          <div class="form-group">
                          <label >Alamat</label>
                          <input type="text" class="form-control"  value="{{ $customer->alamat }}" placeholder="Alamat"  name="alamat">   
                          <span class="text-danger">{{ $errors->first('alamat') }}</span> 
                          </div>   
                          <div class="form-group">
                          <label >Nomor telepon</label>
                          <input type="text" class="form-control"  value="{{ $customer->nomor_telepon}}" placeholder="Nomor telepon"  name="nomor_telepon"> 
                          <span class="text-danger">{{ $errors->first('nomor_telepon') }}</span>    
                          </div> 
                          <div class="form-group">
                          <label >Tanggal</label>
                          <input type="text" class="form-control"  value="{{ $customer->tgl_regis}}" placeholder="Nomor telepon"  name="tgl_regis"> 
                          <span class="text-danger">{{ $errors->first('tgl_regis') }}</span>
                          </div>
                        <div class="modal-footer">
                        
                        <a href="/customer" type="button" class="btn btn btn-secondary">Tutup</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                      </div>
                    </form>
              </div>     
        </div>
    </div>

</div>
@endsection
