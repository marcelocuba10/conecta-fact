@csrf
<div class="row">
    <div class="col-6">
      <div class="input-style-1">
        <label>(*) Nombre</label>
        <input type="text" name="name" value="{{ $customer->name ?? old('name') }}" class="bg-transparent">
      </div>
    </div>
    <!-- end col -->
    <div class="col-6">
      <div class="input-style-1">
        <label>Teléfono</label>
        <input type="text" id="phone" name="phone" value="{{ $customer->phone ?? old('phone') }}" class="bg-transparent">
      </div>
    </div>
    <!-- end col -->
    <div class="col-6">
      <div class="input-style-1">
        <label>Dirección</label>
        <input type="text" name="address" value="{{ $customer->address ?? old('address') }}" class="bg-transparent">
      </div>
    </div>
    <!-- end col -->
    <div class="col-6">
      <div class="input-style-1">
        <label>Email</label>
        <input type="text" name="email" value="{{ $customer->email ?? old('email') }}" class="bg-transparent">
      </div>
    </div>
    <!-- end col -->
    <div class="col-6">
      <div class="input-style-1">
        <label>Doc Identidad</label>
        <input type="text" name="doc_number" value="{{ $customer->doc_number ?? old('doc_number') }}" class="bg-transparent">
      </div>
    </div>
    <!-- end col -->
    <div class="col-12">
      <div class="button-group d-flex justify-content-center flex-wrap">
        <button type="submit" class="main-btn primary-btn btn-hover m-2">Guardar</button>
        <a class="main-btn danger-btn-outline m-2" href="/user/customers">Atrás</a>
      </div>
    </div>
</div>