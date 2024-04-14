<div>
    <div class="modal fade" id="addClient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true" data-keyboard="false" data-backdrop="static" wire:ignore>
        <div class="modal-dialog" role="document">
            <form wire:submit.prevent="save" wire:ignore>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Client</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="clientName">Nama Client<i class="text-danger">*</i></label>
                            <input type="text" class="form-control" id="clientName" wire:model='clientName'
                                wire:ignore.self autocomplete="off" placeholder="Agung" name="clientName" required>
                        </div>
                        <div class="form-group">
                            <label for="clientPhone">Nomer Hp<i class="text-danger">*</i></label>
                            <input class="form-control mb-4 mb-md-0" wire:model="clientPhone" required
                                wire:ignore.self />
                        </div>
                        <div class="form-group">
                            <label for="clientAddress">Alamat</label>
                            <textarea name="address" id="clientAddress" cols="30" rows="5" wire:model="clientAddress"
                                class="form-control" wire:ignore.self></textarea>
                        </div>
                        <div class="form-group">
                            <label for="clientNotes">Catatan</label>
                            <textarea name="notes" id="clientNotes" cols="30" rows="5" wire:model="clientNotes" class="form-control"
                                wire:ignore.self></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning btnClose" data-dismiss="modal" id="close-modal">
                            <i data-feather="x"></i>Close</button>
                        <button type="submit" class="btn btn-primary"> <i data-feather="save"></i>Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
@push('custom-scripts')
    <script>
        $(document).ready(function() {
            Livewire.on('closeModal', function() {
                const closeButton = $('#close-modal');
                if (closeButton.length > 0) {
                    closeButton.trigger('click');
                } else {
                    console.error('Button with ID "close-modal" not found');
                }
            });
            Livewire.on('success', function(data) {
                Toast.fire({
                    icon: 'success',
                    title: 'Client Behasil Ditambahkan'
                });
            });

        });
    </script>
@endpush
