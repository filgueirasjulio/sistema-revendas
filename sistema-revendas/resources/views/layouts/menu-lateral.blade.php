<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
        <span class="brand-text font-weight-light">Revendas</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-arrow-circle-down"></i>
                        <p>
                            Entrada
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('empresas.create')}}?tipo=fornecedor" class="nav-link">
                                <i class="fas fa-file nav-icon"></i>
                                <p>Novo Fornecedor</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('empresas.index') }}?tipo=fornecedor" class="nav-link">
                                <i class="far fa-list-alt nav-icon"></i>
                                <p>Lista de Fornecedores</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-arrow-circle-up"></i>
                        <p>
                            Saída
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('empresas.create') }}?tipo=cliente" class="nav-link">
                                <i class="fas fa-file nav-icon"></i>
                                <p>Novo Cliente</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('empresas.index') }}?tipo=cliente" class="nav-link">
                                <i class="far fa-list-alt nav-icon"></i>
                                <p>Lista de Clientes</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-money-check-alt"></i>
                        <p>
                            Financeiro
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('movimentos_financeiros.create') }}" class="nav-link">
                                <i class="fas fa-dollar-sign nav-icon"></i>
                                <p>Novo Lançamento</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('movimentos_financeiros.index') }}" class="nav-link">
                                <i class="fas fa-chart-pie nav-icon"></i>
                                <p>Relátorio Financeiro</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-box"></i>
                        <p>
                            Cadastros
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('produtos.index') }}" class="nav-link">
                                <i class="fas fa-boxes nav-icon"></i>
                                <p>Produtos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('users.index') }}" class="nav-link">
                                <i class="fas fa-users nav-icon"></i>
                                <p>Usuários</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>

        <div class="info mt-3">
            <a class="btn btn-dark" href="{{ route('logout') }}" onclick="event.preventDefault();	
                                    document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt" style="margin-right: 5px;"></i> Sair
            </a>


            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                <footer class="main-footer">
                    @csrf
            </form>
        </div>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>