<table width="700" border="0" cellpadding="0" cellspacing="0" ALIGN="CENTER">
  <!--DWLayoutTable-->
  <? if ($s_m_tipo=="0") {?>
 
    </table> </td>
    <td width="500" valign="center"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <!--DWLayoutTable-->
      <tr align="center">
        <td height="80" colspan="2" valign="top"><IMG SRC="img/web/titulo.gif" WIDTH="304" HEIGHT="50" BORDER=0 ALT=""></td>
      </tr>
      <tr ALIGN="center">
        <td height="80" valign="top"><A HREF="pedidoAgregar.php" class=""><IMG SRC="img/web/pedido_nuevo.gif" WIDTH="142" HEIGHT="56" BORDER=0 ALT="Nuevo Pedido"></A></td>
        <td valign="top"><A HREF="pedidoVer.php" class=""><IMG SRC="img/web/pedido_vermispedidos.gif" WIDTH="152" HEIGHT="63" BORDER=0 ALT="Mis Pedidos"></A></td>
      </tr>
      <tr ALIGN="center">
        <td height="80" valign="top"><A HREF="menu_especiales.php" class=""><IMG SRC="img/web/especial.gif" WIDTH="201" HEIGHT="36" BORDER=0 ALT="Especiales en Línea"></A></td>
        <td valign="top"><A HREF="http://ofnasystemas.myvnc.com/firebird/index.php?empresa=<?=$s_m_id_cliente?>" class=""><IMG SRC="img/web/documentos.gif" WIDTH="210" HEIGHT="50" BORDER=0 ALT="Consulta Saldos Facturas"></A></td>
      </tr>
	  <!--<TR ALIGN="center">
		<TD height="80" valign="top"><A HREF="vota.php" class=""><IMG SRC="img/web/encuesta.gif" WIDTH="142" HEIGHT="56" BORDER=0 ALT="Encuestas"></A></TD>
	  </TR> -->
      <tr>
        <td height="200">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
    </td>
  </tr>
  <?}else {?>
	<tr>
    <td width="200" height="584" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <!--DWLayoutTable-->
	  

    <td width="500" valign="center"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <!--DWLayoutTable-->
      <tr align="center">
        <td height="80" colspan="2" valign="top"><IMG SRC="img/web/titulo.gif" WIDTH="304" HEIGHT="50" BORDER=0 ALT=""></td>
      </tr>
      <tr ALIGN="center">
        <td height="80" valign="top"><A HREF="pedidoAgregar.php" class=""><IMG SRC="img/web/pedido_nuevo.gif" WIDTH="142" HEIGHT="56" BORDER=0 ALT="Nuevo Pedido"></A></td>
        <td valign="top"><A HREF="concentrado.php" class=""><IMG SRC="img/web/concentrado.gif" WIDTH="202" HEIGHT="48" BORDER=0 ALT="Concentrado"></A></td>
      </tr>
      <tr ALIGN="center">
        <td height="80" valign="top"><A HREF="menu_especiales.php" class=""><IMG SRC="img/web/especial.gif" WIDTH="201" HEIGHT="36" BORDER=0 ALT="Especiales en Línea"></A></td>
        <td valign="top"><A HREF="configuracionIndex.php" class="">
		<IMG SRC="img/web/configuracion.gif" WIDTH="189" HEIGHT="33" BORDER=0 ALT=""></A></td>
      </tr>
	  <!-- <TR ALIGN="center">
		<TD height="80" valign="top"><A HREF="http://ofnasystemas.myvnc.com/firebird/doctosindex.php" class=""><IMG SRC="img/web/documentos.gif" WIDTH="210" HEIGHT="50" BORDER=0 ALT="Consulta Saldos Facturas"></A></TD>
	  </TR> -->
      <tr>
        <td height="200">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
    </td>
  </tr>
  <?  }  ?>
</table> 

<? include "pie.php"; ?>