<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output method="xml" version="1.0" encoding="UTF-8" indent="yes" omit-xml-declaration="yes" />
	<xsl:param name="lang">fr</xsl:param>

	<xsl:template match="/">
		<div class="slideshow">
			<div class="slidesmask">
				<div class="slides">
					<xsl:apply-templates select="//slide" mode="article"/>
				</div>
			</div>
			<div class="control">
        <xsl:apply-templates select="//slide" mode="control"/>
			</div>
		</div>
	</xsl:template>
	<xsl:template match="slide" mode="article">
		<article>
			<img src="data/slideshow/images/{@img}" alt="{text[@id='label' and @lang=$lang]/@alt}"/>
			<!-- Seulement si le noeud text avec id='label' n'est pas vide -->
			<xsl:if test="text[@id='label' and @lang=$lang]/text() != ''">
				<div class="label">
					<xsl:value-of select="text[@id='label' and @lang=$lang]"/>
					<div class="sublabel">
						<xsl:value-of select="text[@id='sublabel' and @lang=$lang]"/>
					</div>
				</div>
			</xsl:if>
		</article>
	</xsl:template>
  <xsl:template match="slide" mode="control">
    <xsl:choose>
      <xsl:when test="position()=1">
        <span class="icon-circle"/>
      </xsl:when>
      <xsl:otherwise>
        <span class="icon-circle-blank"/>
      </xsl:otherwise>
    </xsl:choose>
  </xsl:template>
</xsl:stylesheet>