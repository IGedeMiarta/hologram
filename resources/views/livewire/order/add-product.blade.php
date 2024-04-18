<div>
    <div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true" wire:ignore>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="save" wire:ignore>
                    @csrf
                    <div class="modal-body">
                        <div class="form-group" wire:ignore>
                            <label for="name">Nama<i class="text-danger">*</i></label>
                            <input type="text" class="form-control" id="name" autocomplete="off"
                                placeholder="Kaos Polos Bintang 30S" wire:model="name" required>
                        </div>
                        <div class="form-group" wire:ignore>
                            <label for="type">Type<i class="text-danger">*</i></label>
                            <select wire:model="product_type" id="type" class="form-control">
                                <option> --Pilih</option>
                                @foreach ($allType as $item)
                                    <option value="{{ $item->mark }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group" wire:ignore>
                            <label for="size">Size<i class="text-danger">*</i></label>
                            <select wire:model="size" id="size" class="form-control" required>
                                <option> --Pilih</option>
                                <option value="s">S</option>
                                <option value="m">M</option>
                                <option value="l">L</option>
                                <option value="xl">XL</option>
                                <option value="xxl">XXL</option>
                                <option value="xxxl">XXXL</option>
                            </select>
                        </div>
                        <div class="form-group" wire:ignore>
                            <label for="color">Warna<i class="text-danger">*</i></label>
                            <input type="text" wire:model="color" id="color" class="form-control"
                                placeholder="Hitam" required>
                        </div>
                        <div class="form-group" wire:ignore>
                            <label for="stok">Stok</label>
                            <input type="number" wire:model="stok" id="stok" class="form-control"
                                placeholder="00">
                        </div>
                        <div class="form-group" wire:ignore>
                            <label for="hpp">Harga Beli</label>
                            <input class="form-control mb-4 mb-md-0" id="hpp" autocomplete="off" wire:model="hpp"
                                placeholder="1,000,000" />
                        </div>
                        <div class="form-group" wire:ignore>
                            <label for="harga_jual">Harga Jual<i class="text-danger">*</i></label>
                            <input class="form-control mb-4 mb-md-0" id="harga_jual" autocomplete="off"
                                wire:model="harga_jual" placeholder="1,000,000" required />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" id="close-modal" data-dismiss="modal"> <i
                                data-feather="x"></i>Close</button>
                        <button type="submit" class="btn btn-primary"> <i data-feather="save"></i>Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@push('custom-scripts')
    <script>
        $(document).ready(function() {
            Livewire.on('closeModal', function() {
                $('#addProduct').modal('toggle');
            });
            Livewire.on('success', function(data) {
                Toast.fire({
                    icon: 'success',
                    title: 'Produk Behasil Ditambahkan'
                });
            });

        });
    </script>
@endpush
