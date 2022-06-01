<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customer['listCustomer'] = Customer::orderBy('nama', 'asc')->paginate(10);
        return view('customer')->with($customer);
    }

    public function add(Request $request)
    {
        $customer = new Customer();
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required|unique:customers,alamat,'.$customer->id,
            'nomor_telepon' => 'required|unique:customers,nomor_telepon,'.$customer->id
        ],[
            'nama.required'=> 'nama tidak boleh kosong',
            'alamat.required'=> 'alamat tidak boleh kosong',
            'nomor.required'=> 'nomor tidak boleh kosong',
            'nomor_telepon.unique'=> 'nomor tidak boleh sama',
            'alamat.unique'=> 'alamat tidak boleh sama'
        ]);
        $customer->nama = $request->input('nama');
        $customer->alamat = $request->input('alamat');
        $customer->nomor_telepon = $request->input('nomor_telepon');
        $customer->tgl_regis = now();
        $customer->save();
        return redirect('customer')->with('alert','Berhasil mengubah data menambah');
    }
    public function show($id)
    {
        $customer = Customer::find($id);
        return view('customerupdate')->with('customer',$customer);
    }
    public function update(Request $request,$id)
    {
        $customer = Customer::find($id);
        $request->validate([
            'nama' => 'required',
            'tgl_regis' => 'required',
            'alamat' => 'required|unique:customers,alamat,'.$customer->id,
            'nomor_telepon' => 'required|unique:customers,nomor_telepon,'.$customer->id
        ],[
            'nama.required'=> 'nama tidak boleh kosong',
            'tgl_regis.required'=> 'tanggal tidak boleh kosong',
            'alamat.required'=> 'alamat tidak boleh kosong',
            'nomor.required'=> 'nomor tidak boleh kosong',
            'nomor_telepon.unique'=> 'nomor tidak boleh sama',
            'alamat.unique'=> 'alamat tidak boleh sama'
        ]);
        $customer->nama = $request->input('nama');
        $customer->alamat = $request->input('alamat');
        $customer->nomor_telepon = $request->input('nomor_telepon');
        $customer->tgl_regis = $request->input('tgl_regis');
        $customer->save();
        return redirect('customer')->with('alert','Berhasil mengubah data ');
    }
    public function detail($id)
    {
        $customer = Customer::find($id);
        return view('customerdetail')->with('customer',$customer);
    }
    public function cari(Request $request)
    {
        $cari = $request->cari;
        $customer['Cari']  = Customer::where('tgl_regis','like',"%".$cari."%")->paginate();
        return view('customerCari',$customer);
    }
    public function Hcari(Request $request)
    {
        return view('customerCari');
    }

}
