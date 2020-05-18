<div class="row row-offcanvas row-offcanvas-left">
        
         <div class="col-sm-3 col-md-2 sidebar-offcanvas" id="sidebar" role="navigation">
           
            <ul class="nav nav-sidebar">
              <li><a href="index.php">Home</a></li>
              <li class="<?php echo isset($productsMenu)?'active':''?>"><a href="productos.php">Productos</a></li>
			  <li class="<?php echo isset($marcasMenu)?'active':''?>"><a href="marcas.php">Marcas</a></li>
			  <!--<li class="<?php echo isset($newsMenu)?'active':''?>"><a href="noticias.php">Noticias</a></li>-->
			  <?php if(in_array(array('pedido.add','pedido.del','pedido.edit','pedido.see'),$_SESSION['usuario']['permisos'])){?>
					<li class="<?php echo isset($pedidosMenu)?'active':''?>"><a href="pedidos.php">Pedidos</a></li>
			  <?php }?>
			  <?php if( in_array('user.add',$_SESSION['usuario']['permisos']) ||
					in_array('user.del',$_SESSION['usuario']['permisos'])||		
					in_array('user.edit',$_SESSION['usuario']['permisos'])||
					in_array('user.see',$_SESSION['usuario']['permisos'])){?>
					<li class="<?php echo isset($userMenu)?'active':''?>"><a href="usuarios.php">Usuarios</a></li>
			  <?php }?>
			 <li class="<?php echo isset($perfilMenu)?'active':''?>"><a href="perfiles.php">Perfiles</a></li>
              <li><a href="?logout">logout</a></li>
              <li><a href="#">Export</a></li>
            </ul>
           
          
        </div><!--/span-->