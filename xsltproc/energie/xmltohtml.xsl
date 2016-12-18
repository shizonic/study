<?xml version="1.0" encoding="utf-8" ?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output method="html"/>
    <xsl:key match="energietraeger" name="traegerliste" use="bezeichnung"/>
    <xsl:template match="/energiestatistik">
        <html>
            <head>
                <title>Energieverbrauch nach Energieträgern</title>
            </head>
            <body>
                <h1>Energieverbrauch nach Energieträgern</h1>
                <table>
                    <tr bgcolor="#daffff">
                        <th/>
                        <xsl:for-each select="energieverbrauch">
                            <th>
                                <xsl:value-of select="@jahr"/>
                            </th>
                        </xsl:for-each>
                    </tr>
                    <xsl:for-each select="/energiestatistik/energieverbrauch/energietraeger[generate-id() = generate-id(key('traegerliste', bezeichnung))]">
                        <tr>
                            <td>
                                <xsl:value-of select="bezeichnung"/>
                            </td>
                            <xsl:variable name="b" select="bezeichnung"/>
                            <xsl:for-each select="/energiestatistik/energieverbrauch">
                                <td ALIGN="RIGHT">
                                    <!-- Energietraeger bestimmen: -->
                                    <xsl:variable name="e" select="energietraeger[bezeichnung = $b]"/>
                                    <xsl:choose>
                                        <xsl:when test="$e">
                                            <!-- wenn wir was gefunden haben -->
                                            <xsl:value-of select="$e/wert"/>
                                        </xsl:when>
                                        <xsl:otherwise>...</xsl:otherwise>
                                    </xsl:choose>
                                </td>
                            </xsl:for-each>
                        </tr>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>