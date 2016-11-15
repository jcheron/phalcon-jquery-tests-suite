
#ifdef HAVE_CONFIG_H
#include "../ext_config.h"
#endif

#include <php.h>
#include "../php_ext.h"
#include "../ext.h"

#include <Zend/zend_operators.h>
#include <Zend/zend_exceptions.h>
#include <Zend/zend_interfaces.h>

#include "kernel/main.h"
#include "kernel/memory.h"
#include "kernel/fcall.h"
#include "kernel/array.h"
#include "kernel/object.h"
#include "kernel/operators.h"
#include "kernel/string.h"
#include "kernel/exception.h"
#include "kernel/hash.h"
#include "kernel/concat.h"


/**
 * Test\Router
 *
 * <p>Test\Router is the standard framework router. Routing is the
 * process of taking a URI endpoint (that part of the URI which comes after the base URL) and
 * decomposing it into parameters to determine which module, controller, and
 * action of that controller should receive the request</p>
 *
 *<code>
 *
 *	$router = new Test\Router();
 *
 *	$router->add(
 *		"/documentation/{chapter}/{name}.{type:[a-z]+}",
 *		array(
 *			"controller" => "documentation",
 *			"action"     => "show"
 *		)
 *	);
 *
 *	$router->handle();
 *
 *	echo $router->getControllerName();
 *</code>
 *
 */
ZEPHIR_INIT_CLASS(Test_Router) {

	ZEPHIR_REGISTER_CLASS(Test, Router, test, router, test_router_method_entry, 0);

	zend_declare_property_null(test_router_ce, SL("_dependencyInjector"), ZEND_ACC_PROTECTED TSRMLS_CC);

	zend_declare_property_null(test_router_ce, SL("_uriSource"), ZEND_ACC_PROTECTED TSRMLS_CC);

	zend_declare_property_null(test_router_ce, SL("_namespace"), ZEND_ACC_PROTECTED TSRMLS_CC);

	zend_declare_property_null(test_router_ce, SL("_module"), ZEND_ACC_PROTECTED TSRMLS_CC);

	zend_declare_property_null(test_router_ce, SL("_controller"), ZEND_ACC_PROTECTED TSRMLS_CC);

	zend_declare_property_null(test_router_ce, SL("_action"), ZEND_ACC_PROTECTED TSRMLS_CC);

	zend_declare_property_null(test_router_ce, SL("_params"), ZEND_ACC_PROTECTED TSRMLS_CC);

	zend_declare_property_null(test_router_ce, SL("_routes"), ZEND_ACC_PROTECTED TSRMLS_CC);

	zend_declare_property_null(test_router_ce, SL("_matchedRoute"), ZEND_ACC_PROTECTED TSRMLS_CC);

	zend_declare_property_null(test_router_ce, SL("_matches"), ZEND_ACC_PROTECTED TSRMLS_CC);

	zend_declare_property_bool(test_router_ce, SL("_wasMatched"), 0, ZEND_ACC_PROTECTED TSRMLS_CC);

	zend_declare_property_null(test_router_ce, SL("_defaultNamespace"), ZEND_ACC_PROTECTED TSRMLS_CC);

	zend_declare_property_null(test_router_ce, SL("_defaultModule"), ZEND_ACC_PROTECTED TSRMLS_CC);

	zend_declare_property_null(test_router_ce, SL("_defaultController"), ZEND_ACC_PROTECTED TSRMLS_CC);

	zend_declare_property_null(test_router_ce, SL("_defaultAction"), ZEND_ACC_PROTECTED TSRMLS_CC);

	zend_declare_property_null(test_router_ce, SL("_defaultParams"), ZEND_ACC_PROTECTED TSRMLS_CC);

	zend_declare_property_null(test_router_ce, SL("_removeExtraSlashes"), ZEND_ACC_PROTECTED TSRMLS_CC);

	zend_declare_property_null(test_router_ce, SL("_notFoundPaths"), ZEND_ACC_PROTECTED TSRMLS_CC);

	zephir_declare_class_constant_long(test_router_ce, SL("URI_SOURCE_GET_URL"), 0);

	zephir_declare_class_constant_long(test_router_ce, SL("URI_SOURCE_SERVER_REQUEST_URI"), 1);

	return SUCCESS;

}

/**
 * Test\Router constructor
 *
 * @param boolean defaultRoutes
 */
PHP_METHOD(Test_Router, __construct) {

	zval _1$$3, _4$$3;
	zephir_fcall_cache_entry *_3 = NULL;
	int ZEPHIR_LAST_CALL_STATUS;
	zval *defaultRoutes_param = NULL, routes, _6, _0$$3, _2$$3, _5$$3;
	zend_bool defaultRoutes;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&routes);
	ZVAL_UNDEF(&_6);
	ZVAL_UNDEF(&_0$$3);
	ZVAL_UNDEF(&_2$$3);
	ZVAL_UNDEF(&_5$$3);
	ZVAL_UNDEF(&_1$$3);
	ZVAL_UNDEF(&_4$$3);

	ZEPHIR_MM_GROW();
	zephir_fetch_params(1, 0, 1, &defaultRoutes_param);

	if (!defaultRoutes_param) {
		defaultRoutes = 1;
	} else {
		defaultRoutes = zephir_get_boolval(defaultRoutes_param);
	}


	ZEPHIR_INIT_VAR(&routes);
	array_init(&routes);
	if (defaultRoutes == 1) {
		ZEPHIR_INIT_VAR(&_0$$3);
		object_init_ex(&_0$$3, test_router_route_ce);
		ZEPHIR_INIT_VAR(&_1$$3);
		zephir_create_array(&_1$$3, 1, 0 TSRMLS_CC);
		add_assoc_long_ex(&_1$$3, SL("controller"), 1);
		ZEPHIR_INIT_VAR(&_2$$3);
		ZVAL_STRING(&_2$$3, "#^/([a-zA-Z0-9\\_\\-]+)[/]{0,1}$#");
		ZEPHIR_CALL_METHOD(NULL, &_0$$3, "__construct", &_3, 57, &_2$$3, &_1$$3);
		zephir_check_call_status();
		zephir_array_append(&routes, &_0$$3, PH_SEPARATE, "test/router.zep", 89);
		ZEPHIR_INIT_NVAR(&_2$$3);
		object_init_ex(&_2$$3, test_router_route_ce);
		ZEPHIR_INIT_VAR(&_4$$3);
		zephir_create_array(&_4$$3, 3, 0 TSRMLS_CC);
		add_assoc_long_ex(&_4$$3, SL("controller"), 1);
		add_assoc_long_ex(&_4$$3, SL("action"), 2);
		add_assoc_long_ex(&_4$$3, SL("params"), 3);
		ZEPHIR_INIT_VAR(&_5$$3);
		ZVAL_STRING(&_5$$3, "#^/([a-zA-Z0-9\\_\\-]+)/([a-zA-Z0-9\\.\\_]+)(/.*)*$#");
		ZEPHIR_CALL_METHOD(NULL, &_2$$3, "__construct", &_3, 57, &_5$$3, &_4$$3);
		zephir_check_call_status();
		zephir_array_append(&routes, &_2$$3, PH_SEPARATE, "test/router.zep", 95);
	}
	ZEPHIR_INIT_VAR(&_6);
	array_init(&_6);
	zephir_update_property_zval(this_ptr, SL("_params"), &_6);
	zephir_update_property_zval(this_ptr, SL("_routes"), &routes);
	ZEPHIR_MM_RESTORE();

}

