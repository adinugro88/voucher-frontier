<?php

namespace App\Http\Livewire\Toko;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Tokovoucher;

class Index extends Component
{
    public $kodetoko,$nama_toko,$alamat,$notelpon,$Pic,$notelponpic;
    public $search;

    protected function rules()
    {
        return [
            'kodetoko'       => 'required',
            'nama_toko'      => 'required',
            'alamat'         => 'required',
            'notelpon'       => 'required',
            'Pic'            => 'required',
            'notelponpic'      => 'required',
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function resetinput()
    {
        $this->kodetoko="";
        $this->nama_toko="";
        $this->alamat="";
        $this->notelpon="";
        $this->Pic="";
        $this->notelponpic="";
    }

    public function edits(int $tokoid)
    {
        $toko = Tokovoucher::find($tokoid);
        if($toko){
            $this->tokoid       = $toko->id;
            $this->kodetoko     = $toko->kodetoko;
            $this->nama_toko    = $toko->nama_toko;
            $this->alamat       = $toko->alamat;
            $this->notelpon     = $toko->notelpon;
            $this->Pic          = $toko->Pic;
            $this->notelponpic  = $toko->notelponpic;
        }else{
            return redirect()->to('/dashboard/admin/toko');
        }
    }

    public function updatetoko()
    {
        $validatedData = $this->validate();

        Tokovoucher::where('id',$this->tokoid)->update([
            'kodetoko'         => $validatedData['kodetoko'],
            'nama_toko'        => $validatedData['nama_toko'],
            'alamat'           => $validatedData['alamat'],
            'notelpon'         => $validatedData['notelpon'],
            'Pic'              => $validatedData['Pic'],
            'notelponpic'      => $validatedData['notelponpic'],
        ]);
        session()->flash('message','toko Updated ');
        $this->resetinput();
        $this->dispatchBrowserEvent('close-modal');
    }


    public function deleteStudent(int $tokoid)
    {
        $this->tokoid = $tokoid;
    }

    public function destroyStudent()
    {
        Tokovoucher::find($this->tokoid)->delete();
        $this->dispatchBrowserEvent('close-modal');
        session()->flash('message','Toko dihapus');
    
    }

    public function simpan()
    {
        $validatedData = $this->validate();
        Tokovoucher::create($validatedData);
        session()->flash('message','Toko berhasil input');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {
        $toko = Tokovoucher::orderBy('id','ASC')->paginate(10);
        return view('livewire.toko.index', ['toko' => $toko]);
    }
}
