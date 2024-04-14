<div>
    <div class="row">
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Client</h6>
                    <div class="form-group">
                        <select name="client" id="client" class="form-control js-example-basic-single w-100"
                            wire:model="client_id">
                            <option value="0">-Umum</option>
                            @foreach ($client as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        <div class="mt-2">
                            <a href="#" data-toggle="modal" data-target="#addClient">Tambah Client</a>
                        </div>
                        <livewire:order.add-client />
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Deadline</h6>
                    <div class="input-group date" wire:ignore>
                        <input type="date" class="form-control" wire:model="due_date">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Total Harga</h6>
                    <div style="display: flex; justify-content: end">
                        <h1 id="amount">{{ rp($fin_amount) }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5" wire:ignore>
                            <label for="name">Produk<i class="text-danger">*</i></label>
                            <select wire:model="product_id" class=" form-control" id="selectProduct">
                                <option>--Pilih</option>
                                @foreach ($products as $p)
                                    <option value="{{ $p->id }}">{{ $p->size }} | {{ $p->name }} |
                                        {{ $p->color }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group" wire:ignore>
                                <label for="jml">Jumlah<i class="text-danger">*</i></label>
                                <input type="number" wire:model="jml" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group" wire:ignore>
                                <label for="notes">Catatan<i class="text-danger">*</i></label>
                                <input type="text" wire:model="notes" id="notes" class="form-control">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label></label>
                                <button class="btn btn-success mt-2" wire:click="addProduk">Tambahkan</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Size</th>
                                    <th>Warna</th>
                                    <th>Jumlah</th>
                                    <th>Harga Satuan</th>
                                    <th>Harga Total</th>
                                    <th>Notes</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($table as $index => $item)
                                    <tr>
                                        <td>{{ $item['no'] }}</td>
                                        <td>{{ $item['produk_name'] }}</td>
                                        <td>{{ $item['size'] }}</td>
                                        <td>{{ $item['color'] }}</td>
                                        <td>{{ $item['produk_jml'] }}</td>
                                        <td>{{ $item['produk_price'] }}</td>
                                        <td>{{ $item['total'] }}</td>
                                        <td>{{ $item['produk_notes'] }}</td>
                                        <td>
                                            <button wire:click="deleteRow({{ $index }})"
                                                class="btn btn-danger">Delete</button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center">No data available</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 stretch-card mt-2">
            <div class="card">
                <div class="card-body" wire:ignore>
                    <h6 class="card-title">Desain Depan</h6>
                    <input type="file" class="border dropify" wire:model="desain_front" />
                </div>
            </div>
        </div>
        <div class="col-md-3 stretch-card mt-2">
            <div class="card">
                <div class="card-body" wire:ignore>
                    <h6 class="card-title">Desain Belakang</h6>
                    <input type="file" class="border dropify" wire:model="desain_back" />
                </div>
            </div>
        </div>
        <div class="col-md-3 stretch-card mt-2">
            <div class="card">
                <div class="card-body">
                    {{-- <h6 class="card-title">Additional Order</h6> --}}
                    <div class="form-group" wire:ignore>
                        <label for="">Catatan</label>
                        <textarea name="notes" id="" cols="30" rows="5" class="form-control"
                            placeholder="catatan pemesanan.." wire:model="order_notes"></textarea>
                    </div>
                    <div class="form-group" wire:ignore>
                        <label for="">Penerima</label>
                        <input type="text" name="kasir" id="" value="{{ auth()->user()->name }}"
                            class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 stretch-card mt-2">
            <div class="card">
                <div class="card-body">

                    <div class="form-group" wire:ignore>
                        <label for="">DP</label>
                        <input class="form-control mb-4 mb-md-0" wire:model="dp_amount" type="number" />
                    </div>
                    <div class="mt-2">
                        <label for="">Discount</label>
                        <div class="input-group" wire:ignore>
                            <input type="text" class="form-control col-6" placeholder="diskon lebaran"
                                wire:model="disc_name">
                            <!-- 50% width -->
                            <input type="number" class="form-control col-2" placeholder="%"
                                wire:model="disc_percent" wire:keydown.enter="checkAmount">
                            <!-- 20% width -->
                            <input type="number" class="form-control col-4" placeholder="diskon amount"
                                wire:model="disc_amount" wire:keydown.enter="checkAmount">
                            <!-- 30% width -->
                        </div>
                    </div>
                    <div class="mt-3">
                        <label for="">Bea Tambahan</label>
                        <div class="input-group" wire:ignore>
                            <input type="text" class="form-control col-6" placeholder="Ongkos Kirim"
                                wire:model="charge_name">
                            <!-- 50% width -->
                            <input type="number" class="form-control col-2" placeholder="%"
                                wire:model="charge_percent" wire:keydown.enter="checkAmount"> <!-- 20% width -->
                            <input type="number" class="form-control col-4" wire:model="charge_amount"
                                placeholder="carge amount" wire:keydown.enter="checkAmount">
                            <!-- 30% width -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button class="btn btn-primary mt-3 btn-block btn-lg" wire:click="submitOrder">Simpan</button>
</div>
