@extends('layouts.dashboard')

@section('content')
<section id="configuration">
  <div class="content-header row">
    <div class="mb-2 content-header-left col-md-4 col-12">
      <h3 class="content-header-title">Data Inventory</h3>
    </div>
    <div class="content-header-right col-md-8 col-12">
      <div class="breadcrumbs-top float-md-right">
        <div class="mr-1 breadcrumb-wrapper">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Inventory</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <a href="#" data-toggle="modal" data-target="#inventory_create_modal"
            class="mb-1 mr-1 btn btn-bg-gradient-x-purple-blue col-12 col-md-2">
            <i class="ft-plus"></i> Tambah Inventory
          </a>
          <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
          <div class="heading-elements">
            <ul class="mb-0 list-inline">
              <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
              <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
              <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
              <li><a data-action="close"><i class="ft-x"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="card-content collapse show">
          <div class="card-body card-dashboard">

            <div class="table-responsive">
              <table class="table table-striped table-bordered zero-configuration" id="inventory-table">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Perolehan</th>
                    <th>Jumlah</th>
                    <th>Lokasi</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($inventories as $inventory)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $inventory->item_code }}</td>
                    <td>{{ $inventory->item_name }}</td>
                    <td>{{ $inventory->category->name }}</td>
                    <td>{{ $inventory->vendor->name }}</td>
                    <td>{{ $inventory->quantity }}</td>
                    <td>{{ $inventory->classroom->name }}</td>
                    <td>
                      <div class="d-flex justify-content-start align-items-center">
                        <a href="#" data-id="{{ $inventory->id }}"
                          class="mr-2 text-white btn btn-sm btn-success edit-modal" data-toggle="modal"
                          data-target="#inventory_edit_modal" title="Ubah Inventory">
                          <i class="ft-edit"></i>
                        </a>
                        <a href="#" class="mx-1 btn btn-bg-gradient-x-red-pink btn-sm delete-inventory" data-id="{{ $inventory->id }}"
                          data-toggle="modal" data-target="#delete_inventory_modal" title="Hapus">
                          <i class="ft-delete"></i>
                        </a>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Vendor</th>
                    <th>Jumlah</th>
                    <th>Lokasi</th>
                    <th>Aksi</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@push('modal')
@include('dashboard.inventories.modal.create')
@include('dashboard.inventories.modal.edit')
@include('dashboard.inventories.modal.delete')
@endpush
@push('js')
@include('dashboard.inventories._script')
@endpush
@endsection

