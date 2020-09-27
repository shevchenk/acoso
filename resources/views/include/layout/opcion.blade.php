<div class="site-menubar site-menubar-light">
  <div class="site-menubar-body">
    <div>
      <ul class="site-menu">        
        <?php 
        $opciones = session('opciones');
        $menu_aux = '';
        foreach ($opciones as $key => $value) {
          if( $value->menu != $menu_aux ){
            $menu_aux = $value->menu;
            if( $key>0 ){
              echo "</ul></li>";
            }
        ?>
            <li class="site-menu-item has-sub">
              <a href="javascript:void(0)" data-dropdown-toggle="false">
                  <i class="site-menu-icon {{ $value->class_icono }}" aria-hidden="true"></i>
                  <span class="site-menu-title">{{ $value->menu }}</span>
                  <span class="site-menu-arrow"></span>
              </a>
              <ul class="site-menu-sub">
            
        <?php
          }
          $active='';
          if( $value->ruta == $valida_ruta_url ){
            $active = 'active';
          }
        ?>
                <li class="site-menu-item {{ $active }}">
                  <a href="{{ $value->ruta }}">
                    <span class="site-menu-title">{{ $value->opcion }}</span>
                  </a>
                </li>
        <?php
        }

        if( isset( $opciones[0]->menu ) ){
          echo "</ul></li>";
        }
        ?>
        <!-- <li class="site-menu-item has-sub">
          <a href="acceso.index" data-dropdown-toggle="false">
              <i class="site-menu-icon wb-flag" aria-hidden="true"></i>
              <span class="site-menu-title">Inicio</span>
              <span class="site-menu-arrow"></span>
          </a>
        </li> -->
        <li class="site-menu-item has-sub">
          <a href="salir" data-dropdown-toggle="false">
              <i class="site-menu-icon wb-power" aria-hidden="true"></i>
              <span class="site-menu-title">Cerrar Sesión</span>
              <span class="site-menu-arrow"></span>
          </a>
        </li>
      </ul>
    </div>
  </div>
</div>


<nav class="navbar navbar-expand-lg navbar-light bg-white" id="navValidation" style="display: ;">
  <div class="collapse navbar-collapse" id="navbarSite">
    <ul class="navbar-nav">
        <?php 
        $menu_aux = '';
        foreach ($opciones as $key => $value) {
          if( $value->menu != $menu_aux ){
            $menu_aux = $value->menu;
            if( $key>0 ){
              echo "</div></li>";
              echo "<div class=\"dropdown-divider\"></div>";
            }
        ?>
            <li class="nav-item dropdown" style="margin-left: 10px; font-size: 18px;">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" data-toggle="dropdown">
                <i class="{{ $value->class_icono }}" aria-hidden="true"></i>
                {{ $value->menu }}
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
            
        <?php
          }
          else{
            echo "<div class=\"dropdown-divider\"></div>";
          }

          $active='';
          if( $value->ruta == $valida_ruta_url ){
            $active = 'active';
          }
        ?>
                <a href="{{ $value->ruta }}" class="dropdown-item {{ $active }}">
                  {{ $value->opcion }}
                </a>
        <?php
        }
            echo "</div></li>";
            echo "<div class=\"dropdown-divider\"></div>";
        ?>

      <li class="nav-item" style="margin-left: 10px; font-size: 18px;">
        <a class="nav-link" href="salir">
          <i class="wb-power" aria-hidden="true"></i>
          Cerrar Sesión
        </a>
      </li>
    </ul>
  </div>
</nav>
