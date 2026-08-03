<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Domain-metadata helper.
 *
 * This class used to carry a generic SQL layer (`orm`/`orms`, `queryForId`,
 * `queryForList`, `queryForFirst`, `queryForNew`, `queryForIds`, `queryForMap`,
 * `queryForCount`, `getQuerySql`, `prepare`, `delete` and their private executors).
 * None of it was reachable in the free build — countdowns and plugin settings are
 * persisted as JSON in `wp_options` via ICP_Manager / ICP_Options / ICP_PluginOptions,
 * never through a table of our own — and its `$wpdb->prepare()` usage was malformed
 * (`prepare('%s', $sql)` and `%s` placeholders for table/column identifiers), so the
 * methods could not have executed correctly had anything called them.
 *
 * The whole layer was removed per finding #8 of `SECURITY-AUDIT.md` ("Fragile,
 * currently-unreachable DAO SQL layer"), which offered repair-or-remove; removal was
 * chosen so the free build ships no unused SQL surface at all.
 *
 * What remains are the two annotation helpers that ICP_DaoUtils genuinely calls.
 * The real work of this subsystem lives in ICP_DaoUtils (`$icp->Dao->Utils`), which
 * reads the `@table` / `@column` annotations off the domain classes and does not
 * touch the database.
 */
class ICP_Dao {
	var $Utils;

	public function __construct() {
		$this->Utils = new ICP_DaoUtils();
	}

	/**
	 * Suffixes that mark a property on a `…Search` class as a query criterion.
	 *
	 * Consumed by ICP_DaoUtils::getColumns() to map a `…Search` property back onto the
	 * domain column it derives from. This is annotation bookkeeping, not SQL.
	 */
	public function getSearchPatterns() {
		$patterns = array( 'Equals', 'Like', 'Ids', 'From', 'To', 's', '' );
		return $patterns;
	}
}
