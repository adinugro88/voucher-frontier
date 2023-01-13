<?php

namespace App\Http\Livewire\Cust;

use Livewire\Component;
use App\Models\Customer;
class Index extends Component
{


    public $nama,$email, $notelpon,$alamat,$noinvoice,$toko_id,$feevoucher;
    public $search;

    public function resetinput()
    {
        $this->nama="";
        $this->email="";
        $this->notelpon="";
        $this->alamat="";
        $this->noinvoice="";
        $this->toko_id="";
    }

    public function edits(int $custid)
    {
        $cust = TokovoucCustomerher::find($custid);
        if($cust){
            $this->custid       = $cust->id;
            $this->nama         = $toko->nama;
            $this->email    = $toko->email;
            $this->notelpon       = $toko->notelpon;
            $this->alamat     = $toko->alamat;
            $this->noinvoice          = $toko->noinvoice;
           
        }else{
            return redirect()->to('/dashboard/admin/customerlist');
        }
    }
    public function render()
    {
        
        $cust = Customer::orderBy('id','ASC')->paginate(10);
        return view('livewire.cust.index',['cust'=>$cust]);
    }
}
