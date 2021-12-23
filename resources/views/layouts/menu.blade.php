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
      <a class="nav-link {{request()->routeIs('admin.ventas.*')? 'active' : ''}}" href="{{ route('admin.ventas.index') }}">Ventas</a>
    </li>
</ul>