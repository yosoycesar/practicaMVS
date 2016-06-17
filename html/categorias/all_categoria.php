<?php include(HTML_DIR . 'overall/header.php'); ?>

 <body>
 <section class="engine"><a rel="nofollow" href="#"><?php echo APP_TITLE ?></a></section>

 <?php include(HTML_DIR . '/overall/topnav.php'); ?>

 <section class="mbr-section mbr-after-navbar">
 <div class="mbr-section__container container mbr-section__container--isolated">
  <div class="row container">
    <div class="pull-right">
      <div class="mbr-navbar__column">
      	<ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-inverse mbr-buttons--active">
      		<li class="mbr-navbar__item">
           		<a class="mbr-buttons__btn btn btn-danger" href="?view=configforos">GESTIONAR FOROS</a>
       		</li>
       	</ul>
       </div>
        <div class="mbr-navbar__column">
        	<ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-inverse mbr-buttons--active">
        		<li class="mbr-navbar__item">
           			<a class="mbr-buttons__btn btn btn-danger active" href="?view=categorias">GESTIONAR CATEGORÍAS</a>
        		</li>
        	</ul>
        </div>
        <div class="mbr-navbar__column">
        	<ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-inverse mbr-buttons--active">
        		<li class="mbr-navbar__item">
            		<a class="mbr-buttons__btn btn btn-danger" href="?view=categorias&mode=add">CREAR CATEGORÍA</a>
        		</li>
    		</ul>
        </div>
      </div>

     <ol class="breadcrumb">
       <li><a href="?view=index"><i class="fa fa-tags"></i> Categorías</a></li>
     </ol>
 </div>

 <div class="row categorias_con_foros">
   <div class="col-sm-12">
       <div class="row titulo_categoria">Gestión de Categoríast</div>
       <div class="row cajas">
         <div class="col-md-12">
           <?php 
	       	if ($db->rows($sql)>0) {
	       		$HTML = '
	       		<table class="table">
	       			<thead>
	       				<tr>
				            <th style="width: 10%">Id</th>
				            <th style="width: 70%">Nombre de categoría</th>
				            <th style="width: 20%">Acciones</th>
			            </tr>
		            </thead>'
			    ;
	       		while ($data = $db->recorrer($sql)) {
	       			$HTML .= '
	       			<tr>
	                   <td>'.$data['id'].'</td>
	                   <td>'.$data['nombre'].'</td>
	                   <td>
	                     <div class="btn-group">
	                      <a href="#" class="btn btn-primary">Acciones</a>
	                      <a href="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
	                      <ul class="dropdown-menu">
	                        <li><a href="?view=categorias&mode=edit&id='.$data['id'].'">Editar</a></li>
	                        <li><a onclick="DeleteItem(\'¿Está seguro de eliminar esta categoría?\',\'?view=categorias&mode=delete&id='.$data['id'].'\')">Eliminar</a></li>
	                      </ul>
	                    </div>
	                   </td>
	                 </tr>';
	       		}
	       		$HTML .= '</tbody></table>';
	       	} else {
	       		 $HTML = '<div class="alert alert-dismissible alert-info"><strong>INFORMACIÓN: </strong> Todavía no existe ninguna categoría.</div>';
	       	}
	       	echo $HTML;
	        ?>
         </div>
       </div> 
   </div>
 </div>

 </div>
 </section>

 <?php include(HTML_DIR . 'overall/footer.php'); ?>

 </body>
 </html>
 