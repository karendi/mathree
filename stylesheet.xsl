<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">
<html>
<body>
<h2>Prices..</h2>
<table border="2">
<th style="text-align:left">Location</th>
<th style="text-align:centre">Destination</th>
<th style="text-align:right">Price</th>
<xsl:for-each select="markers/marker">
<tr>
<td><xsl:value-of select="Location"/></td>
<td><xsl:value-of select="Destination"/></td>
<td><xsl:value-of select="Price"/></td>
</tr>
</xsl:for-each>
</table>
</html>
</xsl:template>
</xsl:stylesheet>
 