@extends('user::layouts.adminLTE.app')
@section('content')

<section class="section">
  <div class="container-fluid">
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
      <div class="row align-items-center">
        <div class="col-md-6">
            <div class="titlemb-30">
                <h2>Detalle Proveedor</h2>
            </div>
        </div>
        <div class="col-md-6">
          <div class="breadcrumb-wrapper mb-30">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/user/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="/user/providers">Proveedores</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detalle Cliente</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
    <!-- ========== title-wrapper end ========== -->
    <div class="form-layout-wrapper">
      <div class="row">
        <div class="col-lg-12">
          <div class="tab-style-2 card-style mb-30">
            <nav class="nav" id="nav-tab">
              <button id="tab-2-1" class="main-btn deactive-btn active" data-bs-toggle="tab" data-bs-target="#tabContent-2-1">
                <i class="lni lni-user mr-10"></i>Información Básica
              </button>
            </nav>
            <div class="tab-content" id="nav-tabContent2">
              <div class="tab-pane fade active show" id="tabContent-2-1">
                <div class="row">
                  <div class="col-6">
                    <div class="input-style-1">
                      <label>Nombre</label>
                      <input type="text" value="{{ $provider->name ?? old('name') }}" name="name" readonly>
                    </div>
                  </div>
                  <!-- end col -->
                  <div class="col-6">
                    <div class="input-style-1">
                      <label>Teléfono</label>
                      <input type="text" value="{{ $provider->phone ?? old('phone') }}" name="phone" readonly>
                    </div>
                  </div>
                  <!-- end col -->
                  <div class="col-12">
                    <div class="input-style-1">
                      <label>Dirección</label>
                      <input type="text" value="{{ $provider->address ?? old('address') }}" name="address" readonly>
                    </div>
                  </div>
                  <!-- end col -->
                  <div class="col-6">
                    <div class="input-style-1">
                      <label>Email</label>
                      <input type="text" name="email" value="{{ $provider->email ?? old('email') }}" readonly>
                    </div>
                  </div>
                  <!-- end col -->
                  <div class="col-6">
                    <div class="input-style-1">
                      <label>Doc Identidad</label>
                      <input type="text" name="doc_number" value="{{ $provider->doc_number ?? old('doc_number') }}" readonly>
                    </div>
                  </div>
                  <!-- end col -->
                  <div class="col-12">
                    <div class="button-groupd-flexjustify-content-centerflex-wrap">
                      <a class="main-btn danger-btn-outline m-2" href="/user/providers">Atrás</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection  
