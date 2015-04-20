<?php

namespace Ajax\bootstrap\html\base;

use Ajax\common\BaseEnum;
use Ajax\service\PhalconUtils;

/**
 * Default HTML values for Twitter Bootstrap HTML components
 * @author jc
 * @version 1.001
 */
class CssRef {
	const CSS_DEFAULT="-default", CSS_PRIMARY="-primary", CSS_SUCCESS="-success", CSS_INFO="-info", CSS_WARNING="-warning", CSS_DANGER="-danger", CSS_LINK="-link";

	public static function buttonStyles() {
		return array (
				"btn-default",
				"btn-primary",
				"btn-success",
				"btn-info",
				"btn-warning",
				"btn-danger",
				"btn-link" 
		);
	}

	public static function Styles($prefix="btn") {
		return array (
				$prefix."-default",
				$prefix."-primary",
				$prefix."-success",
				$prefix."-info",
				$prefix."-warning",
				$prefix."-danger" 
		);
	}

	public static function sizes($prefix="btn") {
		return array (
				$prefix."-lg",
				"",
				$prefix."-sm",
				$prefix."-xs" 
		);
	}

	public static function position() {
		return array (
				"top",
				"left",
				"right",
				"bottom",
				"auto" 
		);
	}

	public static function alignment($prefix="") {
		return array (
				$prefix."",
				$prefix."left",
				$prefix."right",
				$prefix."vertical",
				$prefix."justified" 
		);
	}

	public static function navbarZoneClasses() {
		return array (
				"navbar-nav",
				"navbar-left",
				"navbar-right",
				"navbar-form" 
		);
	}

