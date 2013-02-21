<?
 if ($s_m_tipo!="1") 

    header ("location:admin.php");



include 'head.php';

?>

	<SCRIPT LANGUAGE="JavaScript">

	<!--

function hola(renglon){

		if (renglon.bgColor=="#ffffff")

		 renglon.bgColor="#D1D1D1";

		else

		 renglon.bgColor="#ffffff";

	}

	function verificaEliminar(){

	var pasa=false;

	for (var i=0;i < forma.elements.length; i++) {

	if (forma.elements[i].type=="checkbox")

			if (forma.elements[i].checked){

				pasa = true;

				break;

			} //			if (forma.elements[i].checked){

	}//for

		if (pasa){

				var agree=confirm("¿Estas seguro de Eliminar a los Productos?");

					if (agree)

						return true ;

					else

						return false ;

		}else

			alert("Selecciona un producto");

		return false;

			

	}

	-->

	</SCRIPT>

<TABLE cellspacing="0" cellpadding="0" border="0" align='center'>

<TR>

	<TD valign='top'><? include "configuracionMenu.php"; ?></TD>

	<TD align='center'>

<TABLE width='550' cellpadding=0 cellspacing=0 border=0 align='center'>

<FORM METHOD="POST" name="forma" ACTION="productoEliminar.php" onSubmit="return verificaEliminar();">



<TR>

	<TD align=center class="mision" height="40">

	  Catálogo de Artículos

	</TD>

</TR>

<TR height="30">

	<TD class="titulo16" align=center>

	 <INPUT TYPE="button" value="&nbsp;Agregar Artículo&nbsp;" class="boton" onclick="javascript:window.location='productoAgregar.php';">&nbsp;&nbsp;

	<INPUT TYPE="submit" VALUE="Eliminar Productos" CLASS="boton">

	</TD>

</TR>

<TR>

	<TD align=center>

<TABLE BORDER=1 cellpadding="2" cellspacing="0" WIDTH="500" bordercolor="#00725e">



<TR bordercolor="#ffffff" bgcolor="#00725e">

	<TD></TD>

	<TD class="textotable" align="center" width='50'><A HREF="productoIndex.php?order=codigo"><IMG SRC="img/web/order.gif" WIDTH="12" HEIGHT="11" BORDER=0 ALT="Ordenar por Artículo"></A>Artículo</TD>

	<TD class="textotable" align="center"><A HREF="productoIndex.php?order=producto"><IMG SRC="img/web/order.gif" WIDTH="12" HEIGHT="11" BORDER=0 ALT="Ordenar por Descripción"></A> Descripción</TD>

	<TD class="textotable" align="center"><A HREF="productoIndex.php?order=orden"><IMG SRC="img/web/order.gif" WIDTH="12" HEIGHT="11" BORDER=0 ALT="Ordenar por Orden"></A>Orden</TD>

	<TD class="textotable" align="center">Local</TD>

	<TD class="textotable" align="center">Foraneo</TD>

</TR>

<?



if (empty($order))

	$order="codigo";

$SQL = "SELECT * FROM producto ORDER BY $order";

$res= mysql_query($SQL);

$vrenglon=2;

 while ($cur=mysql_fetch_object($res))  {

	 $codigo =$cur->codigo;

 	 $id_producto =$cur->id_producto; 

 	 $producto =$cur->producto; 

	 $precio =$cur->precio; 

 	 $id_betun =$cur->id_betun; 

 	 $id_pasta =$cur->id_pasta; 

 	 $unidad =$cur->unidad; 

 	 $id_tipo =$cur->id_tipo;  

 	 $status =$cur->status; 

 	 $persona =$cur->persona; 

 	 $pedido =$cur->pedido;  

 	 $orden =$cur->orden; 

	 $precio_local=$cur->precio_local;  

 	 $precio_foraneo =$cur->precio_foraneo; 

 

	?>

	<TR bgcolor=#ffffff id="ren<?=$vrenglon?>">

	<TD width='10'><INPUT onClick="hola(ren<?=$vrenglon?>)" TYPE="checkbox" NAME="sel<?=trim($id_producto);?>" value="<?=$id_producto?>"></TD>

		<TD class="texto"><?=ceros($codigo)?></TD>

		<TD class="texto"><A class="linkbody"  HREF="productoModificar.php?id=<?=$id_producto?>"><?=$producto?></A></TD>

		<TD class="texto"><?=$orden?></TD>

		<TD class="texto" align='right'>$<?=number_format($precio_local, 2, '.', ',');?></TD>

		<TD class="texto" align='right'>$<?=number_format($precio_foraneo, 2, '.', ',');?></TD>



	</TR>

	<?

$vrenglon++;

  }  // while ?>

</TABLE>	

	</TD>

</TR>

</FORM>

</TABLE>



	</TD>

</TR>

</TABLE>





<?

mysql_close();

	include 'pie.php';

?>