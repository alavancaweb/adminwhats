<?php

session_start();

// For add'active' class for activated route nav-item
function active_class($path, $active = 'active') {
    return call_user_func_array('Request::is', (array)$path) ? $active : '';
}

// For checking activated route
function is_active_route($path) {
    return call_user_func_array('Request::is', (array)$path) ? 'true' : 'false';
}

// For add 'show' class for activated route collapse
function show_class($path) {
    return call_user_func_array('Request::is', (array)$path) ? 'show' : '';
}?>


<nav class="sidebar sidebar-offcanvas dynamic-active-class-disabled" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile not-navigation-link">
            <div class="nav-link"></div>
        </li>

        <li class="nav-item {{ active_class(['/conectar']) }}">
            <a class="nav-link" href="{{ url('/conectar') }}">
                <i class="menu-icon mdi mdi-image-filter-center-focus"></i>
                <span class="menu-title">Conectar</span>
            </a>
        </li>

        <li class="nav-item {{ active_class(['/horario']) }}">
            <a class="nav-link" href="{{ url('/horario') }}">
                <i class="menu-icon mdi mdi mdi-alarm"></i>
                <span class="menu-title">Horário Atendimento</span>
            </a>
        </li>

        <li class="nav-item {{ active_class(['/mensagens']) }}">
            <a class="nav-link" href="{{ url('/mensagens') }}">
                <i class="menu-icon mdi mdi-account-convert"></i>
                <span class="menu-title">Mensagens</span>
            </a>
        </li>

        <li class="nav-item {{ active_class(['/suporte']) }}">
            <a class="nav-link" href="{{ url('/suporte') }}">
                <i class="menu-icon mdi mdi-wrench"></i>
                <span class="menu-title">Suporte</span>
            </a>
        </li>
    </ul>
</nav>