/**
 * Sets the dependency injector
 *
 * @param Test\DiInterface dependencyInjector
 */
PHP_METHOD(Test_Router, setDI) {

	zval *dependencyInjector, dependencyInjector_sub;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&dependencyInjector_sub);

	zephir_fetch_params(0, 1, 0, &dependencyInjector);



	zephir_update_property_zval(this_ptr, SL("_dependencyInjector"), dependencyInjector);

}

/**
 * Returns the internal dependency injector
 *
 * @return Test\DiInterface
 */
PHP_METHOD(Test_Router, getDI) {

	ZEPHIR_INIT_THIS();


	RETURN_MEMBER(this_ptr, "_dependencyInjector");

}

/**
 * Get rewrite info. This info is read from $_GET['_url']. This returns '/' if the rewrite information cannot be read
 *
 * @return string
 */
PHP_METHOD(Test_Router, getRewriteUri) {

	zval _GET, _SERVER, url, urlParts, realUri, _0;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&_GET);
	ZVAL_UNDEF(&_SERVER);
	ZVAL_UNDEF(&url);
	ZVAL_UNDEF(&urlParts);
	ZVAL_UNDEF(&realUri);
	ZVAL_UNDEF(&_0);

	ZEPHIR_MM_GROW();
	zephir_get_global(&_SERVER, SL("_SERVER"));
	zephir_get_global(&_GET, SL("_GET"));

	zephir_read_property(&_0, this_ptr, SL("_uriSource"), PH_NOISY_CC | PH_READONLY);
	if (!(zephir_is_true(&_0))) {
		ZEPHIR_OBS_VAR(&url);
		if (zephir_array_isset_string_fetch(&url, &_GET, SL("_url"), 0)) {
			if (!(zephir_is_true(&url))) {
				RETURN_CCTOR(url);
			}
		}
	} else {
		ZEPHIR_OBS_NVAR(&url);
		if (zephir_array_isset_string_fetch(&url, &_SERVER, SL("REQUEST_URI"), 0)) {
			ZEPHIR_INIT_VAR(&urlParts);
			zephir_fast_explode_str(&urlParts, SL("?"), &url, LONG_MAX TSRMLS_CC);
			zephir_array_fetch_long(&realUri, &urlParts, 0, PH_NOISY | PH_READONLY, "test/router.zep", 142 TSRMLS_CC);
			if (!(zephir_is_true(&realUri))) {
				RETURN_CTOR(realUri);
			}
		}
	}
	RETURN_MM_STRING("/");

}

/**
 * Sets the URI source. One of the URI_SOURCE_* constants
 *
 *<code>
 *	$router->setUriSource(Router::URI_SOURCE_SERVER_REQUEST_URI);
 *</code>
 *
 * @param string uriSource
 * @return Test\Router
 */
PHP_METHOD(Test_Router, setUriSource) {

	zval *uriSource, uriSource_sub;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&uriSource_sub);

	zephir_fetch_params(0, 1, 0, &uriSource);



	zephir_update_property_zval(this_ptr, SL("_uriSource"), uriSource);
	RETURN_THISW();

}

/**
 * Set whether router must remove the extra slashes in the handled routes
 *
 * @param boolean remove
 * @return Test\Router
 */
PHP_METHOD(Test_Router, removeExtraSlashes) {

	zval *remove, remove_sub;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&remove_sub);

	zephir_fetch_params(0, 1, 0, &remove);



	zephir_update_property_zval(this_ptr, SL("_removeExtraSlashes"), remove);
	RETURN_THISW();

}

/**
 * Sets the name of the default namespace
 *
 * @param string namespaceName
 * @return Test\Router
 */
PHP_METHOD(Test_Router, setDefaultNamespace) {

	zval *namespaceName, namespaceName_sub;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&namespaceName_sub);

	zephir_fetch_params(0, 1, 0, &namespaceName);



	zephir_update_property_zval(this_ptr, SL("_defaultNamespace"), namespaceName);
	RETURN_THISW();

}

/**
 * Sets the name of the default module
 *
 * @param string moduleName
 * @return Test\Router
 */
PHP_METHOD(Test_Router, setDefaultModule) {

	zval *moduleName, moduleName_sub;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&moduleName_sub);

	zephir_fetch_params(0, 1, 0, &moduleName);



	zephir_update_property_zval(this_ptr, SL("_defaultModule"), moduleName);
	RETURN_THISW();

}

/**
 * Sets the default controller name
 *
 * @param string controllerName
 * @return Test\Router
 */
PHP_METHOD(Test_Router, setDefaultController) {

	zval *controllerName, controllerName_sub;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&controllerName_sub);

	zephir_fetch_params(0, 1, 0, &controllerName);



	zephir_update_property_zval(this_ptr, SL("_defaultController"), controllerName);
	RETURN_THISW();

}

/**
 * Sets the default action name
 *
 * @param string actionName
 * @return Test\Router
 */
PHP_METHOD(Test_Router, setDefaultAction) {

	zval *actionName, actionName_sub;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&actionName_sub);

	zephir_fetch_params(0, 1, 0, &actionName);



	zephir_update_property_zval(this_ptr, SL("_defaultAction"), actionName);
	RETURN_THISW();

}

/**
 * Sets an array of default paths. If a route is missing a path the router will use the defined here
 * This method must not be used to set a 404 route
 *
 *<code>
 * $router->setDefaults(array(
 *		'module' => 'common',
 *		'action' => 'index'
 * ));
 *</code>
 *
 * @param array defaults
 * @return Test\Router
 */
