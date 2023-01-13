<div>
    

    <div wire:ignore.self class="modal fade" id="modaledit">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Validasi Customer </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form x-on:company-added.window="open = false" wire:submit.prevent="updatetoko">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>Nama</label>
                                        <input disabled type="text" wire:model="nama" class="form-control">
                                        @error('nama') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label>Email</label>
                                        <input disabled type="text" wire:model="email" class="form-control">
                                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label>Telepon</label>
                                        <input disabled type="text" wire:model="notelpon" class="form-control">
                                        @error('notelpon') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label>Alamat</label>
                                        <input disabled type="text" wire:model="alamat" class="form-control">
                                        @error('alamat') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>

                                </div>
                                <div class="col-md-6">
                                
                                    <div class="mb-3">
                                        <label>No Invoice</label>
                                        <input type="text" wire:model="noinvoice" class="form-control">
                                        @error('noinvoice') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>

                                    <b>Note : Data tervalidasi berdasarkan No Invoice dari program Elsa </b>
                            
                                </div>
                            </div>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>

                    </form>
                </div>
                <div class="modal-footer justify-content-between">

                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <!-- Delete Student Modal -->
    <div wire:ignore.self class="modal fade" id="modalhapus" tabindex="-1"
        aria-labelledby="deleteStudentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteStudentModalLabel">Hapus Toko</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form wire:submit.prevent="destroyStudent">
                    <div class="modal-body">
                        <b>hapus data secara permanen ?</b>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Yes! Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
