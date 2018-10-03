<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
<html> 
<body>
	<h2>Generos</h2>
  <table border="0">
    <tr bgcolor="white">
      <th style="text-align:left"></th>
    </tr>
    <xsl:for-each select="generos/genero">
	<xsl:variable name="var"><xsl:value-of select="id_genero"/></xsl:variable>
    <tr>
      <td><a href="http://api.local/jogos/genero={$var}?format=html"> <xsl:value-of select="nome_genero"/></a></td>
    </tr>
    </xsl:for-each>
  </table>
</body>
</html>
</xsl:template>
</xsl:stylesheet>