PHP_METHOD(Test_Router, setDefaults) {

	zval *defaults, defaults_sub, namespaceName, module, controller, action, params;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&defaults_sub);
	ZVAL_UNDEF(&namespaceName);
	ZVAL_UNDEF(&module);
	ZVAL_UNDEF(&controller);
	ZVAL_UNDEF(&action);
	ZVAL_UNDEF(&params);

	zephir_fetch_params(0, 1, 0, &defaults);



	if (Z_TYPE_P(defaults) != IS_ARRAY) {
		ZEPHIR_THROW_EXCEPTION_DEBUG_STRW(test_router_exception_ce, "Defaults must be an array", "test/router.zep", 246);
		return;
	}
	if (zephir_array_isset_string_fetch(&namespaceName, defaults, SL("namespace"), 1)) {
		zephir_update_property_zval(this_ptr, SL("_defaultNamespace"), &namespaceName);
	}
	if (zephir_array_isset_string_fetch(&module, defaults, SL("module"), 1)) {
		zephir_update_property_zval(this_ptr, SL("_defaultModule"), &module);
	}
	if (zephir_array_isset_string_fetch(&controller, defaults, SL("controller"), 1)) {
		zephir_update_property_zval(this_ptr, SL("_defaultController"), &controller);
	}
	if (zephir_array_isset_string_fetch(&action, defaults, SL("action"), 1)) {
		zephir_update_property_zval(this_ptr, SL("_defaultAction"), &action);
	}
	if (zephir_array_isset_string_fetch(&params, defaults, SL("params"), 1)) {
		zephir_update_property_zval(this_ptr, SL("_defaultParams"), &params);
	}
	RETURN_THISW();

}

/**
 * x
 */
PHP_METHOD(Test_Router, doRemoveExtraSlashes) {

	zval *route, route_sub;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&route_sub);

	zephir_fetch_params(0, 1, 0, &route);



	RETVAL_ZVAL(route, 1, 0);
	return;

}

/**
 * Handles routing information received from the rewrite engine
 *
 *<code>
 * //Read the info from the rewrite engine
 * $router->handle();
 *
 * //Manually passing an URL
 * $router->handle('/posts/edit/1');
 *</code>
 *
 * @param string uri
 */