	public static function glyphIcons() {
		return array (
				"glyphicon-asterisk",
				"glyphicon-plus",
				"glyphicon-euro",
				"glyphicon-eur",
				"glyphicon-minus",
				"glyphicon-cloud",
				"glyphicon-envelope",
				"glyphicon-pencil",
				"glyphicon-glass",
				"glyphicon-music",
				"glyphicon-search",
				"glyphicon-heart",
				"glyphicon-star",
				"glyphicon-star-empty",
				"glyphicon-user",
				"glyphicon-film",
				"glyphicon-th-large",
				"glyphicon-th",
				"glyphicon-th-list",
				"glyphicon-ok",
				"glyphicon-remove",
				"glyphicon-zoom-in",
				"glyphicon-zoom-out",
				"glyphicon-off",
				"glyphicon-signal",
				"glyphicon-cog",
				"glyphicon-trash",
				"glyphicon-home",
				"glyphicon-file",
				"glyphicon-time",
				"glyphicon-road",
				"glyphicon-download-alt",
				"glyphicon-download",
				"glyphicon-upload",
				"glyphicon-inbox",
				"glyphicon-play-circle",
				"glyphicon-repeat",
				"glyphicon-refresh",
				"glyphicon-list-alt",
				"glyphicon-lock",
				"glyphicon-flag",
				"glyphicon-headphones",
				"glyphicon-volume-off",
				"glyphicon-volume-down",
				"glyphicon-volume-up",
				"glyphicon-qrcode",
				"glyphicon-barcode",
				"glyphicon-tag",
				"glyphicon-tags",
				"glyphicon-book",
				"glyphicon-bookmark",
				"glyphicon-print",
				"glyphicon-camera",
				"glyphicon-font",
				"glyphicon-bold",
				"glyphicon-italic",
				"glyphicon-text-height",
				"glyphicon-text-width",
				"glyphicon-align-left",
				"glyphicon-align-center",
				"glyphicon-align-right",
				"glyphicon-align-justify",
				"glyphicon-list",
				"glyphicon-indent-left",
				"glyphicon-indent-right",
				"glyphicon-facetime-video",
				"glyphicon-picture",
				"glyphicon-map-marker",
				"glyphicon-adjust",
				"glyphicon-tint",
				"glyphicon-edit",
				"glyphicon-share",
				"glyphicon-check",
				"glyphicon-move",
				"glyphicon-step-backward",
				"glyphicon-fast-backward",
				"glyphicon-backward",
				"glyphicon-play",
				"glyphicon-pause",
				"glyphicon-stop",
				"glyphicon-forward",
				"glyphicon-fast-forward",
				"glyphicon-step-forward",
				"glyphicon-eject",
				"glyphicon-chevron-left",
				"glyphicon-chevron-right",
				"glyphicon-plus-sign",
				"glyphicon-minus-sign",
				"glyphicon-remove-sign",
				"glyphicon-ok-sign",
				"glyphicon-question-sign",
				"glyphicon-info-sign",
				"glyphicon-screenshot",
				"glyphicon-remove-circle",
				"glyphicon-ok-circle",
				"glyphicon-ban-circle",
				"glyphicon-arrow-left",
				"glyphicon-arrow-right",
				"glyphicon-arrow-up",
				"glyphicon-arrow-down",
				"glyphicon-share-alt",
				"glyphicon-resize-full",
				"glyphicon-resize-small",
				"glyphicon-exclamation-sign",
				"glyphicon-gift",
				"glyphicon-leaf",
				"glyphicon-fire",
				"glyphicon-eye-open",
				"glyphicon-eye-close",
				"glyphicon-warning-sign",
				"glyphicon-plane",
				"glyphicon-calendar",
				"glyphicon-random",
				"glyphicon-comment",
				"glyphicon-magnet",
				"glyphicon-chevron-up",
				"glyphicon-chevron-down",
				"glyphicon-retweet",
				"glyphicon-shopping-cart",
				"glyphicon-folder-close",
				"glyphicon-folder-open",
				"glyphicon-resize-vertical",
				"glyphicon-resize-horizontal",
				"glyphicon-hdd",
				"glyphicon-bullhorn",
				"glyphicon-bell",
				"glyphicon-certificate",
				"glyphicon-thumbs-up",
				"glyphicon-thumbs-down",
				"glyphicon-hand-right",
				"glyphicon-hand-left",
				"glyphicon-hand-up",
				"glyphicon-hand-down",
				"glyphicon-circle-arrow-right",
				"glyphicon-circle-arrow-left",
				"glyphicon-circle-arrow-up",
				"glyphicon-circle-arrow-down",
				"glyphicon-globe",
				"glyphicon-wrench",
				"glyphicon-tasks",
				"glyphicon-filter",
				"glyphicon-briefcase",
				"glyphicon-fullscreen",
				"glyphicon-dashboard",
				"glyphicon-paperclip",
				"glyphicon-heart-empty",
				"glyphicon-link",
				"glyphicon-phone",
				"glyphicon-pushpin",
				"glyphicon-usd",
				"glyphicon-gbp",
				"glyphicon-sort",
				"glyphicon-sort-by-alphabet",
				"glyphicon-sort-by-alphabet-alt",
				"glyphicon-sort-by-order",
				"glyphicon-sort-by-order-alt",
				"glyphicon-sort-by-attributes",
				"glyphicon-sort-by-attributes-alt",
				"glyphicon-unchecked",
				"glyphicon-expand",
				"glyphicon-collapse-down",
				"glyphicon-collapse-up",
				"glyphicon-log-in",
				"glyphicon-flash",
				"glyphicon-log-out",
				"glyphicon-new-window",
				"glyphicon-record",
				"glyphicon-save",
				"glyphicon-open",
				"glyphicon-saved",
				"glyphicon-import",
				"glyphicon-export",
				"glyphicon-send",
				"glyphicon-floppy-disk",
				"glyphicon-floppy-saved",
				"glyphicon-floppy-remove",
				"glyphicon-floppy-save",
				"glyphicon-floppy-open",
				"glyphicon-credit-card",
				"glyphicon-transfer",
				"glyphicon-cutlery",
				"glyphicon-header",
				"glyphicon-compressed",
				"glyphicon-earphone",
				"glyphicon-phone-alt",
				"glyphicon-tower",
				"glyphicon-stats",
				"glyphicon-sd-video",
				"glyphicon-hd-video",
				"glyphicon-subtitles",
				"glyphicon-sound-stereo",
				"glyphicon-sound-dolby",
				"glyphicon-sound-5-1",
				"glyphicon-sound-6-1",
				"glyphicon-sound-7-1",
				"glyphicon-copyright-mark",
				"glyphicon-registration-mark",
				"glyphicon-cloud-download",
				"glyphicon-cloud-upload",
				"glyphicon-tree-conifer",
				"glyphicon-tree-deciduous",
				"glyphicon-cd",
				"glyphicon-save-file",
				"glyphicon-open-file",
				"glyphicon-level-up",
				"glyphicon-copy",
				"glyphicon-paste",
				"glyphicon-alert",
				"glyphicon-equalizer",
				"glyphicon-king",
				"glyphicon-queen",
				"glyphicon-pawn",
				"glyphicon-bishop",
				"glyphicon-knight",
				"glyphicon-baby-formula",
				"glyphicon-tent",
				"glyphicon-blackboard",
				"glyphicon-bed",
				"glyphicon-apple",
				"glyphicon-erase",
				"glyphicon-hourglass",
				"glyphicon-lamp",
				"glyphicon-duplicate",
				"glyphicon-piggy-bank",
				"glyphicon-scissors",
				"glyphicon-bitcoin",
				"glyphicon-yen",
				"glyphicon-ruble",
				"glyphicon-scale",
				"glyphicon-ice-lolly",
				"glyphicon-ice-lolly-tasted",
				"glyphicon-education",
				"glyphicon-option-horizontal",
				"glyphicon-option-vertical",
				"glyphicon-menu-hamburger",
				"glyphicon-modal-window",
				"glyphicon-oil",
				"glyphicon-grain",
				"glyphicon-sunglasses",
				"glyphicon-text-size",
				"glyphicon-text-color",
				"glyphicon-text-background",
				"glyphicon-object-align-top",
				"glyphicon-object-align-bottom",
				"glyphicon-object-align-horizontal",
				"glyphicon-object-align-left",
				"glyphicon-object-align-vertical",
				"glyphicon-object-align-right",
				"glyphicon-triangle-right",
				"glyphicon-triangle-left",
				"glyphicon-triangle-bottom",
				"glyphicon-triangle-top",
				"glyphicon-console",
				"glyphicon-superscript",
				"glyphicon-subscript",
				"glyphicon-menu-left",
				"glyphicon-menu-right",
				"glyphicon-menu-down",
				"glyphicon-menu-up" 
		);
	}

