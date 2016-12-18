<?xml version="1.0" encoding="utf-8"?>
<xsl:stylesheet version="1.0" xmlns="http://www.w3.org/2000/svg" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:template match="/zeichnung">
		<svg version="1.1">
			<xsl:apply-templates/>
		</svg>
	</xsl:template>
	<xsl:template match="linie">
		<line stroke="black" stroke-width="2">
			<xsl:attribute name="x1">
				<xsl:value-of select="anfangspunkt/@x"/>
			</xsl:attribute>
			<xsl:attribute name="y1">
				<xsl:value-of select="anfangspunkt/@y"/>
			</xsl:attribute>
			<xsl:attribute name="x2">
				<xsl:value-of select="endpunkt/@x"/>
			</xsl:attribute>
			<xsl:attribute name="y2">
				<xsl:value-of select="endpunkt/@y"/>
			</xsl:attribute>
		</line>
	</xsl:template>
</xsl:stylesheet>