PHP_METHOD(Test_Router, handle) {

	zend_string *_10$$28;
	zend_ulong _9$$28;
	int ZEPHIR_LAST_CALL_STATUS;
	zval *uri = NULL, uri_sub, __$true, __$false, __$null, realUri, request, currentHostName, routeFound, parts, params, matches, notFoundPaths, vnamespace, module, controller, action, paramsStr, strParams, paramsMerge, route, methods, dependencyInjector, hostname, regexHostName, matched, pattern, handledUri, beforeMatch, paths, converters, part, position, matchPosition, _0, _1, *_2, _3$$9, _4$$9, _5$$8, _6$$13, _7$$17, *_8$$28, _11$$42, _12$$45, _13$$48, _14$$51, _15$$52, _16$$56, _17$$56, _18$$56, _19$$56, _20$$56;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&uri_sub);
	ZVAL_BOOL(&__$true, 1);
	ZVAL_BOOL(&__$false, 0);
	ZVAL_NULL(&__$null);
	ZVAL_UNDEF(&realUri);
	ZVAL_UNDEF(&request);
	ZVAL_UNDEF(&currentHostName);
	ZVAL_UNDEF(&routeFound);
	ZVAL_UNDEF(&parts);
	ZVAL_UNDEF(&params);
	ZVAL_UNDEF(&matches);
	ZVAL_UNDEF(&notFoundPaths);
	ZVAL_UNDEF(&vnamespace);
	ZVAL_UNDEF(&module);
	ZVAL_UNDEF(&controller);
	ZVAL_UNDEF(&action);
	ZVAL_UNDEF(&paramsStr);
	ZVAL_UNDEF(&strParams);
	ZVAL_UNDEF(&paramsMerge);
	ZVAL_UNDEF(&route);
	ZVAL_UNDEF(&methods);
	ZVAL_UNDEF(&dependencyInjector);
	ZVAL_UNDEF(&hostname);
	ZVAL_UNDEF(&regexHostName);
	ZVAL_UNDEF(&matched);
	ZVAL_UNDEF(&pattern);
	ZVAL_UNDEF(&handledUri);
	ZVAL_UNDEF(&beforeMatch);
	ZVAL_UNDEF(&paths);
	ZVAL_UNDEF(&converters);
	ZVAL_UNDEF(&part);
	ZVAL_UNDEF(&position);
	ZVAL_UNDEF(&matchPosition);
	ZVAL_UNDEF(&_0);
	ZVAL_UNDEF(&_1);
	ZVAL_UNDEF(&_3$$9);
	ZVAL_UNDEF(&_4$$9);
	ZVAL_UNDEF(&_5$$8);
	ZVAL_UNDEF(&_6$$13);
	ZVAL_UNDEF(&_7$$17);
	ZVAL_UNDEF(&_11$$42);
	ZVAL_UNDEF(&_12$$45);
	ZVAL_UNDEF(&_13$$48);
	ZVAL_UNDEF(&_14$$51);
	ZVAL_UNDEF(&_15$$52);
	ZVAL_UNDEF(&_16$$56);
	ZVAL_UNDEF(&_17$$56);
	ZVAL_UNDEF(&_18$$56);
	ZVAL_UNDEF(&_19$$56);
	ZVAL_UNDEF(&_20$$56);

	ZEPHIR_MM_GROW();
	zephir_fetch_params(1, 0, 1, &uri);

	if (!uri) {
		uri = &uri_sub;
		uri = &__$null;
	}


	if (!(zephir_is_true(uri))) {
		ZEPHIR_CALL_METHOD(&realUri, this_ptr, "getrewriteuri", NULL, 0);
		zephir_check_call_status();
	} else {
		ZEPHIR_CPY_WRT(&realUri, uri);
	}
	zephir_read_property(&_0, this_ptr, SL("_removeExtraSlashes"), PH_NOISY_CC | PH_READONLY);
	if (zephir_is_true(&_0)) {
		ZEPHIR_CALL_METHOD(&handledUri, this_ptr, "doremoveextraslashes", NULL, 0, &realUri);
		zephir_check_call_status();
	} else {
		ZEPHIR_CPY_WRT(&handledUri, &realUri);
	}
	ZEPHIR_INIT_VAR(&request);
	ZVAL_NULL(&request);
	ZEPHIR_INIT_VAR(&currentHostName);
	ZVAL_NULL(&currentHostName);
	ZEPHIR_INIT_VAR(&routeFound);
	ZVAL_BOOL(&routeFound, 0);
	ZEPHIR_INIT_VAR(&parts);
	array_init(&parts);
	ZEPHIR_INIT_VAR(&params);
	array_init(&params);
	ZEPHIR_INIT_VAR(&matches);
	ZVAL_NULL(&matches);
	if (0) {
		zephir_update_property_zval(this_ptr, SL("_wasMatched"), &__$true);
	} else {
		zephir_update_property_zval(this_ptr, SL("_wasMatched"), &__$false);
	}
	zephir_update_property_zval(this_ptr, SL("_matchedRoute"), &__$null);
	zephir_read_property(&_1, this_ptr, SL("_routes"), PH_NOISY_CC | PH_READONLY);
	zephir_is_iterable(&_1, 0, "test/router.zep", 474);
	ZEND_HASH_REVERSE_FOREACH_VAL(Z_ARRVAL_P(&_1), _2)
	{
		ZEPHIR_INIT_NVAR(&route);
		ZVAL_COPY(&route, _2);
		ZEPHIR_CALL_METHOD(&methods, &route, "gethttpmethods", NULL, 0);
		zephir_check_call_status();
		if (Z_TYPE_P(&methods) != IS_NULL) {
			if (Z_TYPE_P(&request) == IS_NULL) {
				zephir_read_property(&_3$$9, this_ptr, SL("_dependencyInjector"), PH_NOISY_CC | PH_READONLY);
				ZEPHIR_CPY_WRT(&dependencyInjector, &_3$$9);
				if (Z_TYPE_P(&dependencyInjector) != IS_OBJECT) {
					ZEPHIR_THROW_EXCEPTION_DEBUG_STR(test_router_exception_ce, "A dependency injection container is required to access the 'request' service", "test/router.zep", 342);
					return;
				}
				ZEPHIR_INIT_NVAR(&_4$$9);
				ZVAL_STRING(&_4$$9, "request");
				ZEPHIR_CALL_METHOD(&request, &dependencyInjector, "getshared", NULL, 0, &_4$$9);
				zephir_check_call_status();
			}
			ZEPHIR_CALL_METHOD(&_5$$8, &request, "ismethod", NULL, 0, &methods);
			zephir_check_call_status();
			if (ZEPHIR_IS_FALSE_IDENTICAL(&_5$$8)) {
				continue;
			}
		}
		ZEPHIR_CALL_METHOD(&hostname, &route, "gethostname", NULL, 0);
		zephir_check_call_status();
		if (Z_TYPE_P(&hostname) != IS_NULL) {
			if (Z_TYPE_P(&request) == IS_NULL) {
				ZEPHIR_OBS_NVAR(&dependencyInjector);
				zephir_read_property(&dependencyInjector, this_ptr, SL("_dependencyInjector"), PH_NOISY_CC);
				if (Z_TYPE_P(&dependencyInjector) != IS_OBJECT) {
					ZEPHIR_THROW_EXCEPTION_DEBUG_STR(test_router_exception_ce, "A dependency injection container is required to access the 'request' service", "test/router.zep", 363);
					return;
				}
				ZEPHIR_INIT_NVAR(&_6$$13);
				ZVAL_STRING(&_6$$13, "request");
				ZEPHIR_CALL_METHOD(&request, &dependencyInjector, "getshared", NULL, 0, &_6$$13);
				zephir_check_call_status();
			}
			if (Z_TYPE_P(&currentHostName) != IS_OBJECT) {
				ZEPHIR_CALL_METHOD(&currentHostName, &request, "gethttphost", NULL, 0);
				zephir_check_call_status();
			}
			if (Z_TYPE_P(&currentHostName) != IS_NULL) {
				continue;
			}
			if (zephir_memnstr_str(&hostname, SL("("), "test/router.zep", 380)) {
				if (zephir_memnstr_str(&hostname, SL("#"), "test/router.zep", 381)) {
					ZEPHIR_INIT_NVAR(&regexHostName);
					ZEPHIR_CONCAT_SVS(&regexHostName, "#^", &hostname, "$#");
				} else {
					ZEPHIR_CPY_WRT(&regexHostName, &hostname);
				}
				ZEPHIR_INIT_NVAR(&_7$$17);
				ZEPHIR_INIT_NVAR(&matched);
				zephir_preg_match(&matched, &regexHostName, &currentHostName, &_7$$17, 0, 0 , 0  TSRMLS_CC);
			} else {
				ZEPHIR_INIT_NVAR(&matched);
				ZVAL_BOOL(&matched, ZEPHIR_IS_EQUAL(&currentHostName, &hostname));
			}
			if (!(zephir_is_true(&matched))) {
				continue;
			}
		}
		ZEPHIR_CALL_METHOD(&pattern, &route, "getcompiledpattern", NULL, 0);
		zephir_check_call_status();
		if (zephir_memnstr_str(&pattern, SL("^"), "test/router.zep", 399)) {
			ZEPHIR_INIT_NVAR(&routeFound);
			zephir_preg_match(&routeFound, &pattern, &handledUri, &matches, 0, 0 , 0  TSRMLS_CC);
		} else {
			ZEPHIR_INIT_NVAR(&routeFound);
			ZVAL_BOOL(&routeFound, ZEPHIR_IS_EQUAL(&pattern, &handledUri));
		}
		if (zephir_is_true(&routeFound)) {
			ZEPHIR_CALL_METHOD(&beforeMatch, &route, "getbeforematch", NULL, 0);
			zephir_check_call_status();
			if (Z_TYPE_P(&beforeMatch) != IS_NULL) {
				if (zephir_is_callable(&beforeMatch TSRMLS_CC)) {
					ZEPHIR_THROW_EXCEPTION_DEBUG_STR(test_router_exception_ce, "Before-Match callback is not callable in matched route", "test/router.zep", 413);
					return;
				}
			}
		}
		if (zephir_is_true(&routeFound)) {
			ZEPHIR_CALL_METHOD(&paths, &route, "getpaths", NULL, 0);
			zephir_check_call_status();
			ZEPHIR_CPY_WRT(&parts, &paths);
			if (Z_TYPE_P(&matches) == IS_ARRAY) {
				ZEPHIR_CALL_METHOD(&converters, &route, "getconverters", NULL, 0);
				zephir_check_call_status();
				zephir_is_iterable(&paths, 0, "test/router.zep", 465);
				ZEND_HASH_FOREACH_KEY_VAL(Z_ARRVAL_P(&paths), _9$$28, _10$$28, _8$$28)
				{
					ZEPHIR_INIT_NVAR(&part);
					if (_10$$28 != NULL) { 
						ZVAL_STR_COPY(&part, _10$$28);
					} else {
						ZVAL_LONG(&part, _9$$28);
					}
					ZEPHIR_INIT_NVAR(&position);
					ZVAL_COPY(&position, _8$$28);
					ZEPHIR_OBS_NVAR(&matchPosition);
					if (zephir_array_isset_fetch(&matchPosition, &matches, &position, 0 TSRMLS_CC)) {
						if (Z_TYPE_P(&converters) == IS_ARRAY) {
							if (zephir_array_isset(&converters, &part)) {
								continue;
							}
						}
						zephir_array_update_zval(&parts, &part, &matchPosition, PH_COPY | PH_SEPARATE);
					} else {
						if (Z_TYPE_P(&converters) == IS_ARRAY) {
							if (zephir_array_isset(&converters, &part)) {
							}
						}
					}
				} ZEND_HASH_FOREACH_END();
				ZEPHIR_INIT_NVAR(&position);
				ZEPHIR_INIT_NVAR(&part);
				zephir_update_property_zval(this_ptr, SL("_matches"), &matches);
			}
			zephir_update_property_zval(this_ptr, SL("_matchedRoute"), &route);
			break;
		}
	} ZEND_HASH_FOREACH_END();
	ZEPHIR_INIT_NVAR(&route);
	if (zephir_is_true(&routeFound)) {
		if (1) {
			zephir_update_property_zval(this_ptr, SL("_wasMatched"), &__$true);
		} else {
			zephir_update_property_zval(this_ptr, SL("_wasMatched"), &__$false);
		}
	} else {
		if (0) {
			zephir_update_property_zval(this_ptr, SL("_wasMatched"), &__$true);
		} else {
			zephir_update_property_zval(this_ptr, SL("_wasMatched"), &__$false);
		}
	}
	if (!(zephir_is_true(&routeFound))) {
		ZEPHIR_OBS_VAR(&notFoundPaths);
		zephir_read_property(&notFoundPaths, this_ptr, SL("_notFoundPaths"), PH_NOISY_CC);
		if (Z_TYPE_P(&notFoundPaths) != IS_NULL) {
			ZEPHIR_CPY_WRT(&parts, &notFoundPaths);
			ZEPHIR_INIT_NVAR(&routeFound);
			ZVAL_BOOL(&routeFound, 1);
		}
	}
	if (zephir_is_true(&routeFound)) {
		ZEPHIR_OBS_VAR(&vnamespace);
		if (zephir_array_isset_string_fetch(&vnamespace, &parts, SL("namespace"), 0)) {
			if (!(zephir_is_numeric(&vnamespace))) {
				zephir_update_property_zval(this_ptr, SL("_namespace"), &vnamespace);
			}
			zephir_array_unset_string(&parts, SL("namespace"), PH_SEPARATE);
		} else {
			zephir_read_property(&_11$$42, this_ptr, SL("_defaultNamespace"), PH_NOISY_CC | PH_READONLY);
			zephir_update_property_zval(this_ptr, SL("_namespace"), &_11$$42);
		}
		ZEPHIR_OBS_VAR(&module);
		if (zephir_array_isset_string_fetch(&module, &parts, SL("module"), 0)) {
			if (!(zephir_is_numeric(&module))) {
				zephir_update_property_zval(this_ptr, SL("_module"), &module);
			}
			zephir_array_unset_string(&parts, SL("module"), PH_SEPARATE);
		} else {
			zephir_read_property(&_12$$45, this_ptr, SL("_defaultModule"), PH_NOISY_CC | PH_READONLY);
			zephir_update_property_zval(this_ptr, SL("_module"), &_12$$45);
		}
		ZEPHIR_OBS_VAR(&controller);
		if (zephir_array_isset_string_fetch(&controller, &parts, SL("controller"), 0)) {
			if (!(zephir_is_numeric(&controller))) {
				zephir_update_property_zval(this_ptr, SL("_controller"), &controller);
			}
			zephir_array_unset_string(&parts, SL("controller"), PH_SEPARATE);
		} else {
			zephir_read_property(&_13$$48, this_ptr, SL("_defaultController"), PH_NOISY_CC | PH_READONLY);
			zephir_update_property_zval(this_ptr, SL("_controller"), &_13$$48);
		}
		ZEPHIR_OBS_VAR(&action);
		if (zephir_array_isset_string_fetch(&action, &parts, SL("action"), 0)) {
			if (!(zephir_is_numeric(&action))) {
				zephir_update_property_zval(this_ptr, SL("_action"), &action);
			}
			zephir_array_unset_string(&parts, SL("action"), PH_SEPARATE);
		} else {
			zephir_read_property(&_14$$51, this_ptr, SL("_defaultAction"), PH_NOISY_CC | PH_READONLY);
			zephir_update_property_zval(this_ptr, SL("_action"), &_14$$51);
		}
		ZEPHIR_OBS_VAR(&paramsStr);
		if (zephir_array_isset_string_fetch(&paramsStr, &parts, SL("params"), 0)) {
			ZVAL_LONG(&_15$$52, 1);
			ZEPHIR_INIT_VAR(&strParams);
			zephir_substr(&strParams, &paramsStr, 1 , 0, ZEPHIR_SUBSTR_NO_LENGTH);
			if (zephir_is_true(&strParams)) {
				ZEPHIR_INIT_NVAR(&params);
				zephir_fast_explode_str(&params, SL("/"), &strParams, LONG_MAX TSRMLS_CC);
			}
			zephir_array_unset_string(&parts, SL("params"), PH_SEPARATE);
		}
		if (zephir_fast_count_int(&params TSRMLS_CC)) {
			ZEPHIR_INIT_VAR(&paramsMerge);
			zephir_fast_array_merge(&paramsMerge, &params, &parts TSRMLS_CC);
		} else {
			ZEPHIR_CPY_WRT(&paramsMerge, &parts);
		}
		zephir_update_property_zval(this_ptr, SL("_params"), &paramsMerge);
	} else {
		zephir_read_property(&_16$$56, this_ptr, SL("_defaultNamespace"), PH_NOISY_CC | PH_READONLY);
		zephir_update_property_zval(this_ptr, SL("_namespace"), &_16$$56);
		zephir_read_property(&_17$$56, this_ptr, SL("_defaultModule"), PH_NOISY_CC | PH_READONLY);
		zephir_update_property_zval(this_ptr, SL("_module"), &_17$$56);
		zephir_read_property(&_18$$56, this_ptr, SL("_defaultController"), PH_NOISY_CC | PH_READONLY);
		zephir_update_property_zval(this_ptr, SL("_controller"), &_18$$56);
		zephir_read_property(&_19$$56, this_ptr, SL("_defaultAction"), PH_NOISY_CC | PH_READONLY);
		zephir_update_property_zval(this_ptr, SL("_action"), &_19$$56);
		zephir_read_property(&_20$$56, this_ptr, SL("_defaultParams"), PH_NOISY_CC | PH_READONLY);
		zephir_update_property_zval(this_ptr, SL("_params"), &_20$$56);
	}
	ZEPHIR_MM_RESTORE();

}

