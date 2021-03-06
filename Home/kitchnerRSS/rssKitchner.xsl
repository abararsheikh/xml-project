<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <xsl:template match="/">
        <xsl:apply-templates select="rss/channel"/>
    </xsl:template>
    <xsl:template match="channel">
        <h2>
            <a href="{link}" targrt="_blank">
                <xsl:value-of select="title"/>
            </a>
        </h2>
        <ul>
            <xsl:apply-templates select="item" />
        </ul>
    </xsl:template>
    <xsl:template match="item">
        <h3>
            <xsl:choose>
                <xsl:when test="string-length(link)>0">  <!--if there is a link then dispaly as link otherwise normal display-->
                    <a href="{link}" target="_blank">
                        <xsl:value-of select="title" />
                    </a>
                </xsl:when>

            <xsl:otherwise>
                <xsl:value-of select="title"/>
            </xsl:otherwise>
            </xsl:choose>
        </h3>

        <div>
            <xsl:choose>
                <xsl:when test="string-length(description)>0">
                    <xsl:value-of disable-output-escaping="yes" select="description" />
                    <br/>
                </xsl:when>
            </xsl:choose>

            <xsl:choose>
                <xsl:when test="string-length(pubDate)>0">
                    <strong>Published: </strong>
                    <xsl:value-of select="pubDate" />
                </xsl:when>
            </xsl:choose>
        </div>
        <hr/>
    </xsl:template>
</xsl:stylesheet>