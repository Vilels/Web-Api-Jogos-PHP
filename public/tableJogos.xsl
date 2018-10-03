<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
<html> 
<body>
  <h2>Lista Jogos</h2>
  <table border="1">
    <tr bgcolor="grey">
      <th style="text-align:left">Id</th>
      <th style="text-align:left">Nome</th>
	  <th style="text-align:left">Genero</th>
	  <th style="text-align:left">Desenvolvedor</th>
	  <th style="text-align:left">Editora</th>
	  <th style="text-align:left">Data</th>
	  <th style="text-align:left">Tipo</th>
    </tr>
    <xsl:for-each select="jogos/jogo">
    <tr>
      <td><xsl:value-of select="id"/></td>
      <td><xsl:value-of select="nome"/></td>
	  <td><xsl:value-of select="genero"/></td>
	  <td><xsl:value-of select="desenvolvedor"/></td>
	  <td><xsl:value-of select="editora"/></td>
	  <td><xsl:value-of select="data"/></td>
	  <td><xsl:value-of select="tipo"/></td>
    </tr>
    </xsl:for-each>
  </table>
</body>
</html>
</xsl:template>
</xsl:stylesheet>