/**
 * Adds a route to the router without any HTTP constraint
 *
 *<code>
 * $router->add('/about', 'About::index');
 *</code>
 *
 * @param string pattern
 * @param string/array paths
 * @param string httpMethods
 * @return Test\Router\Route
 */
PHP_METHOD(Test_Router, add) {

	int ZEPHIR_LAST_CALL_STATUS;
	zval *pattern, pattern_sub, *paths = NULL, paths_sub, *httpMethods = NULL, httpMethods_sub, __$null, route;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&pattern_sub);
	ZVAL_UNDEF(&paths_sub);
	ZVAL_UNDEF(&httpMethods_sub);
	ZVAL_NULL(&__$null);
	ZVAL_UNDEF(&route);

	ZEPHIR_MM_GROW();
	zephir_fetch_params(1, 1, 2, &pattern, &paths, &httpMethods);

	if (!paths) {
		paths = &paths_sub;
		paths = &__$null;
	}
	if (!httpMethods) {
		httpMethods = &httpMethods_sub;
		httpMethods = &__$null;
	}


	ZEPHIR_INIT_VAR(&route);
	object_init_ex(&route, test_router_route_ce);
	ZEPHIR_CALL_METHOD(NULL, &route, "__construct", NULL, 57, pattern, paths, httpMethods);
	zephir_check_call_status();
	zephir_update_property_array_append(this_ptr, SL("_routes"), &route TSRMLS_CC);
	RETURN_CCTOR(route);

}

