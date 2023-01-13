<?php

namespace App\Http\Livewire\Cust;

use Livewire\Component;
use App\Models\Customer;
class Index extends Component
{


    public $nama,$email, $notelpon,$alamat,$noinvoice,$toko_id,$feevoucher;
    public $search;

    protected function rules()
    {
        return [
            'noinvoice'      => 'required',
        ];
    }


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
        $cust = Customer::find($custid);
        if($cust){
            $this->custid       = $cust->id;
            $this->nama         = $cust->nama;
            $this->email        = $cust->email;
            $this->notelpon     = $cust->notelpon;
            $this->alamat       = $cust->alamat;
            $this->noinvoice    = $cust->noinvoice;
           
        }else{
            return redirect()->to('/dashboard/admin/customerlist');
        }
    }

    public function updatetoko()
    {
        $validatedData = $this->validate();

        Customer::where('id',$this->custid)->update([
            'noinvoice'         => $validatedData['noinvoice'],
            'feevoucher'        => 250000,
        ]);
        session()->flash('message','Data telah tervalidasi silahkan lihat data Menu Laporan ');
        $this->resetinput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function deleteStudent(int $tokoid)
    {
        $this->tokoid = $tokoid;
    }

    public function destroyStudent()
    {
        Customer::find($this->tokoid)->delete();
        $this->dispatchBrowserEvent('close-modal');
        session()->flash('message','Toko dihapus');
    
    }


    public function render()
    {
        
        $cust = Customer::orderBy('id','ASC')->paginate(10);
        return view('livewire.cust.index',['cust'=>$cust]);
    }
}
