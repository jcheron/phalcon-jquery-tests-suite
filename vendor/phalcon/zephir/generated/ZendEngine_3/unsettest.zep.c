
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
#include "kernel/array.h"
#include "kernel/memory.h"
#include "kernel/operators.h"


/**
 * Unset statement tests
 */
ZEPHIR_INIT_CLASS(Test_Unsettest) {

	ZEPHIR_REGISTER_CLASS(Test, Unsettest, test, unsettest, test_unsettest_method_entry, 0);

	zend_declare_property_null(test_unsettest_ce, SL("property"), ZEND_ACC_PROTECTED TSRMLS_CC);

	return SUCCESS;

}

PHP_METHOD(Test_Unsettest, getProperty) {

	ZEPHIR_INIT_THIS();


	RETURN_MEMBER(this_ptr, "property");

}

PHP_METHOD(Test_Unsettest, has) {

	zval *key, key_sub, _0;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&key_sub);
	ZVAL_UNDEF(&_0);

	zephir_fetch_params(0, 1, 0, &key);



	zephir_read_property(&_0, this_ptr, SL("property"), PH_NOISY_CC | PH_READONLY);
	RETURN_BOOL(zephir_array_isset(&_0, key));

}

PHP_METHOD(Test_Unsettest, addValueToProperty) {

	zval *key, key_sub, *value, value_sub;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&key_sub);
	ZVAL_UNDEF(&value_sub);

	zephir_fetch_params(0, 2, 0, &key, &value);



	zephir_update_property_array(this_ptr, SL("property"), key, value TSRMLS_CC);

}

PHP_METHOD(Test_Unsettest, testUnsetValueFromProperty) {

	zval *key, key_sub, _0;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&key_sub);
	ZVAL_UNDEF(&_0);

	zephir_fetch_params(0, 1, 0, &key);



	zephir_read_property(&_0, this_ptr, SL("property"), PH_NOISY_CC | PH_READONLY);
	zephir_array_unset(&_0, key, PH_SEPARATE);

}

PHP_METHOD(Test_Unsettest, testUnsetFromArray) {

	zval *arrayParameter, arrayParameter_sub;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&arrayParameter_sub);

	ZEPHIR_MM_GROW();
	zephir_fetch_params(1, 1, 0, &arrayParameter);

	ZEPHIR_SEPARATE_PARAM(arrayParameter);


	zephir_array_unset_long(arrayParameter, 0, PH_SEPARATE);
	RETVAL_ZVAL(arrayParameter, 1, 0);
	RETURN_MM();

}

PHP_METHOD(Test_Unsettest, testUnsetFromArrayByIndexVar) {

	zval *arrayParameter, arrayParameter_sub, *index, index_sub;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&arrayParameter_sub);
	ZVAL_UNDEF(&index_sub);

	ZEPHIR_MM_GROW();
	zephir_fetch_params(1, 2, 0, &arrayParameter, &index);

	ZEPHIR_SEPARATE_PARAM(arrayParameter);


	zephir_array_unset(arrayParameter, index, PH_SEPARATE);
	RETVAL_ZVAL(arrayParameter, 1, 0);
	RETURN_MM();

}

PHP_METHOD(Test_Unsettest, testUnsetProperty) {

	ZEPHIR_INIT_THIS();


	zephir_unset_property(this_ptr, "property" TSRMLS_CC);
	RETURN_MEMBER(this_ptr, "property");

}

PHP_METHOD(Test_Unsettest, testStdClassUnset) {

	zval simpleObject, _0, _1;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&simpleObject);
	ZVAL_UNDEF(&_0);
	ZVAL_UNDEF(&_1);

	ZEPHIR_MM_GROW();

	ZEPHIR_INIT_VAR(&simpleObject);
	object_init(&simpleObject);
	ZEPHIR_INIT_ZVAL_NREF(_0);
	ZVAL_LONG(&_0, 12345);
	zephir_update_property_zval(&simpleObject, SL("property1"), &_0);
	ZEPHIR_INIT_VAR(&_1);
	ZEPHIR_INIT_NVAR(&_1);
	ZVAL_STRING(&_1, "test");
	zephir_update_property_zval(&simpleObject, SL("property2"), &_1);
	ZEPHIR_INIT_ZVAL_NREF(_0);
	ZVAL_LONG(&_0, 12345);
	zephir_update_property_zval(&simpleObject, SL("property3"), &_0);
	zephir_unset_property(&simpleObject, "property2" TSRMLS_CC);
	RETURN_CCTOR(simpleObject);

}

PHP_METHOD(Test_Unsettest, testUnsetTypedArray) {

	zval key;
	zval *arr_param = NULL, *key_param = NULL;
	zval arr;
	ZEPHIR_INIT_THIS();

	ZVAL_UNDEF(&arr);
	ZVAL_UNDEF(&key);

	ZEPHIR_MM_GROW();
	zephir_fetch_params(1, 2, 0, &arr_param, &key_param);

	zephir_get_arrval(&arr, arr_param);
	zephir_get_strval(&key, key_param);


	zephir_array_unset(&arr, &key, PH_SEPARATE);
	RETURN_CTOR(arr);

}