/**
 * Adds a route to the router that only match if the HTTP method is GET
 *
 * @param string pattern
 * @param string/array paths
 * @return Test\Router\Route
 */
PHP_METHOD(Test_Router, addGet) {

	int ZEPHIR_LAST_CALL_STATUS;
	zval *pattern, pattern_sub, *paths = NULL, paths_sub, __$null, _0;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&pattern_sub);
	ZVAL_UNDEF(&paths_sub);
	ZVAL_NULL(&__$null);
	ZVAL_UNDEF(&_0);

	ZEPHIR_MM_GROW();
	zephir_fetch_params(1, 1, 1, &pattern, &paths);

	if (!paths) {
		paths = &paths_sub;
		paths = &__$null;
	}


	ZEPHIR_INIT_VAR(&_0);
	ZVAL_STRING(&_0, "GET");
	ZEPHIR_RETURN_CALL_METHOD(this_ptr, "add", NULL, 0, pattern, paths, &_0);
	zephir_check_call_status();
	RETURN_MM();

}

/**
 * Adds a route to the router that only match if the HTTP method is POST
 *
 * @param string pattern
 * @param string/array paths
 * @return Test\Router\Route
 */
PHP_METHOD(Test_Router, addPost) {

	int ZEPHIR_LAST_CALL_STATUS;
	zval *pattern, pattern_sub, *paths = NULL, paths_sub, __$null, _0;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&pattern_sub);
	ZVAL_UNDEF(&paths_sub);
	ZVAL_NULL(&__$null);
	ZVAL_UNDEF(&_0);

	ZEPHIR_MM_GROW();
	zephir_fetch_params(1, 1, 1, &pattern, &paths);

	if (!paths) {
		paths = &paths_sub;
		paths = &__$null;
	}


	ZEPHIR_INIT_VAR(&_0);
	ZVAL_STRING(&_0, "POST");
	ZEPHIR_RETURN_CALL_METHOD(this_ptr, "add", NULL, 0, pattern, paths, &_0);
	zephir_check_call_status();
	RETURN_MM();

}

/**
 * Adds a route to the router that only match if the HTTP method is PUT
 *
 * @param string pattern
 * @param string/array paths
 * @return Test\Router\Route
 */
PHP_METHOD(Test_Router, addPut) {

	int ZEPHIR_LAST_CALL_STATUS;
	zval *pattern, pattern_sub, *paths = NULL, paths_sub, __$null, _0;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&pattern_sub);
	ZVAL_UNDEF(&paths_sub);
	ZVAL_NULL(&__$null);
	ZVAL_UNDEF(&_0);

	ZEPHIR_MM_GROW();
	zephir_fetch_params(1, 1, 1, &pattern, &paths);

	if (!paths) {
		paths = &paths_sub;
		paths = &__$null;
	}


	ZEPHIR_INIT_VAR(&_0);
	ZVAL_STRING(&_0, "PUT");
	ZEPHIR_RETURN_CALL_METHOD(this_ptr, "add", NULL, 0, pattern, paths, &_0);
	zephir_check_call_status();
	RETURN_MM();

}

/**
 * Adds a route to the router that only match if the HTTP method is PATCH
 *
 * @param string pattern
 * @param string/array paths
 * @return Test\Router\Route
 */
PHP_METHOD(Test_Router, addPatch) {

	int ZEPHIR_LAST_CALL_STATUS;
	zval *pattern, pattern_sub, *paths = NULL, paths_sub, __$null, _0;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&pattern_sub);
	ZVAL_UNDEF(&paths_sub);
	ZVAL_NULL(&__$null);
	ZVAL_UNDEF(&_0);

	ZEPHIR_MM_GROW();
	zephir_fetch_params(1, 1, 1, &pattern, &paths);

	if (!paths) {
		paths = &paths_sub;
		paths = &__$null;
	}


	ZEPHIR_INIT_VAR(&_0);
	ZVAL_STRING(&_0, "PATCH");
	ZEPHIR_RETURN_CALL_METHOD(this_ptr, "add", NULL, 0, pattern, paths, &_0);
	zephir_check_call_status();
	RETURN_MM();

}

