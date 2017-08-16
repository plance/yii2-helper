<?php 
namespace plance\helper;

use Yii;

class HelperSitemap
{
	/*
	 * CHANGEFREQ
	 * - always
	 * - hourly
	 * - daily
	 * - weekly
	 * - monthly
	 * - yearly
	 * - never
	 * 
	 * PRIORITY
	 * 0.0 - 1.0
	 * 
	 * <?xml version="1.0" encoding="UTF-8"?>
	 * <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
	 *   <url>
	 *      <loc>http://www.example.com/</loc>
	 *      <lastmod>2005-01-01</lastmod>
	 *      <changefreq>monthly</changefreq>
	 *      <priority>0.8</priority>
	 *   </url>
	 *  </urlset>
	 */
	
	
	/**
	 * Get top urlset
	 * @return string
	 */
	public static function top()
	{
		return "<?xml version='1.0' encoding='UTF-8'?>\n"
			."<urlset xmlns='http://www.sitemaps.org/schemas/sitemap/0.9'>\n";
	}

	/**
	 * Get bottom urlset
	 * @return string
	 */
	public static function bottom()
	{
		return '</urlset>';
	}
	
	/**
	 * Get URL index page
	 * @param string $changefreq
	 * @param string $priority
	 * @return string
	 */
	public static function index($changefreq = 'monthly', $priority = '1.0')
	{
		return self::url(NULL, FALSE, $changefreq, $priority);
	}
	
	/**
	 * Create url element
	 * @param string $loc
	 * @param string $lastmod
	 * @param string $changefreq
	 * @param string $priority
	 * @return string
	 */
	public static function url($loc, $lastmod, $changefreq, $priority)
	{
		return	"\t<url>\n"
					."\t\t<loc>".Yii::$app -> getRequest() -> getHostInfo().$loc."</loc>\n"
					.($lastmod ? "\t\t<lastmod>".$lastmod."</lastmod>\n" : '')
					."\t\t<changefreq>".$changefreq."</changefreq>\n"
					."\t\t<priority>".$priority."</priority>\n"
				."\t</url>\n";
	}
}