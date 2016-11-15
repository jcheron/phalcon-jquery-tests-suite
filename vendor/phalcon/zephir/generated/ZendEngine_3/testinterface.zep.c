
#ifdef HAVE_CONFIG_H
#include "../ext_config.h"
#endif

#include <php.h>
#include "../php_ext.h"
#include "../ext.h"

#include <Zend/zend_exceptions.h>

#include "kernel/main.h"


/**
 * Sample exception class
 */
ZEPHIR_INIT_CLASS(Test_TestInterface) {

	ZEPHIR_REGISTER_INTERFACE(Test, TestInterface, test, testinterface, NULL);

	zephir_declare_class_constant_null(test_testinterface_ce, SL("C1"));

	zephir_declare_class_constant_bool(test_testinterface_ce, SL("C2"), 0);

	zephir_declare_class_constant_bool(test_testinterface_ce, SL("C3"), 1);

	zephir_declare_class_constant_long(test_testinterface_ce, SL("C4"), 10);

	zephir_declare_class_constant_double(test_testinterface_ce, SL("C5"), 10.25);

	zephir_declare_class_constant_string(test_testinterface_ce, SL("C6"), "test");

	return SUCCESS;

}