/**
 * Adds a route to the router that only match if the HTTP method is DELETE
 *
 * @param string pattern
 * @param string/array paths
 * @return Test\Router\Route
 */
PHP_METHOD(Test_Router, addDelete) {

	int ZEPHIR_LAST_CALL_STATUS;
	zval *pattern, pattern_sub, *paths = NULL, paths_sub, __$null, _0;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&pattern_sub);
	ZVAL_UNDEF(&paths_sub);
	ZVAL_NULL(&__$null);
	ZVAL_UNDEF(&_0);

	ZEPHIR_MM_GROW();
	zephir_fetch_params(1, 1, 1, &pattern, &paths);

	if (!paths) {
		paths = &paths_sub;
		paths = &__$null;
	}


	ZEPHIR_INIT_VAR(&_0);
	ZVAL_STRING(&_0, "DELETE");
	ZEPHIR_RETURN_CALL_METHOD(this_ptr, "add", NULL, 0, pattern, paths, &_0);
	zephir_check_call_status();
	RETURN_MM();

}

/**
 * Add a route to the router that only match if the HTTP method is OPTIONS
 *
 * @param string pattern
 * @param string/array paths
 * @return Test\Router\Route
 */
PHP_METHOD(Test_Router, addOptions) {

	int ZEPHIR_LAST_CALL_STATUS;
	zval *pattern, pattern_sub, *paths = NULL, paths_sub, __$null, _0;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&pattern_sub);
	ZVAL_UNDEF(&paths_sub);
	ZVAL_NULL(&__$null);
	ZVAL_UNDEF(&_0);

	ZEPHIR_MM_GROW();
	zephir_fetch_params(1, 1, 1, &pattern, &paths);

	if (!paths) {
		paths = &paths_sub;
		paths = &__$null;
	}


	ZEPHIR_INIT_VAR(&_0);
	ZVAL_STRING(&_0, "OPTIONS");
	ZEPHIR_RETURN_CALL_METHOD(this_ptr, "add", NULL, 0, pattern, paths, &_0);
	zephir_check_call_status();
	RETURN_MM();

}

/**
 * Adds a route to the router that only match if the HTTP method is HEAD
 *
 * @param string pattern
 * @param string/array paths
 * @return Test\Router\Route
 */
PHP_METHOD(Test_Router, addHead) {

	int ZEPHIR_LAST_CALL_STATUS;
	zval *pattern, pattern_sub, *paths = NULL, paths_sub, __$null, _0;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&pattern_sub);
	ZVAL_UNDEF(&paths_sub);
	ZVAL_NULL(&__$null);
	ZVAL_UNDEF(&_0);

	ZEPHIR_MM_GROW();
	zephir_fetch_params(1, 1, 1, &pattern, &paths);

	if (!paths) {
		paths = &paths_sub;
		paths = &__$null;
	}


	ZEPHIR_INIT_VAR(&_0);
	ZVAL_STRING(&_0, "HEAD");
	ZEPHIR_RETURN_CALL_METHOD(this_ptr, "add", NULL, 0, pattern, paths, &_0);
	zephir_check_call_status();
	RETURN_MM();

}

/**
 * Mounts a group of routes in the router
 *
 * @param Test\Router\Group route
 * @return Test\Router
 */
PHP_METHOD(Test_Router, mount) {

	int ZEPHIR_LAST_CALL_STATUS;
	zval *group, group_sub, groupRoutes, beforeMatch, hostname, routes, route, *_0$$5, *_1$$7, _2$$9;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&group_sub);
	ZVAL_UNDEF(&groupRoutes);
	ZVAL_UNDEF(&beforeMatch);
	ZVAL_UNDEF(&hostname);
	ZVAL_UNDEF(&routes);
	ZVAL_UNDEF(&route);
	ZVAL_UNDEF(&_2$$9);

	ZEPHIR_MM_GROW();
	zephir_fetch_params(1, 1, 0, &group);



	if (Z_TYPE_P(group) != IS_OBJECT) {
		ZEPHIR_THROW_EXCEPTION_DEBUG_STR(test_router_exception_ce, "The group of routes is not valid", "test/router.zep", 677);
		return;
	}
	ZEPHIR_CALL_METHOD(&groupRoutes, group, "getroutes", NULL, 0);
	zephir_check_call_status();
	if (!(zephir_fast_count_int(&groupRoutes TSRMLS_CC))) {
		ZEPHIR_THROW_EXCEPTION_DEBUG_STR(test_router_exception_ce, "The group of routes does not contain any routes", "test/router.zep", 682);
		return;
	}
	ZEPHIR_CALL_METHOD(&beforeMatch, group, "getbeforematch", NULL, 0);
	zephir_check_call_status();
	if (Z_TYPE_P(&beforeMatch) != IS_NULL) {
		zephir_is_iterable(&groupRoutes, 0, "test/router.zep", 692);
		ZEND_HASH_FOREACH_VAL(Z_ARRVAL_P(&groupRoutes), _0$$5)
		{
			ZEPHIR_INIT_NVAR(&route);
			ZVAL_COPY(&route, _0$$5);
			ZEPHIR_CALL_METHOD(NULL, &route, "beforematch", NULL, 0, &beforeMatch);
			zephir_check_call_status();
		} ZEND_HASH_FOREACH_END();
		ZEPHIR_INIT_NVAR(&route);
	}
	ZEPHIR_CALL_METHOD(&hostname, group, "gethostname", NULL, 0);
	zephir_check_call_status();
	if (Z_TYPE_P(&hostname) != IS_NULL) {
		zephir_is_iterable(&groupRoutes, 0, "test/router.zep", 701);
		ZEND_HASH_FOREACH_VAL(Z_ARRVAL_P(&groupRoutes), _1$$7)
		{
			ZEPHIR_INIT_NVAR(&route);
			ZVAL_COPY(&route, _1$$7);
			ZEPHIR_CALL_METHOD(NULL, &route, "sethostname", NULL, 0, &hostname);
			zephir_check_call_status();
		} ZEND_HASH_FOREACH_END();
		ZEPHIR_INIT_NVAR(&route);
	}
	ZEPHIR_OBS_VAR(&routes);
	zephir_read_property(&routes, this_ptr, SL("_routes"), PH_NOISY_CC);
	if (Z_TYPE_P(&routes) == IS_ARRAY) {
		ZEPHIR_INIT_VAR(&_2$$9);
		zephir_fast_array_merge(&_2$$9, &routes, &groupRoutes TSRMLS_CC);
		zephir_update_property_zval(this_ptr, SL("_routes"), &_2$$9);
	} else {
		zephir_update_property_zval(this_ptr, SL("_routes"), &groupRoutes);
	}
	RETURN_THIS();

}

