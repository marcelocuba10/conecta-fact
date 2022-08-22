@csrf
<div class="row">
    <div class="col-4">
      <div class="input-style-1">
        <label>(*) Razón Social</label>
        <input type="text" name="name" value="{{ $provider->name ?? old('name') }}" class="bg-transparent">
      </div>
    </div>
    <!-- end col -->
    <div class="col-4">
      <div class="input-style-1">
        <label>RUC / Doc Identidad</label>
        <input type="text" name="doc_number" value="{{ $provider->doc_number ?? old('doc_number') }}" class="bg-transparent">
      </div>
    </div>
    <!-- end col -->
    <div class="col-4">
      <div class="input-style-1">
        <label>Teléfono</label>
        <input type="text" id="phone" name="phone" value="{{ $provider->phone ?? old('phone') }}" class="bg-transparent">
      </div>
    </div>
    <!-- end col -->
    <div class="col-6">
      <div class="input-style-1">
        <label>Dirección</label>
        <input type="text" name="address" value="{{ $provider->address ?? old('address') }}" class="bg-transparent">
      </div>
    </div>
    <!-- end col -->
    <div class="col-6">
      <div class="input-style-1">
        <label>Empresa</label>
        <input type="text" name="company" value="{{ $provider->company ?? old('company') }}" class="bg-transparent">
      </div>
    </div>
    <!-- end col -->
    <div class="col-4">
      <div class="input-style-1">
        <label>Timbrado</label>
        <input type="text" name="timbrado" value="{{ $provider->timbrado ?? old('timbrado') }}" class="bg-transparent">
      </div>
    </div>
    <!-- end col -->
    <div class="col-4">
      <div class="input-style-1">
        <label>Fecha Inicio Vigencia Timbrado</label>
        <input type="date" name="start_date_timbrado" placeholder="DD/MM/YYYY" value="{{ $provider->start_date_timbrado ?? old('start_date_timbrado') }}" class="bg-transparent">
      </div>
    </div>
    <!-- end col -->
    <div class="col-4">
      <div class="input-style-1">
        <label>Fecha Fin Vigencia Timbrado</label>
        <input type="date" name="end_date_timbrado" placeholder="DD/MM/YYYY" value="{{ $provider->end_date_timbrado ?? old('end_date_timbrado') }}" class="bg-transparent">
      </div>
    </div>
    <!-- end col -->
    <div class="col-6">
      <div class="input-style-1">
        <label>Responsable</label>
        <input type="text" name="manager" value="{{ $provider->manager ?? old('manager') }}" class="bg-transparent">
      </div>
    </div>
    <!-- end col -->
    <div class="col-6">
      <div class="input-style-1">
        <label>Email</label>
        <input type="text" name="email" value="{{ $provider->email ?? old('email') }}" class="bg-transparent">
      </div>
    </div>
    <!-- end col -->
    <div class="col-12">
      <div class="button-group d-flex justify-content-center flex-wrap">
        <button type="submit" class="main-btn primary-btn btn-hover m-2">Guardar</button>
        <a class="main-btn danger-btn-outline m-2" href="/user/providers">Atrás</a>
      </div>
    </div>
</div>