	/**
	 * return a valid style
	 * avaible values : "default","primary","success","info","warning","danger"
	 * @param string|int $cssStyle
	 * @return string
	 */
	public static function getStyle($cssStyle, $prefix) {
		if (is_int($cssStyle)) {
			$styles=CssRef::Styles($prefix);
			if ($cssStyle<sizeof($styles)&&$cssStyle>=0) {
				return CssRef::styles($prefix)[$cssStyle];
			} else {
				throw new \Exception("La valeur passée a propriété `Style` ne fait pas partie des valeurs possibles : index '".$cssStyle."' inexistant");
			}
		}
		if (PhalconUtils::startsWith($cssStyle, "-")===true) {
			$cssStyle=substr($cssStyle, 1);
		}
		if (PhalconUtils::startsWith($cssStyle, $prefix)===false) {
			$cssStyle=$prefix."-".$cssStyle;
		}
		return $cssStyle;
	}
}
abstract class CssGlyphicon extends BaseEnum {
	const GLYPHICON_ASTERISK="glyphicon-asterisk", GLYPHICON_PLUS="glyphicon-plus", GLYPHICON_EURO="glyphicon-euro", GLYPHICON_EUR="glyphicon-eur", GLYPHICON_MINUS="glyphicon-minus", GLYPHICON_CLOUD="glyphicon-cloud", GLYPHICON_ENVELOPE="glyphicon-envelope", GLYPHICON_PENCIL="glyphicon-pencil", GLYPHICON_GLASS="glyphicon-glass", GLYPHICON_MUSIC="glyphicon-music", GLYPHICON_SEARCH="glyphicon-search", GLYPHICON_HEART="glyphicon-heart", GLYPHICON_STAR="glyphicon-star", GLYPHICON_STAR_EMPTY="glyphicon-star-empty", GLYPHICON_USER="glyphicon-user", GLYPHICON_FILM="glyphicon-film", GLYPHICON_TH_LARGE="glyphicon-th-large", GLYPHICON_TH="glyphicon-th", GLYPHICON_TH_LIST="glyphicon-th-list", GLYPHICON_OK="glyphicon-ok", GLYPHICON_REMOVE="glyphicon-remove", GLYPHICON_ZOOM_IN="glyphicon-zoom-in", GLYPHICON_ZOOM_OUT="glyphicon-zoom-out", GLYPHICON_OFF="glyphicon-off", GLYPHICON_SIGNAL="glyphicon-signal", GLYPHICON_COG="glyphicon-cog", GLYPHICON_TRASH="glyphicon-trash", GLYPHICON_HOME="glyphicon-home", GLYPHICON_FILE="glyphicon-file", GLYPHICON_TIME="glyphicon-time", GLYPHICON_ROAD="glyphicon-road", GLYPHICON_DOWNLOAD_ALT="glyphicon-download-alt", GLYPHICON_DOWNLOAD="glyphicon-download", GLYPHICON_UPLOAD="glyphicon-upload", GLYPHICON_INBOX="glyphicon-inbox", GLYPHICON_PLAY_CIRCLE="glyphicon-play-circle", GLYPHICON_REPEAT="glyphicon-repeat", GLYPHICON_REFRESH="glyphicon-refresh", GLYPHICON_LIST_ALT="glyphicon-list-alt", GLYPHICON_LOCK="glyphicon-lock", GLYPHICON_FLAG="glyphicon-flag", GLYPHICON_HEADPHONES="glyphicon-headphones", GLYPHICON_VOLUME_OFF="glyphicon-volume-off", GLYPHICON_VOLUME_DOWN="glyphicon-volume-down", GLYPHICON_VOLUME_UP="glyphicon-volume-up", GLYPHICON_QRCODE="glyphicon-qrcode", GLYPHICON_BARCODE="glyphicon-barcode", GLYPHICON_TAG="glyphicon-tag", GLYPHICON_TAGS="glyphicon-tags", GLYPHICON_BOOK="glyphicon-book", GLYPHICON_BOOKMARK="glyphicon-bookmark", GLYPHICON_PRINT="glyphicon-print", GLYPHICON_CAMERA="glyphicon-camera", GLYPHICON_FONT="glyphicon-font", GLYPHICON_BOLD="glyphicon-bold", GLYPHICON_ITALIC="glyphicon-italic", GLYPHICON_TEXT_HEIGHT="glyphicon-text-height", GLYPHICON_TEXT_WIDTH="glyphicon-text-width", GLYPHICON_ALIGN_LEFT="glyphicon-align-left", GLYPHICON_ALIGN_CENTER="glyphicon-align-center", GLYPHICON_ALIGN_RIGHT="glyphicon-align-right", GLYPHICON_ALIGN_JUSTIFY="glyphicon-align-justify", GLYPHICON_LIST="glyphicon-list", GLYPHICON_INDENT_LEFT="glyphicon-indent-left", GLYPHICON_INDENT_RIGHT="glyphicon-indent-right", GLYPHICON_FACETIME_VIDEO="glyphicon-facetime-video", GLYPHICON_PICTURE="glyphicon-picture", GLYPHICON_MAP_MARKER="glyphicon-map-marker", GLYPHICON_ADJUST="glyphicon-adjust", GLYPHICON_TINT="glyphicon-tint", GLYPHICON_EDIT="glyphicon-edit", GLYPHICON_SHARE="glyphicon-share", GLYPHICON_CHECK="glyphicon-check", GLYPHICON_MOVE="glyphicon-move", GLYPHICON_STEP_BACKWARD="glyphicon-step-backward", GLYPHICON_FAST_BACKWARD="glyphicon-fast-backward", GLYPHICON_BACKWARD="glyphicon-backward", GLYPHICON_PLAY="glyphicon-play", GLYPHICON_PAUSE="glyphicon-pause", GLYPHICON_STOP="glyphicon-stop", GLYPHICON_FORWARD="glyphicon-forward", GLYPHICON_FAST_FORWARD="glyphicon-fast-forward", GLYPHICON_STEP_FORWARD="glyphicon-step-forward", GLYPHICON_EJECT="glyphicon-eject", GLYPHICON_CHEVRON_LEFT="glyphicon-chevron-left", GLYPHICON_CHEVRON_RIGHT="glyphicon-chevron-right", GLYPHICON_PLUS_SIGN="glyphicon-plus-sign", GLYPHICON_MINUS_SIGN="glyphicon-minus-sign", GLYPHICON_REMOVE_SIGN="glyphicon-remove-sign", GLYPHICON_OK_SIGN="glyphicon-ok-sign", GLYPHICON_QUESTION_SIGN="glyphicon-question-sign", GLYPHICON_INFO_SIGN="glyphicon-info-sign", GLYPHICON_SCREENSHOT="glyphicon-screenshot", GLYPHICON_REMOVE_CIRCLE="glyphicon-remove-circle", GLYPHICON_OK_CIRCLE="glyphicon-ok-circle", GLYPHICON_BAN_CIRCLE="glyphicon-ban-circle", GLYPHICON_ARROW_LEFT="glyphicon-arrow-left", GLYPHICON_ARROW_RIGHT="glyphicon-arrow-right", GLYPHICON_ARROW_UP="glyphicon-arrow-up", GLYPHICON_ARROW_DOWN="glyphicon-arrow-down", GLYPHICON_SHARE_ALT="glyphicon-share-alt", GLYPHICON_RESIZE_FULL="glyphicon-resize-full", GLYPHICON_RESIZE_SMALL="glyphicon-resize-small", GLYPHICON_EXCLAMATION_SIGN="glyphicon-exclamation-sign", GLYPHICON_GIFT="glyphicon-gift", GLYPHICON_LEAF="glyphicon-leaf", GLYPHICON_FIRE="glyphicon-fire", GLYPHICON_EYE_OPEN="glyphicon-eye-open", GLYPHICON_EYE_CLOSE="glyphicon-eye-close", GLYPHICON_WARNING_SIGN="glyphicon-warning-sign", GLYPHICON_PLANE="glyphicon-plane", GLYPHICON_CALENDAR="glyphicon-calendar", GLYPHICON_RANDOM="glyphicon-random", GLYPHICON_COMMENT="glyphicon-comment", GLYPHICON_MAGNET="glyphicon-magnet", GLYPHICON_CHEVRON_UP="glyphicon-chevron-up", GLYPHICON_CHEVRON_DOWN="glyphicon-chevron-down", GLYPHICON_RETWEET="glyphicon-retweet", GLYPHICON_SHOPPING_CART="glyphicon-shopping-cart", GLYPHICON_FOLDER_CLOSE="glyphicon-folder-close", GLYPHICON_FOLDER_OPEN="glyphicon-folder-open", GLYPHICON_RESIZE_VERTICAL="glyphicon-resize-vertical", GLYPHICON_RESIZE_HORIZONTAL="glyphicon-resize-horizontal", GLYPHICON_HDD="glyphicon-hdd", GLYPHICON_BULLHORN="glyphicon-bullhorn", GLYPHICON_BELL="glyphicon-bell", GLYPHICON_CERTIFICATE="glyphicon-certificate", GLYPHICON_THUMBS_UP="glyphicon-thumbs-up", GLYPHICON_THUMBS_DOWN="glyphicon-thumbs-down", GLYPHICON_HAND_RIGHT="glyphicon-hand-right", GLYPHICON_HAND_LEFT="glyphicon-hand-left", GLYPHICON_HAND_UP="glyphicon-hand-up", GLYPHICON_HAND_DOWN="glyphicon-hand-down", GLYPHICON_CIRCLE_ARROW_RIGHT="glyphicon-circle-arrow-right", GLYPHICON_CIRCLE_ARROW_LEFT="glyphicon-circle-arrow-left", GLYPHICON_CIRCLE_ARROW_UP="glyphicon-circle-arrow-up", GLYPHICON_CIRCLE_ARROW_DOWN="glyphicon-circle-arrow-down", GLYPHICON_GLOBE="glyphicon-globe", GLYPHICON_WRENCH="glyphicon-wrench", GLYPHICON_TASKS="glyphicon-tasks", GLYPHICON_FILTER="glyphicon-filter", GLYPHICON_BRIEFCASE="glyphicon-briefcase", GLYPHICON_FULLSCREEN="glyphicon-fullscreen", GLYPHICON_DASHBOARD="glyphicon-dashboard", GLYPHICON_PAPERCLIP="glyphicon-paperclip", GLYPHICON_HEART_EMPTY="glyphicon-heart-empty", GLYPHICON_LINK="glyphicon-link", GLYPHICON_PHONE="glyphicon-phone", GLYPHICON_PUSHPIN="glyphicon-pushpin", GLYPHICON_USD="glyphicon-usd", GLYPHICON_GBP="glyphicon-gbp", GLYPHICON_SORT="glyphicon-sort", GLYPHICON_SORT_BY_ALPHABET="glyphicon-sort-by-alphabet", GLYPHICON_SORT_BY_ALPHABET_ALT="glyphicon-sort-by-alphabet-alt", GLYPHICON_SORT_BY_ORDER="glyphicon-sort-by-order", GLYPHICON_SORT_BY_ORDER_ALT="glyphicon-sort-by-order-alt", GLYPHICON_SORT_BY_ATTRIBUTES="glyphicon-sort-by-attributes", GLYPHICON_SORT_BY_ATTRIBUTES_ALT="glyphicon-sort-by-attributes-alt", GLYPHICON_UNCHECKED="glyphicon-unchecked", GLYPHICON_EXPAND="glyphicon-expand", GLYPHICON_COLLAPSE_DOWN="glyphicon-collapse-down", GLYPHICON_COLLAPSE_UP="glyphicon-collapse-up", GLYPHICON_LOG_IN="glyphicon-log-in", GLYPHICON_FLASH="glyphicon-flash", GLYPHICON_LOG_OUT="glyphicon-log-out", GLYPHICON_NEW_WINDOW="glyphicon-new-window", GLYPHICON_RECORD="glyphicon-record", GLYPHICON_SAVE="glyphicon-save", GLYPHICON_OPEN="glyphicon-open", GLYPHICON_SAVED="glyphicon-saved", GLYPHICON_IMPORT="glyphicon-import", GLYPHICON_EXPORT="glyphicon-export", GLYPHICON_SEND="glyphicon-send", GLYPHICON_FLOPPY_DISK="glyphicon-floppy-disk", GLYPHICON_FLOPPY_SAVED="glyphicon-floppy-saved", GLYPHICON_FLOPPY_REMOVE="glyphicon-floppy-remove", GLYPHICON_FLOPPY_SAVE="glyphicon-floppy-save", GLYPHICON_FLOPPY_OPEN="glyphicon-floppy-open", GLYPHICON_CREDIT_CARD="glyphicon-credit-card", GLYPHICON_TRANSFER="glyphicon-transfer", GLYPHICON_CUTLERY="glyphicon-cutlery", GLYPHICON_HEADER="glyphicon-header", GLYPHICON_COMPRESSED="glyphicon-compressed", GLYPHICON_EARPHONE="glyphicon-earphone", GLYPHICON_PHONE_ALT="glyphicon-phone-alt", GLYPHICON_TOWER="glyphicon-tower", GLYPHICON_STATS="glyphicon-stats", GLYPHICON_SD_VIDEO="glyphicon-sd-video", GLYPHICON_HD_VIDEO="glyphicon-hd-video", GLYPHICON_SUBTITLES="glyphicon-subtitles", GLYPHICON_SOUND_STEREO="glyphicon-sound-stereo", GLYPHICON_SOUND_DOLBY="glyphicon-sound-dolby", GLYPHICON_SOUND_5_1="glyphicon-sound-5-1", GLYPHICON_SOUND_6_1="glyphicon-sound-6-1", GLYPHICON_SOUND_7_1="glyphicon-sound-7-1", GLYPHICON_COPYRIGHT_MARK="glyphicon-copyright-mark", GLYPHICON_REGISTRATION_MARK="glyphicon-registration-mark", GLYPHICON_CLOUD_DOWNLOAD="glyphicon-cloud-download", GLYPHICON_CLOUD_UPLOAD="glyphicon-cloud-upload", GLYPHICON_TREE_CONIFER="glyphicon-tree-conifer", GLYPHICON_TREE_DECIDUOUS="glyphicon-tree-deciduous", GLYPHICON_CD="glyphicon-cd", GLYPHICON_SAVE_FILE="glyphicon-save-file", GLYPHICON_OPEN_FILE="glyphicon-open-file", GLYPHICON_LEVEL_UP="glyphicon-level-up", GLYPHICON_COPY="glyphicon-copy", GLYPHICON_PASTE="glyphicon-paste", GLYPHICON_ALERT="glyphicon-alert", GLYPHICON_EQUALIZER="glyphicon-equalizer", GLYPHICON_KING="glyphicon-king", GLYPHICON_QUEEN="glyphicon-queen", GLYPHICON_PAWN="glyphicon-pawn", GLYPHICON_BISHOP="glyphicon-bishop", GLYPHICON_KNIGHT="glyphicon-knight", GLYPHICON_BABY_FORMULA="glyphicon-baby-formula", GLYPHICON_TENT="glyphicon-tent", GLYPHICON_BLACKBOARD="glyphicon-blackboard", GLYPHICON_BED="glyphicon-bed", GLYPHICON_APPLE="glyphicon-apple", GLYPHICON_ERASE="glyphicon-erase", GLYPHICON_HOURGLASS="glyphicon-hourglass", GLYPHICON_LAMP="glyphicon-lamp", GLYPHICON_DUPLICATE="glyphicon-duplicate", GLYPHICON_PIGGY_BANK="glyphicon-piggy-bank", GLYPHICON_SCISSORS="glyphicon-scissors", GLYPHICON_BITCOIN="glyphicon-bitcoin", GLYPHICON_YEN="glyphicon-yen", GLYPHICON_RUBLE="glyphicon-ruble", GLYPHICON_SCALE="glyphicon-scale", GLYPHICON_ICE_LOLLY="glyphicon-ice-lolly", GLYPHICON_ICE_LOLLY_TASTED="glyphicon-ice-lolly-tasted", GLYPHICON_EDUCATION="glyphicon-education", GLYPHICON_OPTION_HORIZONTAL="glyphicon-option-horizontal", GLYPHICON_OPTION_VERTICAL="glyphicon-option-vertical", GLYPHICON_MENU_HAMBURGER="glyphicon-menu-hamburger", GLYPHICON_MODAL_WINDOW="glyphicon-modal-window", GLYPHICON_OIL="glyphicon-oil", GLYPHICON_GRAIN="glyphicon-grain", GLYPHICON_SUNGLASSES="glyphicon-sunglasses", GLYPHICON_TEXT_SIZE="glyphicon-text-size", GLYPHICON_TEXT_COLOR="glyphicon-text-color", GLYPHICON_TEXT_BACKGROUND="glyphicon-text-background", GLYPHICON_OBJECT_ALIGN_TOP="glyphicon-object-align-top", GLYPHICON_OBJECT_ALIGN_BOTTOM="glyphicon-object-align-bottom", GLYPHICON_OBJECT_ALIGN_HORIZONTAL="glyphicon-object-align-horizontal", GLYPHICON_OBJECT_ALIGN_LEFT="glyphicon-object-align-left", GLYPHICON_OBJECT_ALIGN_VERTICAL="glyphicon-object-align-vertical", GLYPHICON_OBJECT_ALIGN_RIGHT="glyphicon-object-align-right", GLYPHICON_TRIANGLE_RIGHT="glyphicon-triangle-right", GLYPHICON_TRIANGLE_LEFT="glyphicon-triangle-left", GLYPHICON_TRIANGLE_BOTTOM="glyphicon-triangle-bottom", GLYPHICON_TRIANGLE_TOP="glyphicon-triangle-top", GLYPHICON_CONSOLE="glyphicon-console", GLYPHICON_SUPERSCRIPT="glyphicon-superscript", GLYPHICON_SUBSCRIPT="glyphicon-subscript", GLYPHICON_MENU_LEFT="glyphicon-menu-left", GLYPHICON_MENU_RIGHT="glyphicon-menu-right", GLYPHICON_MENU_DOWN="glyphicon-menu-down", GLYPHICON_MENU_UP="glyphicon-menu-up";
}
abstract class CssSize extends BaseEnum {
	const SIZE_LG="lg", SIZE_DEFAULT="", SIZE_SM="sm", SIZE_XS="xs";
}
abstract class CssButton extends BaseEnum {
	const BTN_DEFAULT="btn-default", BTN_PRIMARY="btn-primary", BTN_SUCCESS="btn-success", BTN_INFO="btn-info", BTN_WARNING="btn-warning", BTN_DANGER="btn-danger";
}
abstract class CssNavbar extends BaseEnum {
	const NAVBAR_INVERSE="navbar-inverse";
}