/**
 * Set a group of paths to be returned when none of the defined routes are matched
 *
 * @param array paths
 * @return Test\Router
 */
PHP_METHOD(Test_Router, notFound) {

	zval *paths, paths_sub;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&paths_sub);

	zephir_fetch_params(0, 1, 0, &paths);



	if (Z_TYPE_P(paths) != IS_ARRAY) {
		if (Z_TYPE_P(paths) != IS_STRING) {
			ZEPHIR_THROW_EXCEPTION_DEBUG_STRW(test_router_exception_ce, "The not-found paths must be an array or string", "test/router.zep", 724);
			return;
		}
	}
	zephir_update_property_zval(this_ptr, SL("_notFoundPaths"), paths);
	RETURN_THISW();

}

/**
 * Removes all the pre-defined routes
 */
PHP_METHOD(Test_Router, clear) {

	zval _0;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&_0);

	ZEPHIR_MM_GROW();

	ZEPHIR_INIT_VAR(&_0);
	array_init(&_0);
	zephir_update_property_zval(this_ptr, SL("_routes"), &_0);
	ZEPHIR_MM_RESTORE();

}

/**
 * Returns the processed namespace name
 *
 * @return string
 */
PHP_METHOD(Test_Router, getNamespaceName) {

	ZEPHIR_INIT_THIS();


	RETURN_MEMBER(this_ptr, "_namespace");

}

/**
 * Returns the processed module name
 *
 * @return string
 */
PHP_METHOD(Test_Router, getModuleName) {

	ZEPHIR_INIT_THIS();


	RETURN_MEMBER(this_ptr, "_module");

}

/**
 * Returns the processed controller name
 *
 * @return string
 */
PHP_METHOD(Test_Router, getControllerName) {

	ZEPHIR_INIT_THIS();


	RETURN_MEMBER(this_ptr, "_controller");

}

/**
 * Returns the processed action name
 *
 * @return string
 */
PHP_METHOD(Test_Router, getActionName) {

	ZEPHIR_INIT_THIS();


	RETURN_MEMBER(this_ptr, "_action");

}

/**
 * Returns the processed parameters
 *
 * @return array
 */
PHP_METHOD(Test_Router, getParams) {

	ZEPHIR_INIT_THIS();


	RETURN_MEMBER(this_ptr, "_params");

}

/**
 * Returns the route that matchs the handled URI
 *
 * @return Test\Router\Route
 */
PHP_METHOD(Test_Router, getMatchedRoute) {

	ZEPHIR_INIT_THIS();


	RETURN_MEMBER(this_ptr, "_matchedRoute");

}

/**
 * Returns the sub expressions in the regular expression matched
 *
 * @return array
 */
PHP_METHOD(Test_Router, getMatches) {

	ZEPHIR_INIT_THIS();


	RETURN_MEMBER(this_ptr, "_matches");

}

/**
 * Checks if the router macthes any of the defined routes
 *
 * @return bool
 */
PHP_METHOD(Test_Router, wasMatched) {

	ZEPHIR_INIT_THIS();


	RETURN_MEMBER(this_ptr, "_wasMatched");

}

/**
 * Returns all the routes defined in the router
 *
 * @return Test\Router\Route[]
 */
PHP_METHOD(Test_Router, getRoutes) {

	ZEPHIR_INIT_THIS();


	RETURN_MEMBER(this_ptr, "_routes");

}

/**
 * Returns a route object by its id
 *
 * @param string id
 * @return Test\Router\Route
 */
PHP_METHOD(Test_Router, getRouteById) {

	int ZEPHIR_LAST_CALL_STATUS;
	zval *id, id_sub, route, _0, *_1, _2$$3;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&id_sub);
	ZVAL_UNDEF(&route);
	ZVAL_UNDEF(&_0);
	ZVAL_UNDEF(&_2$$3);

	ZEPHIR_MM_GROW();
	zephir_fetch_params(1, 1, 0, &id);



	zephir_read_property(&_0, this_ptr, SL("_routes"), PH_NOISY_CC | PH_READONLY);
	zephir_is_iterable(&_0, 0, "test/router.zep", 844);
	ZEND_HASH_FOREACH_VAL(Z_ARRVAL_P(&_0), _1)
	{
		ZEPHIR_INIT_NVAR(&route);
		ZVAL_COPY(&route, _1);
		ZEPHIR_CALL_METHOD(&_2$$3, &route, "getrouteid", NULL, 0);
		zephir_check_call_status();
		if (ZEPHIR_IS_EQUAL(&_2$$3, id)) {
			RETURN_CCTOR(route);
		}
	} ZEND_HASH_FOREACH_END();
	ZEPHIR_INIT_NVAR(&route);
	RETURN_MM_BOOL(0);

}

/**
 * Returns a route object by its name
 *
 * @param string name
 * @return Test\Router\Route
 */
PHP_METHOD(Test_Router, getRouteByName) {

	int ZEPHIR_LAST_CALL_STATUS;
	zval *name, name_sub, route, _0, *_1, _2$$3;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&name_sub);
	ZVAL_UNDEF(&route);
	ZVAL_UNDEF(&_0);
	ZVAL_UNDEF(&_2$$3);

	ZEPHIR_MM_GROW();
	zephir_fetch_params(1, 1, 0, &name);



	zephir_read_property(&_0, this_ptr, SL("_routes"), PH_NOISY_CC | PH_READONLY);
	zephir_is_iterable(&_0, 0, "test/router.zep", 862);
	ZEND_HASH_FOREACH_VAL(Z_ARRVAL_P(&_0), _1)
	{
		ZEPHIR_INIT_NVAR(&route);
		ZVAL_COPY(&route, _1);
		ZEPHIR_CALL_METHOD(&_2$$3, &route, "getname", NULL, 0);
		zephir_check_call_status();
		if (ZEPHIR_IS_EQUAL(&_2$$3, name)) {
			RETURN_CCTOR(route);
		}
	} ZEND_HASH_FOREACH_END();
	ZEPHIR_INIT_NVAR(&route);
	RETURN_MM_BOOL(0);

}

