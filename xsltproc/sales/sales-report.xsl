<?xml version="1.0" encoding="utf-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output method="text"/>
    <xsl:template match="/">
        <xsl:apply-templates select="//prodsale"/>
    </xsl:template>
    <xsl:template match="prodsale">
        <xsl:variable name="sales" select="."/>
        <xsl:choose>
            <xsl:when test="$sales &gt;= 100">
                <xsl:value-of select="../@num"/>
                <xsl:text>: </xsl:text>
                <xsl:value-of select="."/>
                <xsl:text/>
                <xsl:value-of select="id(@idref)"/>
                <xsl:text/>
            </xsl:when>
        </xsl:choose>
    </xsl:template>
</xsl:stylesheet>