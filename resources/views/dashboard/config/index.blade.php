@extends('layouts.dashboard')

@section('content')
<section id="configuration">
  <div class="content-header row">
    <div class="mb-2 content-header-left col-md-4 col-12">
      <h3 class="content-header-title">Konfigurasi Dashboard</h3>
    </div>
    <div class="content-header-right col-md-8 col-12">
      <div class="breadcrumbs-top float-md-right">
        <div class="mr-1 breadcrumb-wrapper">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Konfigurasi</li>
          </ol>
        </div>
      </div>@extends('layouts.dashboard')

      @section('content')
      <section id="configuration">
        <div class="content-header row">
          <div class="mb-2 content-header-left col-md-4 col-12">
            <h3 class="content-header-title">Konfigurasi Dashboard</h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
              <div class="mr-1 breadcrumb-wrapper">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                  <li class="breadcrumb-item active">Konfigurasi</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <a href="#" data-toggle="modal" data-target="#config_edit_modal" class="mb-1 mr-1 btn btn-bg-gradient-x-purple-blue col-12 col-md-2">
                  <i class="ft-edit"></i> Ubah Konfigurasi
                </a>
              </div>
              <div class="card-content collapse show">
                <div class="card-body card-dashboard">
                  <div class="row">
                    <div class="col-md-6">
                      <h5>Text Header</h5>
                      <p>{{ $config->text_header ?? 'Belum diatur' }}</p>
                    </div>
                    <div class="col-md-6">
                      <h5>Gambar Header</h5>
                      @if($config && $config->gambar_header)
                      <img src="{{ asset('storage/' . $config->gambar_header) }}" alt="Gambar Header" class="img-fluid">
                      @else
                      <p>Belum diatur</p>
                      @endif
                    </div>
                  </div>
                  <div class="mt-2 row">
                  <div class="col-md-6">
                      <h5>Text Footer</h5>
                      <p>{{ $config->text_footer ?? 'Belum diatur' }}</p>
                    </div>
                    <div class="col-md-6">
                      <h5>Favicon</h5>
                      @if($config && $config->gambar_favicon)
                      <img src="{{ asset('storage/' . $config->gambar_favicon) }}" alt="Favicon" width="50">
                      @else
                      <p>Belum diatur</p>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      
      @push('modal')
      @include('dashboard.config.modal.edit')
      @endpush
      
      @endsection
      
      
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
        <a href="#" data-toggle="modal" data-target="#config_edit_modal" class="mb-1 mr-1 btn btn-bg-gradient-x-purple-blue col-12 col-md-2">
            <i class="ft-edit"></i> Ubah Konfigurasi
          </a>
        </div>
        <div class="card-content collapse show">
          <div class="card-body card-dashboard">
            <div class="row">
              <div class="col-md-6">
                <h5>Text Header</h5>
                <p>Selamat Datang di Dashboard</p>
              </div>
              <div class="col-md-6">
                <h5>Gambar Header</h5>
                <img src="{{ asset('images/default-header.jpg') }}" alt="Gambar Header" class="img-fluid">
              </div>
            </div>
            <div class="mt-2 row">
              <div class="col-md-6">
                <h5>Text Footer</h5>
                <p>Hak Cipta © 2025</p>
              </div>
              <div class="col-md-6">
                <h5>Favicon</h5>
                <img src="{{ asset('images/default-favicon.png') }}" alt="Favicon" width="50">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@push('modal')
@include('dashboard.config.modal.edit')
@endpush

@endsection

