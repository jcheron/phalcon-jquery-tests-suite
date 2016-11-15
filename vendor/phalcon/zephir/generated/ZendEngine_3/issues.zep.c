
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
#include "kernel/object.h"
#include "kernel/memory.h"
#include "kernel/fcall.h"


ZEPHIR_INIT_CLASS(Test_Issues) {

	ZEPHIR_REGISTER_CLASS(Test, Issues, test, issues, test_issues_method_entry, 0);

	zend_declare_property_null(test_issues_ce, SL("adapter"), ZEND_ACC_PROTECTED TSRMLS_CC);

	return SUCCESS;

}

PHP_METHOD(Test_Issues, setAdapter) {

	zval *adapter, adapter_sub;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&adapter_sub);

	zephir_fetch_params(0, 1, 0, &adapter);



	zephir_update_property_zval(this_ptr, SL("adapter"), adapter);

}

PHP_METHOD(Test_Issues, someMethod) {

	int ZEPHIR_LAST_CALL_STATUS;
	zval *methodName, methodName_sub, _0;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&methodName_sub);
	ZVAL_UNDEF(&_0);

	ZEPHIR_MM_GROW();
	zephir_fetch_params(1, 1, 0, &methodName);



	zephir_read_property(&_0, this_ptr, SL("adapter"), PH_NOISY_CC | PH_READONLY);
	ZEPHIR_RETURN_CALL_METHOD_ZVAL(&_0, methodName, NULL, 0);
	zephir_check_call_status();
	RETURN_MM();

}

PHP_METHOD(Test_Issues, test) {

	ZEPHIR_INIT_THIS();


	php_printf("%s", "test");

}

