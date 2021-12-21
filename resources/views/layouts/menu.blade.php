<ul class="nav nav-pills">
    <li class="nav-item">
      <a class="nav-link" aria-current="page" href="#">Dashboard</a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{request()->routeIs('admin.productos.*')? 'active' : ''}}" href="{{ route('admin.productos.index') }}">Productos</a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{request()->routeIs('admin.clientes.*')? 'active' : ''}}" href="{{ route('admin.clientes.index') }}">Clientes</a>
    </li>
    <li class="nav-item">
      <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
    </li>
</ul>